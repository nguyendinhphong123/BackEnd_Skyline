<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable = ['price','checkin','checkout','room_id','customer_id'];   
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function products()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->where('customers.name', 'like', '%' . $term . '%')
            ->orWhere('orders.id', 'like', '%' . $term . '%')
            ->select('orders.*');
        }
        return $query;

    }
}
