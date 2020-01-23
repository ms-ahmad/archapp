<?php 
include_once('../Connection.php');
include_once('../getrequset.php');




?>

<html>
<head>


</head>
<body dir="rtl">
    <?php

    



        $sql = "SELECT photo.*,access.title accessname, events.Title eventtitel, events.Date_M edatem, events.Lecturer lectuer, category.title categoryname 
        FROM photo LEFT JOIN access ON photo.id_Access=access.id LEFT JOIN events ON events.id=photo.id_events
         LEFT JOIN category ON photo.id_Category=category.id WHERE 
          photo.Persons LIKE '%$person_ser%' 
          AND photo.KeyWords LIKE '%$keyword%'
          AND photo.id_Category LIKE '%$Category%'
          AND photo.id_Access LIKE '%$l_Access%'
          AND photo.Description LIKE '%$Description%'
          
           ";
        

        $result_join = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result_join) > 0) {
            ?>
            <form id="formphoto" >
                <div class="form-group row" style="padding-right: 25px;">
                   <?php
        while($row = mysqli_fetch_array($result_join)){
         
            $personlink ="";
            $subjectarray =explode('،',$row['Persons']);
            foreach ($subjectarray as $value) {
              $value= trim( $value, " ");

                $personlink .= '<a href="'.$searchUrl.'person_ser='.$value.'">'.$value.'</a> -';
            
            }
            /////////////////////////////////////////////////////////////
           
            $keywordlink ="";
            $keywordarray =explode('،',$row['KeyWords']);
            foreach ($keywordarray as $keyword) {
              $keyword= trim( $keyword, " ");

                $keywordlink .= '<a href="'.$searchUrl.'keyword='.$keyword.'">'.$keyword.'</a> -';
            
            }
            ?>
  


          
            <div class="form-group row  col-lg-4 col-md-6 col-sm-6" >
                <div class="form-group row col-sm-6 imgdiv " style="text-align: center;">
                   <a target="_blank" style="border: none;" href="../files/<?php echo $row["id_events"]; ?>/photo//<?php echo $row["path"]; ?>"> <img class="img-thumbnail thumbnail" style="width:100%; height: 100%" src="../files/<?php echo $row["id_events"]; ?>/photo//<?php echo $row["path"]; ?>" ></a>
                </div>  
                <div class="form-group row col-sm-6 div_info_imag ">
     
                    <div  style=" width: 100%;">
                         الحدث : <?php echo $row["eventtitel"]; ?> 
                    </div> 
                    <div  style=" width: 100%;">
                         التاريخ : <?php echo $row["edatem"]; ?> 
                    </div> 
                    <div  style=" width: 100%;">
                         المحاضر : <?php echo $row["lectuer"]; ?> 
                    </div> 
                    <div  style=" width: 100%;">
                         توضيحات : <?php echo $row["Description"]; ?> 
                    </div> 
                     <div  style=" width: 100%;"> 
                        الوصول : <?php echo $row["accessname"]; ?> 
                    </div>
                     <div  style=" width: 100%;">
                         المجموعة : <?php echo $row["categoryname"]; ?> 
                    </div>
                     <div  style=" width: 100%;">
    
                   الكلمات المفتاحية : <?php echo " <strong> ". $keywordlink." </strong> "; ?>
                    </div>
                    <div  style=" width: 100%; ">
                        الأشخاص :<?php echo " <strong> ". $personlink." </strong> "; ?>
                    </div>
                 
                 </div>  
           
             </div>  
             
             <?php
        }
        echo ' </div>  ';
        echo ' </form>';


}else{
 echo '<div class="alert alert-danger" style="width: 100%; text-align: center;" role="alert">لا يوجد اي صورة لهذا الحدث</div>'; 

}
        
        mysqli_close($conn);
    ?>

</body>
</html>