<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'category_id',
        'category_name',
        'question',
        'answer',
        'order',
    ];

    public function faq_category()
    {
        return $this->belongsTo('App\Models\Admin\FaqCategory','category_id','id');
    }

    public static function faqs ($category_name)
    {
        return Faq::where('category_name', '=', $category_name)->get();
    }
}
