<?php

namespace App\Models;

use App\Models\Formation;
use App\Models\Titulaire;
use App\Models\Statistique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matche extends Model
{
    use HasFactory;

    public function statistique()
    {
        return $this->hasOne(Statistique::class);
    }

    public function titulaires()
    {
        return $this->hasMany(Titulaire::class);
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
