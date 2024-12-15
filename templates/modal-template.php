<!-- Modal Structure -->
<div class="modal" id="feedbackModal" tabindex="-1" aria-labelledby="modalTitle" aria-describedby='modalDescription'
    aria-hidden='false'>
    <div class="modal-container">
        <div class="modal-content">
            <div class="modal-header">
                <i id="closeButton" class="icon-times"></i>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode('[forminator_form id="330"]'); ?>
            </div>
            <!-- Confirmation Message -->
            <div id="confirmationMessage" style="display: none;">
                <p>Thank you for your feedback!</p>
            </div>
        </div>
    </div>
    <div class="modal-overlay"></div>
</div>