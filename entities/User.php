<?php

namespace entities;


class User{

    private $name;
    private $username;
    private $email;
    private $password;
    private $confirmpassword;




    public static function  CreateInstance($name, $username, $email,$password, $confirmpassword){
       $user = new User();

        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->confirmpassword = $confirmpassword;


        return $user;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username): void
    {
        $this->username = $username;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getConfirmpassword()
    {
        return $this->confirmpassword;
    }


    public function setConfirmpassword($confirmpassword): void
    {
        $this->confirmpassword = $confirmpassword;
    }


}