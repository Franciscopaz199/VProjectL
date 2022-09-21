<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class solution extends Model
{
    use HasFactory;

    public function autorName(){
        return $this->belongsTo(User::class, 'autor');
    }

}
