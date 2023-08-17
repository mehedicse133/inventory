<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    // use HasFactory;
    protected $table="models";
    protected $primaryKey="id";
    protected $dates = ['entry_date'];
    protected $fillable=[
        'brand_id',
        'name',
        'entry_date',
    ];
}
