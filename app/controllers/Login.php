<?php

class Login extends Controller{

    public function index(){
        $message="";
        $account = new Account();

        if(isset($_POST['login'])){
  
              $arr['username'] = $_POST['username'];
              $arr['password'] = $_POST['password'];
  
              $data = $account->where($arr);
        
              if(!empty($data)){
                $row= $data[0];
                Auth::authenticate($row);
                header("Location: ".ROOT."/admin");

              }else{
                $message="Invalid Username or Password!";

              }

        }
      
        $this->view('login',[
            'message' => $message
        ]);
       

    }
   
   
}