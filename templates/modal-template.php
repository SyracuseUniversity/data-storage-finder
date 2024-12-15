<!-- Modal Structure -->
<div class="modal" id="feedbackModal" tabindex="-1" aria-labelledby="modalTitle" aria-describedby='modalDescription'
    aria-hidden='false'>
    <div class="modal-container">
        <div class="modal-content">
            <div class="modal-body">
                <?php echo do_shortcode('[forminator_form id="330"]'); ?>
            </div>
            <!-- Confirmation Message -->
            <div id="confirmationMessage" style="display: none;">
                <p>Thank you for your feedback!</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="closeButton" class="modal-close-button questions-button-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitButton" class="modal-feedback-button questions-button-primary">Submit
                    Feedback</button>
            </div>
        </div>
    </div>
    <div class="modal-overlay"></div>
</div>