<?php
function show($stuff){
echo '<pre>';
print_r($stuff);
echo "<pre>";
}


function focusTable($tableAdmin){

   if($tableAdmin == "course"){ ?>

    <script>
         var table = document.getElementById("myTable");
         table.scrollIntoView({ behavior: 'smooth', block: 'start' });
    <script>
  
  <?php } else if($tableAdmin == "teacher"){?>

    <script>
        var table = document.getElementById("teacher");
        table.scrollIntoView({ behavior: 'smooth', block: 'start' });
    </script>
    
   <?php }else if($tableAdmin == "student"){ ?>

    <script>
        var table = document.getElementById("student");
        table.scrollIntoView({ behavior: 'smooth', block: 'start' });
    </script>
   

   <?php }else if($tableAdmin == "setting"){?>

    <script>
        var table = document.getElementById("setting");
        table.scrollIntoView({ behavior: 'smooth', block: 'start' });
    </script>

   <?php } 

}

function pagination($selectTag){

    if($selectTag == "course"){ ?>

         <script>
            var selectedValue = document.getElementById("course_year").value;
            var paragraph = document.getElementById('page_section');

            if (selectedValue !== '') {
                paragraph.style.display = 'none';
            } else {
                paragraph.style.display = 'block';
            }
                    
        </script>
   <?php }else if($selectTag == "student"){?>
        <script>
            var inputText = document.getElementById('getStudent').value;
            var selectedYear = document.getElementById("student_year").value;
            var selectedSection= document.getElementById("student_section").value;
            var paragraph = document.getElementById('page_section_student');

            if (inputText.trim() !== '' && selectedYear !== '' && selectedSection !== '' ) {
                paragraph.style.display = 'none';
            } else {
                paragraph.style.display = 'block';
            }
        </script>
   <?php }

}

?>