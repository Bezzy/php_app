<?php

namespace App\Entity;
use Reuse\Entity\Entity;

class CommentEntity extends Entity {
    public function getNewsId() {
        return $this->news_id;
    }
}