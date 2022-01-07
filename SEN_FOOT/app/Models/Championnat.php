<?php

namespace App\Models;

use App\Models\Matche;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Championnat extends Model
{
    use HasFactory;

    public function match()
    {
        return $this->hasOne(Matche::class);
    }
}
