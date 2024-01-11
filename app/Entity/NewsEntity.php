<?php

namespace App\Entity;
use Reuse\Entity\Entity;

class NewsEntity extends Entity {    
    public function get_url() {
        return "index.php?p=news.show&id=" . $this->id;
    }

    public function get_excerpt() {
        return "<p>" . substr($this->body, 0, 50) . "..." . "</p>";
    }

    public function getNewsId() {
        return $this->news_id;
    }
}