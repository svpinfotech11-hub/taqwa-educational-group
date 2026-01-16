<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('hasPermission')) {
    function hasPermission($module)
    {
        $user = auth()->user();
        if (!$user) return false;

        $permissions = $user->permissions;

        if (empty($permissions)) {
            $permissions = [];
        } elseif (is_string($permissions)) {
            $permissions = json_decode($permissions, true);
            if (!is_array($permissions)) {
                $permissions = [];
            }
        }

        if (in_array('all', $permissions)) {
            return true;
        }

        return in_array($module, $permissions);
    }
}
