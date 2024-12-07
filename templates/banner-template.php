<div class="flex-container">
    <p class="info-container-heading text-orange-dark">Evaluate options for data storage at Syracuse University</p>

    <div class="info-container-details">
        <div class="info-item">
            <div class="info-container-icons icon-circle">
                <i class="fa fa-certificate"></i>
            </div>
            <p class="banner-text">All services presented on this finder tool are vetted and supported by Syracuse
                University.</p>
        </div>

        <div class="info-item">
            <div class="info-container-icons icon-circle">
                <i class="fa fa-comments"></i>
            </div>
            <p class="banner-text">We welcome <a id="modalToggle" class="info-container-links">feedback</a> on this
                tool.</p>
        </div>
    </div>
</div>



<!-- Modal Structure -->
<div class="modal" id="feedbackModal" tabindex="-1" aria-labelledby="modalTitle" aria-describedby='modalDescription'
    aria-hidden='false'>
    <div class="modal-container">
        <div class="modal-content">
            <div class="modal-body">
                <form id="feedbackForm">
                    <!-- Name Field (Optional) -->
                    <div class="margin-bottom-3">
                        <label for="name" class="form-label">Name (Optional)</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>

                    <!-- Email Field (Optional) -->
                    <div class="margin-bottom-3">
                        <label for="email" class="form-label">Email (Optional)</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>

                    <!-- Rating Field -->
                    <div class="margin-bottom-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select" id="rating" name="rating">
                            <option value="default">None</option>
                            <option value="1">1 - Poor</option>
                            <option value="2">2 - Fair</option>
                            <option value="3">3 - Good</option>
                            <option value="4">4 - Very Good</option>
                            <option value="5">5 - Excellent</option>
                        </select>
                    </div>

                    <!-- Comments/Feedback Field -->
                    <div class="margin-bottom-3">
                        <label for="comments" class="form-label">Comments/Feedback</label>
                        <textarea class="form-control" id="comments" name="comments" rows="3"
                            placeholder="Enter your feedback" required></textarea>
                    </div>
                    <div class="margin-bottom-3" style="display: none" id="error-msg">
                        <p>Please enter feedback before submitting</p>
                    </div>
                </form>
            </div>
            <!-- Confirmation Message -->
            <div id="confirmationMessage" style="display: none;">
                <p>Thank you for your feedback!</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="closeButton" class="modal-close-button questions-button-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitButton" class="modal-feedback-button questions-button-primary"
                    onclick="submitFeedback()">Submit
                    Feedback</button>
            </div>
        </div>
    </div>
    <div class="modal-overlay"></div>
</div>