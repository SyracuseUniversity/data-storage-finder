// Function to clear all checkboxes
function clearCheckboxes(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        const checkboxes = container.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    } else {
        console.error(`Container with id "${containerId}" not found.`);
    }

    const cards = document.querySelectorAll('.service-card');
    cards.forEach(card => card.classList.remove('disabled'));
}


// Function to clear all selected cards in the container
function clearCards(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        const cards = container.querySelectorAll('.service-card');
        cards.forEach(card => {
            card.classList.remove('selected');
        });
    } else {
        console.error(`Container with id "${containerId}" not found.`);
    }
}


// Function to select all cards in the container
function selectCards(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        const cards = container.querySelectorAll('.service-card');
        cards.forEach(card => {
            card.classList.add('selected');
        });
    } else {
        console.error(`Container with id "${containerId}" not found.`);
    }
}

// Function to toggle the 'selected' class on individual cards
let selectedCards = [];
function selectionCard(card, service_data) {

    card.classList.toggle('selected');

    var checkIfCardSelected = card.getAttribute('data-selected');
    const cardId = card.getAttribute('id');
    if(checkIfCardSelected === 'false'){
        selectedCards.push({cardId, service_data});
        card.setAttribute('data-selected', 'true')
    }else{
        const cardIndex = selectedCards.findIndex(item => item.cardId === cardId);
        selectedCards.splice(cardIndex, 1);
        card.setAttribute('data-selected', 'false')
    }
    updateTable()
    toggleTableVisibility();
}

function updateTable(){
    const table = document.getElementById('detailsTable');
    var rows = table.getElementsByTagName("tr")
    for (var i = 0; i < rows.length; i++) {
        var current_row = rows[i];
        current_row.innerHTML = ''
        var value = current_row.getAttribute('id');
        var row_header = document.createElement('th');
        row_header.innerHTML = value
        current_row.appendChild(row_header)
        for(var j = 0; j < selectedCards.length; j++){
            var new_element = document.createElement('td');
            new_element.innerHTML = selectedCards[j]['service_data'][value]
            current_row.appendChild(new_element)
        }
    }
}

function toggleTableVisibility() {
    console.log(selectedCards)
    const table = document.getElementById('detailsTable');
    const banner = document.getElementById('detailsTableBanner')
    if (selectedCards.length > 0) {
        table.style.display = 'table'; 
        banner.style.display = 'block'
    } else {
        table.style.display = 'none';
        banner.style.display = 'none';
    }
}

// Event listener for the "Clear All" button
document.addEventListener('DOMContentLoaded', function() {
    const clearButtonStorageQuestionaire = document.getElementById('clearAllButtonStorageQuestionaire');
    if (clearButtonStorageQuestionaire) {
        clearButtonStorageQuestionaire.addEventListener('click', function() {
            clearCheckboxes('questionnaireContainer');
        });
    } else {
        console.error('Clear All button not found.');
    }

    const clearButtonStorageSolutions = document.getElementById('clearAllButtonStorageSolutions');
    if (clearButtonStorageSolutions) {
        clearButtonStorageSolutions.addEventListener('click', function() {
            clearCards('storageSolutionsContainer');
        });
    } else {
        console.error('Clear All button not found.');
    }

    const selectAllButtonStorageSolution = document.getElementById('selectAllButtonStorageSolution');
    if (selectAllButtonStorageSolution) {
        selectAllButtonStorageSolution.addEventListener('click', function() {
            selectCards('storageSolutionsContainer');
        });
    } else {
        console.error('Select All button not found.');
    }

});