<?php
require('Video.class.php');

class canalYoutube {
    
    private function getIdVideosFromAPI() {
        $url = 'https://api.myjson.com/bins/ec9qf/?format=json';
        $json = file_get_contents($url);
        $Date = json_decode($json);
        
        return array_map(function($item) {return $item->id->videoId;}, $Date->items);
        
        //MESMA COISA DA LINHA DE CIMA
        //$array = array();
        //foreach($Date->items as $item):
        //   array_push($array, $item->Id->videoId);
        //endforeach;
        //return $array;
    }

    private function getImageVideoFromAPI($VideoId) {
        $VideoId = 'https://api.myjson.com/bins/1e4f6v';
        $json = file_get_contents($VideoId);
        $Date = json_decode($json);
        return $Date->items[0]->snippet->thumbnails->medium->url;
    }
    
     public static function getVideos() {
        $idVideosAPI = self::getIdVideosFromAPI();
        $videosDesafio = 100;
        $videosQueFaltam = $videosDesafio - count($idVideosAPI);
        
        $Videos = array();
        
        for($i = 1; $i <= $videosQueFaltam; $i++):
            $noVideo = new Video('https://placeholdit.imgix.net/~text?txtsize=33&txt=&w=320&h=180', 'https://placeholdit.imgix.net/~text?txtsize=33&txt=&w=320&h=180');
            array_push($Videos, $noVideo);
        endfor;
        
        foreach($idVideosAPI as $umVideoId):
            $link = self::getImageVideoFromAPI($umVideoId);
            $image = 'https://www.youtube.com/watch?v=' . $umVideoId;
            $Video = new Video($image, $link);
            array_push($Videos, $Video);
        endforeach;
        
        return $Videos;
    }
    

}

   
