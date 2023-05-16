<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Group extends Model
{
    use HasFactory;

    protected $table ='groups';
    use Notifiable;
    protected $fillable = ['id','name'];
    public function users()
    {
        return $this->hasMany(User::class, 'group_id', 'id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class,'group_role','group_id','role_id');
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
