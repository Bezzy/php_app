<?php

namespace Reuse\Entity;

class Entity {
    public function __get($key) {
        $func = "get" . ucfirst($key);
        $this->$key = $this->func();
        return $this->$key;
    }
}