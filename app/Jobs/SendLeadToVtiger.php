<?php

namespace App\Jobs;

use App\Classes\VtigerCrmService;
use App\Exceptions\VtigerCrmException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendLeadToVtiger implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $backoff = [60, 120];

    protected $name;
    protected $email;
    protected $phone;
    protected $message;

    /**
     * Create a new job instance.
     *
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $message
     */
    public function __construct(string $name, string $email, string $phone, string $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $vtigerService = new VtigerCrmService();

            // Split the full name into first and last names.
            // Vtiger typically has separate fields for first and last names.
            Log::info('Preparing to send lead to Vtiger CRM', [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            $leadData = [
                'lastname' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'mobile' => $this->phone,
                'leadsource' => 'Web site',
                'leadstatus' => 'New Lead',
                'description' => $this->message,
                'assigned_user_id' => config('vtiger.assigned_user_id', '19x9'),
                'company' => $this->name,
            ];

            $vtigerService->createLead($leadData);
        } catch (VtigerCrmException $e) {
            Log::error('Failed to send lead to Vtiger CRM: ' . $e->getMessage());
            $this->release(60);
        }
    }
}
