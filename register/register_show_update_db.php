<?php

//connection
include("connect_db.php");
if(isset($_REQUEST['submit'])){
//รับค่า user & password


date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
        $numrand = (mt_rand());
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
        $id = $_REQUEST['id'];
$Username = $_REQUEST['Username'];
$Password = $_REQUEST['Password'];
$Type = $_REQUEST['Type'];
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Class = $_POST['Class'];
$Status = $_POST['Status'];
$Sex = $_POST['Sex'];
	
	
	$img2 = (isset($_POST['img2']) ? $_POST['img2'] : '');	
	$upload=$_FILES['img']['name'];
	if($upload !='') { 

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
		
	}else {
		$newname = $img2;
	
	}
//query 
$sql="update tbl_member set  member_username='$Username',member_password='$Password', 
                             member_type='$Type',
                             member_fname='$Fname',
                             member_lname='$Lname',
                             member_class='$Class',
                             member_status='$Status',
                             member_sex='$Sex',
                             img='$newname'    
                             where id=$id";
$result = mysqli_query($con,$sql) or die ("Error in query: $sql " . mysqli_error($con). "<br>$sql"); 
if ($result){
    echo "<script>";
echo "alert(\" แก้ไขข้อมูลสำเร็จ\");"; 
echo "window.history.back()";
echo "</script>";
} else {
      echo "เกิดข้อผิดพลาด หรือ ข้อมูลนี้มีอยู่แล้ว". mysqli_connect_error($con) ;  
}

mysqli_close($con);

}
