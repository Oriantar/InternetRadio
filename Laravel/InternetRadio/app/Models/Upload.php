<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $table = 'uploads';

    public $timestamps = true;

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = ['radio_name', 'radio_url',];
    
}
