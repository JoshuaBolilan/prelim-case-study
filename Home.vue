<template>
  <div class="home-container">
    <p>Lastname: <b>Pelagio</b></p>
    <p>Firstname: <b>Lander</b></p>
    <p>Address: <b>Brgy. Sinalhan, City of Santa Rosa, Laguna</b></p>
  </div>
</template>

<style scoped>
.home-container {
  /* Style the container */
  padding: 2rem; /* Add padding around the content */
  background-color: #f8f8f8; /* Light gray background */
  border-radius: 8px; /* Rounded corners */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

p {
  margin-bottom: 1rem; /* Space between paragraphs */
  font-size: 1.2rem; /* Slightly larger font size */
  color: #333; /* Darker text color */
}

b {
  font-weight: bold; /* Make the labels bold */
  color: #007bff; /* Blue color for labels */
}

/* Responsive adjustments (example) */
@media (max-width: 500px) {
  /* Adjust breakpoint as needed */
  p {
    font-size: 1rem; /* Smaller font on smaller screens */
  }
}
</style>
