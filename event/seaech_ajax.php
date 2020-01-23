<?php
// (1) CONNECT DATABASE
// ! CHANGE THESE TO YOUR OWN !
$person_ser=$_GET['person_ser'];
define('DB_CHARSET', 'utf8');

try {
    $pdo = new PDO(
        "mysql:host=" . $servername . ";charset=" . DB_CHARSET . ";dbname=" . $dbname,
        $username, $password, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false ]
      );
} catch (Exception $ex) {
  die($ex->getMessage());
}

// (2) SEARCH

 
$sqlsubj ="SELECT * FROM `Subjects` ";

$sql_join = "SELECT events.*,access.title accessname,category.title categoryname FROM events LEFT JOIN access ON events.id_Access=access.id  LEFT JOIN category ON events.id_Category=category.id WHERE Is_Not_active='0'";
$result_join = mysqli_query($conn, $sql_join);
if (mysqli_num_rows($result_join) > 0) {
    while ($row = mysqli_fetch_assoc($result_join)) {
        $subj="";      
        $subj1="";      
        
        $subj = rtrim($row["Subjects"], ",");
        $subjectarray =explode(',',$subj);
          foreach ($subjectarray as $value) {
      
              $resultsubj = mysqli_query($conn, $sqlsubj);
              while ($rowsubj = mysqli_fetch_assoc($resultsubj)) {
                  if ($rowsubj['id']==$value) {
                      $subj1.= $rowsubj['title']." - ";
                  }
              }
          }
      $subj1 = rtrim( $subj1, " - ");
      $location = $row["Country"] .' - '.$row["State"] .' - '.$row["Area"];
      $location = rtrim( $location, " - ");
      $i++;
      echo '<tr title="'.$row["Description"].'">';
      echo '<td>' . $i . '</td>';
      echo '<td>' .  $row["Title"].'</td>';
      echo '<td>' .  $row["Lecturer"].'</td>';
      echo '<td>' ;
       echo  $subj1 ;

      echo '</td>';

      echo '<td>' . $row["accessname"] . '</td>';
      echo '<td>' . $row["categoryname"] . '</td>';
      echo '<td>' . $row["Date_M"] .'<br>'.$row["Date_H"] .'</td>';
      echo '<td>' . $location .'</td>';
   

      echo '<td>';
      ?>
           <form class="btnform" style="display: inline-block" action="../event/Details.php" method="POST">
          <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
          <input type="hidden" name="subjects" value="<?php echo $subj1;?>">
                              
          <button style="border: none"><img class="img-thumbnail thumbnail" style="max-width:75px;" src="../image/events/<?php echo  $row["image"]; ?>" ></button>
      </form> </td>
      
      <td>  
           <form class="btnform" class="btnform" style="display: inline-block" action="../photo/add_form.php" method="POST">
              <input type="hidden" name="AccessEvent" value="<?php echo $row['id_Access'];?>">
              <input type="hidden" name="TitleEvent" value="<?php echo $row['Title'];?>">
              <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
              <input type="hidden" name="dateEvent" value="<?php echo  $row["Date_M"];?>">
          <button title="أضافة صورة"  class="btn btn-info"> <i class="fa fa-camera-retro "></i></button>
      </form>     
     
       <form class="btnform" style="display: inline-block"  action="../video/add_form.php" method="POST">
          <input type="hidden" name="AccessEvent" value="<?php echo $row['id_Access'];?>">
          <input type="hidden" name="TitleEvent" value="<?php echo $row['Title'];?>">
          <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
          <input type="hidden" name="dateEvent" value="<?php echo  $row["Date_M"];?>">
          <button title="أضافة فيديو" class="btn btn-info">  <i class="fa fa-video "></i></button>
      </form>     
       <form class="btnform" style="display: inline-block" action="../audio/add_form.php" method="POST">
          <input type="hidden" name="AccessEvent" value="<?php echo $row['id_Access'];?>">
          <input type="hidden" name="TitleEvent" value="<?php echo $row['Title'];?>">
          <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
          <input type="hidden" name="dateEvent" value="<?php echo  $row["Date_M"];?>">
          <button  title="أضافة صوت" class="btn btn-info">  <i class="fa fa-volume-up "></i></button>
      </form>     
       <form class="btnform" style="display: inline-block" action="edit_form.php" method="POST">
          <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
          <button  title="تعديل" class="btn btn-warning">  <i class="fa fa-edit "></i></button>
      </form> 
 
          <button  title="حذف"   onclick="deleteitem(<?php echo $row["id"]; ?>,'<?php echo $row["Title"]; ?>')" class="btn btn-danger">  <i class="fa fa-trash-alt "></i></button>

  </td>



<?php
      echo '</tr>';
  }
  echo "</table>";
} else {
  echo "لا توجد نتائج";
}
?>