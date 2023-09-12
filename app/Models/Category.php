<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use HasFactory;
    protected $table ='categories';
    use HasFactory,SoftDeletes;
    protected $fillable = ['id','name','image'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query->where('id', 'like', '%' . $term . '%')
                ->orWhere('name', 'like', '%' . $term . '%');
        }
        return $query;

    }
}
