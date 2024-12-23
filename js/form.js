function submitFeedback() {
    
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const rating = document.getElementById("rating").value;
    const comments = document.getElementById("comments").value;

    if (!comments.trim()) {
        var alertp = document.getElementById("error-msg");
        alertp.style.display = 'block';
    }else{
        document.getElementById("feedbackForm").style.display = "none";
        document.getElementById("confirmationMessage").style.display = "block";
        document.getElementById("submitButton").style.display = "none";
        document.getElementById("closeButton").style.display = "none";
        document.getElementById("feedbackForm").reset();
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const feedbackModal = document.getElementById('feedbackModal');

    if (feedbackModal) {
       
        feedbackModal.addEventListener('hidden.bs.modal', function () {
            document.getElementById("feedbackForm").style.display = "block";
            document.getElementById("error-msg").style.display="none";
            document.getElementById("confirmationMessage").style.display = "none";
            document.getElementById("submitButton").style.display = "block";
            document.getElementById("closeButton").style.display = "block";
        });
    }
});



