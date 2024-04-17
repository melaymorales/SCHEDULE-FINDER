<?php
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



 $_SESSION['alert_success_course']= $_SESSION['alert_success_teacher'] = $_SESSION['alert_success_student'] = $_SESSION['alert_success_password']="d-none";
 $_SESSION['alert_unsuccess_course']=$_SESSION['alert_unsuccess_teacher'] = $_SESSION['alert_unsuccess_student'] = $_SESSION['alert_unsuccess_password']= "d-none";
 $_SESSION['message']="";



class Admin extends Controller{
     
    

    public function index(){

     if(isset($_POST['login']) || $_SESSION['password'] != ""){

     $this->login();

      $this->register();
      $this->import();
      $this->update();
      $this->delete();
      $this->upload();
      $this->remove();
      $this->logout();
      $this->changepassword();


      
    
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
            'alert_success_password' =>  $_SESSION['alert_success_password'],
            'alert_unsuccess_password' =>  $_SESSION['alert_unsuccess_password'],
            'message' =>  $_SESSION['message'],
            'tableAdmin' => $_SESSION['tableAdmin']
     ]);

     }else{
            $_SESSION['alert'] = "disabled";
        
            header("location: ".ROOT."/login");
      }
    }

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


          
            $_SESSION['tableAdmin']="course";

            
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

            $_SESSION['tableAdmin']="teacher";


      }else if(isset($_POST['AddStudent'])){

            $student = new Student();
            $arr['id'] = $_POST['id'];
           
            $data = $student->where($arr);
            if(!empty($data)){
                  
                  $_SESSION['alert_unsuccess_student']="d-show";
                  $_SESSION['message']="The Student attempting to register is already exist.";
        
               }else{
                  $course = new Course();

                  $studenInfo['acronym'] = strtoupper($_POST['course']);
                  $studenInfo['section'] = strtoupper($_POST['section']);
                  $studenInfo['year'] = strtolower($_POST['year']);

                  $data = $course->where($studenInfo);

                  if(!empty($data)){

                        $arr['firstname'] = ucfirst($_POST['firstname']);
                        $arr['lastname']= ucfirst($_POST['lastname']);
                        $arr['course']= strtoupper($_POST['course']);
                        $arr['year']=strtolower($_POST['year']);
                        $arr['section']= strtoupper($_POST['section']);
                        $data = $student->insert($arr);
                        $_SESSION['alert_success_student']="d-show";
                        $_SESSION['message']="Successfully registered New Student.";

                  }else{
                        $_SESSION['alert_unsuccess_student']="d-show";
                        $_SESSION['message']="Unsuccessfully registered. The course year does not exist.";
                  }
  
            }

            $_SESSION['tableAdmin']="student";
      }else{
            $_SESSION['tableAdmin']="";
      }
     
    
    }

    private function import(){

      $pathImage=array();
      $unsuccessfulImage = $duplicateImage ="";

      

      if(isset($_POST['import_course'])){

            $course = new Course();
         
            $fileName = $_FILES['import_file']['name'];
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowed_ext = ['xls','csv','xlsx'];
           

           if(in_array($file_ext, $allowed_ext))
            {
                 $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                 $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                 $data = $spreadsheet->getActiveSheet()->toArray();

                  $count = "0";
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
                        }else if($year=="grade11" || $year=="grade  11" || $year == "11"){
                              $year="grade 11";
                        }else if($year=="grade12" || $year=="grade  12" ||  $year == "12"){
                              $year="grade 12";
                        }
                        $arr['acronym']=$acronym;
                        $arr['year']=$year;
                        $arr['section']=$section;

                        if($_POST['import'] == "option1"){

                              $arr['course'] = trim($level,".");

                              $current_course = $course->where($arr);

                              if(!empty($current_course)){
                                    $msg = true;
                                    
                              }else{
                              
                                   $course->insert($arr);
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
                                 
                                    
                                    $image_teacher = $teacher->where($arr_image);
                       
                                   if(!empty($image_course) || !empty( $image_teacher)){
                                          
                                          if($imagename != ""){
                                                $duplicateImage.=" ".basename($image)." ,";
                                          }
                                          
                                    }else{
                                          if($image != ""){

                                                if(file_exists($targetfile)){
                                                      if(copy($image,$targetfile)) {
                                                            $id = $id_current_course->id;
                                                            date_default_timezone_set('Asia/Manila');
                                                            $currentDateTime = date('m/d/Y h:ia');
                                                            $arr_image['image'] = $imagename;
                                                            $arr_image['date'] = $currentDateTime;
                                                            $course->update_course($id,$arr_image);
                                                
                                                            
                                                      }
                                                }else{
                                                      if($imagename != ""){
                                                         $unsuccessfulImage .= $imagename. " ,";
                                                         $msg = true;
                                                       }
                                                }
                                        }
                                    }
            
                     

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

        $_SESSION['tableAdmin']="course";

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
                              
                              if(empty($exist)){
                                    $teacher_data['firstname']= $fname;
                                    $teacher_data['lastname']= $lname;
                                    $teacher->insert($teacher_data);
                              }
                             

                        }else{
                              $image= $row['3'];
                              $targetfile = "../app/views/assets/img/".basename($image);
                              $imagename= basename($image);
                              
                              $exist = $teacher->where($teacher_data);
                          
      
                        if(!empty($exist)){
                              $course = new Course();
                              $arr_image['image']= $imagename;

                              $teacher_image =$teacher->where($arr_image);
                              $course_image =$course->where($arr_image);
                              
                     
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
       
         $_SESSION['tableAdmin']="teacher";
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
            $_SESSION['tableAdmin']="student";
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

            $_SESSION['tableAdmin']="course";
              
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
            
            $_SESSION['tableAdmin']="teacher";

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
            $_SESSION['tableAdmin']="student";
        }
  }

  private function delete(){
     

      if(isset($_POST['save'])){
            $course = new Course();

            $arr_id['id'] = $id = $_SESSION['id'];

            $imageName ="";
            $folderPath="../app/views/assets/img/";

            $data = $course->where($arr_id);
            $row = $data[0];
            $imageToDelete=$row->image;
            
            $data = $course->delete_course($id);
     
            if( $imageToDelete !=""){
                 if(file_exists($folderPath.$imageToDelete)){
                     if(unlink($folderPath . $imageToDelete)){
                        $arr['image'] = $imageName;
                        $data = $course->update_course($id,$arr);
                     }
                  }
            }

            $_SESSION['alert_success_course']="d-show";
            $_SESSION['message']="The Course has been successfully deleted.";

            $_SESSION['tableAdmin']="course";

      }else if(isset($_POST['save_teacher'])){
            $teacher = new Teacher();

            $imageName ="";
            $arr_id['row'] = $id = $_SESSION['id'];
            
            $folderPath="../app/views/assets/img/";
    
            $data = $teacher->where($arr_id);
            $row = $data[0];
      
            $imageToDelete = $row->image;

            $teacher->delete($id);
    
            if( $imageToDelete !=""){
                if(file_exists($folderPath.$imageToDelete)){
                    if(unlink($folderPath . $imageToDelete)){
                        $arr['image'] = $imageName;
                        $teacher->update($id,$arr);
                    }
                 }
           }
          
           $_SESSION['alert_success_teacher']="d-show";
           $_SESSION['message']="The teacher has been successfully deleted.";

           $_SESSION['tableAdmin']="teacher";

      }else if(isset($_POST['save_student'])){

            $student = new Student();
            $id = $_SESSION['id'];

            $data = $student->delete($id);

            $_SESSION['alert_success_student']="d-show";
            $_SESSION['message']="The student has been successfully deleted.";
        
            $_SESSION['tableAdmin']="student";
        }

  }

  private function upload(){
      $course = new Course();
      $teacher = new Teacher();
      if(isset($_POST['submit'])){
          
            $target_dir = "../app/views/assets/img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        
            if(isset($_POST["submit"])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

                if($check !== false) {
                    $uploadOk = 1;
                } else {
                  $uploadOk = 0;

                  $_SESSION['alert_unsuccess_course']="d-show";
                  $_SESSION['message']="File is not an image..";
                    
                }
            }
        
          
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $_SESSION['alert_unsuccess_course']="d-show";
                $_SESSION['message']="Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
        
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                  $_SESSION['alert_unsuccess_course']="d-show";
                  $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
            }
        
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                  $_SESSION['alert_unsuccess_course']="d-show";
                  $_SESSION['message']="Sorry, your file was not uploaded.";
                
            // if everything is ok, try to upload file
            } else {
                
                $duplicateImage="";
                $imageName= htmlspecialchars(basename( $_FILES["fileToUpload"]["name"]));
                $arr['image']=  $imageName;
                $image_course = $course->where($arr);
                $image_teacher = $teacher->where($arr);
        
                  if(empty($image_course) && empty($image_teacher)){

                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
               
                          $id =  $_SESSION['id'];
                          date_default_timezone_set('Asia/Manila');
                          $currentDateTime = date('m/d/Y h:ia');
                          $arr_image['image'] = $imageName;
                          $arr_image['date'] =$currentDateTime;
                          $course->update_course($id,$arr_image);


                       } else {

                              $_SESSION['alert_unsuccess_course']="d-show";
                              $_SESSION['message'] = "Sorry, there was an error uploading your file.";
                       }
                }else{
                    $duplicateImage=$imageName;
                }
            }
        
            if($duplicateImage != ""){
                $_SESSION['alert_unsuccess_course']="d-show";
                $_SESSION['message'] = "The file [".$duplicateImage."] already exist!";
            }else{
                  $_SESSION['alert_success_course']="d-show";
                  $_SESSION['message'] = "The file ".htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]))." has been uploaded.";
               
            }

            $_SESSION['tableAdmin']="course";

        }else if(isset($_POST['submit_teacher'])){

 
            $target_dir = "../app/views/assets/img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                  $_SESSION['alert_unsuccess_teacher']="d-show";
                  $_SESSION['message'] = "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
        
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                  $_SESSION['alert_unsuccess_teacher']="d-show";
                  $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              
                $uploadOk = 0;
            }
        
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                  $_SESSION['alert_unsuccess_teacher']="d-show";
                  $_SESSION['message'] = "Sorry, your file was not uploaded.";
              
            // if everything is ok, try to upload file
            } else {

                $duplicateImage="";
                $imageName= htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));

                $arr['image'] = $imageName;

                $course_image = $course->where($arr);
                $teacher_image = $teacher->where($arr);
   
                if(empty($course_image) && empty($teacher_image)){

                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
               
                          $id =  $_SESSION['id'];
                          date_default_timezone_set('Asia/Manila');
                          $currentDateTime = date('m/d/Y h:ia');

                          $arr_image['image'] = $imageName;
                          $arr_image['date'] =$currentDateTime;
                          $teacher->update($id,$arr_image);
                       
                       } else {
                              $_SESSION['alert_unsuccess_teacher']="d-show";
                              $_SESSION['message'] = "Sorry, there was an error uploading your file.";
                       }
                }else{
                    $duplicateImage=$imageName;
                }
            }
        
            if($duplicateImage != ""){
                  $_SESSION['alert_unsuccess_teacher']="d-show";
                  $_SESSION['message'] = "The file ".$duplicateImage." already exist!";
            }else{
                  $_SESSION['alert_success_teacher']="d-show";
                  $_SESSION['message'] = "The file ".htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            }

            $_SESSION['tableAdmin']="teacher";
        }
  }

  private function remove(){
      $folderPath="../app/views/assets/img/";

      if(isset($_POST['course_sched'])){
            $course = new Course();
            $arr_id['id'] = $id  =  $_SESSION['id'];

            $data = $course->where($arr_id);
            $row = $data[0];
            $imageToDelete = $row->image;
  
                if(file_exists($folderPath.$imageToDelete)){
                 
                    if(unlink($folderPath . $imageToDelete)){
                       
                        $arr_image['image']="";
                        $arr_image['date']="";
                        $course->update_course($id,$arr_image);
                        $_SESSION['alert_success_course'] = "d-show";
                        $_SESSION['message'] = "The file ".$imageToDelete." has been removed successfully!";

                    }else{
                        

                        $_SESSION['alert_unsuccess_course'] = "d-show";
                        $_SESSION['message'] = "Something went wrong. Please try again!";
                    }
                
                } 
             
                $_SESSION['tableAdmin']="course";
            
        }else if(isset($_POST['teacher_sched'])){
            $teacher = new Teacher();
            $arr_id['row'] = $id =  $_SESSION['id'];

            $data = $teacher->where($arr_id);
            $row = $data[0];
            $imageToDelete =$row->image;
        
          
                if(file_exists($folderPath.$imageToDelete)){
                    if(unlink($folderPath . $imageToDelete)){
                        $arr_image['image']="";
                        $arr_image['date']="";

                        $teacher->update($id,$arr_image);
                        $_SESSION['alert_success_teacher'] = "d-show";
                        $_SESSION['message'] = "The file ".$imageToDelete." has been removed successfully!";

                    }else{
                        $_SESSION['alert_unsuccess_teacher'] = "d-show";
                        $_SESSION['message'] = "Something went wrong. Please try again!";
                    }
                
                } 

                $_SESSION['tableAdmin']="teacher";
        }

  }


  private function changepassword(){

      $account = new Account();

      if(isset($_POST['updatePass'])){

      

            $oldpass= $_POST['oldpass'];
            $newpass= $_POST['newpass'];
            $repass= $_POST['repass'];

            $data = $account->adminAccount();
            $row = $data[0];

            if($row->password == $oldpass){
        
                if ($this->validatePassword($newpass)) {
                    if($newpass != $repass){
                        $_SESSION['alert_unsuccess_password'] = "show";
                        $_SESSION['message']="Password mismatch. Please make sure the new password and retype password fields match.";
                    }else{
                        $arr['password'] = $newpass;
                        $account->update_account("admin",$arr);
                        $_SESSION['alert_success_password'] = "show";
                        $_SESSION['message']="Password updated. You can now log in using your new password.";

                    }
        
                }else{
                  $_SESSION['alert_unsuccess_password'] = "show";
                  $_SESSION['message']="Password must be 8 or more characters and contain at least 1 number,special character, and uppercase letter.";
                }
            }else{
            
                  $_SESSION['alert_unsuccess_password'] = "show";
                  $_SESSION['message']="Invalid old password. Please enter the correct old password.";

            }

            $_SESSION['tableAdmin']="setting";
 
      }

  }

  private function validatePassword($password) {
      $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/';
  
      if (preg_match($pattern, $password)) {
          return true;
      } else {
          return false; 
      }
  }
  
  private function login(){

      $account = new Account();

      if(isset($_POST['login'])){

            $arr['username'] = $_POST['username'];
            $arr['password'] = $_POST['password'];

            $data = $account->where($arr);
      
            if(empty($data) && $_SESSION['password']==""){
                  $_SESSION['alert']="show";
                  header("location: ".ROOT."/login");

            }else{
                  
                  $_SESSION['password'] = $_POST['password'];

            }
      }
  }
  private function logout(){

      if(isset($_POST['logout'])){
            $_SESSION['alert']="disabled";
            $_SESSION['password'] = "";    
            
            header("Location: ".ROOT."/home");
      }
        
  }
}

