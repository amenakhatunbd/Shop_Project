<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';
	public $timestamps = true;

    protected $fillable = ['supplier_id', 'product_id', 'quantity', 'unitPrice', 'totalprice'];
}
