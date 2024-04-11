<?php 
include 'init.php';
// function init(){
//     include '../../core/config.php';
//     include '../../core/functions.php';
//     include '../../core/Database.php';
//     include '../../core/Model.php';
//     include '../../core/Controller.php';
//     include '../../models/Course.php';
//     include '../../models/Teacher.php';
//     include '../../models/Student.php';
// }

if (isset($_POST['view_teacher'])){
  
   // $teacher = new Teacher();

   // init();
   // $name = $_POST['names'];
  
    // if($name==""){
    //     $current_page_course = isset($_GET['page']) ? $_GET['page'] : 1;
    //     $offset_course = ($current_page_course - 1) * $limit;
    //     $course->findAll_Page("id",$offset_course);

    // }else{
    //     $sql = "SELECT * FROM `teacher-tbl` WHERE CONCAT(`id`,`firstname`,`lastname`) LIKE '%".$name."%' ";  
    //     $query = mysqli_query($con,$sql);
    // }


    // while($row = mysqli_fetch_assoc($query))
    // {
       
    //     $var_btnupload="";
    //     $var_alertupload="";
    //        if($row['schedule'] == ""){
    //         $var_btnupload="show";
    //         $var_alertupload="hidden";
    //        }else{
    //         $var_btnupload="hidden";
    //         $var_alertupload="show";
    //        }

    //     $data .=  "<tr>
    //     <td class='d-none user_id_teacher'>". $row['row']."</td>
    //     <td >".$row['id']."</td>
    //     <td>".$row['firstname']."</td>
    //     <td >".$row['lastname']."</td>
       
    //     <td>
    //     <button class='btn bg-success text-white btnUpload_teacher' data-bs-toggle='modal' data-bs-target='#UploadModal_teacher'  ".$var_btnupload." id='BTNUPLOAD' >+upload</button>
                              
    //     <div class='alert alert-success alert-dismissible fade show ' role='alert' ".$var_alertupload." > 
    //                                    <span id='filename' style='font-size:.8rem;'> ".$row['schedule']."</span><br>
    //                                    <p style='font-size: .5rem'>".$row['date']."</p>
    //                                    <button type='submit' class='btn-close btnRemove_teacher'  style='font-size:15px;' name='submit' data-bs-toggle='modal' data-bs-target='#modalConfirmationRemove_teacher'></button>
    //                                </div>
        
    //     </td>
        
       


        
    //     <td>
    //     <button class='_EditTeacher mx-auto' style='padding:2px 5px; margin:0 2px; border:none; border-radius:5px;
    //                             background-color:rgba(14, 239, 14, 0.947); color:white;'> 
    //                                 <i class='fa-solid fa-pen-to-square'></i>
    //                             </button>

    //                             <button class='mx-auto btnDel_teacher' style='padding:2px 5px; border:none;border-radius:5px;
    //                                 background-color:red; color:white;' class='btnDel_teacher'  data-bs-toggle='modal' data-bs-target='#modalConfirmationDel_teacher' > 
    //                                     <i class='fa-solid fa-trash'></i>
    //                             </button>
    //     </td>
    //     </tr>";
    // }

}else if (isset($_POST['view_student'])){

    // $name = $_POST['names'];
    // $year=$_POST['year'];
    // $section=$_POST['section'];

    // if($name==""){
    //     $sql = " SELECT * FROM `student-tbl`  ORDER BY `row` DESC ";  
    //     $query = mysqli_query($con,$sql);
    // }else if($section != "" && $name == "" && $year != ""){
    //     $sql = "SELECT * FROM `student-tbl` WHERE `year`= '$year' AND `section` = '$section'";  
    //     $query  = mysqli_query($con,$sql);
    // }else if($section == "" && $name != "" && $year != ""){
    //     $sql = "SELECT * FROM `student-tbl` WHERE CONCAT(`id`,`firstname`,`lastname`,`course`) LIKE '%".$name."%' AND `year`= '$year' ";  
    //     $query  = mysqli_query($con,$sql);
    
    // }else if($section != "" && $name != "" && $year == ""){
    //     $sql = "SELECT * FROM `student-tbl` WHERE CONCAT(`id`,`firstname`,`lastname`,`course`) LIKE '%".$name."%' AND `section`= '$section' ";  
    //     $query  = mysqli_query($con,$sql);
    // }else{
    //     $sql = "SELECT * FROM `student-tbl` WHERE CONCAT(`id`,`firstname`,`lastname`,`course`) LIKE '%".$name."%' ";  
    //     $query = mysqli_query($con,$sql);
    // }

    // while($row = mysqli_fetch_assoc($query)){

    


    // $data .=  "<tr> 
    
    // <td class='d-none user_id_student'>".$row['row']."</td>
    // <td >".$row['id']."</td>
    // <td>".$row['firstname']."</td>
    // <td> ".$row['lastname']."</td>
    // <td> ".$row['course']."</td>
    // <td> ".$row['year']."</td>
    // <td>".$row['section']."</td>

    // <td>

    // <button class='_EditStudent mx-auto' style='padding:2px 5px; margin:0 2px; border:none; border-radius:5px;
    // background-color:rgba(14, 239, 14, 0.947); color:white;'> 
    //     <i class='fa-solid fa-pen-to-square'></i>
    // </button>

    //     <button class='btnDel_student' style='padding:2px 5px; border:none;border-radius:5px;
    //         background-color:red; color:white;'  data-bs-toggle='modal' data-bs-target='#modalConfirmationDel_student' > 
    //             <i class='fa-solid fa-trash'></i>
    //     </button>
    // </td>
    
    // </tr>";

    // }
}else if($_POST['view_course']){

   // init();
        // include '../../core/config.php';
        // include '../../core/functions.php';
        // include '../../core/Database.php';
        // include '../../core/Model.php';
        // include '../../core/Controller.php';
        // include '../../models/Course.php';
        // include '../../models/Teacher.php';
        // include '../../models/Student.php';


   $course = new Course();
   $x="";
   
   $name = $_POST['names'];
   $year = $_POST['year'];
   

    if(($name == "" && $year == "")){
        $current_page_course = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset_course = ($current_page_course - 1) * 10;
        $data = $course->findAll_Page("id",$offset_course);

    }else{
        $data = $course->course_search($name);
        // if($name != "" &&  $year == "" ){
          
        // }else if($name != "" &&  $year != "" ){
        //     $data = $course->course_search_year($name,$year);
        // }else{
        //     $data = $course->course_year($year);
        // }
           
        
    }




    foreach($data as $row){
       
        $var_btnupload="";
        $var_alertupload="";
           if($row->image == ""){
            $var_btnupload="show";
            $var_alertupload="hidden";
           }else{
            $var_btnupload="hidden";
            $var_alertupload="show";
           }

          
                // $course_student = $row->acronym;
                // $year_student = $row->year;
                // $section_student = $row->section;
                // $query_student= "SELECT * FROM `student-tbl` WHERE `course`= '$course_student' AND `section`= '$section_student' AND `year` = '$year_student' ";
                // $result_student= mysqli_query($con,$query_student);
                // $number_student = mysqli_num_rows($result_student);
                            
          $x .=  "<tr><td class='d-none user_id'>".$row->id."</td><td>".$row->course."</td><td>".$row->acronym."</td><td>".$row->year."</td><td>".$row->section."</td>
          <td>0</td>

        <td>
        
        <button class='btn bg-success text-white btnUpload' data-bs-toggle='modal' data-bs-target='#UploadModal'".$var_btnupload." id='BTNUPLOAD' >+upload</button>
                               
        <div class='alert alert-success alert-dismissible fade show ' role='alert' ".$var_alertupload." > 
            <span id='filename' style='font-size:.8rem;'>".$row->image." </span><br>
            <p style='font-size: .5rem'>".$row->date."</p>
            <button type='submit' class='btn-close btnRemove'  style='font-size:15px;' name='submit' data-bs-toggle='modal' data-bs-target='#modalConfirmationRemove'></button>
        </div>
        
        </td>

        <td>
        <button class='btnEdit' style='padding:2px 5px; margin:0 2px; border:none; border-radius:5px;background-color:rgba(14, 239, 14, 0.947); color:white;'> <i class='fa-solid fa-pen-to-square'></i> </button>

        <button style='padding:2px 5px; border:none;border-radius:5px;background-color:red; color:white;'  data-bs-toggle='modal' data-bs-target='#modalConfirmationDel' class='btnDel'><i class='fa-solid fa-trash'></i></button>
        </td>
        </tr>";
    }

 


}

