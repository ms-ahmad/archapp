<?php 
//    user_name
//    pass_word
//`UserName`, `password`

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // بداية السيشن
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include_once '../header.php';
        //استلام معلومات المستخدم
    @$user_name = $_POST['user_name'];
    @$pass_word = $_POST['pass_word'];
    @$check = $_POST['check'];
    $check_error = 0;



    if (!isset($user_name) || $user_name == '') {
        echo '<div class="alert alert-danger" role="alert"> يجب ادخال اسم المستخدم  </div>';
        $check_error = 1;
    } elseif (!isset($pass_word) || $pass_word == '') {
        echo '<div class="alert alert-danger" role="alert"> يجب ادخال كلمة المرور</div>';
        $check_error = 1;
    }

    $pass_word =md5($pass_word);

    if ($check_error != 1 && $check == 'sended') {
        include_once '../Connection.php';
        //التأكد من وجود المستخدم في قاعدة البيانات
        $sql = "SELECT * FROM `users` WHERE `UserName` = '$user_name' and `password` = '$pass_word'";
        $result = mysqli_query($conn, $sql);
        // في حال وجود قيود بهذه المعلومات 
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            // معلومات المستخدم موجود الاذن بدخول لوحة تحكم الاعضاء
          
        //    `UserName`, `password`, `addevent`, `addvideo`, `addaudio`, `addphoto`, `image`,
           echo  $_SESSION['UserName'] = $row['UserName'];
           echo "<br>"; 
           echo $_SESSION['addevent'] = $row['addevent'];
            echo "<br>";
            echo $_SESSION['addvideo'] = $row['addvideo'];
            echo "<br>";
            echo $_SESSION['addaudio'] = $row['addaudio'];
            echo "<br>";
            echo $_SESSION['addphoto'] = $row['addphoto'];
            echo "<br>";
            echo $_SESSION['image'] = $row['image'];
            // معلومات المستخدم صحيحة 
            } 
            echo "Ok";
        } else {
            echo "Error: <br>" . $conn->error;
            // معلومات المستخدمة غير صحيحة
            echo '<div class="alert alert-danger" style="text-align: center;" role="alert">فشل عملية الدخول! لا توجد بيانات مطابقة</div>';
        }
      

    }
} else {
    header('Location: login.php');
}
