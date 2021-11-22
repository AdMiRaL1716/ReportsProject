<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    public $timestamps = true;

    protected $fillable = [
        'result_one',
        'result_two',
        'result_three',
        'id_element',
        'id_method',
        'id_unit',
        'id_customer',
        'id_user',
    ];

    public function element() {
        return $this->belongsTo(Element::class, 'id_element');
    }

    public function method() {
        return $this->belongsTo(Method::class, 'id_method');
    }

    public function unit() {
        return $this->belongsTo(Unit::class, 'id_unit');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
