<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'id_customer',
        'id_user',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
