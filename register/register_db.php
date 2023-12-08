<?php 

session_start();
if(isset($_REQUEST['submit'])){
//connection
include("../connect_db/connect_db.php");

//รับค่า user & password
$Username = $_REQUEST['Username'];
$Password = $_REQUEST['Password'];
$Fname = $_REQUEST['Fname'];
$Lname = $_REQUEST['Lname'];
$Type = $_REQUEST['Type'];
$Status = $_REQUEST['Status'];
$hbd = $_REQUEST['hbd'];
$Class = $_REQUEST['Class'];
$Sex = $_REQUEST['Sex'];
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
        $numrand = (mt_rand());
$img = (isset($_POST['img']) ? $_POST['img'] : '');
		
	$upload=$_FILES['img'];
	if($upload <> '') { 
 
	//โฟลเดอร์ที่เก็บไฟล์
	$path="./img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;
 
	$path_copy=$path.$newname;
	$path_link="./img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);  
		
	
	}
  

$sq2="insert into tbl_member(member_username,member_password,member_fname,member_lname,member_type,member_status,member_hbd,member_class,member_sex,img"
        . ") values('$Username','$Password','$Fname','$Lname','$Type','$Status','$hbd','$Class','$Sex','$newname') ";
$sq1="insert into tbl_p(people_member) values('$Username') ";
$result = mysqli_query($conn,$sq2);
$result1 = mysqli_query($conn,$sq1);

if ($result&&$result1){
	echo "<script type='text/javascript'>";
			echo  "alert('สมัคสมาชิคเรียบร้อย');";
			echo "window.location='register.php';";
			echo "</script>";
} else {
      echo "เกิดข้อผิดพลาด หรือ ข้อมูลนี้มีอยู่แล้ว". mysqli_connect_error($conn) ;   
}

mysqli_close($conn);
}  

?>
