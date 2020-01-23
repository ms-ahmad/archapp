<?php 
include_once('../Connection.php');
include_once('../header.php');

 $IdEvent = $_POST['IdEvent'];
 $AccessEvent = $_POST['AccessEvent'];
 $TitleEvent = $_POST['TitleEvent'];
 $dateEvent = $_POST['dateEvent'];


if ($IdEvent==null) {
    header("Location: ../event/index.php");
}

?>

<div class="container" dir="rtl" style=" padding: 0px; margin-top:30px; text-align: right; border: #b8daff solid 1px; border-top: 0px; border-radius: 3px;">
    <div class="alert alert-primary" style="text-align: center;" role="alert">
      <strong>  إضافة فيديو </strong>
      </div>
    <form id="form" action=" " method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">عنوان الحدث : </label>
            <label  class="col-sm-4 col-form-label"><strong><?php echo $TitleEvent; ?></strong></label>
            <label  class="col-sm-2 col-form-label">تاريخ الحدث : </label>
            <label  class="col-sm-4 col-form-label"><strong><?php echo $dateEvent; ?></strong></label>
            <label  class="col-sm-2 col-form-label">مستوى الوصول</label>
            <input type="hidden" name="IdEvent" value="<?php echo $IdEvent;?>">
            <div class="col-sm-4">
            <select class="form-control" id="l_Access" name="l_Access" required >
                <option value="" > </option>
                <?php
                $sql ="SELECT * FROM `access` ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <OPTION <?php if($AccessEvent== $row["id"]){echo "selected";} ?> value="<?php echo $row["id"]; ?>"> <?php echo $row["title"]; ?></OPTION>
                <?php
                }
                ?>
                </select>  
            </div>
            <label for="Category" class="col-sm-2 col-form-label">المجموعة</label>
            <div class="col-sm-4">
            <select class="form-control" id="Category" name="Category" required >
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
            </div>
            <div class="form-group row">
                <label for="Persons" class="col-sm-2 col-form-label">الأشخاص </label>
                <div class="col-sm-10">
                    <input type="text" name="Persons" class="form-control" id="Persons" placeholder="الأشخاص">
                </div>
            </div>
            <div class="form-group row">
                <label for="Description" class="col-sm-2 col-form-label">توضيحات </label>
                <div class="col-sm-10">
                    <textarea name="Description" id="Description" class="form-control" cols="30" rows="2" placeholder="توضيحات"></textarea>
                </div>
            </div>
            <!--             
            <div class="form-group row">
                
                <label for="title" class="col-sm-2 col-form-label">العنوان</label>
                <div class="col-sm-4">
                    <input type="text" name="title" class="form-control" id="title" placeholder="العنوان" required />
                </div>
            </div>

       
        </div> -->
        <div class="form-group row">
            <label for="KeyWords" class="col-sm-2 col-form-label">كلمات المفتاحية </label>
            <div class="col-sm-10">
                <textarea name="KeyWords" id="KeyWords" class="form-control" cols="30" rows="2" placeholder="كلمات المفتاحية"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="imagefile" class="col-sm-2 col-form-label">الملف </label>
            <div class="col-sm-10">
                <input id="uploadImage" type="file" accept="video/*" name="video" class="form-control"  placeholder="الملف"required />

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