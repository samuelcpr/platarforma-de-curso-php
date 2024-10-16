document.addEventListener("DOMContentLoaded", () => {
  const videoGrid = document.getElementById("videoGrid");

  // Lista de vídeos fictícios
  const videos = [
    { title: "Curso de JavaScript", thumbnail: "video1.jpg" },
    { title: "Curso de Python", thumbnail: "video2.jpg" },
    { title: "Curso de React", thumbnail: "video3.jpg" },
    { title: "Curso de Node.js", thumbnail: "video4.jpg" },
    { title: "Curso de CSS", thumbnail: "video5.jpg" },
    { title: "Curso de HTML", thumbnail: "video6.jpg" },
  ];

  // Função para renderizar vídeos
  const renderVideos = () => {
    videos.forEach((video) => {
      const videoElement = document.createElement("div");
      videoElement.className = "video";
      videoElement.innerHTML = `
                <img src="${video.thumbnail}" alt="${video.title}">
                <p>${video.title}</p>
            `;
      videoGrid.appendChild(videoElement);
    });
  };

  renderVideos();
});
