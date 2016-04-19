<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
    	'title',
    	'content',
    	'image_url',
    	'user_id',
        'position'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        
        if (! $this->exists)
        {
            $this->setUniqueSlug($value, '');
        }
    }

    public function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title . '-' . $extra);

        if (static::whereSlug($slug)->exists())
        {
            $this->setUniqueSlug($title, $extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
