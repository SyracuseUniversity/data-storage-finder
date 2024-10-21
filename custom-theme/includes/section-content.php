<div class="row info-container py-4">
    <div class="col-md-12">
        <h2 class="info-container-heading pb-2 mb-3">Data Storage Finder</h2>
        <p class="lead text-muted mb-4">Evaluate options for data storage at Syracuse University</p>

        <div class="d-flex flex-column gap-1 info-container-details">
            <div class="d-flex align-items-start">
                <div class="rounded-circle me-1 d-flex align-items-center justify-content-center info-container-icons">
                    <i class="fa fa-certificate"></i>
                </div>
                <p class="mb-0">All services presented on this finder tool are vetted and supported by Syracuse
                    University.</p>
            </div>
            <!-- <div class="d-flex align-items-start">
                    <div
                        class="rounded-circle me-1 d-flex align-items-center justify-content-center info-container-icons">
                        <i class="fa fa-bullseye"></i>
                    </div>
                    <p class="mb-0">To explore data options available to Weill Cornell Medicine Cornellians please visit
                        the <a href="#" class="info-container-links">WCMC storage wizard</a>.</p>
                </div> -->
            <div class="d-flex align-items-start">
                <div class="rounded-circle me-1 d-flex align-items-center justify-content-center info-container-icons">
                    <i class="fa fa-comments"></i>
                </div>
                <p class="mb-0">We welcome <a href="#" data-bs-toggle="modal" data-bs-target="#feedbackModal"
                        class="info-container-links">feedback</a> on this tool.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Feedback Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="feedbackForm">
                    <!-- Name Field (Optional) -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name (Optional)</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>

                    <!-- Email Field (Optional) -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email (Optional)</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>

                    <!-- Rating Field -->
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select" id="rating" name="rating">
                            <option value="1">1 - Poor</option>
                            <option value="2">2 - Fair</option>
                            <option value="3">3 - Good</option>
                            <option value="4">4 - Very Good</option>
                            <option value="5">5 - Excellent</option>
                        </select>
                    </div>

                    <!-- Comments/Feedback Field -->
                    <div class="mb-3">
                        <label for="comments" class="form-label">Comments/Feedback</label>
                        <textarea class="form-control" id="comments" name="comments" rows="3"
                            placeholder="Enter your feedback"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="submitFeedback()">Submit
                    Feedback</button>
            </div>
        </div>
    </div>
</div>