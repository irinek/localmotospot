<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
    	'title',
    	'content',
        'image_url',
    	'published_at',
    	'user_id'
    ];

    protected $dates = ['published_at'];

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

    public function setPublishedAtAttribute($date)
    {
            $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function getPublishedAtAttribute($date)
    {
        return new Carbon($date);
    }

    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now('Europe/Warsaw'));
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

 //   public function image()
  //  {
   //     return $this->belongsTo('App\Image');
   // }
}
