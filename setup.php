
<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Archapp";
$conn = new PDO("mysql:host=$servername", $username, $password);


// إنشاء قاعدة البيانات
// Create database
try {
    $sql = "CREATE DATABASE IF NOT EXISTS  $dbname CHARACTER SET utf8 COLLATE utf8_general_ci ";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$sql = null;
$conn = null;
//////////////// نهاية إنشاء قاعدة البيانات

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


//////////////////// إنشاء جدول المستخدمين/////// users
try {

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `users` (
	`id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
	,`UserName` varchar(150) UNIQUE NOT NULL  COMMENT 'اسم المستخدم'
	,`password` varchar(150)  NOT NULL  COMMENT 'كلمة المرور'

	,`addevent` json  NOT NULL DEFAULT '0'  COMMENT 'إضافة حدث'
    ,`addvideo` json  NOT NULL DEFAULT '0'  COMMENT 'إضافة فيديو'
    ,`addaudio` json  NOT NULL DEFAULT '0'  COMMENT 'إضافة صوت'
    ,`addphoto` json  NOT NULL DEFAULT '0'  COMMENT 'إضافة صورة'

	,`image` varchar(150)    COMMENT 'صورة'
	,`Is_Not_Active` BOOLEAN  DEFAULT '0'  COMMENT 'غير فعال'
	) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table users created successfully<br />";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
//////////////// نهاية إنشاء جدول المستخدمين


//////////////// إنشاء جدول الصور/////////// photo	
try {
    
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `photo` (
	    `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
        ,`id_events` int(6) NOT NULL COMMENT 'الحدث'
        ,`id_Access` int(6) NOT NULL COMMENT 'الوصول'
        ,`KeyWords` varchar(255) COMMENT 'كلمات مفتاحية'
        ,`id_Category` int(6) NOT NULL COMMENT 'المجموعة'
        , `Persons` varchar(255) COMMENT 'الأشخاص الموجودين'
        ,`Description` TEXT(255) COMMENT 'توضيح'
     	,`path` varchar(255) COMMENT 'مسار الصورة'
	
	    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table photo created successfully<br />";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
//////////////// نهاية إنشاء جدول الصور 



//////// //////// إنشاء جدول الصوت/////////// audio	
try {
    
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `audio` (
    `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,`id_events` int(6) NOT NULL COMMENT 'الحدث'
    ,`id_Access` int(6) NOT NULL COMMENT 'الوصول'
    ,`KeyWords` varchar(255) COMMENT 'كلمات مفتاحية'
    ,`id_Category` int(6) NOT NULL COMMENT 'المجموعة'
    , `Persons` varchar(255) COMMENT 'الأشخاص الموجودين'
    ,`path` varchar(255) COMMENT 'مسار الصوت'	
    ,`Description` TEXT(255) COMMENT 'توضيح'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

// use exec() because no results are returned
$conn->exec($sql);
echo "Table audio created successfully<br />";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
//////////////// نهاية إنشاء جدول الصوت 


////////////// إنشاء جدول فيديوهات///////////// video	
try {
    
      // sql to create table
      $sql = "CREATE TABLE IF NOT EXISTS `video` (
        `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
        ,`id_events` int(6) NOT NULL COMMENT 'الحدث'
        ,`id_Access` int(6) NOT NULL COMMENT 'الوصول'
        ,`KeyWords` varchar(255) COMMENT 'كلمات مفتاحية'
        ,`id_Category` int(6) NOT NULL COMMENT 'المجموعة'
        , `Persons` varchar(255) COMMENT 'الأشخاص الموجودين'
        ,`Description` TEXT(255) COMMENT 'توضيح'
        ,`path` varchar(255) COMMENT 'مسار الفيديو'
        
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

// use exec() because no results are returned
$conn->exec($sql);
echo "Table video created successfully<br />";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
//////////////// نهاية إنشاء جدول فيديوهات 


//////////////// إنشاء جدول المجموعات/////////// category	
try {
    
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `category` (
	`id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
	,`title` varchar(50) COMMENT 'العنوان'
    ,`id_parent` int(6) NOT NULL COMMENT 'المجموعة الأب'	
	) ENGINE=InnoDB DEFAULT CHARSET=utf8";    

// use exec() because no results are returned
$conn->exec($sql);
echo "Table category created successfully<br />";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}    
//////////////// نهاية إنشاء جدول المجموعات 



//////////////// إنشاء جدول الصفات الادوار/////////// roles	
try {
    
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `roles` (
	`id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY

	,`title` varchar(50) COMMENT 'العنوان'

	) ENGINE=InnoDB DEFAULT CHARSET=utf8";    

// use exec() because no results are returned
$conn->exec($sql);
echo "Table roles created successfully<br />";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}    
//////////////// نهاية إنشاء جدول الصفات ـ الأدوار 

//////////////// إنشاء جدول الوصول///////// Access	
try {
    
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `Access` (
	`id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY

	,`title` varchar(50) COMMENT 'العنوان'

	) ENGINE=InnoDB DEFAULT CHARSET=utf8";    

// use exec() because no results are returned
$conn->exec($sql);
echo "Table Access created successfully<br />";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}    
//////////////// نهاية إنشاء جدول الوصول 

//////////////// إنشاء جدول الموضوعات///////// Subjects	
try {
    
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `Subjects` (
	`id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY

	,`title` varchar(50) COMMENT 'الموضوع'

	) ENGINE=InnoDB DEFAULT CHARSET=utf8";    

// use exec() because no results are returned
$conn->exec($sql);
echo "Table Subjects created successfully<br />";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}    
//////////////// نهاية إنشاء جدول الموضوعات 


////////////// إنشاء جدول الحدث///////////// events	
try {
    
      // sql to create table
      $sql = "CREATE TABLE IF NOT EXISTS `events` (
        `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
        ,`id_Access` int(6) NOT NULL COMMENT 'الوصول'
        ,`id_Category` int(6) NOT NULL COMMENT 'المجموعة'
        ,`Title` varchar(255) NOT NULL COMMENT 'العنوان'
        , `Date_M` varchar(15) CHARSET utf8 NOT NULL COMMENT 'التاريخ الميلادي'
        , `Date_H` varchar(15) CHARSET utf8 NOT NULL COMMENT 'التاريخ الهجري'
        , `Subjects` varchar(250) CHARSET utf8 NOT NULL COMMENT 'الموضوعات'
        , `Lecturer` varchar(250) CHARSET utf8 NOT NULL COMMENT 'المحاضر'
        , `Country` varchar(20) CHARSET utf8 NOT NULL COMMENT 'الدولة'
        , `State` varchar(20) CHARSET utf8 NOT NULL COMMENT 'المحافظة'
        , `Area` varchar(20) CHARSET utf8 NOT NULL COMMENT 'المنطقة'
        , `Point` varchar(100) COMMENT 'أقرب نقطة دالة'
        , `Persons` varchar(255) COMMENT 'الأشخاص الموجودين'
        , `KeyWords` varchar(255) COMMENT 'كلمات مفتاحية'
        , `Description` varchar(255) COMMENT 'توضيح'
        ,`id_user` int(4) NOT NULL COMMENT 'مدخل البيانات'
        , `Date_Add` varchar(15) CHARSET utf8 NOT NULL COMMENT 'تاريخ الإدخال'
        , `Is_Not_active` boolean  COMMENT 'غير فعال'
        , `image` varchar(255) CHARSET utf8 NOT NULL COMMENT 'الصورة البارزة'        
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

// use exec() because no results are returned
$conn->exec($sql);
echo "Table events created successfully<br />";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
//////////////// نهاية إنشاء جدول الحدث 

$sql = null;
$conn = null;
?>