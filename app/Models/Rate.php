<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'hospital_id',
        'ndoctor_id',
        'fdoctor_id',
        'rating',
        'review',
    ];

    public function hospitals()
    {
        return $this->belongsTo('App\Models\Hospital','hospital_id');
    }

    public function ndoctors(){
        return $this->belongsTo('App\Models\NDoctor','ndoctor_id');
    }
}
