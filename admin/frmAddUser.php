<?php 
include_once('../Connection.php');
include_once('../header.php');
// $e = ["k"=>"1", "a"=>"1", "s"=>"0"];
 $event =["event"=>0,"a"=>0,"k"=>0,"s"=>0];
 $photo =["photo"=>0];
 $audio =["audio"=>0];
 $video =["video"=>0];
if ($_POST) {
   if(isset($_POST['event'])){
    $event["event"]=$_POST['event'];
       if (isset($_POST['ea'])) {
            if (isset($_POST['eaeidt'])) {
                $event["a"]=$_POST['eaeidt']; 
            }else{
        
            }
       }
       if (isset($_POST['ek'])) {
            if (isset($_POST['ekeidt'])) {
                $event["k"]=$_POST['ekeidt'];  
            }else{

            }
       }
       if (isset($_POST['es'])) {
            if (isset($_POST['eseidt'])) {
                $event["s"]=1; 
            }else{
               
            }
       }
   }
   if(isset($_POST['photo'])){
    $photo["photo"]=1;
       if (isset($_POST['pa'])) {
            if (isset($_POST['paeidt'])) {
                $photo+=["a"=>1]; 
            }else{
                $photo+=["a"=>0]; 
            }
       }
       if (isset($_POST['pk'])) {
            if (isset($_POST['pkeidt'])) {
                $photo+=["k"=>1]; 
            }else{
                $photo+=["k"=>0]; 
            }
       }
       if (isset($_POST['ps'])) {
            if (isset($_POST['pseidt'])) {
                $photo+=["s"=>1]; 
            }else{
                $photo+=["s"=>0]; 
            }
       }
   }
   if(isset($_POST['audio'])){
    $audio["audio"]=1;
       if (isset($_POST['aa'])) {
            if (isset($_POST['aaeidt'])) {
                $audio+=["a"=>1]; 
            }else{
                $audio+=["a"=>0]; 
            }
       }
       if (isset($_POST['ak'])) {
            if (isset($_POST['akeidt'])) {
                $audio+=["k"=>1]; 
            }else{
                $audio+=["k"=>0]; 
            }
       }
       if (isset($_POST['as'])) {
            if (isset($_POST['aseidt'])) {
                $audio+=["s"=>1]; 
            }else{
                $audio+=["s"=>0]; 
            }
       }
   }



      if(isset($_POST['video'])){
    $video["video"]=1;
       if (isset($_POST['va'])) {
            if (isset($_POST['vaeidt'])) {
                $video+=["a"=>1]; 
            }else{
                $video+=["a"=>0]; 
            }
       }
       if (isset($_POST['vk'])) {
            if (isset($_POST['vkeidt'])) {
                $video+=["k"=>1]; 
            }else{
                $video+=["k"=>0]; 
            }
       }
       if (isset($_POST['vs'])) {
            if (isset($_POST['vseidt'])) {
                $video+=["s"=>1]; 
            }else{
                $video+=["s"=>0]; 
            }
       }
   }

print_r($event);
echo "<br>";
echo json_encode( $event ); 
echo "<br>";

echo "<br>";
print_r($photo);
echo "<br>";
echo $string = serialize( $photo );
echo "<br>";
print_r($video);
echo "<br>";
print_r($audio);
echo "<br>";


}
?>
 <style>
 .cbstyle{
     margin-left: 10px;
 }
 .divcb{
     padding-right: 20px;
 }
 .lblcb{
     padding-right: 30px;
 }
 .blockaccess{
     border: 1px dashed#666;
     border-radius: 5px;
     margin: 2px;
     padding: 10px 20px 20px 10px;;
 }
 </style>
