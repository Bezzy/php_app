<?php

namespace App\Controller;
use Reuse\Controller\Controller;

class AppController extends Controller {
    protected $layout = "default";

    public function __construct() {
        $this->path_view = ROOT . "/app/Views/";
    }

    protected function load_model($model) {
        $this->$model = App::get_instance()->getTable($model);
    }
}