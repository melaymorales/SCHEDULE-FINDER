<?php
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

 session_start();
 $_SESSION['alert_success_course']= $_SESSION['alert_success_teacher'] = $_SESSION['alert_success_student']= "d-none";
 $_SESSION['alert_unsuccess_course']=$_SESSION['alert_unsuccess_teacher'] = $_SESSION['alert_unsuccess_student'] = "d-none";
 $_SESSION['message']="";



class Admin extends Controller{
     
    

    public function index(){


      $this->register();
      $this->import();
      $this->update();
      
      
      $course = new Course();
      $teacher = new Teacher();
      $student = new Student();

      

      $allCourse = $course->findAll();
      $allTeacher= $teacher->findAll();
      $allStudent = $student->findAll();

     

      $limit = 10;

      $current_page_course = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset_course = ($current_page_course - 1) * $limit;
      $data = $course->count_page();
      $row= $data[0];
      $total_records_course= $row->count;
      $total_pages_course = ceil($total_records_course/ $limit);
      $course_data = $course->findAll_Page("id",$offset_course);

      $current_page_teacher= isset($_GET['page_teacher']) ? $_GET['page_teacher'] : 1;
      $offset_teacher = ($current_page_teacher - 1) * $limit;
      $data = $teacher->count_page();
      $row= $data[0];
      $total_records_teacher= $row->count;
      $total_pages_teacher = ceil($total_records_teacher/ $limit);
      $teacher_data = $teacher->findAll_Page("row",$offset_teacher);

      $current_page_student= isset($_GET['page_student']) ? $_GET['page_student'] : 1;
      $offset_student = ($current_page_student - 1) * $limit;
      $data = $student->count_page();
      $row= $data[0];
      $total_records_student= $row->count;
      $total_pages_student = ceil($total_records_student/$limit);
      $student_data = $student->findAll_Page("row",$offset_student);



   

      $this->view('admin',[
            'allCourse' => $allCourse,
            'allTeacher' => $allTeacher,
            'allStudent' => $allStudent,
            'course_data' => $course_data,
            'teacher_data' => $teacher_data,
            'student_data' => $student_data,
            'current_page_course' =>  $current_page_course,
            'current_page_teacher' =>  $current_page_teacher,
            'current_page_student' =>  $current_page_student,
            'total_pages_course' => $total_pages_course,
            'total_pages_teacher' => $total_pages_teacher,
            'total_pages_student' => $total_pages_student,
            'alert_success_course' =>  $_SESSION['alert_success_course'],
            'alert_unsuccess_course' =>  $_SESSION['alert_unsuccess_course'],
            'alert_success_teacher' =>  $_SESSION['alert_success_teacher'],
            'alert_unsuccess_teacher' =>  $_SESSION['alert_unsuccess_teacher'],
            'alert_success_student' =>  $_SESSION['alert_success_student'],
            'alert_unsuccess_student' =>  $_SESSION['alert_unsuccess_student'],
            'message' =>  $_SESSION['message']
     ]);

    

     

    }

//     private function display(){
     
//     }

