<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuideRequest extends Model
{
    protected $table = 'guide_requests';
    protected $fillable = [
        'tourist_name', 'tourist_email', 'tourist_phone', 'guide_id',
        'attraction_id', 'visit_date', 'group_size', 'message', 'status'
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function attraction()
    {
        return $this->belongsTo(Attraction::class);
    }
}
