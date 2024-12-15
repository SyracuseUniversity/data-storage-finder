jQuery(document).ready(function ($) {
    $('#modalToggle').on('click', function (e) {
        e.preventDefault();
        $('#feedbackModal, .modal-overlay').fadeIn();
    });

    $('#closeButton, .modal-overlay').on('click', function () {
        $('#feedbackModal, .modal-overlay').fadeOut();
    });

    $('#submitButton').on('click', function (event) {
        event.preventDefault();
        const form = document.getElementById('forminator-module-330');
        form.submit(); // Trigger form submission
        $('#feedbackModal, .modal-overlay').fadeOut();
    });
});

