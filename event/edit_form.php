<?php 
include_once('../Connection.php');
include_once('../header.php');
$IdEvent=$_POST['IdEvent'];
if ($IdEvent==null) {
    header("Location: index.php");
}

?>
<div class="container" dir="rtl" style=" padding: 0px; margin-top:30px; text-align: right; border: #b8daff solid 1px; border-top: 0px; border-radius: 3px;">
    <div class="alert alert-primary" style="text-align: center;" role="alert">
      <strong>  إضافة حدث جديد</strong>
      </div>
    <form id="form" action=" " method="post" enctype="multipart/form-data">
        <?php 
        $sql_join = "SELECT events.*,access.title accessname,category.title categoryname FROM events LEFT JOIN access ON events.id_Access=access.id  LEFT JOIN category ON events.id_Category=category.id where events.id=$IdEvent";
        $result_join = mysqli_query($conn, $sql_join);
        if (mysqli_num_rows($result_join) > 0) {
            while ($rowjoin = mysqli_fetch_assoc($result_join)) {
        ?>
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
                    <OPTION <?php if($row['id']==$rowjoin['id_Access']){ echo "selected";} ?> value="<?php echo $row["id"]; ?>"> <?php echo $row["title"]; ?></OPTION>
                <?php
                }
                ?>
                </select>  

         
            </div>

            <label for="Lecturer" class="col-sm-1 col-form-label">المحاضر </label>
            <div class="col-sm-5">
                <input type="text" value="<?php echo $rowjoin['Lecturer'] ; ?>" name="Lecturer" class="form-control" id="Lecturer" placeholder="المحاضر">
            </div>
        </div>
        <div class="form-group row">
            <label for="Category" class="col-sm-2 col-form-label">المجموعة</label>
            <div class="col-sm-4">
            <select class="form-control"  id="Category" name="Category" required >
                <option value="" > </option>
                <?php
                $sqlcat ="SELECT * FROM `Category` ";
                $resultcat = mysqli_query($conn, $sqlcat);
                while($rowcat = mysqli_fetch_assoc($resultcat))
                {
                    ?>
                    <OPTION <?php if($rowcat['id']==$rowjoin['id_Category']){ echo "selected";} ?> value="<?php echo $rowcat["id"]; ?>"> <?php echo $rowcat["title"]; ?></OPTION>
                <?php
                }
                ?>
                </select>  

         
            </div>
       
            <label for="title" class="col-sm-2 col-form-label">العنوان</label>
            <div class="col-sm-4">
                <input type="text" name="title" value="<?php echo $rowjoin['Title'] ; ?>" class="form-control" id="title" placeholder="العنوان" required />
            </div>
        </div>
        <div class="form-group row">
            <label for="date_m" class="col-sm-2 col-form-label">التاريخ الميلادي</label>
            <div class="col-sm-4">
                <input type="date" name="date_m" value="<?php echo $rowjoin['Date_M'] ; ?>"  class="form-control" id="date_m" placeholder="التاريخ الميلادي">
            </div>
            <label for="date_h" class="col-sm-2 col-form-label">التاريخ الهجري</label>
            <div class="col-sm-4">
                <input type="text" name="date_h" value="<?php echo $rowjoin['Date_H'] ; ?>" class="form-control" id="date_h" placeholder="التاريخ الهجري">
            </div>
        </div>
        <div class="form-group row ">
            <label for="subject" class="col-sm-2 col-form-label">الموضوع </label>

            <div class="col-sm-10">
                <?php 
                    $subjectarray =explode(',',$rowjoin['Subjects']);
                ?>
            <?php
                $sql ="SELECT * FROM `Subjects` ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="subject[]" type="checkbox" id="inlineCheckbox2"
                    <?php 
                    foreach ($subjectarray as $value) {            
        
                            if ($row['id']==$value) {
                              echo "checked";
                            }
                        
                    }

                    
                    ?>  
                       value="<?php echo $row["id"]; ?>" style="margin: 0px 10px;">
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
                <input type="text" value="<?php echo $rowjoin['Country'] ; ?>" name="Country" class="form-control" id="Country" placeholder="البلد">
            </div>
            <label for="State" class="col-sm-2 col-form-label">المحافظة </label>
            <div class="col-sm-4">
                <input type="text" name="State"  value="<?php echo $rowjoin['State'] ; ?>" class="form-control" id="State" placeholder="المحافظة">
            </div>
        </div>
        <div class="form-group row">
            <label for="Area" class="col-sm-2 col-form-label">المنطقة </label>
            <div class="col-sm-4">
                <input type="text" name="Area"  value="<?php echo $rowjoin['Area'] ; ?>" class="form-control" id="Area" placeholder="المنطقة">
            </div>
            <label for="Point" class="col-sm-2 col-form-label">نقطة دالة </label>
            <div class="col-sm-4">
                <input type="text" name="Point"  value="<?php echo $rowjoin['Point'] ; ?>" class="form-control" id="Point" placeholder="نقطة دالة">
            </div>
        </div>
        <div class="form-group row">
            <label for="Persons" class="col-sm-2 col-form-label">الأشخاص </label>
            <div class="col-sm-10">
                <input type="text" name="Persons"  value="<?php echo $rowjoin['Persons'] ; ?>" class="form-control" id="Persons" placeholder="الأشخاص">
            </div>
        </div>
        <div class="form-group row">
            <label for="KeyWords" class="col-sm-2 col-form-label">كلمات المفتاحية </label>
            <div class="col-sm-10">
                <textarea name="KeyWords"   id="KeyWords" class="form-control" cols="30" rows="2" placeholder="كلمات المفتاحية"><?php echo $rowjoin['KeyWords'] ; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="Description" class="col-sm-2 col-form-label">توضيحات </label>
            <div class="col-sm-10">
                <textarea name="Description" id="Description"   class="form-control" cols="30" rows="2" placeholder="توضيحات"><?php echo $rowjoin['Description']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="imagefile" class="col-sm-2 col-form-label">الصورة </label>
            <div class="col-sm-5">
                <input id="uploadImage" type="file" accept="image/*" name="image" class="form-control"  placeholder="الصورة" />
                <input type="hidden" name="oldimage" value="<?php echo $rowjoin["image"];?>">
                <input type="hidden" name="IdEvent" value="<?php echo $IdEvent;?>">
            </div>
            
            <div class="col-sm-5">
                <img class="img-thumbnail thumbnail" style="max-width:75px;" src="../image/events/<?php echo $rowjoin["image"];?>" >
            </div>

        </div>


     <input class="btn btn-success btn-block" type="submit" value="إضافة">
     <?php 
            }
        }
     ?>
    </form>

<div id="err"></div>
     

 <script type='text/javascript'>
    $(document).ready(function (e) {
        $("#form").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
                url: "edit.php",
                type: "POST",
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
                alert(data);
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