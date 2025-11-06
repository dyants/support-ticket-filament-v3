<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'slug',
        'is_active',
    ];

    public function tickets() 
    {
        return $this->belongsToMany(Ticket::class, 'category_ticket');
    }
}
