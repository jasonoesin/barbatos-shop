<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Post
 *
 * @mixin Eloquent
 */

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'price',
        'detail',
        'category',
        'file_path'
    ];
}
