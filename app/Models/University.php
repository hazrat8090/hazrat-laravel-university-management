<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'branch',
        'type',
        'no_faculty'
    ];

    public function faculty()
    {
        return $this->hasMany(Faculty::class); // Add 'return' before $this->hasMany(Faculty::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }
}
