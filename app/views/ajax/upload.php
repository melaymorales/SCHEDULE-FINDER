<?php

    if(isset($_POST['click_view_btn'])){
        session_start();
        $id = $_POST['user_id'];
        $_SESSION['id']=$id;
    }

?>


