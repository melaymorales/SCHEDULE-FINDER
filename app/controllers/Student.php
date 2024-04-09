<?php

class Student extends Controller
{
    public function index()
    {
       // $model = new Model();
        $user = new Student_tbl();
        $arr['firstname']='Melanie';
        $data = $user->insert($arr);
        show($data);
        $this->view('user');
    }

  
}