echo $x;



?>



<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>

<script>
$(document).ready(function(){

    function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Gumawa ng debounce function para sa AJAX request
const debouncedAjaxRequest = debounce(function(getName, getYear) {
    $.ajax({
        method: 'POST',
        url: '../app/views/ajax/search.php',
        data: {
            view_course: true,
            names: getName,
            year: getYear
        },
        success: function(response) {
            $("#showdata").html(response);
        }
    });
}, 100); // 300 milliseconds debounce delay

// Bind ng debounce function sa keyup event ng #getCourse input field
$('#getCourse').on("keyup", function() {
    var getName = $(this).val();
    var getYear = document.getElementById('search').value;
    debouncedAjaxRequest(getName, getYear);
});





    // $('#getTeacher').on("keyup", function(){

    //         var getName = $(this).val();
   
    //         $.ajax({
    //         method:'POST',
    //         url:'../app/views/ajax/remove.php',
    //         data:{
    //             view_teacher:true,
    //             names:getName,
               
    //         },
    //         success:function(response)
    //         {
                
    //             $("#showdata_teacher").html(response);
    //         } 
    //         });

    //  });


    //  $('#getStudent').on("keyup", function(){
    //         var getName = $(this).val();
    //         var getyear= document.getElementById('search_year').value;
    //         var getsection= document.getElementById('search_section').value;
            
    //         $.ajax({
    //         method:'POST',
    //         url:'../app/views/ajax/remove.php',
    //         data:{
    //             view_student:true,
    //             names:getName,
    //             year: getyear,
    //             section:getsection
               
    //         },
    //         success:function(response)
    //         {
    //             $("#showdata_student").html(response);
    //         } 
    //         });
    //     });

});
</script>

