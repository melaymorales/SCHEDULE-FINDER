
<?php include 'partials/header.php'; ?>

    <body id="page-top">
    
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Bulacan Polytechnic College</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../app/views/assets/img/logo.png" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#course">Course</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#teacher">Teacher</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#student">Student</a></li>
                    <li class="nav-item "><a class="nav-link js-scroll-trigger" href="#setting">Setting</a></li>
                    <li class="nav-item"><a href="" data-bs-toggle="modal" data-bs-target="#logoutModal" class="nav-link js-scroll-trigger">Logout</a></li>
                </ul>
            </div>
        </nav>
    
        <div class="container-fluid p-0">
            
    <!-- ################################### COURSE ##################################### -->
    <div>       
            <section class="resume-section" id="course" style="padding-top: 30px !important;" >

                <div class="resume-section-content" >
                   
                    <h1 class="mb-0 text-primary">
                        |
                        <span class="text-dark">Course</span>
                    </h1>

                    
                    <div class="subheading">
                        <hr style="border: 1px solid; margin:30px; 0">

                    </div>
                    
                    <div class=" <?php echo $alert_success_course;  ?> alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class=" <?php echo $alert_unsuccess_course;  ?> alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                    <div class="lead mb-5">
                        <div class="row"  >
                            <div class="col-12 col-md-5 " >
                                <div>
                                    <input type="text" class="input-control __border ps-3"  placeholder="Search Course/SHS and Acronym" id="getCourse" oninput="removePTag()" style="font-size:1rem !important;padding:5px !important;width:100%;">
                                </div>
                             </div>


                            <div class="col-12 col-md-7  d-flex">
                            <div class=" ms-auto mt-5 mt-md-0 mb-0 " >

                                    <select id="course_year" class="btn text-primary me-2" style="border:1px solid; font-weight:bold;" >
                                        <option value="">Year</option>
                                        <option value="grade 11">Grade 11</option>
                                        <option value="grade 12">Grade 12</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                    </select>

                                    <button class="btn btn-primary text-white" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal">+ add new</button> 
                                    <button id="btnImport"class="btn btn-primary text-white m-md-2" data-bs-toggle="modal" data-bs-target="#ImportModal">
                                         <i class="fa-solid fa-file-excel"></i> Import
                                    </button>
                                 </div>
                            </div>

                            
                        </div>
                        
                        
       <!-- Modal ADD NEW COURSE-->

        <form method="POST">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="false">
                        
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Course / Strand</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div  class="form-body" >

                                        <div class="mb-3">
                                            <label for="course">
                                                Course / Strand
                                            </label>
                                            <input name="course" type="text" class="form-control" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="year">
                                                Year
                                            </label>
                                            <select name="year" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="grade 11">Grade 11</option>
                                                <option value="grade 12">Grade 12</option>
                                                <option value="1st">1st</option>
                                                <option value="2nd">2nd</option>
                                                <option value="3rd">3rd</option>
                                                <option value="4th">4th</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="acronym">
                                                Acronym
                                            </label>
                                            <input name="acronym" type="text" class="form-control">
                                        </div>

                                        

                                        <div class="mb-3">
                                            <label for="section">
                                                Section
                                            </label>
                                            <input name="section" type="text" class="form-control" required>
                                        </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success" name="AddCourse">Save</button>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                      
                </div>
        </form>

                    <div class="social-icons" style="height: 500px; overflow:scroll; "> 
                        <table id="myTable">

                            <tr>
                                <th class="d-none">id</th>
                                <th>COURSE/STRAND</th>
                                <th>ACRONYM</th>
                                <th class="section-year">YEAR</th>
                                <th class="section-year">SECTION</th>
                                <th>STUDENTS</th>
                                <th>SCHEDULE</th>
                                <th>ACTION</th>
                            </tr>

                          <tbody  id="showdata">

                          <?php 
                            if(!empty($course_data)){
                            foreach($course_data as $row){
                            
                            ?>
                         
                            <tr >
                                <td class="d-none user_id"><?= $row->id ?></td>
                                <td><?= $row->course ?></td>
                                <td><?= $row->acronym ?></td>
                                <td><?= $row->year ?></td>
                                <td><?= $row->section ?></td>
                                <?php 
                                    $student = new Student();
                                    $arr['course'] = $row->acronym;
                                    $arr['year'] = $row->year;
                                    $arr['section'] = $row->section;

                                    $data = $student->where($arr);
                                    $count = (empty($data)) ? "0": count($data);
                                ?>
                                <td><?= $count ?></td>
                                <td>
                                    <?php 
                                   
                                   
                                    $var_btnupload="";
                                    $var_alertupload="";
                                       if( $row->image == ""){
                                        $var_btnupload="show";
                                        $var_alertupload="hidden";
                                       }else{
                                        $var_btnupload="hidden";
                                        $var_alertupload="show";
                                       }
                                    ?>
                                   
                                    <button class="btn bg-success text-white btnUpload" data-bs-toggle="modal" data-bs-target="#UploadModal" <?= $var_btnupload; ?> id="BTNUPLOAD" >+upload</button>
                                   
                                        <div class="alert alert-success alert-dismissible fade show " role="alert" <?= $var_alertupload; ?>> 
                                            <span id="filename" style="font-size:.8rem;"> <?= $row->image; ?></span><br>
                                            <p style="font-size: .5rem"><?= $row->date; ?></p>
                                            <button type="submit" class="btn-close btnRemove"  style="font-size:15px;" name="submit" data-bs-toggle="modal" data-bs-target="#modalConfirmationRemove"></button>
                                        </div>
                                    
                                </td>

                                <td>
                                    <button class="btnEdit" style="padding:2px 5px !important; margin:0 2px !important; border:none; border-radius:5px;
                                    background-color:rgba(14, 239, 14, 0.947); color:white;"> 
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <button style="padding:2px 5px; border:none;border-radius:5px;
                                        background-color:red; color:white;"  data-bs-toggle="modal" data-bs-target="#modalConfirmationDel" class="btnDel"> 
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                 </td>
                            </tr>
                           
                            <?php } }?>  
                     </tbody>

                </table>
                    
                </div>
                
                <div class="my-5" id="page_section" >
                    <p class="text-secondary " >Page</p>
                    <ul class="pagination">
                        <?php
                            if ($current_page_course > 1) {
                                echo "<li class='page-item '><a class='page-link' href='?page=".($current_page_course - 1)."'tabindex='-1' aria-disabled='true'>Previous</a> </li> ";
                            }

                            $start_link = max(1, $current_page_course - 2);
                            $end_link = min($total_pages_course, $start_link + 4);

                            for ($i = $start_link; $i <= $end_link; $i++) {
                                $active_class = ($i == $current_page_course) ? 'active' : '';
                                echo "<li  class='page-item  $active_class'> <a href='?page=$i' class='page-link'>$i</a> </li>";
                            }

                            if ($current_page_course < $total_pages_course) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($current_page_course + 1)."'>Next</a></li>";
                            }
                            ?>
                    </ul>
                </div>
            </div>


        </section>                  
        <hr class="m-0" />

    </div>    
    
    <div>
        <!-- ################################### TEACHER ##################################### -->

            <section class="resume-section mt-0 " style="padding-top: 30px !important;" id="teacher">
                <div class="resume-section-content mt-0 ">
                    <h1 class="mb-0 text-primary">
                        |
                        <span class="text-dark">Teacher</span>
                    </h1>

                    <div class="subheading ">
                      <hr style="border: 1px solid; margin:30px; 0">
                    </div>

                    <div class=" <?php echo $alert_success_teacher;  ?> alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class=" <?php echo $alert_unsuccess_teacher;  ?> alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="lead mb-5">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div>
                                    
                                    <input type="text" class="input-control __border ps-3"  placeholder=" Search ID, Firstname, Lastname" id="getTeacher" oninput="removePTag_teacher()" style="font-size:1rem !important;padding:5px !important;width:90%;">
                                   
                                </div>
                             </div>
                            <div class="col-12 col-md-6  d-flex">
                                <div class="ms-md-auto me-md-4 mt-5 mt-md-0 mb-0" >
                                    <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#teachermodal">+ add new</button>
                                    <button class="btn btn-primary text-white m-md-2" data-bs-toggle="modal" data-bs-target="#ImportModal_teacher">
                                         <i class="fa-solid fa-file-excel"></i> Import
                                    </button>
                                 </div>
                            </div>
                        </div>
                    

  
                    <!-- Modal for Teacher-->

                    <form method="POST">
                        <div class="modal fade" id="teachermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Register New Teacher</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="ID">
                                                ID
                                            </label>
                                            <input name="id" type="text" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="firstname">
                                            Firstname
                                            </label>
                                            <input name="firstname" type="text" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="lastname">
                                                Lastname
                                            </label>
                                            <input name="lastname" type="text" class="form-control" required>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit"  class="btn btn-success" name="AddTeacher">Save</button>
                                    </div>


                            </div>
                        </div>

                    </form>
                   
                    </div>
                      
                    </div>

                    <div class="social-icons" style="height: 500px; overflow:scroll; "> 
                        

                        <table >

                            <tr>
                               
                                <th>ID</th>
                                <th>FRISTNAME</th>
                                <th class="section-year">LASTNAME</th>
                                <th>SCHEDULE</th>
                                <th>ACTION</th>
                            </tr>

                            <tbody  id="showdata_teacher">
                            
                            <?php 
                            if(!empty($teacher_data)){
                                foreach($teacher_data as $row){
                             ?>

                            <tr>
                                <td class=" d-none user_id_teacher" ><?= $row->row ?></td>
                                <td ><?= $row->id ?></td>
                                <td><?= $row->firstname ?></td>
                                <td ><?= $row->lastname ?></td>
                                
                                <td>
                                    
                                <?php 
                                   
                                   
                                   $var_btnupload="";
                                   $var_alertupload="";
                                      if($row->image == ""){
                                       $var_btnupload="show";
                                       $var_alertupload="hidden";
                                      }else{
                                       $var_btnupload="hidden";
                                       $var_alertupload="show";
                                      }
                                   ?>
                                  
                                   <button class="btn bg-success text-white btnUpload_teacher" data-bs-toggle="modal" data-bs-target="#UploadModal_teacher" <?= $var_btnupload; ?> id="BTNUPLOAD" >+upload</button>
                                  
                                       <div class="alert alert-success alert-dismissible fade show " role="alert" <?= $var_alertupload; ?>> 
                                           <span id="filename" style="font-size:.8rem;"> <?= $row->image; ?></span><br>
                                           <p style="font-size: .5rem"><?=  $row->date; ?></p>
                                           <button type="submit" class="btn-close btnRemove_teacher"  style="font-size:15px;" name="submit" data-bs-toggle="modal" data-bs-target="#modalConfirmationRemove_teacher"></button>
                                       </div>
                                <td>
                                   
                                    <button class="_EditTeacher mx-auto" style="padding:2px 5px; margin:0 2px; border:none; border-radius:5px;
                                    background-color:rgba(14, 239, 14, 0.947); color:white;"> 
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <button class="mx-auto btnDel_teacher" style="padding:2px 5px; border:none;border-radius:5px;
                                        background-color:red; color:white;" class="btnDel_teacher"  data-bs-toggle="modal" data-bs-target="#modalConfirmationDel_teacher" > 
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                   
                                 </td>
                            </tr>

                            <?php } }?>
                           
                        </tbody>

                           
                        </table>
                           
                            </div>
                    <div class="my-5" id="page_section_teacher">
                        
                        <p class="text-secondary " >Page</p>
                        <ul class="pagination">
                            <?php
                                if ($current_page_teacher > 1) {
                                    echo "<li class='page-item '><a class='page-link' href='?page_teacher=".($current_page_teacher - 1)."'tabindex='-1' aria-disabled='true'>Previous</a> </li> ";
                                }

                                $start_link_teacher= max(1, $current_page_teacher - 2);
                                $end_link_teacher = min($total_pages_teacher, $start_link_teacher + 4);

                                for ($i = $start_link_teacher; $i <= $end_link_teacher; $i++) {
                                    $active_class_teacher = ($i == $current_page_teacher) ? 'active' : '';
                                    echo "<li  class='page-item  $active_class_teacher'> <a href='?page_teacher=$i' class='page-link'>$i</a> </li>";
                                }

                                if ($current_page_teacher < $total_pages_teacher) {
                                    echo "<li class='page-item'><a class='page-link' href='?page_teacher=".($current_page_teacher + 1)."'>Next</a></li>";
                                }
                                ?>
                         </ul>
                          
                    </div>
                </div>
            </section>

            <hr class="m-0" />
    </div>

  <!-- ################################### STUDENT ##################################### -->
    <div>      
       
            <section class="resume-section" id="student" style="padding-top: 30px !important;" >
                <div class="resume-section-content">
                    <h1 class="mb-0 text-primary">
                        |
                        <span class="text-dark">STUDENT</span>
                    </h1>
                    <div class="subheading ">
                
                        <hr style="border: 1px solid; margin:30px; 0">
                    </div>

                    <div class=" <?php echo $alert_success_student;  ?> alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class=" <?php echo $alert_unsuccess_student;  ?> alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="lead mb-5">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div>
                                   
                                    <div>
                                        <input type="text" class="input-control __border ps-3"  placeholder=" Search ID, Firstname, Lastname, Course" id="getStudent" style="font-size:1rem !important;padding:5px !important;width:100%;" oninput="removePTag_student()">
                                    </div>
                                   
                                </div>
                             </div>
                            <div class="col-12 col-md-7  d-flex">
                                <div class="ms-md-auto me-md-4 mt-5 mt-md-0 mb-0 " >

                                <select id="student_year" class="btn text-primary me-2 " style="border:1px solid; font-weight:bold;" >
                                        <option value="">Year</option>
                                        <option value="grade 11">Grade 11</option>
                                        <option value="grade 12">Grade 12</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                    </select>

                                    <select id="student_section" class="btn text-primary me-2" style="border:1px solid; font-weight:bold;text-align:left;" >
                                        <option value="">Section</option>
                                        <?php 

                                            $section=array();

                                            foreach($allCourse as $row){

                                                 if (!in_array($row->section,$section)){
                                                    $section[]=$row->section;
                                                     echo ' <option value="'.$row->section.'">'.$row->section.'</option>';
                                                 }
                                             }
                                        ?>
                                        
                                    </select>
                                    <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#Modal_student">+ add new</button>
                                    <button class="btn btn-primary text-white"data-bs-toggle="modal" data-bs-target="#ImportModal_student">
                                    <i class="fa-solid fa-file-excel"></i> import</button>
                                 </div>
                            </div>
                        </div>
                        
                   
                    
                    <!-- Button trigger modal -->

  
                    <!-- Modal -->
                <form  method="POST">
                    <div class="modal fade" id="Modal_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                             <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="id" style="font-size: 1rem !important;" >
                                                ID
                                            </label>
                                            <input name="id" type="text" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="firstname" style="font-size: 1rem !important;">
                                            Firstname
                                            </label>
                                            <input name="firstname" type="text" class="form-control" required >
                                        </div>

                                        <div class="mb-3">
                                            <label for="lastname" style="font-size: 1rem !important;">
                                                Lastname
                                            </label>
                                            <input name="lastname" type="text" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="course" style="font-size: 1rem !important;">
                                                Course
                                            </label>
                                            <select name="course" class="form-control"   required>
                                            <option value="">Select</option>

                                            <?php 
                                                $Active_course=array();
                                              //  $course = new Course();

                                              //  $data = $course->findAll();

                                              foreach($allCourse as $row){
                                                if(!in_array($row->acronym, $Active_course)){
                                                    $Active_course[]=$row->acronym;
                                                    echo ' <option value="'.$row->acronym.'">'.$row->acronym.'</option>';
                                                }
                                              }
                                              
                                            //   for($x=0; $x<count($data);$x++){
                                            //     $row = $data[$x];
                                            //     if(!in_array($row->acronym, $Active_course)){
                                            //         $Active_course[]=$row->acronym;
                                            //         echo ' <option value="'.$row->acronym.'">'.$row->acronym.'</option>';
                                            //     }
                                            //   }
                                            

                                           //     show($data);



                                            //     $course_combobox= "SELECT * FROM `course-shs-tbl`";
                                            //     $course_result = mysqli_query($con,$course_combobox);

                                            // while($row_course= mysqli_fetch_array( $course_result)){
                                            //     if (!in_array($row_course['acronym'],$course)){
                                            //         $course[]=$row_course['acronym'];
                                            //         echo ' <option value="'.$row_course['acronym'].'">'.$row_course['acronym'].'</option>';
                                            //     }
                                            
                                          //  }
                                            
                                            ?>
                                            </select>
                                            <!-- <input name="course" type="text" class="form-control" required> -->
                                        </div>

                                        <div class="mb-3">
                                            <label for="year" style="font-size: 1rem !important;">
                                                Year
                                            </label>
                                            <select name="year" class="form-control" required>
                                                    <option value="">Select</option>
                                                    <option value="grade 11">Grade 11</option>
                                                    <option value="grade 12">Grade 12</option>
                                                    <option value="1st">1st</option>
                                                    <option value="2nd">2nd</option>
                                                    <option value="3rd">3rd</option>
                                                    <option value="4th">4th</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="course" style="font-size: 1rem !important;">
                                                Section
                                            </label>
                                            <select name="section" class="form-control" required>
                                            <option value="">Select</option>
                                            <?php 
                                                 $Active_section=array();

                                                //  $course = new Course();

                                                //  $data = $course->findAll();

                                                foreach($allCourse as $row){
                                                    if(!in_array($row->section, $Active_section)){
                                                        $Active_section[]= $row->section;
                                                        echo ' <option value="'.$row->section.'">'.$row->section.'</option>';
                                                    }
                                                }
                                            
                                            ?>
                                            </select>
                                        </div>
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success" name="AddStudent">Save</button>
                                </div>
                             </div>
                        </div>
                    </div>
                </form>
                      
                </div>

                    <div class="social-icons" style="height: 500px; overflow:scroll; "> 
                   

                        <table>

                            <tr>
                                <th class="d-none">id</th>
                                <th>ID</th>
                                <th>FIRSTNAME</th>
                                <th class="section-year">LASTNAME</th>
                                <th class="section-year">COURSE</th>
                                <th>YEAR</th>
                                <th>SECTION</th>
                                <th>ACTION</th>
                            </tr>

                            <tbody  id="showdata_student">
                            
                            <?php
                                if(!empty($student_data)){
                                foreach($student_data as $row){
                            // while($student_row= mysqli_fetch_array($student_result)){ ?>
                            <tr>
                                    <td class="d-none user_id_student"><?= $row->row ?></td>
                                    <td><?= $row->id ?></td>
                                    <td><?= $row->firstname ?></td>
                                    <td><?= $row->lastname ?></td>
                                    <td><?= $row->course ?></td>
                                    <td><?= $row->year ?></td>
                                    <td><?= $row->section ?></td>

                                    <td>
                                        <button class="_EditStudent mx-auto" style="padding:2px 5px; margin:0 2px; border:none; border-radius:5px;
                                        background-color:rgba(14, 239, 14, 0.947); color:white;"> 
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <button class="btnDel_student" style="padding:2px 5px; border:none;border-radius:5px;
                                            background-color:red; color:white;"  data-bs-toggle="modal" data-bs-target="#modalConfirmationDel_student" > 
                                                <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                            </tr>
                            <?php } }?>
                            </tbody>

                        </table>
                           
                    </div>
                    <div class="my-5" id="page_section_student">
                        <p class="text-secondary ">Page</p>
                        <ul class="pagination">
                            <?php
                                if ($current_page_student > 1) {
                                    echo "<li class='page-item '><a class='page-link' href='?page_student=".($current_page_student - 1)."'tabindex='-1' aria-disabled='true'>Previous</a> </li> ";
                                }

                                $start_link_student= max(1, $current_page_student - 2);
                                $end_link_student = min($total_pages_student, $start_link_student + 4);

                                for ($i = $start_link_student; $i <= $end_link_student; $i++) {
                                    $active_class_student = ($i == $current_page_student) ? 'active' : '';
                                    echo "<li  class='page-item  $active_class_student'> <a href='?page_student=$i' class='page-link'>$i</a> </li>";
                                }

                                if ($current_page_student < $total_pages_student) {
                                    echo "<li class='page-item'><a class='page-link' href='?page_student=".($current_page_student + 1)."'>Next</a></li>";
                                }
                                ?>
                         </ul>
                    </div>
                </div>
            </section>

            <hr class="m-0" />

    </div> 
    <div>

  
        <form  method="POST">
                            

      


            <section class="resume-section " id="setting" >

           

                <div class="resume-section-content " >
                    <h1 class="mb-0 text-primary" style="font-size: 5em;">
                        |
                        <span class="text-dark">CHANGE PASSWORD</span>
                    </h1>

                <div class=" <?php echo $alert_success_password;  ?> alert alert-success alert-dismissible fade show mt-5" role="alert">
                    <?php echo $message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <div class=" <?php echo $alert_unsuccess_password;  ?> alert alert-danger alert-dismissible fade show mt-5" role="alert">
                    <?php echo $message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                    <div class="form-body  mt-5" >
                        <div class="mb-5">
                            <label for="">Old Password</label>
                            <input type="password" class="form-control" placeholder="" name="oldpass">
                        </div>
                       
                        <div class="mb-5">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" placeholder="" name="newpass">
                        </div>

                        <div class="mb-3">
                            <label for="">Re-type New Password</label>
                            <input type="password" class="form-control" placeholder="" name="repass">
                        </div>
                            

                        <div style="width: 30%; " class="mx-auto mt-0">
                            <input type="submit" name="updatePass" class="form-control bg-primary text-white p-2 mt-5" value="UPDATE">
                        </div>
                   
                        </div>
                    </div>
               
           </section>
           </form>

            <hr class="m-0" /> 
           
        </div>
    </div>
 

    </body>
    
   
    <?php include '../app/views/modals.php'; ?>
    <?php include 'partials/footer.php'; ?>
    
    <?php include '../app/views/ajax/search.php'; ?>
    <?php include '../app/views/ajax/edit.php'; ?>

    <?php include '../app/views/ajax/delete.php'; ?>
    <?php include '../app/views/ajax/upload.php'; ?>
    <?php include '../app/views/ajax/remove.php'; ?>

    <?php include '../app/views/ajax/retrieveData.php'; ?>
    <?php focusTable($tableAdmin) ?>

    





