<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'number',
        'job_id',
        'age',
        'status',
        'supervisor',
        'created_by',
    ];

    public function boss(){

        return $this->belongsTo(Employer::class,'supervisor','id');
    }
    public function jobs()
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
}
