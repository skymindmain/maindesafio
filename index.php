<?php
  require('./class/canalYoutube.class.php');
  
  $videos = canalYoutube::getVideos();
  //foreach($show as $image):
    
  //endforeach;
  
  var_dump($videos);
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
    <h2>Faltam 13 vídeos</h2>
  </div>
  
  <?php foreach($videos as $video): ?>
    <a target="_blank" href="<?= $video->Video ?>"><img src="<?= $video->Image ?>"></a>
  <?php endforeach; ?>
  
</body>
</html>