    private function register(){

       if(isset($_POST['AddCourse'])){
        
            $course = new Course();
            
            $arr['course'] =ucwords($_POST['course']);
            $arr['acronym'] = strtoupper($_POST['acronym']);
            $arr['year']= strtolower($_POST['year']);
            $arr['section']=strtoupper($_POST['section']);
            
            $data = $course->where($arr);
            
            if(!empty($data)){
                  $_SESSION['alert_unsuccess_course']="d-show";
                  $_SESSION['message']="The Course attempting to register is already exist.";

            }else{
               $course->insert($arr);
               $_SESSION['alert_success_course']="d-show";
               $_SESSION['message']="Successfully registered New Course.";
           

              
            }

     

            
      }else if(isset($_POST['AddTeacher'])){

            $teacher = new Teacher();
            $arr['id'] = $_POST['id'];
           

            $data = $teacher->where($arr);

            if(!empty($data)){
                  $_SESSION['alert_unsuccess_teacher']="d-show";
                  $_SESSION['message']="The Teacher attempting to register is already exist.";
        
               }else{
                  $arr['firstname'] = ucfirst($_POST['firstname']);
                  $arr['lastname']= ucfirst($_POST['lastname']);
                  $data = $teacher->insert($arr);
                  $_SESSION['alert_success_teacher']="d-show";
                  $_SESSION['message']="Successfully registered New Teacher.";
   
            }

      }else if(isset($_POST['AddStudent'])){

            $student = new Student();
            $arr['id'] = $_POST['id'];
           
            $data = $student->where($arr);
            if(!empty($data)){
                  
                  $_SESSION['alert_unsuccess_student']="d-show";
                  $_SESSION['message']="The Student attempting to register is already exist.";
        
               }else{
                  $arr['firstname'] = ucfirst($_POST['firstname']);
                  $arr['lastname']= ucfirst($_POST['lastname']);
                  $arr['course']= strtoupper($_POST['course']);
                  $arr['year']=strtolower($_POST['year']);
                  $arr['section']= strtoupper($_POST['section']);

                  $data = $student->insert($arr);
                  $_SESSION['alert_success_student']="d-show";
                  $_SESSION['message']="Successfully registered New Student.";
        
            }

      }
     
    
    }

