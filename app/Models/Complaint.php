<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'admin_name',
        'doctor_id',
        'complaint',
        'respond',
    ];

    

    public function ndoctors()
    {
        return $this->belongsTo('App\Models\NDoctor','doctor_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    
}
