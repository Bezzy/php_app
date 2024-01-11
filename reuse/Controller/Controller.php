<?php

namespace Reuse\Controller;

class Controller {
    protected $path_view;
    protected $layout;

    public function render($path_view, $values = []) {
        ob_start();
        extract($values);
        require($this->path_view .$path_view. ".php");
        $content = ob_get_clean();
        require($this->path_view . "templates/"  .$this->layout  .".php");
    }
}