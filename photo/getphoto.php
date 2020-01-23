<?php 
include_once('../Connection.php');
include_once('../header.php');
$IdEvent= $_GET['id'];


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 4;
$offset = ($pageno-1) * $no_of_records_per_page; 

?>

<html>
<head>

    <!-- Bootstrap CDN -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body dir="rtl">
    <?php

    

        $total_pages_sql = "SELECT COUNT(*) FROM photo";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT photo.*,access.title accessname,category.title categoryname FROM photo LEFT JOIN access ON photo.id_Access=access.id  
        LEFT JOIN category ON photo.id_Category=category.id WHERE photo.id_events='$IdEvent' limit $offset, $no_of_records_per_page";
        $result_join = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result_join) > 0) {
            ?>
            <form id="formphoto" >
                <div class="form-group row" style="padding-right: 25px;">
                   <?php
        while($row = mysqli_fetch_array($result_join)){
          
            ?>
            <div class="form-group row col-sm-6">
                <div class="form-group row col-sm-6">
                <br>
                   توضيحات : <?php echo $row["Description"]; ?> 
                    <br> 
                   الوصول : <?php echo $row["accessname"]; ?> 
                    <br>
                   المجموعة : <?php echo $row["categoryname"]; ?> 
                    <br>
                   الكلمات المفتاحية : <?php echo $row["KeyWords"]; ?> 
                    <br>
                 </div>  
                 <div class="form-group row col-sm-6 imgdiv">
                     <img class="img-thumbnail thumbnail" style="max-width:100%; height: 100%" src="../files/<?php echo $IdEvent; ?>/photo//<?php echo $row["path"]; ?>" >
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
    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1) ."&id=".$IdEvent; } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</body>
</html>