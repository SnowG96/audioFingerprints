<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvNotice extends Model
{
    //指定连接的数据库
    protected $connection = 'mysql_dejavu';
    protected $table = 'songs';
}
