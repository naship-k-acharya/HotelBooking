const button = document.getElementById("button");
const bookingForm = document.getElementById("bookingForm");

// Add a click event listener to the button
button.addEventListener("click", function() {
  // Toggle the visibility of the booking form
  if (bookingForm.style.display === "none" || bookingForm.style.display === "") {
    bookingForm.style.display = "block";
  } else {
    bookingForm.style.display = "none";
  }
});

// Add a click event listener to the "Submit Booking" button (you can handle the submission logic here)
const submitBookingButton = document.getElementById("submitBooking");
submitBookingButton.addEventListener("click", function() {
  // Handle the booking submission logic here
  // You can access the form fields and values as needed
  const checkInDate = document.getElementById("check-in-date").value;
  const checkOutDate = document.getElementById("check-out-date").value;
  // ... other form field values
});