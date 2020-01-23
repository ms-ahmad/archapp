<?php

$q=$_GET['q'];



include_once('../Connection.php');
// include_once('../header.php');
?>

<style>
.mylabel{
    width: 100%;
}
.searchinput{
    margin-right: 7px;
border-radius: 5px;
width: 350px;
height: 35px;
background-color: #fff;
}
</style>

<div style="float: right ; margin: 20px 20px 20px 20px;">
    <a href="add_form.php" id="btnNew" class="btn btn-success"> إضافة جديد</a><br />
</div>
    <?php
$i = 0;



/////////////////////////////////////////////////////

?>
<!-- <div style="width: 80%;">
     <form class="btnform" action="searchAjax.php" method="GET">
        <table style="width: 100%;">
            <tr>
                <td style="width: 70%;">
                    <input type="text" class="form-control" name="strSearch" id="strSearch">
                </td>
                <td>
                    <input type="submit" value="أبحث" class="btn btn-info">
                </td>
            </tr>
        </table>
    </form>
</div>
<br> -->
<table id="example" class="table table-striped bg-light text-center display">

    <thead>
        <tr >
            <th>ت </th>
            <th>العنوان</th>
            <th>المحاضر</th>
            <th>الموضوع</th>
            <th>الوصول</th>
            <th>المجموعة</th>
            <th>التاريخ</th>
            <th>المكان</th>
            <th>الصورة</th>
            <th> </th>

        </tr>
    </thead>
  
    <tbody>

        <?php
          $sqlsubj ="SELECT * FROM `Subjects` ";
          
          $sql_join = "SELECT events.*,access.title accessname,category.title categoryname 
          FROM events LEFT JOIN access ON events.id_Access=access.id  LEFT JOIN category ON events.id_Category=category.id 
          WHERE Is_Not_active='0' AND `Persons` LIKE '%$q%'";
          $result_join = mysqli_query($conn, $sql_join);
          if (mysqli_num_rows($result_join) > 0) {
              while ($row = mysqli_fetch_assoc($result_join)) {
                  $subj="";      
                  $subj1="";      
                  
                  $subj = rtrim($row["Subjects"], ",");
                  $subjectarray =explode(',',$subj);
                    foreach ($subjectarray as $value) {
                
                        $resultsubj = mysqli_query($conn, $sqlsubj);
                        while ($rowsubj = mysqli_fetch_assoc($resultsubj)) {
                            if ($rowsubj['id']==$value) {
                                $subj1.= $rowsubj['title']." - ";
                            }
                        }
                    }
                $subj1 = rtrim( $subj1, " - ");
                $location = $row["Country"] .' - '.$row["State"] .' - '.$row["Area"];
                $location = rtrim( $location, " - ");
                $i++;
                echo '<tr title="'.$row["Description"].'">';
                echo '<td>' . $i . '</td>';
                echo '<td>' .  $row["Title"].'</td>';
                echo '<td>' .  $row["Lecturer"].'</td>';
                echo '<td>' ;
                 echo  $subj1 ;
                // print_r(explode(',',$subj));
                echo '</td>';
                // echo '<td>' . $row["Subjects"] . '</td>';
                echo '<td>' . $row["accessname"] . '</td>';
                echo '<td>' . $row["categoryname"] . '</td>';
                echo '<td>' . $row["Date_M"] .'<br>'.$row["Date_H"] .'</td>';
                echo '<td>' . $location .'</td>';
             

                echo '<td>';
                ?>
                     <form class="btnform" style="display: inline-block" action="../event/Details.php" method="POST">
                    <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
                    <input type="hidden" name="subjects" value="<?php echo $subj1;?>">
                                        
                    <button style="border: none"><img class="img-thumbnail thumbnail" style="max-width:75px;" src="../image/events/<?php echo  $row["image"]; ?>" ></button>
                </form> </td>
                
                <td>  
                     <form class="btnform" class="btnform" style="display: inline-block" action="../photo/add_form.php" method="POST">
                        <input type="hidden" name="AccessEvent" value="<?php echo $row['id_Access'];?>">
                        <input type="hidden" name="TitleEvent" value="<?php echo $row['Title'];?>">
                        <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
                        <input type="hidden" name="dateEvent" value="<?php echo  $row["Date_M"];?>">
                    <button title="أضافة صورة"  class="btn btn-info"> <i class="fa fa-camera-retro "></i></button>
                </form>     
               
                 <form class="btnform" style="display: inline-block"  action="../video/add_form.php" method="POST">
                    <input type="hidden" name="AccessEvent" value="<?php echo $row['id_Access'];?>">
                    <input type="hidden" name="TitleEvent" value="<?php echo $row['Title'];?>">
                    <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
                    <input type="hidden" name="dateEvent" value="<?php echo  $row["Date_M"];?>">
                    <button title="أضافة فيديو" class="btn btn-info">  <i class="fa fa-video "></i></button>
                </form>     
                 <form class="btnform" style="display: inline-block" action="../audio/add_form.php" method="POST">
                    <input type="hidden" name="AccessEvent" value="<?php echo $row['id_Access'];?>">
                    <input type="hidden" name="TitleEvent" value="<?php echo $row['Title'];?>">
                    <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
                    <input type="hidden" name="dateEvent" value="<?php echo  $row["Date_M"];?>">
                    <button  title="أضافة صوت" class="btn btn-info">  <i class="fa fa-volume-up "></i></button>
                </form>     
                 <form class="btnform" style="display: inline-block" action="edit_form.php" method="POST">
                    <input type="hidden" name="IdEvent" value="<?php echo $row['id'];?>">
                    <button  title="تعديل" class="btn btn-warning">  <i class="fa fa-edit "></i></button>
                </form> 
           
                    <button  title="حذف"   onclick="deleteitem(<?php echo $row["id"]; ?>,'<?php echo $row["Title"]; ?>')" class="btn btn-danger">  <i class="fa fa-trash-alt "></i></button>
      
            </td>
         


        <?php
                echo '</tr>';
            }
           ?>
            </tbody>
                <tfoot>
                    <tr>
                        <th>ت </th>
                        <th>العنوان</th>
                        <th>المحاضر</th>
                        <th>الموضوع</th>
                        <th>الوصول</th>
                        <th>المجموعة</th>
                        <th>التاريخ</th>
                        <th>المكان</th>
                        <th>الصورة</th>
                        <th> </th>
                    </tr>
                </tfoot>
            </table>
           <?php
        } else {
            echo "لا توجد نتائج";
        }

        ?>
        </div>
        <!-- Modal -->
<div  class="modal fade" id="myModal" tabindex="-1" style="padding: 100px; direction: rtl; text-align: right !important; z-index: 10000; " role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style="  padding: 30px;  role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="float: left;" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="float: right;" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body" style="direction: rtl;" id="myModalBody">

            </div>
        </div>
    </div>
</div>
<!--End Modal -->

<script> 
       function deleteitem(id, name) {
           $.get("delete.php?id="+id+"&name="+name, function(result) {
               $("#myModal").modal();
               $("#myModalLabel").html("حذف حدث");
               $("#myModalBody").html(result);
            });
        }
        
        
        
        
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة الكل',
                        exportOptions: {
                            modifier: {
                                selected: null
                            }
                        }
                    },
                    {
                        extend: 'print',
                        text: 'طباعة المحدد'
                    }
                ],
                select: true
            } );
             $( ".buttons-print" ).addClass( "btn btn-primary" );
            $( "input" ).addClass( "searchinput" );
             $( "label" ).addClass( "mylabel" );
        } );
</script>

 
