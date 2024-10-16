function toggleSection(sectionId) {
  const sections = document.querySelectorAll(".content-section");

  // Esconde todas as seções
  sections.forEach((section) => {
    section.style.display = "none";
  });

  // Exibe a seção clicada
  const content = document.getElementById(sectionId);
  if (content) {
    content.style.display = "block"; // Exibe o conteúdo
  }
}

// Inicializa todas as seções como ocultas
document.querySelectorAll(".content-section").forEach((content) => {
  content.style.display = "none";
});
