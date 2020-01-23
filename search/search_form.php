<?php 
include_once('../Connection.php');
include_once('../header.php');

?>

<div class="container" dir="rtl" style=" padding: 0px; margin-top:30px; text-align: right; border: #b8daff solid 1px; border-top: 0px; border-radius: 3px;">
    <div class="alert alert-primary" style="text-align: center;" role="alert">
      <strong> البحث </strong>
      </div>
    <form id="form" action="search.php" method="GET" >

        <div class="form-group row">
            <label for="l_Access" class="col-sm-2 col-form-label">مستوى الوصول</label>
            <div class="col-sm-4">
            <select class="form-control" id="l_Access" name="l_Access"  >
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
            <select class="form-control"  id="Category" name="Category"  >
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
       
            <label for="title" class="col-sm-1 col-form-label">العنوان</label>
            <div class="col-sm-5">
                <input type="text" name="title" class="form-control" id="title" placeholder="العنوان"  />
            </div>
        </div>
        <div class="form-group row">
            <label for="date_from" class="col-sm-1 col-form-label">التاريخ </label>
            <label for="date_from" class="col-sm-1 col-form-label" style="text-align: left"> من: </label>
            <div class="col-sm-4">
                <input type="date" name="date_from" class="form-control" id="date_from" placeholder="من ">
            </div>
            <label for="date_to" class="col-sm-1 col-form-label">إلــى : </label>
            <div class="col-sm-5">
                <input type="date" name="date_to" class="form-control" id="date_to" placeholder="التاريخ الهجري">
            </div>
        </div>
        <div class="form-group row ">
            <label for="subject" class="col-sm-2 col-form-label">الموضوع </label>

            <div class="col-sm-4">
                <select class="form-control" id="subject" name="subject"  >
                        <option value="" > </option>
                        <?php
                        $sql ="SELECT * FROM `Subjects` ";
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
            <label for="person_ser" class="col-sm-2 col-form-label">الأشخاص </label>
            <div class="col-sm-4">
                <input type="text" name="person_ser" class="form-control" id="person_ser" placeholder="الأشخاص">
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
            <label for="keyword" class="col-sm-2 col-form-label">كلمات المفتاحية </label>
            <div class="col-sm-4">
                <input type="text" name="keyword" class="form-control" id="keyword"  placeholder="كلمات المفتاحية">
            </div>
            <label for="Description" class="col-sm-2 col-form-label">التوضيحات </label>
            <div class="col-sm-4">
                <input type="text" name="Description" class="form-control" id="Description"  placeholder="توضيحات">
            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="imagefile" class="col-sm-2 col-form-label">الصورة </label>
            <div class="col-sm-10">
                <input id="uploadImage" type="file" accept="image/*" name="image" class="form-control"  placeholder="الصورة" />

            </div>
        </div> -->


<input class="btn btn-success btn-block" type="submit" value="أبحث">
</form>

<div id="err"></div>
     

          
    <script type='text/javascript'>
    $(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "../search/search.php",
   type: "Post",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {

    $("#err").fadeOut();
   },
   success: function(data)
      {           
        
     $("#err").html(data).fadeIn();
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