<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class FDoctor extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'hospital_id',
        'specialization_id',
        'email',
        'password',
        'username',
        'contact',
        'gender',
        'nationality',
        'bloodtype',
        'religion',
        'address',
        'country',
        'city',
        'doctor_image',
    ];

    public function hospitals()
    {
        return $this->belongsTo('App\Models\Hospital','hospital_id');
    }

    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization','specialization_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
