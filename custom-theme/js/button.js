// Function to clear all checkboxes
function clearCheckboxes(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        const checkboxes = container.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    } else {
        console.error(`Container with id "${containerId}" not found.`);
    }
}

function selectCheckBoxes(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        const checkboxes = container.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = true;
        });
    } else {
        console.error(`Container with id "${containerId}" not found.`);
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
            clearCheckboxes('storageSolutionsContainer');
        });
    } else {
        console.error('Clear All button not found.');
    }

    const selectAllButtonStorageSolution = document.getElementById('selectAllButtonStorageSolution');
    if (selectAllButtonStorageSolution) {
        selectAllButtonStorageSolution.addEventListener('click', function() {
            selectCheckBoxes('storageSolutionsContainer');
        });
    } else {
        console.error('Select All button not found.');
    }

});