<?php

namespace App\Models;

use App\Models\Matche;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Titulaire extends Model
{
    use HasFactory;

    public function matche()
    {
        return $this->belongsTo(Matche::class);
    }
}
