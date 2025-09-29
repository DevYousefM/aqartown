<?php

namespace App\Classes;

use App\Exceptions\VtigerCrmException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VtigerCrmService
{
    protected $url;
    protected $username;
    protected $accessKey;
    protected $sessionName;

    public function __construct()
    {
        $this->url = config('vtiger.url');
        $this->username = config('vtiger.username');
        $this->accessKey = config('vtiger.access_key');

        if (!$this->url || !$this->username || !$this->accessKey) {
            // Log::error('Vtiger CRM credentials are missing', [
            //     'url' => $this->url,
            //     'username' => $this->username,
            //     'accessKey' => $this->accessKey ? '****' : null,
            // ]);
            throw new VtigerCrmException('Vtiger CRM credentials are not configured.');
        }
        // Log::info('Initializing VtigerCrmService with credentials', [
        //     'url' => $this->url,
        //     'username' => $this->username,
        // ]);
        $this->login();
    }

    protected function login()
    {
        // Log::info('Attempting login to Vtiger CRM...');

        $token = $this->getChallengeToken();
        $this->sessionName = $this->getSessionName($token);
        // Log::info('Login successful', ['sessionName' => $this->sessionName]);
    }

    protected function getChallengeToken()
    {
        // Log::info('Requesting challenge token', ['username' => $this->username]);

        $response = Http::get($this->url, [
            'operation' => 'getchallenge',
            'username' => $this->username,
        ]);

        $result = $response->json();
        // Log::debug('Challenge token response', $result);

        if (!$result['success']) {
            // Log::error('Failed to get challenge token', $result['error'] ?? []);

            throw new VtigerCrmException('Vtiger API error: ' . $result['error']['message']);
        }
        // Log::info($result);


        return $result['result']['token'];
    }

    protected function getSessionName($token)
    {
        $generatedKey = md5($token . $this->accessKey);
        // Log::info('Logging in with generated key');

        $response = Http::asForm()->post($this->url, [
            'operation' => 'login',
            'username' => $this->username,
            'accessKey' => $generatedKey,
        ]);

        $result = $response->json();
        // Log::debug('Login response', $result);

        if (!$result['success']) {
            // Log::error('Failed to login', $result['error'] ?? []);

            throw new VtigerCrmException('Vtiger API error: ' . $result['error']['message']);
        }


        return $result['result']['sessionName'];
    }

    public function createLead(array $data)
    {
        // Log::info('Creating new lead', $data);

        if (empty($data['lastname']) && !empty($data['firstname'])) {
            $data['lastname'] = $data['firstname'];
        }

        $response = Http::asForm()->post($this->url, [
            'operation' => 'create',
            'sessionName' => $this->sessionName,
            'elementType' => 'Leads',
            'element' => json_encode($data),
        ]);

        $result = $response->json();
        // Log::debug('Create lead response', $result);

        if (!$result['success']) {
            // Log::error('Failed to create lead', $result['error'] ?? []);

            throw new VtigerCrmException('Vtiger API error: ' . $result['error']['message']);
        }
        // Log::info('Lead created successfully', ['id' => $result['result']['id']]);

        return $result['result'];
    }
}
