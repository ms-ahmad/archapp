<?php
//include database configuration file
include_once '../Connection.php';
 $l_Access = $_POST['l_Access'];
 $date_m = $_POST['date_m'];
 $title = $_POST['title'];
 $date_h = $_POST['date_h'];
 $IdEvent = $_POST['IdEvent'];
 $Category = $_POST['Category'] ;
 $subjectarray= $_POST['subject'];
 $Lecturer = $_POST['Lecturer'];
 $Country = $_POST['Country'];
 $State = $_POST['State'];
 $Area = $_POST['Area'];
 $Point = $_POST['Point'];
 $Persons = $_POST['Persons'];
 $KeyWords = $_POST['KeyWords'];
 $Description = $_POST['Description'];
 $oldimage = $_POST['oldimage'];
 $IdEvent = $_POST['IdEvent'];
 $date_add=date("Y/m/d");
 $subject="";
foreach ($subjectarray as $value)
 {
    $subject .=$value .",";
 }
$subject = rtrim( $subject, ",");
$subjectarray =explode(',',$subject);



    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' ); // valid extensions

    if (!file_exists('../image')) {
        mkdir('../image');
    }
    if (!file_exists('../image/events')) {
        mkdir('../image/events');
    }

    $path = '../image/events/'; // upload directory
    if(!empty($_POST['l_Access']) && !empty($_POST['title']) )
    {
        if (!empty($_FILES['image']['name'][0]))
        {
            unlink('../image/events/'.$oldimage);
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
                    echo "تم رفع الصورة بنجاح....";              
                } else
                {
                echo "خطاء في رفع الصورة";   
                }             
            } else 
            {
                echo 'الملف غير صحيح';
            }
        }else
        {
            $final_image = $oldimage;
        }
    
        
        
        //insert form data in the database
        $sql =("UPDATE `events` SET `id_Access`='$l_Access'
                                ,`id_Category`='$Category'
                                ,`Title`='$title'
                                ,`Date_M`='$date_m'
                                ,`Date_H`='$date_h'
                                ,`Subjects`='$subject'
                                ,`Lecturer`='$Lecturer'
                                ,`Country`='$Country'
                                ,`State`='$State'
                                ,`Area`='$Area'
                                ,`Point`='$Point'
                                ,`Persons`='$Persons'
                                ,`KeyWords`='$KeyWords'
                                ,`Description`='$Description'
                                ,`Is_Not_active`='0'
                                ,`image`='$final_image'
                                WHERE `id`= '$IdEvent'");
                
                if ($conn->query($sql) === TRUE) {
                    echo "تمت التعديلات بنجاح";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
                
    }else{
        echo "يرجى إدخال جميع الحقول اللازمة";
    }            
           
        
        
                                        
                                        
    ?>