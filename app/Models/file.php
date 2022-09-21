<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\solution;

class file extends Model
{
    protected $fillable = ['url'];
    use HasFactory;

    // relacion con solucion
    public function solution(){

        return $this->hasOne(solution::class,'id_files');
    }
}
