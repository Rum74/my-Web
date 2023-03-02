<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $primaryKey = 'faq_id';
    protected $fillable = [
        'faq_question',
        'faq_answer'
    ];
    public $timestamps = true;
}
