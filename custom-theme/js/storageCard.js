
function selectCard(card) {
    card.classList.toggle('selected');
}

document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.data-option');
    const cards = document.querySelectorAll('.service-card');


    function filterCards() {
        
        const selectedOptions = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        if (selectedOptions.length === 0) {
            cards.forEach(card => card.classList.remove('disabled'));
            return;
        }

        cards.forEach(card => {
            const cardOptions = card.dataset.options.split(','); // Assuming each card has data-options attribute
            const isQualified = selectedOptions.every(option => cardOptions.includes(option));

            if (isQualified) {
                card.classList.remove('disabled');
            } else {
                card.classList.add('disabled');
            }
        });
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', filterCards);
    });

    filterCards();
});
