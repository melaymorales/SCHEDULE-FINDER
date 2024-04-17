<?php

class Login extends Controller{

    public function index(){
      
        $this->view('login');
        $_SESSION['alert']="disabled";

    }
   
   
}