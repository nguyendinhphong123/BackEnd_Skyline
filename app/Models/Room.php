<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{

     use HasFactory,SoftDeletes;
    protected $table ='rooms';
    protected $fillable = ['id','name','price','quantity','description','category_id','image'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($query, $term)
{
    if ($term) {
        $query
            ->join('categories', 'rooms.category_id', '=', 'categories.id')
            ->where('rooms.name', 'like', '%' . $term . '%')
            ->orWhere('rooms.price', 'like', '%' . $term . '%')
            ->orWhere('rooms.quantity', 'like', '%' . $term . '%')
            ->orWhere('rooms.id', 'like', '%' . $term . '%')
            ->orWhere('categories.name', 'like', '%' . $term . '%')
            ->select('rooms.*');
    }
    return $query;
}
}
