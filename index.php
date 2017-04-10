<?php
  require('./class/canalYoutube.class.php');
  
  $videos = canalYoutube::getVideos();
  
  $videosFaltam = array_filter($videos, function($K) { return $K->Link == '#';});
  ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Desafio</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <div>
    <h1>#desafio100videos</h1>
    <h2>Faltam <?= count($videosFaltam)  ?> vídeos</h2>
  </div>
  
  <?php foreach($videos as $video): ?>
    <a target="_blank" href="<?= $video->Link ?>"><img src="<?= $video->Image ?>"></a>
  <?php endforeach; ?>
  
</body>
</html>