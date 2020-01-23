<?php
//include database configuration file
include_once '../Connection.php';
 $l_Access = $_POST['l_Access'];
$Category = $_POST['Category'];
$title = $_POST['title'];
$date_m = $_POST['date_m'];
$date_h = $_POST['date_h'];
$subjectarray= $_POST['subject'];
$Lecturer = $_POST['Lecturer'];
$Country = $_POST['Country'];
$State = $_POST['State'];
$Area = $_POST['Area'];
$Point = $_POST['Point'];
$Persons = $_POST['Persons'];
$KeyWords = $_POST['KeyWords'];
$Description = $_POST['Description'];
$date_add=date("Y/m/d");
$subject="";
foreach ($subjectarray as $value) {
    $subject .=$value .",";
}
$subject = rtrim( $subject, ",");
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' ); // valid extensions

    if (!file_exists('../image')) {
        mkdir('../image');
    }
    if (!file_exists('../image/events')) {
        mkdir('../image/events');
    }

   


    $path = '../image/events/'; // upload directory
    if(!empty($_POST['l_Access']) || !empty($_POST['title']) || $_FILES['image'] || $_FILES['subject'])
    {
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(100,1000).$img;
    // check's valid format
    if(in_array($ext, $valid_extensions)) 
    { 
    $path = $path.strtolower($final_image); 
    if(move_uploaded_file($tmp,$path)) 
    {
    // echo "<img src='$path' />";
  
    //insert form data in the database
    $insert = $conn->query("INSERT INTO `events`( `id_Access`, `id_Category`, `Title`, `Date_M`, `Date_H`, `Subjects`, `Lecturer`, `Country`,   `State`, `Area`, `Point`, `Persons`, `KeyWords`, `Description`, `id_user`, `Date_Add`,  `image`) 
                                      VALUES ( '$l_Access',  '$Category' , '$title','$date_m','$date_h','$subject', '$Lecturer', '$Country', '$State', '$Area', '$Point', '$Persons', '$KeyWords', '$Description', '11', '$date_add','$final_image')");
    echo $insert?'تمت الاضافة بنجاح':'حصل خطأ';
  
    
    }
    } 
    else 
    {
    echo 'الملف غير صحيح';
    }
    }
    ?>