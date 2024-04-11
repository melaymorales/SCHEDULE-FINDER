
<?php



if(isset($_POST['click_view_btn'])){
    include 'init.php';

  $arr['id'] = $_POST['user_id'];

   $g11="";$g12="";$g1="";$g2="";$g3="";$g4="";
   $course = new Course();

   $arr['id'] = $_POST['user_id'];
   $data= $course->where($arr);
   $row= $data[0];

    if(!empty($data)){
        $row = $data[0];

        
    if ( $row->year == "grade 11") {
        $g11="selected";
    }else if( $row->year == "grade 12"){
        $g12 ="selected";
    }else if($row->year == "1st"){
        $g1 ="selected";
    }else if( $row->year == "2nd"){
        $g2 ="selected";
    }else if($row->year == "3rd"){
        $g3 ="selected";
    }else if( $row->year == "4th"){
        $g4 ="selected";
    }

        
     echo '
         <div class="mb-3">

       <input name="id" type="hidden" class="form-control" value ="'.$row->id.'" required>
             <label for="course">
               Course / Strand
             </label>
              <input name="course" type="text" class="form-control" value ="'.$row->course.'" required>
     </div>

     <div class="mb-3">
         <label for="acronym">
             Acronym
         </label>
         <input name="acronym" type="text" class="form-control"   value ="'.$row->acronym.'" required>
     </div>

     <div class="mb-3">
         <label for="year">
             Year
         </label>
         <!-- <input name="year" type="text" class="form-control"  required> -->
         <select name="year" class="form-control">
             <option value="" >Select</option>
             <option value="grade 11" '. $g11.'>Grade 11</option>
             <option value="grade 12" '. $g12.'>Grade 12</option>
             <option value="1st" '. $g1.'>1st</option>
             <option value="2nd" '. $g2.'>2nd</option>
             <option value="3rd" '. $g3.'>3rd</option>
             <option value="4th" '. $g4.'>4th</option>
        
         </select>
     </div>

     <div class="mb-3">
         <label for="section">
             Section
         </label>
         <input name="section" type="text" class="form-control"   value ="'.$row->section.'" required>
     </div>
     </div>
        ';
       
    }

    }else if(isset($_POST['teacher'])){
        include 'init.php';
      $teacher = new Teacher();
      $arr['row'] = $_POST['user_id'];
      $data= $teacher->where($arr);
    
      if(!empty($data)){
        
        $row= $data[0];

      echo '
      <div class="mb-3">

      <input name="id" type="hidden" class="form-control" value ="'.$row->row.'" required>
          <label for="id">
              ID
          </label>
           <input type="text" class="form-control" value ="'.$row->id.'" disabled>
      </div>

      <div class="mb-3">
          <label for="firstname">
              Firstname
          </label>
          <input name="firstname" type="text" class="form-control"  value ="'.$row->firstname.'" required>
      </div>

      <div class="mb-3">
          <label for="lastname">
              Lastname
          </label>
          <input name="lastname" type="text" class="form-control"  value ="'.$row->lastname.'" required>
      </div>

      </div>
      ';
  }
}else if(isset($_POST['student'])){
    include 'init.php';
  $student = new Student();
  $course = new Course();
  $g11="";  $g12="";  $c1=""; $c2="";  $c3="";  $c4="";
 
  $id_student['row'] = $_POST['user_id'];
  
  $data = $student->where($id_student);
  $row= $data[0];


  if($row->year =="grade 11"){
      $g11="selected";
  }else if($row->year == "grade 12"){
      $g12="selected";
  }else if($row->year  == "1st"){
      $c1="selected";
  }else if($row->year == "2nd"){
      $c2="selected";
  }else if( $row->year == "3rd"){
      $c3="selected";
  }else{
      $c4="selected";
  }

  $selectedSection= $row->section;

  echo "
    <div class='mb-3'>
      <input name='row' type='hidden' class='form-control' value ='".$row->row."' required>
      <label for='id' style='font-size: 1rem !important;'>
          ID
      </label>
      <input name='id' type='text' class='form-control' value='".$row->id."'  disabled required>
    </div>

    <div class='mb-3'>
      <label for='fname' style='font-size: 1rem !important;'>
          Firstname
      </label>
      <input name='fname' type='text' class='form-control' value='".$row->firstname."' required>
    </div>

    <div class='mb-3'>
      <label for='lname' style='font-size: 1rem !important;'>
          Lastname
      </label>
      <input name='lname' type='text' class='form-control' value='".$row->lastname."' required>
    </div>

    <div class='mb-3'>
      <label for='course' style='font-size: 1rem !important;'>
          Course
      </label>

      <select name='course' class='form-control' required>
          <option value=''>Select</option>";
    $course_array=array();
   
    $data = $course->findAll();
    // $course_combobox= "SELECT * FROM `course-shs-tbl`";
    // $course_result = mysqli_query($con,$course_combobox);
    foreach($data as $row_course){
      if (!in_array($row_course->acronym,$course_array)){
        $course_array[]=$row_course->acronym;
        if($row->course== $row_course->acronym){
          echo "<option value='".$row_course->acronym."' selected>".$row_course->acronym."</option>";
        }else{
            echo "<option value='".$row_course->acronym."'>".$row_course->acronym."</option>";
        }
      }
    }
   
    echo "</select>
    </div>

<div class='mb-3'>

  <label for='year' style='font-size: 1rem !important;'>
      Year
  </label>
  <select name='year' class='form-control' required>
      <option value=''>Select</option>
      <option value='grade 11' ".$g11.">Grade 11</option>
      <option value='grade 12' ".$g12.">Grade 12</option>
      <option value='1st' ".$c1.">1st</option>
      <option value='2nd' ".$c2.">2nd</option>
      <option value='3rd' ".$c3.">3rd</option>
      <option value='4th' ".$c4.">4th</option>
  </select>
</div>

<div class='mb-3'>
  <label for='section' style='font-size: 1rem !important;'>
      Section
  </label>
  <select name='section' class='form-control' required>
      <option value=''>Select</option>";
  $section=array();
  $data = $course->findAll();
  
  foreach($data as $row_section){
    if (!in_array($row_section->section,$section)){
      $section[]=$row_section->section;
      if($selectedSection == $row_section->section){
        echo "<option value='".$row_section->section."' selected>".$row_section->section."</option>";
      }else{
          echo "<option value='".$row_section->section."'>".$row_section->section."</option>";
      }
    }
  }

echo "</select>
</div>";



}



?>

