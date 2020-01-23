<?php 
include_once('../Connection.php');
include_once('../header.php');
include_once('../getrequset.php');





if ($person_ser==null) {
  //  header("Location: index.php");
}

?>

<!-- ============================================================================================= -->

 <!-- Tabs2 -->
 <div id="tabsholder2">
	<ul class="tabs">
    <li  onclick="get_events('../search/searchphoto.php','phototab')" id="tabz1">الصور</li>        
		<li  onclick="getvideo(<?php echo  $person_ser; ?>)"  id="tabz2">الفيديوهات</li>
		<li onclick="getaudio(<?php echo  $person_ser; ?>)" id="tabz4"> الصوتيات</li>
		<li onclick="get_events('../search/searchevent.php','eventtab')"  id="tabz3" >الأحداث</li>

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

    $.get("../search/searchevent.php",
  {
    person_ser :"<?php echo $person_ser; ?>",
    keyword :"<?php echo $keyword; ?>",
    l_Access :"<?php echo $l_Access; ?>",
    Lecturer :"<?php echo $Lecturer; ?>",
    Category :"<?php echo $Category; ?>",
    title :"<?php echo $title; ?>",
    date_from :"<?php echo $date_from; ?>",
    date_to :"<?php echo $date_to; ?>",
    subject :"<?php echo $subject; ?>",
    Country :"<?php echo $Country; ?>",
    State :"<?php echo $State; ?>",
    Area :"<?php echo $Area; ?>",
    Point :"<?php echo $Point; ?>",
    Description :"<?php echo $Description; ?>"
  },
  function(data, status){
    document.getElementById("eventtab").innerHTML = data;
  });
});

function get_events(url,tabname){
  $.get(url,
  {
    person_ser :"<?php echo $person_ser; ?>",
    keyword :"<?php echo $keyword; ?>",
    l_Access :"<?php echo $l_Access; ?>",
    Lecturer :"<?php echo $Lecturer; ?>",
    Category :"<?php echo $Category; ?>",
    title :"<?php echo $title; ?>",
    date_from :"<?php echo $date_from; ?>",
    date_to :"<?php echo $date_to; ?>",
    subject :"<?php echo $subject; ?>",
    Country :"<?php echo $Country; ?>",
    State :"<?php echo $State; ?>",
    Area :"<?php echo $Area; ?>",
    Point :"<?php echo $Point; ?>",
    Description :"<?php echo $Description; ?>"
  },
  function(data, status){
   document.getElementById(tabname).innerHTML = data;
  });
}
////////////////// نهاية دالة جلب الاحداث حسب البحث ///////////////////
////////////////// بداية دالة جلب الصور حسب البحث ///////////////////




  //////////////////////////////////
  // $.get("../search/searchphoto.php",
  // {
  //   person_ser: "<?php echo $person_ser; ?>",
  //   keyword: "<?php echo $keyword; ?>"
  // },
  // function(data, status){
  //  document.getElementById("phototab").innerHTML = data;
  // });


////////////////// نهاية دالة جلب الصور حسب البحث ///////////////////

    </script>


</div>
<?php 

    
?>