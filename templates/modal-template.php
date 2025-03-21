<!-- Modal Structure -->
<div class="modal" id="feedbackModal" tabindex="-1" aria-labelledby="modalTitle" aria-describedby="modalDescription"
    aria-hidden="false">
    <div class="modal-container">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Feedback Form</h2>
                <i id="closeButton" class="icon-times"></i>
            </div>
            <div class="modal-body">
                <p id="modalDescription" class="visually-hidden">Please provide your feedback using the form below.</p>
                <?php echo do_shortcode('[forminator_form id="419"]'); ?>
            </div>
            <!-- Confirmation Message -->
            <div id="confirmationMessage" style="display: none;">
                <p>Thank you for your feedback!</p>
            </div>
        </div>
    </div>
    <div class="modal-overlay"></div>
</div>