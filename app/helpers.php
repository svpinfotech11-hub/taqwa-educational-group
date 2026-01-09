<?php

function hasModuleAccess($slug)
{
    if (!auth()->check()) return false;

    $role = auth()->user()->role;

    if (!$role) {
        return false;  // no role assigned, so no access
    }

    return $role->modules->where('slug', $slug)->count() > 0;
}
