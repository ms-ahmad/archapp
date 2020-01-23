<?php

$id=$_GET["id"];
$name=$_GET["name"];
?>
<script>

function deletefun() {
            var xhr = new XMLHttpRequest();
            var IdEvent = document.getElementById("IdEvent").value;

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("show").innerHTML = xhr.responseText;
                }
            }
            xhr.open("POST", "deletajax.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("&IdEvent=" + IdEvent);
        }


   
</script>


<div class="jut">
        <div class="pop" style="display: block;justify-items: right;background: url(bg.png);">

            <div >
                <input  value=" <?php echo $id; ?>"  class="form-control" type="hidden"  id="IdEvent"> 
            </div>
            <div class="alert alert-danger" role="alert">هر تريد حقا حذف (<?php echo $name;?>)؟</div>
            
            <div style="text-align: center">
                <a href="" class="btn btn-primary" style="width: 100px;margin-left:70px">رجوع</a>
                <input type="submit" style="width: 100px" class="btn btn-danger ipn" onclick="deletefun()"  value="حذف">
                <div style="font-size: 20px;margin-top: 10px" id="show">
                </div>
            </div>
        </div>

</div>



<?php 







/*  
//include database configuration file
// include_once '../Connection.php';

 echo $IdEvent = $_POST['IdEvent']; 
    if ($IdEvent==null) {
        header("Location: index.php");
    }      
        //insert form data in the database
        $sql =("UPDATE `events` SET `Is_Not_active`='1' WHERE `id`= '$IdEvent'");
                
                if ($conn->query($sql) === TRUE) {
                    echo "تم الحذف بنجاح";
                    // header("Location: index.php");
                 
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
           
             
  */                                      
?>