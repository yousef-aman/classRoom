<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function getFormattedAvailableDateAttribute()
    {
        if ($this->available_date === null) {
            return null;
        }

        return Carbon::make($this->available_date)->format('F j, Y g:i A');
    }


    public function isAvailable() {
        return $this->available_date->isPast();
    }
}
