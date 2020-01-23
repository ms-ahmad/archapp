<?php 
include_once('../Connection.php');
include_once('../header.php');

?>

<div class="container" dir="rtl" style=" padding: 0px; margin-top:30px; text-align: right; border: #b8daff solid 1px; border-top: 0px; border-radius: 3px;">
    <div class="alert alert-primary" style="text-align: center;" role="alert">
      <strong>  إضافة حدث جديد</strong>
      </div>
    <form id="form" action=" " method="post" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="l_Access" class="col-sm-2 col-form-label">مستوى الوصول</label>
            <div class="col-sm-4">
            <select class="form-control" id="l_Access" name="l_Access" required >
                <option value="" > </option>
                <?php
                $sql ="SELECT * FROM `access` ";
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

            <label for="Lecturer" class="col-sm-1 col-form-label">المحاضر </label>
            <div class="col-sm-5">
                <input type="text" name="Lecturer" class="form-control" id="Lecturer" placeholder="المحاضر">
            </div>
        </div>
        <div class="form-group row">
            <label for="Category" class="col-sm-2 col-form-label">المجموعة</label>
            <div class="col-sm-4">
            <select class="form-control"  id="Category" name="Category" required >
                <option value="" > </option>
                <?php
                $sql ="SELECT * FROM `Category` ";
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
       
            <label for="title" class="col-sm-2 col-form-label">العنوان</label>
            <div class="col-sm-4">
                <input type="text" name="title" class="form-control" id="title" placeholder="العنوان" required />
            </div>
        </div>
        <div class="form-group row">
            <label for="date_m" class="col-sm-2 col-form-label">التاريخ الميلادي</label>
            <div class="col-sm-4">
                <input type="date" name="date_m" class="form-control" id="date_m" placeholder="التاريخ الميلادي">
            </div>
            <label for="date_h" class="col-sm-2 col-form-label">التاريخ الهجري</label>
            <div class="col-sm-4">
                <input type="text" name="date_h" class="form-control" id="date_h" placeholder="التاريخ الهجري">
            </div>
        </div>
        <div class="form-group row ">
            <label for="subject" class="col-sm-2 col-form-label">الموضوع </label>

            <div class="col-sm-10">
            <?php
                $sql ="SELECT * FROM `Subjects` ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>  
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="subject[]" type="checkbox" id="inlineCheckbox2" value="<?php echo $row["id"]; ?>" style="margin: 0px 10px;">
                      <label class="form-check-label" for="inlineCheckbox2">  <?php echo "  ".$row["title"]."  "; ?>  </label>
                    </div> 
                    <?php
                }
                ?>
            </div>

       
            
        </div>
   
        <div class="form-group row">
            <label for="Country" class="col-sm-2 col-form-label">البلد </label>
            <div class="col-sm-4">
                <input type="text" name="Country" class="form-control" id="Country" placeholder="البلد">
            </div>
            <label for="State" class="col-sm-2 col-form-label">المحافظة </label>
            <div class="col-sm-4">
                <input type="text" name="State" class="form-control" id="State" placeholder="المحافظة">
            </div>
        </div>
        <div class="form-group row">
            <label for="Area" class="col-sm-2 col-form-label">المنطقة </label>
            <div class="col-sm-4">
                <input type="text" name="Area" class="form-control" id="Area" placeholder="المنطقة">
            </div>
            <label for="Point" class="col-sm-2 col-form-label">نقطة دالة </label>
            <div class="col-sm-4">
                <input type="text" name="Point" class="form-control" id="Point" placeholder="نقطة دالة">
            </div>
        </div>
        <div class="form-group row">
            <label for="Persons" class="col-sm-2 col-form-label">الأشخاص </label>
            <div class="col-sm-10">
                <input type="text" name="Persons" class="form-control" id="Persons" placeholder="الأشخاص">
            </div>
        </div>
        <div class="form-group row">
            <label for="KeyWords" class="col-sm-2 col-form-label">كلمات المفتاحية </label>
            <div class="col-sm-10">
                <textarea name="KeyWords" id="KeyWords" class="form-control" cols="30" rows="2" placeholder="كلمات المفتاحية"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="Description" class="col-sm-2 col-form-label">توضيحات </label>
            <div class="col-sm-10">
                <textarea name="Description" id="Description" class="form-control" cols="30" rows="2" placeholder="توضيحات"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="imagefile" class="col-sm-2 col-form-label">الصورة </label>
            <div class="col-sm-10">
                <input id="uploadImage" type="file" accept="image/*" name="image" class="form-control"  placeholder="الصورة"required />

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
    $("#err").fadeOut();
   },
   success: function(data)
      {
            if(data=='invalid')
            {
            // invalid file format.
            alert ("الملف غير صحيح");
            //  $("#err").html("Invalid File !").fadeIn();
            }
            else
            {
            // view uploaded file.
            //  $("#preview").html(data).fadeIn();
            alert("تم رفع الصورة بنجاح");
            $("#form")[0].reset(); 
            }
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