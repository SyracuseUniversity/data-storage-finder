
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

    /**
     * Function to filter cards based on the questions selected. 
     * Matches the id of the option to the ids present in the "options" tag of each service
     * Used helper function updateSelectedOptions to handle the generalPublic subquestion. 
     * 
     * data-attribute condition-qualified and storage-qualified used to set 
     * whether a card is qualified to be display at the grid
     */
    
    function filterCards() {

        const dataStorageLabel = document.getElementById("slider-value");
        const dataStorageValue = dataStorageLabel.textContent
        
        var selectedOptions = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

    
        selectedOptions = updateSelectedOptions(selectedOptions, "generalPublic", ["DOIYes", "DOINo"])

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
                addCardToGrid(card);
                if(isAlreadySelected == "true"){
                    card.classList.remove('selected-invalid');
                    card.classList.add('selected')
                }
            } else {
                if(isAlreadySelected == "true"){
                    card.classList.remove('disabled');
                    card.classList.remove('selected');
                    card.classList.add('selected-invalid')
                }
                else{
                    card.classList.add('disabled');
                    removeCardFromGrid(card);
                }
            }
        });
    }

    /**
     * Function to filter cards based on the questions selected. 
     * Matches the value of the slider with the storage-limit of each card.
     * 
     * data-attribute condition-qualified and storage-qualified used to set 
     * whether a card is qualified to be display at the grid
     */

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
                addCardToGrid(card);
                if(isAlreadySelected == "true"){
                    card.classList.remove('selected-invalid');
                    card.classList.add('selected')
                }
            } else {
                if(isAlreadySelected == "true"){
                    card.classList.remove('disabled');
                    card.classList.remove('selected');
                    card.classList.add('selected-invalid')
                }
                else{
                    card.classList.add('disabled');
                    removeCardFromGrid(card);
                }
            }
        });
    }

    //if any checkbox is clicked trigger function filterCards().
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', filterCards);
    });


    //if log slider is updated, trigger function filterStorage().
    log_slider.addEventListener('input', function () { 
        filterStorage();
    });


    //CSS changes to remove card from grid
    function removeCardFromGrid(card) {
        const parentDiv = card.parentElement;
        parentDiv.classList.remove('showCard');
        parentDiv.classList.add('removeCard');
        
        setTimeout(() => {
            parentDiv.classList.add('animation-complete');
        }, 500); 
    }
    
    //CSS changes to add card to grid
    function addCardToGrid(card) {
        const parentDiv = card.parentElement;
        parentDiv.classList.remove('animation-complete');
        
        void parentDiv.offsetWidth;
        
        parentDiv.classList.remove('removeCard');
        parentDiv.classList.add('showCard');
    }

    filterCards();
    filterStorage();
});
