
function selectCard(card) {
    card.classList.toggle('selected');
}

document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.data-option');
    const cards = document.querySelectorAll('.service-card');
    const log_slider = document.getElementById('log-slider')


    function updateSelectedOptions(selectedOptions, mainQuestion, subQuestions) {
        subQuestions.forEach(
            subQuestion => {
                if (selectedOptions.includes(subQuestion) && !selectedOptions.includes(mainQuestion)) {
                    const index = selectedOptions.indexOf(subQuestion);
                    if (index > -1) {
                        selectedOptions.splice(index, 1);
                    }
                }
            }
        )
        return selectedOptions;
    }

    function filterCards() {

        const dataStorageLabel = document.getElementById("slider-value");
        const dataStorageValue = dataStorageLabel.textContent
        
        var selectedOptions = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

    
        selectedOptions = updateSelectedOptions(selectedOptions, "generalPublic", ["DOIYes", "DOINo"])

        console.log(selectedOptions)

        cards.forEach(card => {
            const cardId = card.getAttribute('id');

            const cardOptions = card.dataset.options.split(',');    
            const isQualified = selectedOptions.every(option => cardOptions.includes(option));

            const documentCard = document.getElementById(cardId)

            documentCard.setAttribute('condition-qualified', isQualified)

            const conditionQualified = documentCard.getAttribute('condition-qualified')
            const storageQualified = documentCard.getAttribute('storage-qualified')
            
            const isAlreadySelected = documentCard.getAttribute('is-selected')

            if (conditionQualified == "true" && storageQualified == "true") {
                card.classList.remove('disabled');
            } else {
                if(isAlreadySelected == "true"){
                    card.classList.remove('disabled');
                    card.classList.remove('selected');
                    card.classList.add('selected-invalid')
                }
                else{
                    card.classList.add('disabled');
                }
            }
        });
    }

    function filterStorage() {
        const dataStorageLabel = document.getElementById("log-slider");
        const dataStorageValue = Math.pow(10, dataStorageLabel.value); 

        cards.forEach(card => {
            const cardId = card.getAttribute('id');

            const cardStorageLimit = parseInt(card.getAttribute("storage-limit"), 10);
            const dataLimitSatisfied = (cardStorageLimit == -1) || (dataStorageValue <= cardStorageLimit);
            
            const documentCard = document.getElementById(cardId)

            documentCard.setAttribute('storage-qualified', dataLimitSatisfied)

            const conditionQualified = documentCard.getAttribute('condition-qualified')
            const storageQualified = documentCard.getAttribute('storage-qualified')
            const isAlreadySelected = documentCard.getAttribute('is-selected')
            
            if (conditionQualified == "true" && storageQualified == "true") {
                card.classList.remove('disabled');
            } else {
                if(isAlreadySelected == "true"){
                    card.classList.remove('disabled');
                    card.classList.remove('selected');
                    card.classList.add('selected-invalid')
                }
                else{
                    card.classList.add('disabled');
                }
            }
        });
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', filterCards);
    });

    log_slider.addEventListener('input', function () { 
        filterStorage();
    });

    filterCards();
    filterStorage();
});
