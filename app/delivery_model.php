<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class delivery_model extends Model
{
    protected $table='delivery_address';
    protected $primaryKey='id';
    protected $fillable=['id','users_id','users_email','name','address','city','country','mobile'];
}
