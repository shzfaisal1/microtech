<?php


use Illuminate\Support\Facades\Session;

if (!function_exists('GetSession')) {
    function GetSession()
    {
        return Session::get('user_id');
    }
}
