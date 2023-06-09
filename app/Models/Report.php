<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Report extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['date', 'equipment', 'user_id', 'category_id', 'problem', 'action', 'image', 'slug', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('equipment', 'like', '%' . $search . '%')
                ->orWhere('user_id', 'like', '%' . $search . '%')
                ->orWhere('problem', 'like', '%' . $search . '%');
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'equipment'
            ]
        ];
    }
}
