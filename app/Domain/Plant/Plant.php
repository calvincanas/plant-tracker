<?php

namespace App\Domain\Plant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'species', 'watering_instructions', 'photo_name'];
}
