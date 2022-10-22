<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "numbers";
    protected $guarded = [];
    protected $casts = [];
    protected $fillable = [
        'number_id'
    ];
}
