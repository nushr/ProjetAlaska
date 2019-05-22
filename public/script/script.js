// Show/hide comments toggle

var showComments = document.getElementById('see_comments');
var commentsBlock = document.getElementById('comments_block');
var showInitial = showComments.textContent;

showComments.addEventListener('click', function() {
    if (showComments.textContent != "Masquer les commentaires") {
        commentsBlock.style.display = "block";
        showComments.textContent = "Masquer les commentaires";
    } else {
        commentsBlock.style.display = "none";
        showComments.textContent = showInitial;
    }
})



// Show/hide add comment form toggle

var showAddForm = document.getElementById('add_comment');
var addCommentBlock = document.getElementById('add_comment_block');

showAddForm.addEventListener('click', function() {
    if (showAddForm.textContent != "Annuler") {
        addCommentBlock.style.display = "block";
        showAddForm.textContent = "Annuler";
    } else {
        addCommentBlock.style.display = "none";
        showAddForm.textContent = "Ajouter un commentaire";
    }
})
