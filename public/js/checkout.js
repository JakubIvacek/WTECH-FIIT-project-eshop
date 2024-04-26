// Function to apply shadow effect to the selected delivery option
function applyShadowToSelectedOption() {
    const expressDeliveryRadio = document.getElementById("flexRadioDefault1");
    const standardDeliveryRadio = document.getElementById("flexRadioDefault2");

    // Check if express delivery radio button is checked
    if (expressDeliveryRadio.checked) {
        // Add thicker border or shadow to express delivery option
        document.getElementById("deliveryOptionFast").style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.5)";
        document.getElementById("deliveryOptionStandard").style.boxShadow = "none";
    } else if (standardDeliveryRadio.checked) {
        // Add thicker border or shadow to standard delivery option
        document.getElementById("deliveryOptionStandard").style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.5)";
        document.getElementById("deliveryOptionFast").style.boxShadow = "none";
    }
}

// Function to toggle visibility of online payment inputs
function toggleOnlinePaymentInputs() {
    const onlinePaymentOption = document.getElementById("onlinePaymentOption");
    const onlinePaymentInputs = document.getElementById("onlinePaymentInputs");

    // Check if online payment option is selected
    if (onlinePaymentOption.checked) {
        // Show online payment inputs
        onlinePaymentInputs.style.display = "block";
    } else {
        // Hide online payment inputs
        onlinePaymentInputs.style.display = "none";
    }
}

// Apply toggle effect and shadow effect when the page loads
window.onload = function() {
    toggleOnlinePaymentInputs();
    applyShadowToSelectedOption();
};

// Add event listener to the radio buttons
document.getElementById("flexRadioDefault1").addEventListener("change", applyShadowToSelectedOption);
document.getElementById("flexRadioDefault2").addEventListener("change", applyShadowToSelectedOption);
document.getElementById("onlinePaymentOption").addEventListener("change", toggleOnlinePaymentInputs);
//

