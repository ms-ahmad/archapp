<?php
//include database configuration file
include_once '../Connection.php';

$event =[];
$photo =[];
$audio =["audio"=>0];
$video =["video"=>0];

   if(isset($_POST['event'])){
        $event+=["event"=>$_POST['event']];
        if (isset($_POST['ea'])) {
                if (isset($_POST['eaeidt'])) {
                    $event+=["a"=>$_POST['eaeidt']]; 
                }
        }
        if (isset($_POST['ek'])) {
                if (isset($_POST['ekeidt'])) {
                    $event+=["k"=>$_POST['ekeidt']];  
                }
        }
        if (isset($_POST['es'])) {
                if (isset($_POST['eseidt'])) {
                    $event+=["s"=>$_POST['eseidt']]; 
                }
        }
   }
   if(isset($_POST['photo'])){
        $photo+=["photo"=>$_POST['photo']];
        if (isset($_POST['pa'])) {
                if (isset($_POST['paeidt'])) {
                    $photo+=["a"=>$_POST['paeidt']]; 
                }
        }
        if (isset($_POST['pk'])) {
                if (isset($_POST['pkeidt'])) {
                    $photo+=["k"=>$_POST['pkeidt']]; 
                }
        }
        if (isset($_POST['ps'])) {
                if (isset($_POST['pseidt'])) {
                    $photo+=["s"=>$_POST['pseidt']]; 
                }
        }
   }
   if(isset($_POST['audio'])){
        $audio["audio"]=1;
        if (isset($_POST['aa'])) {
                if (isset($_POST['aaeidt'])) {
                    $audio+=["a"=>$_POST['aaeidt']]; 
                }
        }
        if (isset($_POST['ak'])) {
                if (isset($_POST['akeidt'])) {
                    $audio+=["k"=>$_POST['akeidt']]; 
                }
        }
        if (isset($_POST['as'])) {
                if (isset($_POST['aseidt'])) {
                    $audio+=["s"=>$_POST['aseidt']]; 
                }
        }
    }



    if(isset($_POST['video'])){
        $video["video"]=1;
        if (isset($_POST['va'])) {
                if (isset($_POST['vaeidt'])) {
                    $video+=["a"=>$_POST['vaeidt']]; 
                }
        }
        if (isset($_POST['vk'])) {
                if (isset($_POST['vkeidt'])) {
                    $video+=["k"=>$_POST['vkeidt']]; 
                }
        }
        if (isset($_POST['vs'])) {
                if (isset($_POST['vseidt'])) {
                    $video+=["s"=>$_POST['vseidt']]; 
                }
        }
    }


echo $addevent= json_encode( $event ); 
echo $addvideo= json_encode( $video ); 
echo $addaudio= json_encode( $audio ); 
echo $addphoto= json_encode( $photo ); 





 $username = $_POST['username'];
$password ="00000";
// $addvideo = $_POST['addvideo'];
// $addevent = $_POST['addevent'];
// $addaudio = $_POST['addaudio'];
// $addphoto = $_POST['addphoto'];


    // echo "<img src='$path' />";
  /*
    //insert form data in the database
    $insert = $conn->query("INSERT INTO `users`(  `UserName`, `password`,  `addevent`) 
                                      VALUES   ('$username',  '$password' , '$addevent' )");
    echo $insert?'تمت الاضافة بنجاح':'حصل خطأ';
  
   */

    ?>