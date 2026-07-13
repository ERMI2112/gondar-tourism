<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'description', 'address', 'phone', 'email',
        'website', 'stars', 'price_range', 'image', 'latitude', 'longitude',
        'amenities', 'is_active',
    ];

    protected $casts = [
        'amenities' => 'array',
        'is_active'  => 'boolean',
        'stars'      => 'integer',
    ];

    /** Star rating display helper */
    public function getStarsHtmlAttribute(): string
    {
        $html = '';
        for ($i = 1; $i <= 5; $i++) {
            $html .= $i <= $this->stars
                ? '<i class="bi bi-star-fill" style="color:#C9A84C;font-size:0.8rem;"></i>'
                : '<i class="bi bi-star"      style="color:rgba(201,168,76,0.25);font-size:0.8rem;"></i>';
        }
        return $html;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
