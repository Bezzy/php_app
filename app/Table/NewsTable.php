<?php

namespace App\Table;
use Reuse\Table\Table;

class NewsTable extends Table {
    public function get_news_single() {
        return $this->query("SELECT * FROM " . $this->table . " WHERE id = ?", [$_GET["id"]], true);
    }

	/**
	* add a record in news table
	*/
	public function add_news_entry($title, $body)
	{
		return $this->query("INSERT INTO `{$this->table}` (`title`, `body`, `created_at`) VALUES('". "?" . "','" . "?" . "','" . "?" . "')", [$title, $body, date('Y-m-d')], true);
	}

	/**
	* deletes a news, and also linked comments
	*/
	public function delete_news_entry($id)
	{
        return $this->query("DELETE FROM " . $this->table . " WHERE id = ?", [$id], true);
	}

}