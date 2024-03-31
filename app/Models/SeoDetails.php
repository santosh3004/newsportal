<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'meta_title',
        'meta_author',
        'meta_keyword',
        'meta_description',
    ];
}
