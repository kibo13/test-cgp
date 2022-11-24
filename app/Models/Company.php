<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'director',
        'registered_at',
        'account',
        'address',
    ];

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }
}
