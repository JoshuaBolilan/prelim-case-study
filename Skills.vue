<template>
  <div class="skills-container">
    <h1>Programming Skills</h1>
    <ul class="skills-list">
      <li>Javascript</li>
      <li>PHP</li>
      <li>React JS</li>
      <li>Laravel</li>
      <li>Basic knowledge in Java</li>
      <li>Basic knowledge in C#</li>
      <li>Basic knowledge in C# with database</li>
      <li>HTML 5</li>
      <li>CSS</li>
      <li>Bootstrap</li>
      <li>Materialize CSS</li>
    </ul>

    <h1>Development Tools</h1>
    <ul class="skills-list">
      <li>Visual Studio Code</li>
      <li>Eclipse IDE</li>
      <li>Visual Studio</li>
      <li>MySQL Workbench</li>
      <li>XAMPP</li>
      <li>Postman</li>
      <li>Github Desktop/Git</li>
    </ul>
  </div>
</template>

<style scoped>
.skills-container {
  padding: 2rem;
  background-color: #fff; /* White background */
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
  color: #333; /* Dark heading color */
  margin-bottom: 1rem;
  border-bottom: 1px solid #ddd; /* Add a line under headings*/
  padding-bottom: 0.5rem;
}

.skills-list {
  list-style-type: disc; /* Use bullet points */
  padding-left: 20px; /* Indent the list items */
  margin-bottom: 2rem; /* Add space after each list */
}

.skills-list li {
  margin-bottom: 0.5rem; /* Space between list items */
  color: #555; /* Slightly lighter text color for list items */
}

/* Responsive adjustments (example) */
@media (max-width: 500px) {
  h1 {
    font-size: 1.5rem;
  }

  .skills-list li {
    font-size: 0.9rem;
  }
}
</style>
