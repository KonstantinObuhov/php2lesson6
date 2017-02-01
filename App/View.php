<?php

namespace App;

class View
    implements \Countable
{
    use MagicTrait;

    public function count()
    {
        return count($this->data);
    }

    public function render($template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}