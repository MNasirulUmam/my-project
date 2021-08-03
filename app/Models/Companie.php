<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    use HasFactory;
    
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website_url',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
