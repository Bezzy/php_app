<?php

foreach ($news as $new) {
	echo("############ NEWS " . $new->getTitle() . " ############\n");
	echo($new->getBody() . "\n");
	foreach ($comments as $comment) {
		// An alternative to that would be to have an object containing
		// an array with each entry containing the news and the comments
		// associated with it.
		if ($comment->getNewsId() == $new->getId()) {
			echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
		}
	}
}
?>