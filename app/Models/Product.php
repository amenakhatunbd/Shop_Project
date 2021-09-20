<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
	public $timestamps = true;
    protected $fillable = ['category_id', 'productName', 'purchases', 'sales'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sales(){
        return $this->belongsTo(Sales::class);
    }
    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }

    public function sample(){
        return $this->belongsTo(Sample::class);
    }

}
