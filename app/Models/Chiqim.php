<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chiqim extends Model
{
    protected $fillable = ['name','amount','cost','summ','type'];
}
