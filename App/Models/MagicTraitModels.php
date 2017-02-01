<?php

namespace App\Models;

trait MagicTraitModels
{

    public function __get($name)
    {
        $res = null;
        foreach ($this as $key => $value) {

            if ($key == static::$relations[$name]['field_name']) {
                $res = static::$relations[$name]['class']::findById($value);
            }
        }
        return $res;
    }

}