<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    protected $table = 'samples';
	public $timestamps = true;

    protected $fillable = ['name', 'email', 'phone', 'product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    
}
