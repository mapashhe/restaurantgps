<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;
    protected $primaryKey = "id";

    protected $incrementing = false;

    protected $fillable = ["id", "rating", "name", "site", "email", "phone", "street", "city", "state", "lat", "lng"];
}
