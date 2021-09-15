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

    public function categorys(){
        return $this->belongsTo(Category::class);
    }


}
