<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doucment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'doctor_id',
        'doucment',
        'dr_agreement',
        'admin_agreement',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function ndoctors()
    {
        return $this->belongsTo('App\Models\NDoctor','doctor_id');
    }
}
