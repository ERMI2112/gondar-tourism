<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $fillable = [
        'user_id', 'phone', 'languages', 'specialization', 'license_number',
        'bio', 'price_range', 'availability_status', 'photo', 'approval_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guideRequests()
    {
        return $this->hasMany(GuideRequest::class);
    }
}
