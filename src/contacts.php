<?php
class Contact {
    private $name;
    private $email;
    private $phone;

function __construct($name, $email, $phone)
{
    $this->name=$name;
    $this->email=$email;
    $this->phone=$phone;
}

function setName($new_name)
{
    $this->name=$new_name;
}
function setEmail($new_email)
{
    $this->email=$new_email;
}
function setPhone($new_phone)
{
    $this->phone=$new_phone;
}
function getName()
{
    return $this->name;
}
function getEmail()
{
    return $this->email;
}
function getPhone()
{
    return $this->phone;
}

}
 ?>
