<?php
include("./connect_db.php");
if(isset($_REQUEST['id'])){
//connection

//รับค่า user & password
$id = isset($_GET['id']) ? $_GET['id']:'';
//query 
$sql="delete from tbl_member     where id=$id";
$result = mysqli_query($con,$sql);
if ($result){
    echo "<script>";
echo "alert(\" ลบข้อมูลสำเร็จ\");"; 
echo "window.history.back()";
echo "</script>";
} else {
      echo "เกิดข้อผิดพลาด หรือ ข้อมูลนี้มีอยู่แล้ว" ;  
}

mysqli_close($con);
}