<div class="container" dir="rtl" style=" padding: 0px; margin-top:30px; text-align: right; border: #b8daff solid 1px; border-top: 0px; border-radius: 3px;">
    <div class="alert alert-danger" style="text-align: center;" role="alert">
      <strong>  إضافة مستخدم جديد</strong>
      </div>
    <form id="form" action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
    <div class="col-md-6  " style="text-align: center">
            <label for="username" class="col-sm-10 col-form-label">اسم المستخدم :</label>
            <div class="col-sm-10" style="text-align: center; margin:  20px auto ">
                <input type="text" name="username" class="form-control" id="username" placeholder="اسم المستخدم">
            </div> 
                      
            </div>           
    
            <div class="col-md-6  ">
        <div class="alert alert-danger" style="text-align: center;" role="alert">
            <strong> الصلاحيات</strong>
            </div>
        <div class="form-group row">
            <div class="col-md-6  ">
                <div class="col-md-12 divcb blockaccess bg-light">
                    <input onchange="showcb('addEvent','eventdiv')" class="form-check-input" name="event" type="checkbox" id="addEvent" value="1" >
                    <label class="form-check-label lblcb" for="addEvent"> الحدث  </label>
                    <div id="eventdiv" class="divcb" style="display: none; margin-right: 20px;">
                        <div>
                            <input onchange="showcb('ea','eaeidtdiv')" checked class="form-check-input cbstyle" name="ea" type="checkbox" id="ea" value="1">
                            <label class="form-check-label lblcb" for="ea"> عام  </label>
                                <div  class="divcb" id="eaeidtdiv" >
                                    <input type="radio" name="eaeidt" id="eaeidt" value="edit">
                                    <label class="form-check-label " for="eaeidt"> إضافة وتحرير  </label>
                                    <input type="radio" name="eaeidt"  checked id="eaeidt" value="read">
                                    <label class="form-check-label " for="eaeidt"> مشاهدة فقط </label>
                                </div>
                        </div>
                        <div>
                            <input onchange="showcb('ek','ekeidtdiv')"  class="form-check-input cbstyle" name="ek" type="checkbox" id="ek" value="1">
                            <label class="form-check-label lblcb" for="ek"> خاص  </label>
                                <div id="ekeidtdiv"  class="divcb" style="display: none;">
                                    <input  name="ekeidt" type="radio" id="ekeidt" value="edit">
                                    <label class="form-check-label " for="ekeidt"> إضافة وتحرير  </label>
                                    <input  checked name="ekeidt" type="radio" id="ekeidt" value="read">
                                    <label class="form-check-label " for="ekeidt"> مشاهدة فقط  </label>
                                </div>
                        </div>
                        <div>
                            <input onchange="showcb('es','eseidtdiv')"  class="form-check-input cbstyle" name="es" type="checkbox" id="es" value="1">
                            <label class="form-check-label lblcb" for="es"> سري  </label>
                                <div class="divcb" id="eseidtdiv" style="display: none;">
                                    <input  name="eseidt" type="radio" id="eseidt" value="edit">
                                    <label class="form-check-label " for="eseidt"> إضافة وتحرير  </label>
                                    <input  name="eseidt" checked type="radio" id="eseidt" value="read">
                                    <label class="form-check-label " for="eseidt"> مشاهدة فقط  </label>
                                </div>
                        </div> 
                    </div>
                    
                </div>
             
                <div class="col-md-12 divcb blockaccess bg-light">
                    <input onchange="showcb('addPhoto','photodiv')" class="form-check-input" name="photo" type="checkbox" id="addPhoto" value="1" >
                    <label class="form-check-label lblcb" for="addPhoto"> الصور  </label>
                    <div id="photodiv" class="divcb" style="display: none; margin-right: 20px;">
                        <div>
                            <input onchange="showcb('pa','paeidtdiv')" checked class="form-check-input cbstyle" name="pa" type="checkbox" id="pa" value="1">
                            <label class="form-check-label lblcb" for="pa"> عام  </label>
                                <div  class="divcb" id="paeidtdiv">
                                    <input  name="paeidt" type="radio" id="paeidt" value="edit">
                                    <label class="form-check-label " for="paeidt"> إضافة وتحرير  </label>
                                    <input  name="paeidt" type="radio"  checked id="paeidt" value="read">
                                    <label class="form-check-label " for="paeidt"> مشاهدة فقط  </label>
                                </div>
                        </div>
                        <div>
                            <input onchange="showcb('pk','pkeidtdiv')"  class="form-check-input cbstyle" name="pk" type="checkbox" id="pk" value="1">
                            <label class="form-check-label lblcb" for="pk"> خاص  </label>
                                <div id="pkeidtdiv"  class="divcb" style="display: none;">
                                    <input  name="pkeidt" type="radio" id="pkeidt" value="edit">
                                    <label class="form-check-label " for="pkeidt"> إضافة وتحرير  </label>
                                    <input  name="pkeidt" type="radio"  checked id="pkeidt" value="read">
                                    <label class="form-check-label " for="pkeidt"> مشاهدة فقط  </label>
                                </div>
                        </div>
                        <div>
                            <input onchange="showcb('ps','pseidtdiv')"  class="form-check-input cbstyle" name="ps" type="checkbox" id="ps" value="1">
                            <label class="form-check-label lblcb" for="ps"> سري  </label>
                                <div class="divcb" id="pseidtdiv" style="display: none;">
                                    <input  name="pseidt" type="radio" id="pseidt" value="edit">
                                    <label class="form-check-label " for="pseidt"> إضافة وتحرير  </label>
                                    <input  name="pseidt" type="radio"  checked id="pseidt" value="read">
                                    <label class="form-check-label " for="pseidt"> مشاهدة فقط  </label>
                                </div>
                        </div> 
                    </div>
                    
                </div>
                </div>
                <div class="col-md-6  ">
                    <div class="col-md-12 divcb blockaccess bg-light">
                        <input onchange="showcb('addvideo','videodiv')" class="form-check-input" name="video" type="checkbox" id="addvideo" value="1" >
                        <label class="form-check-label lblcb" for="addvideo"> الفيديو  </label>
                        <div id="videodiv" class="divcb" style="display: none; margin-right: 20px;">
                            <div>
                                <input onchange="showcb('va','vaeidtdiv')" checked class="form-check-input cbstyle" name="va" type="checkbox" id="va" value="1">
                                <label class="form-check-label lblcb" for="va"> عام  </label>
                                    <div  class="divcb" id="vaeidtdiv" >
                                        <input   name="vaeidt" type="radio" id="vaeidt" value="edit">
                                        <label class="form-check-label " for="vaeidt"> إضافة وتحرير  </label>
                                        <input   name="vaeidt" type="radio" checked  id="vaeidt" value="read">
                                        <label class="form-check-label " for="vaeidt"> مشاهدة فقط </label>
                                    </div>
                            </div>
                            <div>
                                <input onchange="showcb('vk','vkeidtdiv')"  class="form-check-input cbstyle" name="vk" type="checkbox" id="vk" value="1">
                                <label class="form-check-label lblcb" for="vk"> خاص  </label>
                                    <div id="vkeidtdiv"  class="divcb" style="display: none;">
                                        <input  name="vkeidt" type="radio" id="vkeidt" value="edit">
                                        <label class="form-check-label " for="vkeidt"> إضافة وتحرير  </label>
                                        <input  name="vkeidt" type="radio"  checked id="vkeidt" value="read">
                                        <label class="form-check-label " for="vkeidt"> مشاهدة فقط  </label>
                                    </div>
                            </div>
                            <div>
                                <input onchange="showcb('vs','vseidtdiv')"  class="form-check-input cbstyle" name="vs" type="checkbox" id="vs" value="1">
                                <label class="form-check-label lblcb" for="vs"> سري  </label>
                                    <div class="divcb" id="vseidtdiv" style="display: none;">
                                        <input  name="vseidt" type="radio" id="vseidt" value="edit">
                                        <label class="form-check-label " for="vseidt"> إضافة وتحرير  </label>
                                        <input  name="vseidt" type="radio"  checked id="vseidt" value="read">
                                        <label class="form-check-label " for="vseidt"> مشاهدة فقط  </label>
                                    </div>
                            </div> 
                        </div>                    
                    </div>
    
     
                <div class="col-md-12 divcb blockaccess bg-light">
                    <input onchange="showcb('addaudio','Audiodiv')" class="form-check-input" name="audio" type="checkbox" id="addaudio" value="1" >
                    <label class="form-check-label lblcb" for="addaudio"> الصوت  </label>
                    <div id="Audiodiv" class="divcb" style="display: none; margin-right: 20px;">
                        <div>
                            <input onchange="showcb('aa','aaeidtdiv')" checked class="form-check-input cbstyle" name="aa" type="checkbox" id="aa" value="1">
                            <label class="form-check-label lblcb" for="aa"> عام  </label>
                                <div  class="divcb" id="aaeidtdiv" >
                                    <input   name="aaeidt" type="radio" id="aaeidt" value="edit">
                                    <label class="form-check-label " for="aaeidt"> إضافة وتحرير  </label>
                                    <input   name="aaeidt" type="radio" checked  id="aaeidt" value="read">
                                    <label class="form-check-label " for="aaeidt"> إمشاهدة فقط </label>
                                </div>
                        </div>
                        <div>
                            <input onchange="showcb('ak','akeidtdiv')"  class="form-check-input cbstyle" name="ak" type="checkbox" id="ak" value="1">
                            <label class="form-check-label lblcb" for="ak"> خاص  </label>
                                <div id="akeidtdiv"  class="divcb" style="display: none;">
                                    <input  name="akeidt" type="radio" id="akeidt" value="edit">
                                    <label class="form-check-label " for="akeidt"> إضافة وتحرير  </label>
                                    <input  name="akeidt" type="radio"  checked id="akeidt" value="read">
                                    <label class="form-check-label " for="akeidt"> مشاهدة فقط  </label>
                                </div>
                        </div>
                        <div>
                            <input onchange="showcb('as','aseidtdiv')"  class="form-check-input cbstyle" name="as" type="checkbox" id="as" value="1">
                            <label class="form-check-label lblcb" for="as"> سري  </label>
                                <div class="divcb" id="aseidtdiv" style="display: none;">
                                    <input  name="aseidt" type="radio" id="aseidt" value="edit">
                                    <label class="form-check-label " for="aseidt"> إضافة وتحرير  </label>
                                    <input  name="aseidt" type="radio"  checked id="aseidt" value="read">
                                    <label class="form-check-label " for="aseidt"> مشاهدة فقط  </label>
                                </div>
                        </div> 
                    </div>                    
                </div>
                </div>
                </div>

             
      
      
    
        </div>

        </div>



<input class="btn btn-success btn-block" type="submit" value="إضافة">
</form>

<div id="err"></div>
     

          
    <script type='text/javascript'>

/////////////////////////////////////
function showcb (chname,tabname) {

            if ($(document.getElementById(chname)).is(":checked")) {
                $(document.getElementById(tabname)).show('slow');


            } else {
                $(document.getElementById(tabname)).hide('slow');
       
            }
    }

////////////////////////////////////////////



    $(document).ready(function (e) {
 $("#form").on('submit',(function(e) {

     
  e.preventDefault();
  $.ajax({
         url: "add.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {

 //   $("#err").fadeOut();
   },
   success: function(data)
      {
        $("#err").html(data); 
            // $("#form")[0].reset(); 
       
        // alert(data);
      },
     error: function(e) 
      {
          alert(e);

      }          
    }); 
    
 }));
});

    </script>
</div>