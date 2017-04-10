<?php
require('Video.class.php');

class canalYoutube {
    
    const API_VIDEOS = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyDB6dm437bax0_4g6Z_Qj3i2WVfhb0tFLM&part=id&channelId=UCTJ1mLre8sT-d4KuvmQsSQA&publishedAfter=2016-11-21T00:00:00Z&maxResults=50';
    const API_VIDEO_IMAGE = "https://www.googleapis.com/youtube/v3/videos?key=AIzaSyDB6dm437bax0_4g6Z_Qj3i2WVfhb0tFLM&part=snippet";
    
    private function getIdVideosFromAPI() {
        $url = self::API_VIDEOS;
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
        $url = self::API_VIDEO_IMAGE . "&id=$VideoId";
        $json = file_get_contents($url);
        $Date = json_decode($json);
        
        return $Date->items[0]->snippet->thumbnails->medium->url;
    }
    
     public static function getVideos() {
        $idVideosAPI = self::getIdVideosFromAPI();
        $videosDesafio = 100;
        $videosQueFaltam = $videosDesafio - count($idVideosAPI);
        
        $Videos = array();
        
        for($i = 1; $i <= $videosQueFaltam; $i++):
            $noVideo = new Video('https://placeholdit.imgix.net/~text?txtsize=33&txt=&w=320&h=180', '#');
            array_push($Videos, $noVideo);
        endfor;
        
        foreach($idVideosAPI as $umVideoId):
            $image = self::getImageVideoFromAPI($umVideoId);
            $link = 'https://www.youtube.com/watch?v=' . $umVideoId;
            
            $Video = new Video($image, $link);
            array_push($Videos, $Video);
        endforeach;
        
        return $Videos;
    }
    
}