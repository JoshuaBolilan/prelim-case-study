<template>
  <div class="contact-container">
    <h1>My Contacts</h1>
    <ul class="contact-list">
      <li>
        Facebook:
        <a target="_blank" href="https://www.facebook.com/pelagio.lander"
          >Lander Pelagio</a
        >
      </li>
      <li>
        Email:
        <a href="mailto:landerpelagio03@gmail.com">landerpelagio03@gmail.com</a>
      </li>
    </ul>
  </div>
</template>

<style scoped>
.contact-container {
  padding: 2rem;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
  color: #333;
  margin-bottom: 1rem;
  border-bottom: 1px solid #ddd;
  padding-bottom: 0.5rem;
}
.contact-list {
  list-style-type: none; /* Remove bullet points */
  padding: 0;
}
.contact-list li {
  margin-bottom: 1rem;
}
.contact-list a {
  color: #007bff; /* Blue link color */
  text-decoration: none;
  transition: color 0.3s ease; /* Smooth color transition on hover */
}
.contact-list a:hover {
  color: #0056b3; /* Darker blue on hover */
}
</style>
