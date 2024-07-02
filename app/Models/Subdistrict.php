<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;

    protected $fillable = ['district_id', 'name'];

    public function users()
    {
        $this->hasMany(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
