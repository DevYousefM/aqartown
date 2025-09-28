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
            throw new VtigerCrmException('Vtiger CRM credentials are not configured.');
        }

        $this->login();
    }

    protected function login()
    {
        $token = $this->getChallengeToken();
        $this->sessionName = $this->getSessionName($token);
    }

    protected function getChallengeToken()
    {
        $response = Http::get($this->url, [
            'operation' => 'getchallenge',
            'username' => $this->username,
        ]);

        $result = $response->json();

        if (!$result['success']) {
            throw new VtigerCrmException('Vtiger API error: ' . $result['error']['message']);
        }

        return $result['result']['token'];
    }

    protected function getSessionName($token)
    {
        $generatedKey = md5($token . $this->accessKey);

        $response = Http::asForm()->post($this->url, [
            'operation' => 'login',
            'username' => $this->username,
            'accessKey' => $generatedKey,
        ]);

        $result = $response->json();

        if (!$result['success']) {
            throw new VtigerCrmException('Vtiger API error: ' . $result['error']['message']);
        }
        
        Log::info($result);

        return $result['result']['sessionName'];
    }

    public function createLead(array $data)
    {
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

        if (!$result['success']) {
            throw new VtigerCrmException('Vtiger API error: ' . $result['error']['message']);
        }

        return $result['result'];
    }
} 