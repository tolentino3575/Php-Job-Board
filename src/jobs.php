<?php
    class Job
    {
        private $title;
        private $description;
        private $contact;

     function __construct($title, $description, $contact) {
         $this->title = $title;
         $this->description = $description;
         $this->contact= $contact;
     }

     function setTitle($new_title)
     {
         $this->title=$new_title;
     }

     function setDescription($new_description)
     {
         $this->description=$new_description;
     }

     function setContact($new_contact)
     {
         $this->contact=$new_contact;
     }

     function getTitle()
     {
         return $this->title;
     }

     function getDescription()
     {
         return $this->description;
     }

    function getContact()
    {
        return $this->contact;
    }


   }


?>
