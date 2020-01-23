<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css4/bootstrap.min.css">
	
	
	<link rel="stylesheet" href="../css4/site.css">

	<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../ccss/buttons.dataTables.min.css">

    <script src="../css4/jquery.min.js"></script>
    <script src="../css4/popper.min.js"></script>
	<script src="../css4/bootstrap.min.js"></script>
	

	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.buttons.min.js"></script>
	<script src="../js/buttons.print.min.js"></script>
	<script src="../js/dataTables.select.min.js"></script>
   
  <link href="../css/all.css" rel="stylesheet"> <!--load all styles -->


  <script type="text/javascript" src="../js/tytabs.jquery.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$("#tabsholder").tytabs({
									tabinit:"2",
									fadespeed:"fast"
									});
			$("#tabsholder2").tytabs({
									prefixtabs:"tabz",
									prefixcontent:"contentz",
									classcontent:"tabscontent",
									tabinit:"3",
									catchget:"tab2",
									fadespeed:"normal"
									});
		});
		
		</script>


<!-- <link href="css/styles2.css" rel="stylesheet" type="text/css" /> -->
<style type="text/css">
.tabs{
  margin-bottom: 0px !important;
  margin-right: -42px;
}

.center {
width:60%;
margin:20px auto 0 auto;
}

.marginbot {
margin-bottom:15px;
}

ul.list li {
list-style-type:none;
margin-left:20px;
}

ul.tabs {
width:100%;
overflow:hidden;
}

ul.tabs li {
list-style-type:none;
display:block;
float: right;;
color:#798fa1;
font-size: 16px;
padding:8px;
margin-right:2px;
border:1px solid #798fa1;
background-color:#fff;
-moz-border-radius: 4px 4px 0 0;
-webkit-border-radius: 4px 4px 0 0;
cursor:pointer;
border-bottom: none;
}

ul.tabs li:hover {
background-color:#43b0ce;
}

ul.tabs li.current {
border-bottom:2px solid #f89e12;
background-color:#f89e12;
padding:8px;
}

.tabscontent {
border:1px solid #f89e12;
border-top:4px solid #f89e12;
padding:8px 15px 15px 15px;
border-radius: 3px;
display:none;
width:100%;
text-align:justify;
}

</style>



</head>
<body>
    <div class="jumbotron text-center headerdiv" style="margin-bottom:0">
        <h1>الأرشفة</h1>

      
          
    </div>




