<?php
session_start();
class Home extends Controller
{
    public function index()
    {
     
         if(isset($_POST['submit'])){
            $arr['id'] = $_POST['id'];
       
            $student = new Student();
            $course = new Course();
            $teacher = new Teacher();

            $data = $student->where($arr);

            if($data){
                $row = $data[0];
                $arr_student['acronym'] = $row->course;
                $arr_student['section'] = $row->section;
                $arr_student['year'] = $row->year;
                $data = $course->where($arr_student);
            }else{
                $data = $teacher->where($arr);
            }

            $this->viewData($data);
            

        }

        if(isset($_POST['downloadBtn'])) {
   
            $file = 'assets/img/'.$_SESSION['image_schedule'];
         
         
             if(file_exists($file)) {
                 header('Content-Description: File Transfer');
                 header('Content-Type: application/octet-stream');
                 header('Content-Disposition: attachment; filename="'.basename($file).'"');
                 header('Content-Transfer-Encoding: binary');
                 header('Expires: 0');
                 header('Cache-Control: must-revalidate');
                 header('Pragma: public');
                 header('Content-Length: ' . filesize($file));
                 ob_clean();
                 flush();
                 readfile($file);
                 exit;
             } else {
                messageBox("File not found!");
              //   echo "File not found.";
             }
         }

         $this->view('home');
    }

    private function viewData($data){

        if($data){
            $row = $data[0];
            if($row->image != "" ){
                $_SESSION['schedule'] = "d-show";
                $_SESSION['image_schedule']="sample.jpg";
            }else{
                messageBox("Your Schedule is not available!");
                $_SESSION['schedule'] = "d-none";
            }

        }else{
            $_SESSION['schedule'] = "d-none";
        }
    }
}