<?php
//include database configuration file
include_once '../Connection.php';

$IdEvent = $_POST['IdEvent'];
$l_Access = $_POST['l_Access'];
$Description = $_POST['Description'];
$KeyWords = $_POST['KeyWords'];
$Category = $_POST['Category'];
$Persons = $_POST['Persons'];

$date_add=date("Y/m/d");



// MP3, WMA, AAC, WAV and FLAC.
    $valid_extensions = array('avi', 'mp4', 'flv', 'wmv', 'mov' ); // valid extensions

    if (!file_exists('../files')) {
        mkdir('../files');
    }
    if (!file_exists('../files/'.$IdEvent)) {
        mkdir('../files/'.$IdEvent);
    }
    if (!file_exists('../files/'.$IdEvent.'/video')) {
        mkdir('../files/'.$IdEvent.'/video');
    }
   
    $path = ('../files/'.$IdEvent.'/video//'); // upload directory
    if(!empty($_POST['IdEvent']) || !empty($_POST['title']) || $_FILES['video'] || $_FILES['subject'])
    {
    $img = $_FILES['video']['name'];
    $tmp = $_FILES['video']['tmp_name'];
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
    $insert = $conn->query("INSERT INTO `video`(`id_events`, `id_Access`, `KeyWords`, `id_Category`, `path`,    `Persons`,   `Description`)
                                        VALUES ('$IdEvent',  '$l_Access','$KeyWords','$Category','$final_image', '$Persons','$Description')");
    echo $insert?'تمت الاضافة بنجاح':'حصل خطأ';
  
    }
    } 
    else 
    {
    echo 'الملف غير صحيح';
    }
    }
    ?>