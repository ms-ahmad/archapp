<?php
//include database configuration file

if ($_POST['username']==null or $_POST['username']=="" ) {
   echo "يجب ادخال اسم المستخدم";
}else{
    $newusername =$_POST['username'];

  
        $newusername= trim($newusername," ");

        if ($newusername==null or $newusername==" " ) {
            echo "يجب ادخال اسم مستخدم صحيح";
        }else{
            include_once '../Connection.php';

            $event =["e"=>1,"a"=>1];
            $photo =["p"=>0];
            $audio =["a"=>0];
            $video =["v"=>0];

            if(isset($_POST['event'])){
                    $event+=["e"=>$_POST['event']];
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
                    $photo+=["p"=>$_POST['photo']];
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
                    $audio["a"]=$_POST['audio'];
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
                    $video["v"]=$_POST['video'];
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


            $addevent= json_encode( $event ); 
            $addvideo= json_encode( $video ); 
            $addaudio= json_encode( $audio ); 
            $addphoto= json_encode( $photo ); 
            $password =md5("00000");
  
               

                //insert form data in the database
                $insert = $conn->query("INSERT INTO `users`(    `UserName` ,    `password`,  `addevent`,    `addvideo`,  `addaudio`,    `addphoto`) 
                                                VALUES   (    '$newusername',    '$password', '$addevent',   '$addvideo' ,'$addaudio'    ,'$addphoto')");
                echo $insert?'تمت الاضافة بنجاح':'حصل خطأ';
    
    }

}
    ?>