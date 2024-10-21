function submitFeedback() {
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

    // Optionally, clear the form after submission
    document.getElementById("feedbackForm").reset();

    // Close the modal
    var feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'));
    feedbackModal.hide();
}