<script>
    $(document).ready(function(){
      
        $('.btnEdit').click(function(e){
            
            e.preventDefault();
         
            var user_id= $(this).closest('tr').find('.user_id').text();

            $.ajax({

                method:"POST",
                url:'../app/views/ajax/edit.php',
               
                data:{
                   'click_view_btn':true,
                    'user_id':user_id,
                },
                success: function(response){
                  
                   event.preventDefault();
                   $('#EditModal').modal('toggle');
                  $('.view_user_data').html(response);

             
                },
                error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
            });

            
        });

        $('._EditTeacher').click(function(e){
            e.preventDefault();

            var user_id_teacher= $(this).closest('tr').find('.user_id_teacher').text();

            $.ajax({

                method:"POST",
                url:'../app/views/ajax/edit.php',
                data:{
                    'teacher':true,
                    'user_id':user_id_teacher,
                },
                success: function(response){
                   
                    event.preventDefault();
                    $('.view_user_data').html(response);
                    $('#modalTeacher').modal('toggle');
                },
                error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
            });
        });

        $('._EditStudent').click(function(e){
            e.preventDefault();

            var user_id_student= $(this).closest('tr').find('.user_id_student').text();

            $.ajax({

                method:"POST",
                url:'../app/views/ajax/edit.php',
                data:{
                    'student':true,
                    'user_id':user_id_student,
                },
                success: function(response){
                    console.log(response);
                    //event.preventDefault();
                    $('.view_user_data').html(response);
                    $('#modalStudent').modal('toggle');
              
                },
                error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
            });
        });

        
    });
</script>

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

