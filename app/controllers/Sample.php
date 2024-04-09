<?php

class Sample{

    public function index(){

        $student = new Student();

        $arr['firstname'] ="Melanieee";
        $arr['lastname'] ="Morales";
        $arr_id['row'] = "14";
        $student->update("14", $arr);

        
    }
}