<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'result', 
        'minutes',
        'code'
    ];

    public function options()
    {
        return $this->hasMany(Option::class, 'pollId')->select(['id','option','pollId']);
    }
}
