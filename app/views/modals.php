<!-- EDIT MODAL -->
<form  method="POST">
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
         <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Course / Strand</h5>
                </div>
                <div class="modal-body">

                     <div class="view_user_data">
                      
                     </div>
                                
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-success" name="bntUP-Course">update</button>
                </div>
                        
             </div>
        </div>  
    </div>
</form>

<form method="POST">
    <div class="modal fade" id="modalTeacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
                </div>

                <div class="modal-body">

                     <div class="view_user_data"></div>
                                
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                     <button type="submit" class="btn btn-success" name="bntUP_teacher">update</button>
                 </div>
                             
             </div>
         </div>  
    </div>
</form>

<form  method="POST">
    <div class="modal fade" id="modalStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                </div>
                <div class="modal-body">

                   <div class="view_user_data"></div>
                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-success" name="bntUP_student">update</button>
                </div>      
                         
           </div>
        </div>  
    </div>
</form>

<!-- MODAL FOR IMPORT -->

<form  method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="ImportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                </div>
                <div class="modal-body">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="import" id="inlineRadio1" value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">New Course</label>
                        </div>
                        <br><br>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="import" id="inlineRadio2" value="option2" >
                                <label class="form-check-label" for="inlineRadio2">Upload Schedule</label>
                        </div> <br><br>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="import" id="inlineRadio3" value="option3" >
                                <label class="form-check-label" for="inlineRadio2">Delete Courses</label>
                        </div> <br><br>
                       
                    
                    <input type="file" class="form-control" id="import_file" name="import_file" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  required>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-success" name="import_course">submit</button>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</form>

<form  method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="ImportModal_teacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                </div>
                <div class="modal-body">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="import" id="inlineRadio1" value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">New Teacher</label>
                        </div> <br><br>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="import" id="inlineRadio2" value="option2" >
                                <label class="form-check-label" for="inlineRadio2">Upload Schedule</label>
                        </div> <br><br>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="import" id="inlineRadio3" value="option3" >
                                <label class="form-check-label" for="inlineRadio3">Delete Teacher</label>
                        </div> <br><br>
                    
                    <input type="file" class="form-control" id="import_file_teacher" name="import_file" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  required>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-success" name="import_teacher">submit</button>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</form>

<form  method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="ImportModal_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">IMPORT STUDENT</h5>
                </div>
                <div class="modal-body">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="import" id="inlineRadio1" value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">New Students</label>
                        </div> 
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="import" id="inlineRadio2" value="option2" >
                                <label class="form-check-label" for="inlineRadio2">Delete Students</label>
                        </div> <br><br>
                    
                    <input type="file" class="form-control" id="import_file_student" name="import_file" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  required>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-success" name="import_student">submit</button>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL FOR DELETE -->

<form  method="POST">

    <div class="modal fade" id="modalConfirmationDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Course / Strand</h5>
                </div>
                <div class="modal-body">

                    <div  class="form-body" >
                            <p>Are you sure you want to delete? </p>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success" name="save">Yes</button>
                </div>
            </div>
        </div>
    
    </div>
</form>

<form  method="POST">

    <div class="modal fade" id="modalConfirmationDel_teacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Teacher</h5>
                </div>
                <div class="modal-body">
            
                    <div  class="form-body" >
                            <p>Are you sure you want to delete? </p>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success" name="save_teacher">Yes</button>
                </div>
            </div>
        </div>
    
    </div>

</form>

<form  method="POST">

    <div class="modal fade" id="modalConfirmationDel_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Teacher</h5>
                </div>
                <div class="modal-body">
            
                    <div  class="form-body" >
                            <p>Are you sure you want to delete? </p>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success" name="save_student">Yes</button>
                </div>
            </div>
        </div>

    </div>
    
</form>


<!-- UPLOAD SCHEDULE -->

<form method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="UploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Course Schedule</h5>
                        
                </div>
                <div class="modal-body">
                        <p class="">Only JPG, JPEG, PNG & GIF files are allowed.</p>
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*"  required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-success" name="submit">submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="UploadModal_teacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Teacher Schedule</h5>
                        
                </div>
                <div class="modal-body">
                        <p class="">Only JPG, JPEG, PNG & GIF files are allowed.</p>
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*"  required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-success" name="submit_teacher">submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- CONFIRMATION OF DELETING SCHED -->

<form  method="POST">

    <div class="modal fade" id="modalConfirmationRemove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">REMOVE SCHEDULE</h5>
                </div>
                <div class="modal-body">

                    <div  class="form-body" >
                            <p>Are you sure you want to remove? </p>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success" name="course_sched">Yes</button>
                </div>
            </div>
        </div>
    
    </div>
</form>

<form method="POST">

    <div class="modal fade" id="modalConfirmationRemove_teacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">REMOVE SCHEDULE</h5>
                </div>
                <div class="modal-body">

                    <div  class="form-body" >
                            <p>Are you sure you want to remove? </p>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success" name="teacher_sched">Yes</button>
                </div>
            </div>
        </div>

    </div>
    
</form>


<!-- PREVIEW -->

<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">File Preview</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p class="lead" style="font-size:1rem;">Here is a sample preview of the course upload. Make sure the file is correct to avoid inputting incorrect data.
                </p>
                <div class="table-responsive">
                    <table id="previewTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th id="c1">Course/SHS</th>
                                <th id="c2">ACRONYM</th>
                                <th id="c3">YEAR</th>
                                <th id="c4">SECTION</th>
                                <th id="image">IMAGE PATH</th>
                                <th id="c5"></th>
                            </tr>
                        </thead>
                        <tbody id="previewRows" ></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</div>

<!-- DELETE IMPORT -->

<form  method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="course_delete_import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bulk Delete Course</h5>
                </div>
                <div class="modal-body">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="import" id="inlineRadio1" value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">New Course</label>
                        </div>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="import" id="inlineRadio2" value="option2" >
                                <label class="form-check-label" for="inlineRadio2">Upload Schedule</label>
                        </div> <br><br>
                       
                    
                    <input type="file" class="form-control" id="import_file" name="import_file" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  required>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-success" name="import_course_delete">submit</button>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</form>


<!--logout -->

<form method="POST">
    <div class="modal fade " id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                </div>
                <div class="modal-body">

                    <div  class="form-body" >
                            <p>Are you sure you want to Logout? </p>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success" name="logout">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>




