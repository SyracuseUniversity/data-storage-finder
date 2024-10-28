function submitFeedback() {

    document.getElementById("feedbackForm").style.display = "none";
    document.getElementById("confirmationMessage").style.display = "block";
    document.getElementById("submitButton").style.display = "none";
    document.getElementById("closeButton").style.display = "none";
    document.getElementById("feedbackForm").reset();
    

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const rating = document.getElementById("rating").value;
    const comments = document.getElementById("comments").value;

    // Log the feedback data (replace with an actual submission, e.g., AJAX request)
    console.log("Feedback Submitted:");
    console.log("Name:", name);
    console.log("Email:", email);
    console.log("Rating:", rating);
    console.log("Comments:", comments);
}

document.addEventListener("DOMContentLoaded", function() {
    const feedbackModal = document.getElementById('feedbackModal');

    if (feedbackModal) {
       
        feedbackModal.addEventListener('hidden.bs.modal', function () {
            document.getElementById("feedbackForm").style.display = "block";
            document.getElementById("confirmationMessage").style.display = "none";
            document.getElementById("submitButton").style.display = "block";
            document.getElementById("closeButton").style.display = "block";
        });
    }
});



