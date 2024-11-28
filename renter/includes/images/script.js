<?php echo $productPrice; ?>

//search input 
const searchInput = document.getElementById('searchInput');

searchInput.addEventListener('focus', function() {
    this.classList.add('border-success');
});

searchInput.addEventListener('blur', function() {
    this.classList.remove('border-success');
});

//flatpickr

flatpickr("#startDate", {
dateFormat: "Y-m-d", 
maxDate: new Date(2025, 11, 1), 
minDate: "today",     
disableMobile: true 
});

flatpickr("#endDate", {
minDate: "today",     
dateFormat: "Y-m-d", 
maxDate: new Date(2025, 11, 1), 
disableMobile: true 
});

//calculate total price based on selected dates
function calculateTotal() {
const startDateInput = document.getElementById('startDate');
const endDateInput = document.getElementById('endDate');
const totalPriceDisplay = document.getElementById('totalPrice');
const checkoutTotalPrice = document.getElementById('checkoutTotalPrice');
const displayStartDate = document.getElementById('displayStartDate');
const displayEndDate = document.getElementById('displayEndDate');

const pricePerDay = <?php echo $productPrice; ?>; // price from PHP
const startDate = new Date(startDateInput.value);
const endDate = new Date(endDateInput.value);

if (startDateInput.value && endDateInput.value && startDate <= endDate) {
    const timeDifference = endDate - startDate;
    const daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24)); // Convert to days
    const totalPrice = daysDifference * pricePerDay;
    totalPriceDisplay.textContent = '₱' + totalPrice;
    checkoutTotalPrice.textContent = '₱' + totalPrice;

    // Update displayed dates
    displayStartDate.textContent = startDateInput.value;
    displayEndDate.textContent = endDateInput.value;

    // Show the selected dates
    document.getElementById('selectedDates').style.display = 'block';
} else {
    totalPriceDisplay.textContent = '₱' + pricePerDay; 
    checkoutTotalPrice.textContent = '₱' + pricePerDay;

    // Reset displayed dates
    displayStartDate.textContent = 'None';
    displayEndDate.textContent = 'None';

    // Hide the selected dates
    document.getElementById('selectedDates').style.display = 'none';
}
}

// Event listeners to date inputs
document.getElementById('startDate').addEventListener('change', calculateTotal);
document.getElementById('endDate').addEventListener('change', calculateTotal);