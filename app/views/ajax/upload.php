<?php

    if(isset($_POST['click_view_btn'])){
        session_start();
        $id = $_POST['user_id'];
        $_SESSION['id']=$id;
    }

?>


<script>

$(document).ready(function(){

  $('.btnUpload').click(function(e){
            e.preventDefault();

            var user_id= $(this).closest('tr').find('.user_id').text();
            alert(user_id);
           
            $.ajax({
                method:"POST",
                url:"../app/views/ajax/upload.php",
                data:{
                    'click_view_btn':true,
                    'user_id':user_id,
                },
                success: function(response){

                }
            });
  });

  $('.btnUpload_teacher').click(function(e){
            e.preventDefault();

            var user_id= $(this).closest('tr').find('.user_id_teacher').text();
            
          
            $.ajax({
                method:"POST",
                url:"../app/views/ajax/upload.php",
                data:{
                    'click_view_btn':true,
                    'user_id':user_id,
                },
                success: function(response){

                }
            });
    });

 });

</script>