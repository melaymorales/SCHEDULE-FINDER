
<?php 

    if(isset($_POST['click_view_btn'])){
        session_start();
        $_SESSION['id']=$_POST['user_id'];
        $_SESSION['filename']=$_POST['filename'];
    }
?>


<script>

$('.btnRemove').click(function(e){

         var filename= document.getElementById('filename').innerHTML;
         var user_id= $(this).closest('tr').find('.user_id').text();
            
        $.ajax({
            method:"POST",
            url:"../app/views/ajax/remove.php",
        data:{
            'click_view_btn':true,
            'filename': filename,
            'user_id':user_id,
        },
            success: function(response){
            
        }
    });
});


$('.btnRemove_teacher').click(function(e){
          
    var filename= document.getElementById('filename').innerHTML;
    var user_id= $(this).closest('tr').find('.user_id_teacher').text();
            
    $.ajax({
        method:"POST",
        url:"../app/views/ajax/remove.ph",
        data:{
            'click_view_btn':true,
            'filename': filename,
            'user_id':user_id,
             },
            success: function(response){
             }
        });
});

</script>