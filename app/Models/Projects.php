<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $guarded = [];

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members');
    }
}