    private function import(){
      $pathImage=array();
      $unsuccessfulImage = $duplicateImage ="";

    

      if(isset($_POST['import_course'])){
            $fileName = $_FILES['import_file']['name'];
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowed_ext = ['xls','csv','xlsx'];
           
            $course = new Course();
           

            if(in_array($file_ext, $allowed_ext))
            {
                  $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                  $data = $spreadsheet->getActiveSheet()->toArray();

                  $count = "0";
                 // show(count($data));
                  foreach($data as $row)
                  {
                        if($count > 0)
                        {

                        $level= ucwords($row['0']);
                        $acronym= strtoupper($row['1']);
                        $year=strtolower($row['2']);
                        $section= strtoupper($row['3']);

                        if($year=="1"){
                              $year="1st";
                        }else if($year=="2"){
                              $year="2nd";
                        }else if($year=="3"){
                              $year="3rd";
                        }else if($year=="4"){
                              $year="4th";
                        }else if($year=="grade11" || $year=="grade  11"){
                              $year="grade 11";
                        }else if($year=="grade12" || $year=="grade  12"){
                              $year="grade 12";
                        }
                       // $arr['course'] = $level;
                        $arr['acronym']=$acronym;
                        $arr['year']=$year;
                        $arr['section']=$section;

                        if($_POST['import'] == "option1"){
                            
                              $current_course= $course->where($arr);

                              if(!empty($current_course)){
                                    $msg = true;
                              }else{
                                    $arr['course'] = $level;
                                    if($level != "" ){
                                          $course->insert($arr);
                                      //    $msg = true;
                                    }
                                   
                              }

                        }else{
                              $image= $row['4'];
                              $targetfile = "../app/views/assets/img/".basename($image);
                              $imagename= basename($image);
                             
                              $arr['course'] =$level;
                              $current_course= $course->where($arr);
                              
                              if(!empty($current_course)){
                                    $id_current_course= $current_course[0];
                                    $teacher = new Teacher();

                                    $arr_image['image']= $imagename;
                                    $image_course = $course->where($arr_image);
                                   // $id_image = $image_course[0];
                                    // $query_image="SELECT * FROM `course-shs-tbl` WHERE `image` = '$imagename' ";
                                    // $result_image = mysqli_query($con,$query_image);
                                    
                                    $image_teacher = $teacher->where($arr_image);
                                    // $query_image_teacher="SELECT * FROM `teacher-tbl` WHERE `schedule` = '$imageName' ";
                                    // $result_image_teacher = mysqli_query($con,$query_image_teacher);
                                   // if((mysqli_num_rows($result_image)>0) || (mysqli_num_rows($result_image_teacher)>0) )
                                   if(!empty($image_course) || !empty( $image_teacher)){
                                          
                                          if($imagename != ""){
                                                $duplicateImage.=" ".basename($image)." ,";
                                          }
                                          
                                    }else{
                                          if($image != ""){
                                          if(copy($image,$targetfile)) {
                                                $id = $id_current_course->id;
                                             //  show($id);
                                                date_default_timezone_set('Asia/Manila');
                                                $currentDateTime = date('m/d/Y h:ia');
                                                $arr_image['image'] = $imagename;
                                                $arr_image['date'] = $currentDateTime;
                                                $course->update_course($id,$arr_image);
                                                // $query="UPDATE `course-shs-tbl` SET `image`='$imagename', `date`='$currentDateTime' WHERE `course-shs` = '$level' AND `acronym` = '$acronym' AND `year` = '$year' AND `section` = '$section' ";
                                                // $result = mysqli_query($con, $query);
                                                
                                           }
                                        }
                                    }
            
                               //     $msg = true;

                              }else {
                                    if($imagename != ""){
                                    $unsuccessfulImage .= $imagename. " ,";
                                    $msg = true;
                                    }
                                    
                              
                              }
                        }
                        
                        }
                        else
                        {
                           $count = "1";
                        }
                  }

                  if($_POST['import']=="option1" ||( $_POST['import']=="option2" && $unsuccessfulImage == "" && $duplicateImage == "") ){
                        $_SESSION['alert_success_course']="d-show";
                        $_SESSION['message'] = ($_POST['import']=="option1") ? "Successfully registered New Courses." :  "Successfully uploaded Course Scheduled." ;
                        
                        
                     //   ="Successfully registered New Courses.";
                      
                    }else{
                        $_SESSION['alert_unsuccess_course']="d-show";

                        if($unsuccessfulImage != "" && $duplicateImage != ""){
                              $unsuccessfulImage = "[".trim($unsuccessfulImage, ",")."]";  $duplicateImage =  "[".trim($duplicateImage, ",")."]";   
                              $_SESSION['message']=$unsuccessfulImage." Unsuccessfully uploaded!\n\n".$duplicateImage." Already Exist!";
                             
                        }else if($unsuccessfulImage != "" && $duplicateImage == ""){
                              $unsuccessfulImage = "[".trim($unsuccessfulImage, ",")."]";
                              $_SESSION['message']= $unsuccessfulImage." Unsuccessfully uploaded!";
                         }else{
                              $duplicateImage =  "[".trim($duplicateImage, ",")."]";
                              $_SESSION['message']=$duplicateImage." Already Exist!";
                         }
                  }            
            
        }

    }else if(isset($_POST['import_teacher'])){
            $fileName = $_FILES['import_file']['name'];
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowed_ext = ['xls','csv','xlsx'];
                  
            $teacher = new Teacher();

            if(in_array($file_ext, $allowed_ext)){

            $inputFileNamePath = $_FILES['import_file']['tmp_name'];
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
            $data = $spreadsheet->getActiveSheet()->toArray();
      
            $count = "0";
            foreach($data as $row)
            {
                  
                  if($count > 0)
                  {
                     
      
                        $id= $row['0'];
                        $fname= $row['1'];
                        $lname=$row['2'];

                        $teacher_data['id']= $id;
      
                        if($_POST['import'] == "option1"){
                         
                        $exist = $teacher->where($teacher_data);
                        // $query=" SELECT * FROM `teacher-tbl` WHERE `id`='$id'";
                        // $result=mysqli_query($con,$query);
                        // $exist =  mysqli_num_rows($result);
                              
                              if(empty($exist)){
                                    $teacher_data['firstname']= $fname;
                                    $teacher_data['lastname']= $lname;
                                    $teacher->insert($teacher_data);
                              }
                              // if($exist > 0){
                              //             $msg = true;
                              // }else{
                              //             $query= "INSERT INTO `teacher-tbl`(`id`, `firstname`, `lastname`) VALUES ('$id','$fname','$lname')";
                              //             $result=mysqli_query($con,$query);
                              //             $msg = true;
                              // }

                        }else{
                              $image= $row['3'];
                              $targetfile = "../app/views/assets/img/".basename($image);
                              $imagename= basename($image);
                              
                              $exist = $teacher->where($teacher_data);
                              // $query="SELECT * FROM `teacher-tbl` WHERE `id` = '$id' ";
                              // $result = mysqli_query($con, $query);
                              // $row_image = mysqli_fetch_array($result);
      
                        if(!empty($exist)){
                              $course = new Course();
                              $arr_image['image']= $imagename;

                              $teacher_image =$teacher->where($arr_image);
                              $course_image =$course->where($arr_image);
                              
                              // $query_image="SELECT * FROM `teacher-tbl` WHERE `schedule` = '$imagename' ";
                              // $result_image = mysqli_query($con,$query_image);
      
                              // $query_image_course="SELECT * FROM `course-shs-tbl` WHERE `image` = '$imageName' ";
                              // $result_image_course = mysqli_query($con,$query_image_course);
                                    if(!empty($teacher_image) ||!empty($course_image) ){
                                          
                                          if($imagename != ""){
                                                $duplicateImage.=" ".basename($image)." ,";
                                          }
      
                                    }else{
                                    
                                          if (copy($image,$targetfile)) {
                                                date_default_timezone_set('Asia/Manila');
                                                $currentDateTime = date('m/d/Y h:ia');
                                                $arr_image['date']=   $currentDateTime;

                                                $teacher->update($teacher_data,$arr_image);

                                                $query="UPDATE `teacher-tbl` SET `schedule`='$imagename', `date`='$currentDateTime' WHERE `id` = '$id' ";
                                                $result = mysqli_query($con, $query);
                                          
                                          }
                                    }
      
                            
      
                              }else {
                                    if($imagename != ""){
                                          $unsuccessfulImage .= $imagename. " ,";
                                    
                                    } 
                              
                              }
                        }
                        
                  }
                  else
                  {
                        $count = "1";
                  }
            }

            if($_POST['import']=="option1" ||( $_POST['import']=="option2" && $unsuccessfulImage == "" && $duplicateImage == "")){
                  $_SESSION['alert_success_teacher']="d-show";
                  $_SESSION['message'] = ($_POST['import']=="option1") ? "Successfully registered New Teachers." :  "Successfully uploaded Teacher Scheduled." ;
                
              }else{
                  $_SESSION['alert_unsuccess_teacher']="d-show";
                  if($unsuccessfulImage != "" && $duplicateImage != ""){
                        $unsuccessfulImage = "[".trim($unsuccessfulImage, ",")."]";  $duplicateImage =  "[".trim($duplicateImage, ",")."]";   
                        $_SESSION['message']=$unsuccessfulImage." Unsuccessfully uploaded!\n\n".$duplicateImage."Already Exist!";
                  
                  }else if($unsuccessfulImage != "" && $duplicateImage == ""){
                        $unsuccessfulImage = "[".trim($unsuccessfulImage, ",")."]";
                        $_SESSION['message']=$unsuccessfulImage." Unsuccessfully uploaded!";

                   }else{
                        $duplicateImage =  "[".trim($duplicateImage, ",")."]";
                        $_SESSION['message']=$duplicateImage." Already Exist!";
                   }
            }        
         }
       
      }else if(isset($_POST['import_student'])){

        
            $student = new Student();
          

            $fileName = $_FILES['import_file']['name'];
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowed_ext = ['xls','csv','xlsx'];

            if(in_array($file_ext, $allowed_ext))
            {
                  $unsuccessful_import="";
                  $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                  $data = $spreadsheet->getActiveSheet()->toArray();

                  $count = "0";

                  foreach($data as $row)
                  {
                       
                        if($count > 0)
                        {
                        $id= $row['0'];
                        $fname= $row['1'];
                        $lname=$row['2'];
                        $course=strtoupper($row['3']);
                        $year=$row['4'];

                        if($year=="1"){
                              $year="1st";
                        }else if($year=="2"){
                              $year="2nd";
                        }else if($year=="3"){
                              $year="3rd";
                        }else if($year=="4"){
                              $year="4th";
                        }else if($year=="grade11" || $year=="grade  11"){
                              $year="grade 11";
                        }else if($year=="grade12" || $year=="grade  12"){
                              $year="grade 12";
                        }

                        $section=strtoupper($row['5']);

                        $course_class = new Course();
                        
                        $arrr['acronym'] = $course;
                        $arrr['year'] = $year;
                        $arrr['section'] =$section;
                        

                        // $arr_course['acronym'] =$course;
                        // $arr_course['year'] = $year;
                        // $arr_course['section'] =$section;



                        
                        $exist = $course_class->where($arrr);
                   
                       
                              if(!empty($exist)){

                        
                                    $arr['id'] = $id;
                                    $exist = $student->where($arr);

                                    if(empty($exist)){
                                          $arr['firstname'] = $fname;
                                          $arr['lastname'] = $lname;
                                          $arr['course'] = $course;
                                          $arr['year'] = $year;
                                          $arr['section'] = $section;

                                          $student->insert($arr);
                                    }
                              

                              }else{
                                    $unsuccessful_import .= $id." ,";
                              }  
                        
                        }
                        else
                        {
                         $count = "1";
                        }
                  }

                  if($unsuccessful_import == ""){
                        $_SESSION['alert_success_student']="d-show";
                        $_SESSION['message']="Successfully registered New Students.";
                 
                  }else{
                        $_SESSION['alert_unsuccess_student']="d-show";
                        $unsuccessful_import = "[".trim($unsuccessful_import, ",")."]";
                        $_SESSION['message']= $unsuccessful_import." Unsuccessfully uploaded. The YEAR, SECTION and COURSE does not exist.";
                      
                  }

            }
      }

  }

