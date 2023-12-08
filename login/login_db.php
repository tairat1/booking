<?php 
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
session_start();
if(isset($_REQUEST['Username'])){
//connection
include("../connect_db/connect_db.php");
//รับค่า user & password
$Username = $_REQUEST['Username'];
$Password = $_REQUEST['Password'];
//query 
//$sql="select * from tbl_member m left join tbl_p p on m.member_username = p.people_member where m.member_username ='".$Username."' and m.member_password = '".$Password."'";
$sql="select * from booking_member  where member_id ='".$Username."' and member_pass = '".$Password."'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){
$row1 = mysqli_fetch_assoc($result);
$_SESSION["Username"] = $row1["member_id"];//ประกาศตัวแปรUserIDไว้เพื่อส่งค่า
$_SESSION["status"] = $row1["member_status"];//ประกาศตัวแปรstatusไว้เพื่อส่งค่า
$_SESSION["ID"] = $row1["id"];  // $_SESSION["ID"] == สร้าง seesstion เพื่อเก็บค่าฟิวที่ต้องการนำไปใช้ตามต้องการ




    

if($_SESSION["status"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
Header("Location: ../index.php");
}  

if ($_SESSION["status"]=="T"){  //ถ้าเป็น ครู ให้กระโดดไปหน้า teacher_page.php
Header("Location: ./articles_show_1.php");
}
if ($_SESSION["status"]=="S"){  //ถ้าเป็น นักเรียน ให้กระโดดไปหน้า student_page.php
Header("Location: ./articles_show.php");
}
}else{
echo "<script>";
echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
echo "window.history.back()";
echo "</script>";
}


}else{
Header("Location: index.php"); //user & password incorrect back to login again
}
?>
