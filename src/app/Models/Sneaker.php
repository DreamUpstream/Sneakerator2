<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class Sneaker extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(Models\User::class);
    }

    protected $fillable = [
        'user_id', 'name', 'stockx', 'size', 'restocks', 'image', 'style', 'cost', 'invoice'
    ];
}
