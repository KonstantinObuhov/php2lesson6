<?php

namespace App\Models;

use App\Model;

/**
 * @property \App\Models\Author|null $author
 */
class Article
    extends Model
{
    public static $table = 'news';

    public $title;
    public $text;
    public $author_id;

    protected static $relations = [
        'author' => [
            'field_name' => 'author_id',
            'class' => Author::class,
        ]
    ];

    protected function validateTitle($val)
    {
        if (strlen($val) <= 5) {
            return false;
        }
        return true;
    }

    protected function validateText($val)
    {
        if (strlen($val) <= 10) {
            return false;
        }
        return true;
    }
}