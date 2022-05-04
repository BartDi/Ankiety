<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipadress extends Model
{
    use HasFactory;
    protected $table = "ipadresses";

    protected $fillable = ['pollId', 'voter'];
}
