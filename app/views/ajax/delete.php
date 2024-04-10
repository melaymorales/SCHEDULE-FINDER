<?php

  
   
    if(isset($_POST['click_view_btn'])){
        session_start();

        $id = $_POST['user_id'];
        $_SESSION['id']=$id;
    }
  


    // if(isset($_POST['save'])){
    //    $id = $_SESSION['id'];
    //    $imageName ="";
    //    $folderPath="../assets/img/";
        
    //    $query = "SELECT  `image` FROM `course-shs-tbl` WHERE id= '$id'";
    //    $result = mysqli_query($con,$query);
    //    $row = mysqli_fetch_array($result);
    //    $imageToDelete=$row['image'];


    //    $coure_query="DELETE FROM `course-shs-tbl` WHERE id=$id";
    //    $coure_result=mysqli_query($con,$coure_query);

    //    if( $imageToDelete !=""){
    //         if(file_exists($folderPath.$imageToDelete)){
    //             if(unlink($folderPath . $imageToDelete)){
    //                 $query=" UPDATE `course-shs-tbl` SET `image`='$imageName' WHERE `id`=$id";
    //                 $result= mysqli_query($con,$query);
    //             }
    //          }
    //    }
    
      

    //     echo'
    //             <script>
    //                     window.location.href="../admin.php";
    //                     alert("Deleted Sucessfully!")
    //             </script>
    //             ';

    // }else if(isset($_POST['save_teacher'])){

    //     $id = $_SESSION['id'];
    //     $imageName ="";
    //     $folderPath="../assets/img/";

    //     $query = "SELECT  `schedule` FROM `teacher-tbl` WHERE `row` = '$id'";
    //     $result = mysqli_query($con,$query);
    //     $row = mysqli_fetch_array($result);
    //     $imageToDelete=$row['schedule'];

    //     $query="DELETE FROM `teacher-tbl` WHERE `row`='$id'";
    //     $result=mysqli_query($con,$query);

    //     if( $imageToDelete !=""){
    //         if(file_exists($folderPath.$imageToDelete)){
    //             if(unlink($folderPath . $imageToDelete)){
    //                 $query=" UPDATE `teacher-tbl` SET `schedule`='$imageName' WHERE `row`= '$id'";
    //                 $result= mysqli_query($con,$query);
    //             }
    //          }
    //    }

     
    //         echo'
    //         <script>
    //                 window.location.href="../admin.php?teacher";
    //                 alert("Deleted Sucessfully!")
    //         </script>
    //         ';
        
       
    
    // }else if(isset($_POST['save_student'])){

    //     $id = $_SESSION['id'];
    //     $query="DELETE FROM `student-tbl` WHERE `row`='$id'";
    //     $result=mysqli_query($con,$query);

    //     if($result){
    //         echo'
    //         <script>
    //                 window.location.href="../admin.php?student";
    //                 alert("Deleted Sucessfully!")
    //         </script>
    //         ';
    //     }
    
    // }else{
       
      
    // }
   
?>


<script>
$(document).ready(function(){

    $('.btnDel').click(function(e){
        e.preventDefault();

            var user_id= $(this).closest('tr').find('.user_id').text();
  
                $.ajax({
                    method:"POST",
                    url:"../app/views/ajax/delete.php",
                    data:{
                        'click_view_btn':true,
                        'user_id':user_id,
            },
                success: function(response){

            }
        });
    });

    $('.btnDel_teacher').click(function(e){
            e.preventDefault();

            var user_id= $(this).closest('tr').find('.user_id_teacher').text();
           
            // $('#modalConfirmationDel').modal('show');
            $.ajax({
                method:"POST",
                url:"../app/views/ajax/delete.php",
                data:{
                    'click_view_btn':true,
                    'user_id':user_id,
                },
                success: function(response){
                
                }
            });
        });

    
        $('.btnDel_student').click(function(e){
            e.preventDefault();

            var user_id= $(this).closest('tr').find('.user_id_student').text();
           
            // $('#modalConfirmationDel').modal('show');
            $.ajax({
                method:"POST",
                url:"../app/views/ajax/delete.php",
                data:{
                    'click_view_btn':true,
                    'user_id':user_id,
                },
                success: function(response){
                  
                //    $('.view-message-box').html(response);
                //    $('#EditModal').modal('show');
                }
            });
        });

});

</script>