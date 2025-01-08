
const headersWithInfoIncon = ["Durability", "Availability"]

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

    const doiQuestion = document.getElementById('sub-question')
    doiQuestion.style.display = 'none';

    const cards = document.querySelectorAll('.service-card');
    cards.forEach(card => card.classList.remove('disabled'));
}


//Function to clear the slider values when the Clear Answers Button is clicked
function clearSlider(sliderId) {
    const slider = document.getElementById(sliderId); 
    const sliderValueLabel = document.getElementById("slider-value"); 
    if (slider && sliderValueLabel) {
        slider.value = 0; 
        sliderValueLabel.textContent = slider.value;
    }
}

// Function to clear all selected cards in the container
function clearCards(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        const cards = container.querySelectorAll('.service-card');
        cards.forEach(card => {
            card.classList.remove('selected');
            const cardId = card.getAttribute('id');
            const cardIndex = selectedCards.findIndex(item => item.cardId === cardId);
            selectedCards.splice(cardIndex, 1);
        });
        updateTable()
        toggleTableVisibility();
    } else {
        console.error(`Container with id "${containerId}" not found.`);
    }
}

// Function to select all cards in the container
function selectCards(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        const cards = container.querySelectorAll('.service-card');
        fetch(pluginData.jsonUrl) 
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch JSON data');
            }
            return response.json();
        })
        .then(data => {
            cards.forEach(card => {
                const cardId = card.getAttribute('id');
                if (!selectedCards.some(selectedCard => selectedCard.cardId === cardId)) {
                    const service_data = data.services.find(service => service.Title === cardId);
                    selectedCards.push({ cardId, service_data });
                    card.classList.add('selected');
                }
            });
            updateTable()
            toggleTableVisibility();
        })
    } else {
        console.error(`Container with id "${containerId}" not found.`);
    }
    
}

let selectedCards = [];
function selectionCard(card, service_data) {
    card.classList.toggle('selected');

    const cardId = card.getAttribute('id');
    const isCardAlreadySelected = selectedCards.some(item => item.cardId === cardId);

    if (isCardAlreadySelected) {
        selectedCards = selectedCards.filter(item => item.cardId !== cardId);
    } else {
        selectedCards.push({ cardId, service_data });
    }
    updateTable();
    toggleTableVisibility();
}

function updateTable(){
    const table = document.getElementById('detailsTable');
    var rows = table.getElementsByTagName("tr")
    for (var i = 0; i < rows.length; i++) {
        var current_row = rows[i];
        var value = current_row.getAttribute('id');
        for(var j = 0; j < selectedCards.length; j++){
            var new_element = document.createElement('td');
            new_element.innerHTML = selectedCards[j]['service_data'][value] !== undefined 
                ? selectedCards[j]['service_data'][value] 
                : '';
            current_row.appendChild(new_element)
        }
    }
}

function toggleTableVisibility() {
    const table = document.getElementById('detailsTable');
    const banner = document.getElementById('detailsTableBanner')
    const tableContainer = document.getElementById('table-con')
    const nav = document.getElementById('compare-nav');
    const servicesText = document.getElementById('noOfServices');

    if (selectedCards.length > 0) {
        table.style.display = 'table'; 
        banner.style.display = 'block'
        tableContainer.style.display = 'block';
        servicesText.textContent = `${selectedCards.length} Services Selected`
        nav.style.display = 'flex';
    } else {
        table.style.display = 'none';
        banner.style.display = 'none';
        tableContainer.style.display = 'none';
        nav.style.display = 'none';
    }
}

window.addEventListener('scroll', () => {
    const hideMe = document.getElementById('compare-nav');
    const target = document.getElementById('detailsTableBanner');
    const targetPosition = target.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;

    if (targetPosition <= windowHeight / 2) {
      hideMe.style.display = 'none';
    }
  });

// Event listener for the "Clear All" button
document.addEventListener('DOMContentLoaded', function() {
    const clearButtonStorageQuestionaire = document.getElementById('clearAllButtonStorageQuestionaire');
    if (clearButtonStorageQuestionaire) {
        clearButtonStorageQuestionaire.addEventListener('click', function() {
            clearCheckboxes('questionnaireContainer');
            clearSlider('log-slider');
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

function deselectOtherCheckboxes(checkbox) {
    if (checkbox.checked) {
        // Find all checkboxes in the same section
        var section = checkbox.closest('.section-item');
        var checkboxes = section.querySelectorAll('input[type="checkbox"]');
        
        checkboxes.forEach(function(otherCheckbox) {
            if (otherCheckbox !== checkbox) {
                otherCheckbox.checked = false;
                if(otherCheckbox.id == 'generalPublic'){
                    handleGeneralPublic(otherCheckbox)
                }
            }
        });
    }
}

function deselectOtherCheckboxesSubQuestion(checkbox){
    if (checkbox.checked) {
        // Find all checkboxes in the same section
        var section = checkbox.closest('.sub-question');
        var checkboxes = section.querySelectorAll('input[type="checkbox"]');
        
        checkboxes.forEach(function(otherCheckbox) {
            if (otherCheckbox !== checkbox) {
                otherCheckbox.checked = false;
            }
        });
    }
}

function handleGeneralPublic(checkbox) {
    const subquestion = document.getElementById('sub-question')
    if (checkbox.checked) {
        subquestion.style.display = 'block';
    }else{
        subquestion.style.display = 'none';
    }
 }

//function to toggle tooltip visibility
function displayToolTipInfo(toolTipId){
    const tooltipDiv = document.getElementById(toolTipId);
    if (tooltipDiv) {
        tooltipDiv.classList.toggle('tooltip-hidden');
    }
}
