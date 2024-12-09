function updateValue() {
    const slider = document.getElementById("log-slider");
    const valueTip = document.getElementById("slider-value");

    const logValue = Math.pow(100, slider.value);
    const storage = logValue * 1; 
    const displayValue =
        storage >= 1000 ? `${(storage / 1000).toFixed(1)} TB` : `${storage.toFixed(1)} GB`;

    valueTip.textContent = displayValue;

    const sliderRect = slider.getBoundingClientRect();
    const thumbPosition = ((slider.value - slider.min) / (slider.max - slider.min)) * sliderRect.width;
    valueTip.style.left = `${thumbPosition}px`;
}
