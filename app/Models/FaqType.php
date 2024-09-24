<?php

// app/Models/FaqType.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqType extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'display_name', 'description'];
}
