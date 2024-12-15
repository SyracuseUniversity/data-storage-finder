jQuery(document).ready(function ($) {
    $('#modalToggle').on('click', function (e) {
        e.preventDefault();
        $('#feedbackModal, .modal-overlay').fadeIn();
    });

    $('#closeButton, .modal-overlay, .forminator-button').on('click', function () {
        $('#feedbackModal, .modal-overlay').fadeOut();
    });
});

