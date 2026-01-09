<?php

use App\Models\School;

if (!function_exists('getAllSchools')) {
    function getAllSchools()
    {
        return School::orderBy('name', 'asc')->get();
    }
}
