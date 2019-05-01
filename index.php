<?php

require('model.php');

$posts = getPosts();

require('homeView.php');

// Reminder : No closing tag because php only in here
