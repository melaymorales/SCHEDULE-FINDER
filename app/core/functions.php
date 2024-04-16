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

?>