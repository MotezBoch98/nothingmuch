<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{
    protected $table = 'abonnes';
    protected $fillable = ['nom','prenom','numcarte','tel','email','sex'];
}
