<?php 
include_once('../Connection.php');
include_once('../header.php');

 $IdEvent=$_REQUEST['IdEvent'];
 $subjects=$_POST['subjects'];
 

 $searchUrl ="../search/search.php?";


if ($IdEvent==null) {
    header("Location: index.php");
}

$sql_join = "SELECT events.*,access.title accessname,category.title categoryname FROM events LEFT JOIN access ON events.id_Access=access.id  LEFT JOIN category ON events.id_Category=category.id WHERE events.id='$IdEvent'";
$result_join = mysqli_query($conn, $sql_join);
if (mysqli_num_rows($result_join) > 0) {
    while ($row = mysqli_fetch_assoc($result_join)) {
      
 ?>



<div class="container" dir="rtl" style=" padding: 0px; margin-top:30px; text-align: right; border: #c3e6cb solid 1px; border-top: 0px; border-radius: 3px;">
    <div class="alert alert-success" style="text-align: center;" role="alert">
      <strong><h4>تفاصيل  <?php echo " ".$row['Title']; ?></h4></strong>
      </div>
    <form id="form" action=" " method="post" enctype="multipart/form-data">
    <div class="form-group row">
        
        <div class="col-sm-3">
            <img class="img-thumbnail thumbnail" style="max-width:100%;" src="../image/events/<?php echo  $row["image"]; ?>" >
        </div>
        <div class="col-sm-9">
            <div class="form-group row">            
                <label  class="col-sm-2 col-form-label"> المحاضر : </label>
                <label  class="col-sm-4 col-form-label"><?php echo " <strong> ".$row['Lecturer']." </strong> "; ?></label>
                <label  class="col-sm-3 col-form-label">مستوى الوصول :</label>
                <label  class="col-sm-3 col-form-label"><?php echo " <strong> ".$row['accessname']." </strong> "; ?></label>
            </div>
            
            <div class="form-group row"> 
                <label  class="col-sm-2 col-form-label">الموضوع :</label>
                <label  class="col-sm-4 col-form-label"><?php echo " <strong> ". $subjects." </strong> "; ?></label>
                <label  class="col-sm-3 col-form-label">المجموعة : </label>
                <label  class="col-sm-3 col-form-label"><?php echo " <strong> ".$row['categoryname']." </strong> "; ?></label>
            </div>
            <div class="form-group row"> 
                <?php
                 $location = $row["Country"] .' - '.$row["State"] .' - '.$row["Area"];
                 $location = rtrim( $location, " - ");
                 ?>
                <label  class="col-sm-2 col-form-label">التاريخ :</label>
                <label  class="col-sm-4 col-form-label"><?php echo " <strong> ".$row['Date_M']."  ـ  ".$row['Date_H']." </strong> "; ?></label>
                <label  class="col-sm-3 col-form-label">المكان  : </label>
                <label  class="col-sm-3 col-form-label"><?php echo " <strong> ".$location ." </strong> "; ?></label>
            </div>
            <div class="form-group row"> 
                <label  class="col-sm-2 col-form-label">التوضيحات :</label>
                <label  class="col-sm-10 col-form-label"><?php echo " <strong> ".$row['Description']." </strong> "; ?></label>
            </div>
            <div class="form-group row"> 
                <label  class="col-sm-2 col-form-label">الأشخاص :</label>
                <?php
                $personlink ="";
                $parsonarray =explode('،',$row['Persons']);
                foreach ($parsonarray as $paersonName) {
                  $paersonName= trim( $paersonName, " ");

                    $personlink .= '<a href="'.$searchUrl.'person_ser='.$paersonName.'">'.$paersonName.'</a> -';
                
                }
                ?>
                <label  class="col-sm-10 col-form-label"><?php echo " <strong> ". $personlink." </strong> "; ?></label>
            </div>

            <div class="form-group row"> 
                     <label  class="col-sm-2 col-form-label">الكلمات المفتاحية :</label>
                <?php
                $keywordlink ="";
                $keywordarray =explode('،',$row['KeyWords']);
                foreach ($keywordarray as $keyword) {
                  $keyword= trim( $keyword, " ");

                    $keywordlink .= '<a href="'.$searchUrl.'keyword='.$keyword.'">'.$keyword.'</a> -';
                
                }
                ?>
                <label  class="col-sm-10 col-form-label"><?php echo " <strong> ". $keywordlink." </strong> "; ?></label>
            </div>
            
            
            <div class="form-group row"> 
                <label  class="col-sm-2 col-form-label">الكلمات المفتاحية :</label>
                <label  class="col-sm-10 col-form-label"><?php echo " <strong> ".$row['KeyWords']." </strong> "; ?></label>
                
            </div>
        </div>
    </div>
    <div class="container" dir="rtl" style="text-align: right;">
<!-- ============================================================================================= -->

 <!-- Tabs2 -->
 <div id="tabsholder2">
	<ul class="tabs">
        <!-- <li  onclick="getphoto(<?php echo  $IdEvent; ?>)" id="tabz1">الصور</li> -->
        <li   id="tabz1">الصور</li>
        
		<li  onclick="getvideo(<?php echo  $IdEvent; ?>)"  id="tabz2">الفيديوهات</li>
		<li onclick="getaudio(<?php echo  $IdEvent; ?>)" id="tabz4"> الصوتيات</li>
		<li  id="tabz3" style="display: none"></li>
	</ul>
	<div class="contents marginbot">
		<div id="contentz1" class="tabscontent">
            <div id="phototab" class="box visible" style="text-align: center; height: 500px">
            <iframe src="../photo/getphoto.php?id=<?php echo  $IdEvent; ?>" style="width: 100%; height:100%;" frameborder="0"></iframe>
                <!-- <img  id="process_img" src="../css/loding.gif" alt=""> -->
			 </div>
		</div>

		<div id="contentz2" class="tabscontent">
			<div id="videotab" style="text-align: center;">
                <img  id="process_img" src="../css/loding.gif" alt="">
			</div>
		</div>
		<div id="contentz4" class="tabscontent">
            <div id="audiotab" style=" text-align: center;">
                <img  id="process_img" src="../css/loding.gif" alt="">	
            </div>
        </div>
        <div id="contentz3" class="tabscontent">
        </div>

	</div>

</div>
<!-- /Tabs2 -->

<!-- ============================================================================================= -->
    </div>

    </form>
    <script>
    //بداية دالة  جلب ملفات الصوت
     function getaudio(){
        $.get( "../audio/getaudiobyidevent.php",  { id:<?php echo  $IdEvent; ?> } )
        .done(function( data ) {
            $(document).ajaxStart(function(){

            $('#process_img').css("display", "block");
            });

            $(document).ajaxComplete(function(){
            $('#process_img').css("display", "none");
            });
        document.getElementById("audiotab").innerHTML = data;
        });
     }
    //  نهاية دالة جلب ملفات الصوت

    //بداية دالة  جلب ملفات الفيديو
     function getvideo(){
        $.get( "../video/GetVideoByIdEvent.php",  { id:<?php echo  $IdEvent; ?> } )
        .done(function(data) {
            $(document).ajaxStart(function(){
            $('#process_img').css("display", "block");
            });

            $(document).ajaxComplete(function(){
            $('#process_img').css("display", "none");
            });
        document.getElementById("videotab").innerHTML = data;
        });
     }
    //نهاية دالة  جلب ملفات الفيديو

    //بداية دالة  جلب ملفات الصور
     function getphoto(){
        $.get( "../photo/GetPhotoByIdEvent.php",  { id:<?php echo  $IdEvent; ?>,pageno:0 } )
        .done(function(data) {
                $(document).ajaxStart(function(){
                    $('#process_img').css("display", "block");
                });

        $(document).ajaxComplete(function(){
          $('#process_img').css("display", "none");
        });
            // $("#phototab").append(data);
        document.getElementById("phototab").innerHTML = data;
        });
     }
    //نهاية دالة  جلب ملفات الصور



//////////////////////////////////////
       //بداية دالة  جلب باقي الصور
 
/////////////////////////////////////
function get_data(){
var no_img_div=document.getElementsByClassName('imgdiv');

    $.get("../photo/GetPhotoByIdEvent.php",
    {
        id: <?php echo  $IdEvent; ?>,
        IdEvent:$_REQUEST['IdEvent'],
        pageno: (no_img_div.length)/2
    },
    function (data) {
        $("#phototab").append(data);
    });
alert('asdfd');
}
    //نهاية دالة  جلب باقي الصور

    </script>


</div>
<?php 

    }
}
?>