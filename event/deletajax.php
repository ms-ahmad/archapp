<?php
//include database configuration file
include_once '../Connection.php';

  $IdEvent = $_POST['IdEvent']; 
    if ($IdEvent==null) {
        header("Location: index.php");
    }      
        //insert form data in the database
        $sql =("UPDATE `events` SET `Is_Not_active`='1' WHERE `id`= '$IdEvent'");
                
                if ($conn->query($sql) === TRUE) {
                    echo '<div class="alert alert-danger" role="alert">تم الحذف بنجاح </div>'; 
                    // header("Location: index.php");
                 
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
           
             
                                   
?>