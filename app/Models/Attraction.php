<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'history', 'location_name',
        'latitude', 'longitude', 'opening_hours', 'ticket_price', 'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function guideRequests()
    {
        return $this->hasMany(GuideRequest::class);
    }
}
