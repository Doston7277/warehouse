<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baza extends Model
{
    protected $fillable = ['name','amount','cost','summ','type'];

}
