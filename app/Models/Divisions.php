<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;

class Divisions extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_division',
        'member_id'
    ];

    public function member()
    {
        return $this->belongsTo(Employees::class, 'member_id');
    }
}
