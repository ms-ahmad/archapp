<?php
include_once('../Connection.php');
$eventId= $_GET['id'];

$i = 0;
  



     
     
     $sql_join = "SELECT video.*,access.title accessname,category.title categoryname FROM video LEFT JOIN access ON video.id_Access=access.id  LEFT JOIN category ON video.id_Category=category.id WHERE video.id_events='$eventId'";
     $result_join = mysqli_query($conn, $sql_join);
     if (mysqli_num_rows($result_join) > 0) {
        ?>
        <table class="table table-striped bg-light text-center ">
            <thead>
                <tr class="text-muted">
                    <th>ت </th>
                    <th>الوصول</th>
                    <th>المجموعة</th>
                    <th>الكلمات المفتاحية</th>
                    <th style="width: 50%">الملف</th>
                       
                  
        
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result_join)) {
                
	 
            $i++;
            echo '<tr title="'.$row["Description"].'">';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $row["accessname"] . '</td>';
            echo '<td>' . $row["categoryname"] . '</td>';
            echo '<td>' . $row["KeyWords"] . '</td>';
            echo '<td>' ;
            echo '<video width="280" height="210" controls>    
            
            <source src="../files/'.$eventId.'/video/'. $row["path"] .'" type="video/mp4">
         المتصفح لا يدعم 
          </video>';
        
            echo '</td>';
            echo '</tr">';
            }
        }else{
            echo '<div class="alert alert-danger" style="width: 100%; text-align: center;" role="alert">لا يوجد اي فيديو لهذا الحدث</div>'; 
        
        }
?>