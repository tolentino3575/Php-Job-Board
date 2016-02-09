<?php
    class Jobs {
        public $title;
        public $description;
        public $contact;
    }

     function __construct($title, $description, $contact) {
         $this->title = $title;
         $this->description = $description;
         $this->contact = $contact;
     }
?>
