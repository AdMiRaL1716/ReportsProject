<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $table = 'elements';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'symbol',
    ];

    public function tests() {
        return $this->hasMany(Test::class, 'id_element');
    }
}
