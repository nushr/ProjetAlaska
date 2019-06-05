////////////////////////////
// Shows / hides comments //
////////////////////////////
var showComments = document.getElementById('see_comments');
var commentsBlock = document.getElementById('comments_block');
var showInitial = showComments.textContent;

// Displays / hides comments on click
showComments.addEventListener('click', function() {
    if (showComments.textContent != "Masquer les commentaires") {
        commentsBlock.style.display = "block";
        showComments.textContent = "Masquer les commentaires";
    } else {
        commentsBlock.style.display = "none";
        showComments.textContent = showInitial;
    }
});

// Displays comments default when clicked on from home page
if (window.location.href.endsWith("comments")) {
    commentsBlock.style.display = "block";
    showComments.textContent = "Masquer les commentaires";
}


///////////////////////////////////////
// Displays / hides add comment form //
///////////////////////////////////////
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
