<?php

use \Illuminate\Support\Facades\Request;

if (! function_exists('get_user_ip_address_via_helper')) {
    /**
     * @return string|null
     */
    function get_user_ip_address_via_helper()
    {
        $clientIP = Request::ip();

        if(!$clientIP) {
            $clientIP = Request::getClientIp();
        }

        if(!$clientIP) {
            $clientIP = request()->ip();
        }

        if(!$clientIP) {
            $clientIP = 'NA';
        }
        return $clientIP;
    }
}


