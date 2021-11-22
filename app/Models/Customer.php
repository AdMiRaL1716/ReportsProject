<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    public $timestamps = true;

    protected $fillable = [
        'code',
        'firstname',
        'lastname',
        'address',
        'phone',
        'email',
    ];

    public function reports() {
        return $this->hasMany(Report::class, 'id_customer');
    }

    public function tests() {
        return $this->hasMany(Test::class, 'id_customer');
    }
}
