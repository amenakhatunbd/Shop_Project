<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'saless';
	public $timestamps = true;

    protected $fillable = ['customer_id', 'product_id'];


    public function customers(){
        return $this->belongsTo(Customer::class);
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
