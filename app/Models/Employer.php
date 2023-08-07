<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'email',
        'job_id',
        'age',
        'status',
        'created_by',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'supervisor', 'id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class,'job_id','id');
    }
    public static function search($query)
    {
        $userId = Auth::id();

        return empty($query)
            ? static::where('created_by', $userId)->latest()
            : static::where('created_by', $userId)
                ->where(function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%')
                        ->orWhere('number', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%');
                })
                ->latest();
    }

    public function createdJobs()
    {
        return $this->hasMany(Job::class, 'created_by');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
