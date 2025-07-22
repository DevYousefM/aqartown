<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Vtiger CRM Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for vTiger CRM web services.
    | You should fill this information in your .env file.
    |
    */

    'url' => env('VTIGER_CRM_URL'),
    'username' => env('VTIGER_CRM_USERNAME'),
    'access_key' => env('VTIGER_CRM_ACCESS_KEY'),
    'assigned_user_id' => env('VTIGER_CRM_ASSIGNED_USER_ID', '19x6'),
];
