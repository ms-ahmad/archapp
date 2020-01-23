<?php 
include_once('../Connection.php');
include_once('../header.php');

?>

<div class="container" dir="rtl" style=" padding: 0px; margin-top:30px; text-align: right; border: #b8daff solid 1px; border-top: 0px; border-radius: 3px;">
    <div class="alert alert-primary" style="text-align: center;" role="alert">
      <strong>  إضافة موضوع جديد</strong>
      </div>
    <form id="form" action=" " method="post" style="padding: 10px" enctype="multipart/form-data">

        <div class="form-group row">

            <label for="title" class="col-sm-2 col-form-label">الموضوع </label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="الموضوع" required >
            </div>
        </div>
       
      
<input class="btn btn-success btn-block" type="submit" value="إضافة">
</form>

<div id="err"></div>
     

          
    <script type='text/javascript'>
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
    //$("#preview").fadeOut();

   },
   success: function(data)
      {
        alert(data);
      },
     error: function(e) 
      {
          alert(e);
    // $("#err").html(e).fadeIn();
      }          
    });
 }));
});

    </script>
</div>