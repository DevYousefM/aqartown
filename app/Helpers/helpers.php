<?php

if (!function_exists('access_public')) {
    function access_public()
    {
        return env('APP_ENV', 'local') === 'production' ? 'public/' : '';
    }
}
