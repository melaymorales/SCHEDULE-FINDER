<?php
    $x="";
if(isset($_POST['view_course'])){

    include 'init.php';

   $course = new Course();

   
   $name = $_POST['names'];
   $year = $_POST['year'];
   

    if(($name == "" && $year == "")){
        $current_page_course = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset_course = ($current_page_course - 1) * 10;
        $data = $course->findAll_Page("id",$offset_course);

    }else{
      
        if($name != "" &&  $year == "" ){
            $data = $course->course_search($name);
        }else if($name != "" &&  $year != "" ){
            $data = $course->course_search_year($name,$year);
        }else{
            $data = $course->course_year($year);
        }    
        
    }
    
    if(!empty($data)){

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

        
            $student = new Student();
            $arr['course'] = $row->acronym;
            $arr['year'] = $row->year;
            $arr['section'] = $row->section;

            $data = $student->where($arr);
            $count = (empty($data)) ? "0": count($data);
     
      

            
                    // $course_student = $row->acronym;
                    // $year_student = $row->year;
                    // $section_student = $row->section;
                    // $query_student= "SELECT * FROM `student-tbl` WHERE `course`= '$course_student' AND `section`= '$section_student' AND `year` = '$year_student' ";
                    // $result_student= mysqli_query($con,$query_student);
                    // $number_student = mysqli_num_rows($result_student);
                                
            $x .=  "<tr><td class='d-none user_id'>".$row->id."</td><td>".$row->course."</td><td>".$row->acronym."</td><td>".$row->year."</td><td>".$row->section."</td>
            <td>".$count."</td>

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
}else if(isset($_POST['course_year'])){

    include 'init.php';


    $course = new Course();
    $selectedItem = $_POST['item'];
    $name= $_POST['course'];

    


    if($selectedItem == "" && $name == ""){
       
        $current_page_course = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset_course = ($current_page_course - 1) * 10;
        $data = $course->findAll_Page("id",$offset_course);



    }else if($selectedItem != "" && $name != ""){
        $data = $course->search_course_year($name,$selectedItem);
       
    }
    else if($selectedItem == "" && $name != ""){
        $data = $course->course_search($name);
    }
    else{
        
        $arr['year'] = $selectedItem;
        $data = $course->where($arr);
    }

    if(!empty($data)){

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
                
      
                $student = new Student();
                $arr['course'] = $row->acronym;
                $arr['year'] = $row->year;
                $arr['section'] = $row->section;

                $data = $student->where($arr);
                $count = (empty($data)) ? "0": count($data);
         
    
                echo "<tr><td class='d-none user_id'>".$row->id."</td><td>".$row->course."</td><td>".$row->acronym."</td><td>".$row->year."</td><td>".$row->section."</td>
                <td>".$count."</td>
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
   
     pagination("course");

}else if (isset($_POST['view_teacher'])){
    include 'init.php';
   
    $teacher = new Teacher();

    $name = $_POST['names'];
  
    if($name==""){
        $current_page_teacher = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset_teacher = ($current_page_teacher - 1) * 10;
        $data = $teacher->findAll_Page("row",$offset_teacher);

    }else{
        $data = $teacher->teacher_search($name);
    }
    if(!empty($data)){

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

        $x .=  "<tr>
        <td class='d-none user_id_teacher'>". $row->row."</td>
        <td >".$row->id."</td>
        <td>".$row->firstname."</td>
        <td >".$row->lastname."</td>
       
        <td>
        <button class='btn bg-success text-white btnUpload_teacher' data-bs-toggle='modal' data-bs-target='#UploadModal_teacher'  ".$var_btnupload." id='BTNUPLOAD' >+upload</button>
                              
        <div class='alert alert-success alert-dismissible fade show ' role='alert' ".$var_alertupload." > 
                                       <span id='filename' style='font-size:.8rem;'> ".$row->image."</span><br>
                                       <p style='font-size: .5rem'>".$row->date."</p>
                                       <button type='submit' class='btn-close btnRemove_teacher'  style='font-size:15px;' name='submit' data-bs-toggle='modal' data-bs-target='#modalConfirmationRemove_teacher'></button>
                                   </div>
        
        </td>
 
        <td>
        <button class='_EditTeacher mx-auto' style='padding:2px 5px; margin:0 2px; border:none; border-radius:5px;
                                background-color:rgba(14, 239, 14, 0.947); color:white;'> 
                                    <i class='fa-solid fa-pen-to-square'></i>
                                </button>

                                <button class='mx-auto btnDel_teacher' style='padding:2px 5px; border:none;border-radius:5px;
                                    background-color:red; color:white;' class='btnDel_teacher'  data-bs-toggle='modal' data-bs-target='#modalConfirmationDel_teacher' > 
                                        <i class='fa-solid fa-trash'></i>
                                </button>
        </td>
        </tr>";
     }
    }

    echo $x;

}else if(isset($_POST['view_student'])){

    include 'init.php';
    $student = new Student();

    $name = $_POST['names'];
    $year=$_POST['year'];
    $section=$_POST['section'];

    if($name == ""){

        $current_page_student = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset_student = ($current_page_student - 1) * 10;
        $data = $student->findAll_Page("row",$offset_student);

    }else if($section != "" && $name == "" && $year != ""){
        $data = $student->student_section__year($year,$section);

    }else if($section == "" && $name != "" && $year != ""){
        $data = $student->student_search__section($name,$year);
    
    }else if($section != "" && $name != "" && $year == ""){
        $data = $student->student_search__section($name,$section);

    }else if($section != "" && $name != "" && $year != ""){
       $data= $student->student_search_section__year($name,$year, $section );
    }else{
        $data = $student->student_search($name);
    }

    if(!empty($data)){

        foreach($data as $row){

        $x .=  "<tr> 
        
            <td class='d-none user_id_student'>".$row->row."</td>
            <td >".$row->id."</td>
            <td>".$row->firstname."</td>
            <td> ".$row->lastname."</td>
            <td> ".$row->course."</td>
            <td> ".$row->year."</td>
            <td>".$row->section."</td>

        <td>

        <button class='_EditStudent mx-auto' style='padding:2px 5px; margin:0 2px; border:none; border-radius:5px;
        background-color:rgba(14, 239, 14, 0.947); color:white;'> 
            <i class='fa-solid fa-pen-to-square'></i>
        </button>

            <button class='btnDel_student' style='padding:2px 5px; border:none;border-radius:5px;
                background-color:red; color:white;'  data-bs-toggle='modal' data-bs-target='#modalConfirmationDel_student' > 
                    <i class='fa-solid fa-trash'></i>
            </button>
        </td>
        
        </tr>";

        }
    }

    echo $x;
    
}else if(isset($_POST['student_year'])){
    include 'init.php';

    $student = new Student();

    $selectedItem = $_POST['item'];
    $course = $_POST['course'];
    $section = $_POST['section'];

    

if($selectedItem == "" && $course == "" && $section==""){

    $current_page_student= isset($_GET['page_student']) ? $_GET['page_student'] : 1;
    $offset_student = ($current_page_student - 1) * 10;
    $data = $student->findAll_Page("row",$offset_student);


}else if($selectedItem != "" && $course != "" && $section !=""){
    $data = student_search_section__year($course,$selectedItem,$section);

}else if($selectedItem != "" && $course == ""  && $section == ""){

   $arr['year'] = $selectedItem;
   $data = $student->where($arr);

}else if($selectedItem != "" && $course == "" && $section != ""){

     $data = $student->student_section__year($selectedItem,$section);

}else if($selectedItem == "" && $course != ""  && $section != ""){

    $data = $student->student_search__section($course,$section);

}else if($selectedItem == "" && $course != "" && $section == ""){
    $data = $student->student_search($course);

}else if($selectedItem != "" && $course != ""  && $section == ""){
    $data = $student->student_search__year($course,$selectedItem);

}

if(!empty($data)){
    foreach($data as $row){

        echo "<tr> 
        
        <td class='d-none user_id_student'>".$row->row."</td>
        <td >".$row->id."</td>
        <td>".$row->firstname."</td>
        <td> ".$row->lastname."</td>
        <td> ".$row->course."</td>
        <td> ".$row->year."</td>
        <td>".$row->section."</td>

        <td>
            <button class='_EditStudent mx-auto'  style='padding:2px 5px; margin:0 2px; border:none; border-radius:5px;
            background-color:rgba(14, 239, 14, 0.947); color:white;'> 
                <i class='fa-solid fa-pen-to-square'></i>
            </button>

            <button class='btnDel_student' style='padding:2px 5px; border:none;border-radius:5px;
                background-color:red; color:white;'  data-bs-toggle='modal' data-bs-target='#modalConfirmationDel_student' > 
                    <i class='fa-solid fa-trash'></i>
            </button>
        </td>
        
        </tr>";
    
    }

}
    pagination("student");

}else if(isset($_POST['student_section'])){
include 'init.php';

$student = new Student();

$year = $_POST['year'];
$course = $_POST['course'];
$selectedItem = $_POST['item'];



if($selectedItem == "" && $course == "" && $year==""){

    $current_page_student= isset($_GET['page_student']) ? $_GET['page_student'] : 1;
    $offset_student = ($current_page_student - 1) * 10;
    $data = $student->findAll_Page("row",$offset_student);

}else if($selectedItem != "" && $course != "" && $year !=""){
    $data = $student->student_search_section__year($course,$year, $selectedItem );

}else if($selectedItem != "" && $course == ""  && $year == ""){
    $arr['section'] = $selectedItem;
    $data = $student->where($arr);

}else if($selectedItem != "" && $course == "" && $year != ""){
    $data = $student->student_section__year($year,$selectedItem);


}else if($selectedItem == "" && $course != ""  && $year != ""){
    $data = $student->search_course_year($course,$year);

}else if($selectedItem == "" && $course != "" && $year == ""){
    $data->student_search($course);

}else if($selectedItem != "" && $course != ""  && $year == ""){
    $data = $student->student_search__section($course,$selectedItem);

}

if(!empty($data)){

   foreach($data as $row){

        echo "<tr> 
    
    <td class='d-none user_id_student'>".$row->row."</td>
    <td >".$row->id."</td>
    <td>".$row->firstname."</td>
    <td> ".$row->lastname."</td>
    <td> ".$row->course."</td>
    <td> ".$row->year."</td>
    <td>".$row->section."</td>

    <td>
        <button class='_EditStudent mx-auto' style='padding:2px 5px; margin:0 2px; border:none; border-radius:5px;
        background-color:rgba(14, 239, 14, 0.947); color:white;'> 
            <i class='fa-solid fa-pen-to-square'></i>
        </button>

        <button class='btnDel_student' style='padding:2px 5px; border:none;border-radius:5px;
            background-color:red; color:white;'  data-bs-toggle='modal' data-bs-target='#modalConfirmationDel_student' > 
                <i class='fa-solid fa-trash'></i>
        </button>
    </td>
    
    </tr>";
    }
}

pagination("student");
}

?>
   <?php include 'remove.php'; ?>


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

</script>




