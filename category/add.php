<?php
//include database configuration file
include_once '../Connection.php';
 $id_parent  = $_POST['id_parent'];
$title = $_POST['title'];

if(!empty($_POST['title'])|| !empty($_POST['id_parent']))
{
    //insert form data in the database
    $insert = $conn->query("INSERT INTO `category`( `title`, `id_parent`) 
                                      VALUES ( '$title',  '$id_parent')");
    echo $insert?'تمت الاضافة بنجاح':'حصل خطأ';

    
} 
else 
{
echo 'يرجى ادخال جميع الحقول';
}

    ?>