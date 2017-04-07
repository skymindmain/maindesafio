<?php
require('Video.class.php');

class canalYoutube {
    
    private function getIdVideosFromAPI() {
        $url = 'https://api.myjson.com/bins/ec9qf/?format=json';
        $json = file_get_contents($url);
        $Date = json_decode($json);
        $array = [];
        
        foreach($Date->items as $item):
           array_push($array, $item->Id->videoId);
        endforeach;
        
        return $array;
    }

    public function getImageVideoFromAPI($VideoId) {
        
    }
    
     public static function getVideos() {
        return self::getIdVideosFromAPI();
        //$Video = new Video('image', 'link');
        //$Video2 = new Video('image2', 'link2');
        //$Video3 = new Video('image3', 'link3');
    
        //return array($Video, $Video2, $Video3);
    }
    

}

$canal = new canalYoutube;
echo '<pre>';
    print_r(canalYoutube::getVideos());
echo '</pre>';

