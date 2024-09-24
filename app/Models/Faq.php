<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['faq_type', 'display_name', 'description'];

    public function type()
    {
        return $this->belongsTo(FaqType::class);
    }
}
