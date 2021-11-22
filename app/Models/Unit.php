<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    public function tests() {
        return $this->hasMany(Test::class, 'id_unit');
    }
}
