<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table_name = "products";

    protected $fillable = [
    	'field_name',
    	'price',
    	'description',
    	'created_at',
    	'updated_at'
    ];
}
