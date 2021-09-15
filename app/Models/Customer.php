<?php

namespace App\Models;
use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
	public $timestamps = true;

    protected $fillable = ['name', 'email', 'mobile'];


    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