  private function update(){
      if(isset($_POST['bntUP-Course'])){
            $course = new Course();
            $id=$_POST['id'];
            $arr['course'] = ucwords($_POST['course']);
            $arr['acronym'] = strtoupper($_POST['acronym']);
            $arr['year'] = $_POST['year'];
            $arr['section'] = strtoupper($_POST['section']);
            
            $data = $course->where($arr);
            
            if(!empty($data)){
                  $_SESSION['alert_unsuccess_course']="d-show";
                  $_SESSION['message']="The Course attempting to update is already exist.";

            }else{
               $course->update_course($id,$arr);
               $_SESSION['alert_success_course']="d-show";
               $_SESSION['message']="Successfully updated the Course.";
 
            }
              
      }else if(isset($_POST['bntUP_teacher'])){
            $teacher = new Teacher();

            $arr_id['row'] = $id = $_POST['id'];

            $arr['firstname'] = ucfirst($_POST['firstname']);
            $arr['lastname']= ucfirst($_POST['lastname']);

            $data = $teacher->where($arr);

            if(!empty($data)){
                  $_SESSION['alert_unsuccess_teacher']="d-show";
                  $_SESSION['message']="The Teacher attempting to update is already exist.";
        
               }else{
                  $data = $teacher->update($id,$arr);
                  $_SESSION['alert_success_teacher']="d-show";
                  $_SESSION['message']="Successfully Update the Teacher.";
   
            }
            
        }else if(isset($_POST['bntUP_student'])){
            $student = new Student();

            $id = $_POST['row'];

            $arr['firstname'] = ucfirst( $_POST['fname']);
            $arr['lastname'] = ucfirst($_POST['lname']);
            $arr['course'] = strtoupper($_POST['course']);
            $arr['section'] = strtoupper($_POST['section']);
            $arr['year'] = $_POST['year'];

            $data = $student->where($arr);

            if(!empty($data)){
                  
                  $_SESSION['alert_unsuccess_student']="d-show";
                  $_SESSION['message']="The Student attempting to update is already exist.";
        
               }else{
                  $course = new Course();

                  $var['year'] = $_POST['year'];
                  $var['acronym'] = $_POST['course'];
                  $var['section'] = $_POST['section'];

                  $data = $course->where($var);

                  if(!empty($data)){
                        $data = $student->update($id,$arr);
                        $_SESSION['alert_success_student']="d-show";
                        $_SESSION['message']="Successfully update the Student.";
                  }else{
                        $_SESSION['alert_unsuccess_student']="d-show";
                        $_SESSION['message']="Unsuccessfully updated. The YEAR, SECTION and COURSE does not exist.";
                  }

            }
            
        }
  }


}
