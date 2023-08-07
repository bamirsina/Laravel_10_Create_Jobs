<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
    ];
//    public function employers()
//    {
//        return $this->hasMany(Employer::class, 'job', 'id');
//    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
