
/**
 * Based on the slider scroll display the 
 * corresponding value in the input box.
 * Handles TB and GB conversion.
 */
function updateValue() {
    const slider = document.getElementById("log-slider");
    const valueInput = document.getElementById("slider-value");
    const errorMsg = document.getElementById("input-slider-error");
    const tooltip = document.querySelector(".tooltip-error");
    
    errorMsg.textContent = "";
    tooltip.classList.add("tooltip-error-hidden");

    const logValue = Math.pow(10, slider.value);
    const storage = logValue * 1;
    const displayValue =
        storage >= 1000 ? `${(storage / 1000).toFixed(1)} TB` : `${storage.toFixed(1)} GB`;


    let cursorPosition = valueInput.selectionStart;
    valueInput.setSelectionRange(cursorPosition, cursorPosition);

    valueInput.value = displayValue;
}


/**
 * Updates the slider based on the value entered in the input box.
 * Checks for all units Bytes, kilobytes, megabytes, gigabytes and terabytes.
 */

function updateSlider() {
    const slider = document.getElementById("log-slider");
    const valueInput = document.getElementById("slider-value");
    const errorMsg = document.getElementById("input-slider-error");
    const tooltip = document.querySelector(".tooltip-error");

    const value = valueInput.value;
    const trimValue = value.toLowerCase().trim()
    const numericValue = parseFloat(value);

    // Check for valid numeric value
    if (isNaN(numericValue)) {
        errorMsg.textContent = "Please enter a valid numeric value.";
        tooltip.classList.remove("tooltip-error-hidden");
        setTimeout(() => {
            errorMsg.scrollIntoView({ behavior: "smooth", block: "center" });
        }, 100);
        return;
    }

    // Validate unit
    const validUnits = ["b", "kb", "mb", "gb", "tb"];
    const unit = trimValue.replace(/[0-9.\s]/g, ""); // Extract unit by removing numbers and spaces
    
    if (!validUnits.includes(unit)) {
        errorMsg.textContent = "Invalid unit. Allowed units: B, KB, MB, GB, TB.";
        tooltip.classList.remove("tooltip-error-hidden");
        setTimeout(() => {
            errorMsg.scrollIntoView({ behavior: "smooth", block: "center" });
        }, 100);
        return;
    }

    // Convert units to GB
    let gbValue = numericValue;
    if (unit === "tb") {
        gbValue *= 1000; // TB to GB
    } else if (unit === "mb") {
        gbValue /= 1000; // MB to GB
    } else if (unit === "kb") {
        gbValue /= 1000000; // KB to GB
    } else if (unit === "b") {
        gbValue /= 1000000000; // B to GB
    }

    // Validate range
    if (gbValue < 1) {
        slider.value = slider.min; 
        tooltip.classList.add("tooltip-error-hidden"); 
    } else if (gbValue > 10000) {
        slider.value = slider.max; 
        tooltip.classList.add("tooltip-error-hidden"); 
    } else {
        const logValue = Math.log10(gbValue);
        slider.value = logValue;
        tooltip.classList.add("tooltip-error-hidden"); 
    }

    // Manually dispatching the input event 
    //for filterStorage() function in storageCard.js to get triggered
    const event = new Event('input', { bubbles: true });
    slider.dispatchEvent(event);
}
