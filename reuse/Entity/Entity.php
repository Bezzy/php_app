<?php

// NOTE(Mohamed): The Entity Class handle an abstract single entity.
// The code from NewsManager and CommentManager where pulled in that class.
// There are not fonctionals as the main core principles of the functionalities
// were handled in different components of the application but if I were to
// put them somewhere it would be either here or in the controller.

// The class is fully functional and is used to as a parent of CommentEntity and
// NewsEntity

namespace Reuse\Entity;

class Entity {
    public function __get($key) {
        $func = "get" . ucfirst($key);
        $this->$key = $this->func();
        return $this->$key;
    }

    public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function getId()
	{
		return $this->id;
	}
	public function setBody($body)
	{
		$this->body = $body;

		return $this;
	}

	public function getBody()
	{
		return $this->body;
	}

	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	public function getNewsId()
	{
		return $this->newsId;
	}

	public function setNewsId($newsId)
	{
		$this->newsId = $newsId;

		return $this;
	}

    public function getTitle() {
        return $this->title;
    }
}