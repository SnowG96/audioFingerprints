<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FingerPrint extends Model
{
    protected $connection = 'mysql_dejavu';
    protected $table = 'fingerpirnts';
}
