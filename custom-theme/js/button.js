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
function selectCard(card) {
    card.classList.toggle('selected');
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