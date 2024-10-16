function showVideo(src, title, description) {
  // Atualiza o título e a descrição do vídeo selecionado
  document.getElementById("videoTitle").textContent = title;
  document.getElementById("videoDescription").textContent = description;

  // Atualiza a fonte do vídeo e carrega o novo vídeo
  const videoPlayer = document.getElementById("videoPlayer");
  const videoSource = document.getElementById("videoSource");
  videoSource.src = src;
  videoPlayer.load(); // Recarrega o vídeo
}
