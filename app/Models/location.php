<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

    protected $fillable = [

        'location_Name',
        'location_Building',
        'location_Floor',
        'location_Image',
        'accommodate_people',
        'location_Cost',
        'area',
        'location_Type',

    ];
    protected $primaryKey = 'location_id';

}
