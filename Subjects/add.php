<?php
//include database configuration file
include_once '../Connection.php';
$title = $_POST['title'];
if(!empty($_POST['title']))
{
    
        $sql2 ="SELECT * FROM `subjects` WHERE `title` = '$title'";
        $result12 = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($result12) > 0){
            echo 'هذه البيانات موجودة مسبقا'; 
        }else{

            //insert form data in the database
            $insert = $conn->query("INSERT INTO `subjects`( `title`) 
                                      VALUES ( '$title')");
           echo $insert?'تمت الاضافة بنجاح':'حصل خطأ';
        }

    
} 
else 
{
echo 'يرجى ادخال جميع الحقول';
}

    ?>