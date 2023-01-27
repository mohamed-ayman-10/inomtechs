<?php

namespace App\Models\Admin;

use App\Traits\Shareable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    use Sluggable;
    use Shareable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'portfolio_slug' => [
                'source' => 'title',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => false
            ]
        ];
    }

    // Share social media
    protected $shareOptions = [
        'columns' => [
            'title' => 'title'
        ],
        'url' => null
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'category_id',
        'category_name',
        'title',
        'desc',
        'image_status',
        'thumbnail_image',
        'portfolio_slug',
        'status',
        'meta_desc',
        'meta_keyword',
        'breadcrumb_status',
        'custom_breadcrumb_image',
        'order',
    ];

    public function portfolio_category()
    {
        return $this->belongsTo('App\Models\Admin\PortfolioCategory','category_id','id');
    }
}
