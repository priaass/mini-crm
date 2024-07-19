<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Divisions;


class Employees extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'division_id',
        'email',
        'phone'
    ];
    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
    public function division()
    {
        return $this->belongsTo(Divisions::class, 'division_id');
    }
}
