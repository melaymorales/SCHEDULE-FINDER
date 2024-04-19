
<?php 

    if(isset($_POST['click_view_btn'])){
        session_start();

        $_SESSION['id'] = $_POST['user_id'];
        $_SESSION['filename']=$_POST['filename'];

    }
?>


