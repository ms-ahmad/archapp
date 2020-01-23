<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css4/bootstrap.min.css">
    <link rel="stylesheet" href="../css4/site.css">
    <script src="../css4/jquery.min.js"></script>
    <script src="../css4/popper.min.js"></script>
    <script src="../css4/bootstrap.min.js"></script>
   
  <link href="../css/all.css" rel="stylesheet"> <!--load all styles -->


  <script type="text/javascript" src="../js/tytabs.jquery.min.js"></script>

<?php


include_once('../Connection.php');
$IdEvent= $_GET['id'];



if (!isset($_GET['pageno']) ||$_GET['pageno']==0) {
    $pageno = 1;
} else {
    $pageno = $_GET['pageno'];
}
$no_of_records_per_page=3;
$offset = ($pageno-1) * $no_of_records_per_page; 
$pagerecord=0;
$pageno-=1;
$i = 0;

    $pagerecord=$pageno* $no_of_records_per_page;


     
     
     $sql_join = "SELECT photo.*,access.title accessname,category.title categoryname FROM photo LEFT JOIN access ON photo.id_Access=access.id  
     LEFT JOIN category ON photo.id_Category=category.id WHERE photo.id_events='$IdEvent' limit $offset, $no_of_records_per_page";
     $result_join = mysqli_query($conn, $sql_join);
     if (mysqli_num_rows($result_join) > 0) {
         ?>
         <form id="formphoto" >
             <div class="form-group row" style="padding-right: 25px;">
                <?php
            while ($row = mysqli_fetch_assoc($result_join)) {
               
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

           ?> 
    
             <div style="background-color: #545547">
             <a href="../photo/GetPhotoByIdEvent.php?id=<?php echo  $IdEvent; ?> <?php echo '&pageno='.($pageno+2) ; ?>">aaa</a>
             <a onclick="get_data(<?php echo $IdEvent .','.($pageno+2) ; ?>)">ccc</a>
           <button onclick="appendphoto(<?php echo $IdEvent .','.($pageno+2) ; ?>)">التالي</button>
           <!-- <button onclick="get_data()">التالي</button> -->


        <?php
   
        }else{
            echo '<div class="alert alert-danger" style="width: 100%; text-align: center;" role="alert">لا يوجد اي صورة لهذا الحدث</div>'; 
        
        }


?>

<script>
function get_data(inputid , inputpageno){
var no_img_div=document.getElementsByClassName('imgdiv');

    $.get("../photo/GetPhotoByIdEvent.php",
    {
        id: inputid,
        pageno: inputpageno
    },
    function (data) {
        $("#formphoto").append(data);
    });

}
    //نهاية دالة  جلب باقي الصور
</script>