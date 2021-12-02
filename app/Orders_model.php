<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders_model extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    protected $fillable=['users_id',
        'users_email','name','address','city','state','pincode','country','mobile','shipping_charges','coupon_code','coupon_amount',
        'order_status','payment_method','grand_total','status','shipping_status','pay_status'];

    public function attributes(){
        return $this->hasMany(Cart_model::class,'order_id','id');
    }

    public function delivery(){
        return $this->belongsTo(delivery_model::class,'users_id','users_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'users_id','id');
    }
}
