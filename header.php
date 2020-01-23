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
		




	
        function add() {
            var xhr = new XMLHttpRequest();
            var user_name = document.getElementById("user_name").value;
            var user_name = document.getElementById("user_name").value;
            var check = document.getElementById("check").value;

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("show").innerHTML = xhr.responseText;
                    redirction();
                }
            };
            xhr.open("POST", "../user/login_page.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("&user_name=" + user_name + "&user_name=" + user_name + "&check=" + check);
        }

        function all_function() {
            add();
            cleartext();
        }
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
    <div class="jumbotron text-center headerdiv" style="margin-bottom:0";>
        <h1>الأرشفة</h1>
		<button onclick="document.getElementById('id01').style.display='block'" style="width:auto; float:right">تسجيل الدخول</button>
      
          
    </div>


<!-- //////////////////////////////////////////////// -->


<style>
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 25%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.password {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 60%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.password {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>




<div id="id01" class="modal">
  
  <form class="modal-content animate" action="../user/login_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="../css4/img_avatar.jpg" alt="صورة رمزية" class="avatar">
	</div>
	<div style="font-size: 20px;margin-top: 10px" id="show"></div>
    <input type="hidden" name="check" id="check" value="sended" />
    <div class="container" style="direction: rtl;">
      <label style="float: right;" for="user_name"><b>اسم المستخدم</b></label>
      <input type="text" placeholder="ادخل اسم المستخدم" name="user_name" required>

      <label style="float: right;" for="pass_word"><b>كلمة المرور</b></label>
      <input type="password" placeholder="ادخل كلمة المرور" name="pass_word" required>
        
      <button onclick="add()" type="submit">تسجيل الدخول</button>

    </div>

  
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>




