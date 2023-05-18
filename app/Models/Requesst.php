<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requesst extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ndoctor_id',
        'fdoctor_id',
        'test_result',
        'ndoctor_details',
        'status',
        'fdoctor_details',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function ndoctors()
    {
        return $this->belongsTo('App\Models\NDoctor','ndoctor_id');
    }

    public function fdoctors()
    {
        return $this->belongsTo('App\Models\FDoctor','fdoctor_id');
    }

}
