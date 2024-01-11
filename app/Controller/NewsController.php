<?php

namespace App\Controller;
use \App;

class NewsController extends AppController {

    public function home() {
        $news = App::get_instance()->get_table("News")->all();
        $comments = App::get_instance()->get_table("Comment")->all();
        $this->render("news/home", compact("news", "comments"));
    }

    public function show() {
        if (!empty($_POST)) {
            if (isset($_POST["comm"]) && $_POST["comm"] !== "") {
                App::get_instance()->get_table("Comment")->add_comment_for_news($_POST["comm"], $_GET["id"]);
                $_POST["comm"] = null;
            }
        }

        $news = App::get_instance()->get_table("News")->find($_GET["id"]);
        $comments = App::get_instance()->get_table("Comment")->get_comments_belonging_to_news();
        $this->render("news/show", compact("news", "comments"));
    }

    public function edit() {

    }

    public function delete() {

    }
}