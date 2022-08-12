<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class Customer extends Model
{
    protected $table = "customer";
    protected $primaryKey="id";
    public $timestamps = false;
    public function Orders()
    {
        return $this->hasMany(Orders::class,"customer_id","id");
    }
}
