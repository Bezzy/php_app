<?php

namespace App\Table;

use App\App;
use Reuse\Table\Table;

class CommentTable extends Table {
    public function get_comments_belonging_to_news() {
        return $this->query("SELECT * FROM " . $this->table . " WHERE news_id = ?" . "", [$_GET["id"]]);
    }

    public function add_comment_for_news($body, $news_id)
	{
        return $this->query("INSERT INTO comment (body, created_at, news_id) VALUES(?,?,?)", [$body, date('Y-m-d'), $news_id], true);
	}

	public function delete_comment($id)
	{
        return $this->query("DELETE FROM `comment` WHERE `id`=?", [$id], true);
	}
}