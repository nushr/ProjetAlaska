<?php

require('model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    require('postView.php');
}
else {
    echo 'Chapitre inexistant, désolé, cher lecteur';
}

// Again : no closing tag
