<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishedGood extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'publishedGoods';

    /**
     * @var string[]
     */
    protected $fillable = [
        'table_id',
        'name',
        'price',
        'info',
        'counter',
        'category',
        'brand',
        'designer',
        'size',
        'sale',
        'img',
        'price_quantity',
        'sex'
    ];
}
