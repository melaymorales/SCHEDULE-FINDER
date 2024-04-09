<?php
function show($stuff){
echo '<pre>';
print_r($stuff);
echo "<pre>";
}


function messageBox_insert($data,$message){

    if($data=="true"){
        echo '
        <script> 
            alert("The '.$message.' attempting to register is already exist.");
        </script>
    ';
  }else{
       echo '
       <script> 
           alert("Successfully registered the new '.$message.'.");
       </script>
   ';
  }
}