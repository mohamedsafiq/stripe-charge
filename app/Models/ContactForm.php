<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    protected $table_name = "contact_form";

    protected $fillable = [
    	'name',
    	'phone',
    	'email',
    	'service',
    	'message'
    ];
}
