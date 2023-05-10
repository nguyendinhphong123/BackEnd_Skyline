<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;


    protected $table = 'categories';
    protected $fillable = ['id','name'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query->where('name', 'like', '%' . $term . '%')
                ->orWhere('id', 'like', '%' . $term . '%');
        }
        return $query;

    }
}
