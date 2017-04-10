<?php
class Video {
    
    public $Image;
    public $Link;
    
    function __construct($Image, $Link) {
        $this->Image = $Image;
        $this->Link = $Link;
    }
    
}