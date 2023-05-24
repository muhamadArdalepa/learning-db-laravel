<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['code', 'name', 'region', 'element', 'constellation', 'weapon', 'birth_date', 'base_atk'];
    // protected $guarded = ['base_atk'];
}
