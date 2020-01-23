<?php 
include_once('../Connection.php');
include_once('../header.php');

$q=$_GET['q'];
 

 $searchPersonUrl ="../search/searchperson.php?q=";


if ($q==null) {
   header("Location: index.php");
}

?>

<!-- ============================================================================================= -->

 <!-- Tabs2 -->
 <div id="tabsholder2">
	<ul class="tabs">
        <!-- <li  onclick="getphoto(<?php echo  $q; ?>)" id="tabz1">الصور</li> -->
        <li  onclick="get_photo()" id="tabz1">الصور</li>
        
		<li  onclick="getvideo(<?php echo  $q; ?>)"  id="tabz2">الفيديوهات</li>
		<li onclick="getaudio(<?php echo  $q; ?>)" id="tabz4"> الصوتيات</li>
		<li onclick="get_events()"  id="tabz3" >الأحداث</li>

	</ul>
	<div class="contents marginbot">
		<div id="contentz1" class="tabscontent">
            <div id="phototab" class="box visible" style="text-align: center; height: auto">
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
        <div id="eventtab" style=" text-align: center;">
                 <img  id="process_img" src="../css/loding.gif" alt="">	
        </div>
        </div>

	</div>

</div>
<!-- /Tabs2 -->

<!-- ============================================================================================= -->
    </div>

    </form>
    <script>

 
////////////////// بداية دالة جلب الاحداث حسب البحث ///////////////////
$( document ).ready(function() {

    $.get("../search/searchpersonevent.php",
  {
    q: "<?php echo $q; ?>"
  },
  function(data, status){
    document.getElementById("eventtab").innerHTML = data;
  });
});
function get_events(){
  $.get("../search/searchpersonevent.php",
  {
    q: "<?php echo $q; ?>"
  },
  function(data, status){
   document.getElementById("eventtab").innerHTML = data;
  });
}
////////////////// نهاية دالة جلب الاحداث حسب البحث ///////////////////
////////////////// بداية دالة جلب الصور حسب البحث ///////////////////
function get_photo(){
  $.get("../search/searchphoto.php",
  {
    q: "<?php echo $q; ?>"
  },
  function(data, status){
   document.getElementById("phototab").innerHTML = data;
  });
}
////////////////// نهاية دالة جلب الصور حسب البحث ///////////////////

    </script>


</div>
<?php 

    
?>