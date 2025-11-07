<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'amount', 'paid', 'due_date', 'status'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Auto-update status
    protected static function booted()
    {
        static::saving(function ($fee) {
            if ($fee->paid >= $fee->amount) {
                $fee->status = 'paid';
            } elseif ($fee->paid > 0) {
                $fee->status = 'partial';
            } else {
                $fee->status = 'pending';
            }
        });
    }
}
