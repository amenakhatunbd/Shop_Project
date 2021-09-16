<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
	public $timestamps = true;

    protected $fillable = ['name', 'email', 'mobile'];

    public function purchases()
    {
        return $this->belongsTo(Purchase::class);
    }


}
