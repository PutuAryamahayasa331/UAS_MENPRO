<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jobs;

class City extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Jobs()
    {
        return $this->hasMany(Jobs::class, 'job_id', 'id');
    }
}
