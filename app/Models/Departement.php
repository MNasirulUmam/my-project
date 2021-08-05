<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name_depatement',
        'description',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
