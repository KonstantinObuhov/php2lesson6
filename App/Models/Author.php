<?php

namespace App\Models;

use App\Model;

class Author
    extends Model
{

    public static $table = 'authors';

    public $firstname;
    public $lastname;

}