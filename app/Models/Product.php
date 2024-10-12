<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'desc',
        'retail',
        'whole',
        'origin',
        'quantity',
        'avatar'
    ];
    protected $append = [
        'avatar_url',
    ];

    public function getAvatarUrlAttribute()
    {
        if(filter_var($this->avatar, FILTER_VALIDATE_URL)){
            return $this->avatar;
        }

        return $this->avatar ? Storage::url($this->avatar) : null;
    }
}

