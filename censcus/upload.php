<?php
function uploadFile($file_array)
{
    
    
    $i="-copy";
    $path="./files/";
    foreach($file_array as $file){
        
    $file_name=$file["name"];
    $full_path=$path.$file_name;  
    $file_type=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

    if (file_exists($full_path)) {
       return 1;
      }
      if ($file["size"] > 15000000) {
        echo "too much";
        return 0;
      }
    else 
    {
        if(move_uploaded_file($file["tmp_name"], $full_path)){
            echo "$full_path";
        
    }
        else {
        echo "smt wrong";
        return 0;
    
    }
    
    }
 }
return 1;
}
?>