<?php
//include database configuration file
include_once '../Connection.php';
echo $IdEvent = $_POST['IdEvent'];
$date_add=date("Y/m/d");

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' ); // valid extensions

    if (!file_exists('../image')) {
        mkdir('../image');
    }
    if (!file_exists('../image/events')) {
        mkdir('../image/events');
    }
    if (!file_exists('../image/events/'.$IdEvent)) {
        mkdir('../image/events/'.$IdEvent);
    }
   
    $path = '../image/events/'.$IdEvent.'/'; // upload directory
    if(!empty($_POST['IdEvent']) || !empty($_POST['title']) || $_FILES['image'] || $_FILES['subject'])
    {
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    // check's valid format
    if(in_array($ext, $valid_extensions)) 
    { 
    $path = $path.strtolower($final_image); 
    if(move_uploaded_file($tmp,$path)) 
    {
    // echo "<img src='$path' />";
  
    //insert form data in the database
    $insert = $conn->query("INSERT INTO `events`( `id_Access`, `id_Category`, `Title`, `Date_M`, `Date_H`, `Subjects`, `Lecturer`, `Country`,   `State`, `Area`, `Point`, `Persons`, `KeyWords`, `Description`, `id_user`, `Date_Add`,  `image`) 
                                      VALUES ( '$IdEvent',  '$Category' , '$title','$date_m','$date_h','$subject', '$Lecturer', '$Country', '$State', '$Area', '$Point', '$Persons', '$KeyWords', '$Description', '11', '$date_add','$final_image')");
    echo $insert?'تمت الاضافة بنجاح':'حصل خطأ';
  
    
    }
    } 
    else 
    {
    echo 'الملف غير صحيح';
    }
    }
    ?>