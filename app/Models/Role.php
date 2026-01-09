<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

     // Relationship to Role
    protected $fillable = ['name'];

    // Role.php
   public function users()
    {
        return $this->hasMany(User::class);
    }

    public function modules()
    {
        return $this->belongsToMany(
            Module::class,
            'role_module_permissions', // pivot table name
            'role_id',
            'module_id'
        );
    }

}
