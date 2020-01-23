<?php 
include_once('../Connection.php');
include_once('../header.php');

?>

<div class="container" dir="rtl" style=" padding: 0px; margin-top:30px; text-align: right; border: #b8daff solid 1px; border-top: 0px; border-radius: 3px;">
    <div class="alert alert-primary" style="text-align: center;" role="alert">
      <strong>  إضافة حدث جديد</strong>
      </div>
    <form id="form" action=" " method="post" style="padding: 10px" enctype="multipart/form-data">

        <div class="form-group row">

            <label for="title" class="col-sm-2 col-form-label">المجموعة </label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="المجموعة" required >
            </div>
        </div>
        <div class="form-group row">
            <label for="id_parent" class="col-sm-2 col-form-label">المجموعة الرئيسية (الأب)</label>
            <div class="col-sm-10">
            <select class="form-control" id="id_parent" name="id_parent" required >
                <option value="" > </option>
                <option value="0" > مجموعة رئيسية (بلا أب)</option>
                <?php
                $sql ="SELECT * FROM `category` ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <OPTION value="<?php echo $row["id"]; ?>"> <?php echo $row["title"]; ?></OPTION>
                <?php
                }
                ?>
                </select>  

         
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