<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'stock',
        'img_path',
        'description',
    ];
}
