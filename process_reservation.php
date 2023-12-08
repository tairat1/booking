<?php
include 'connect_db/connect_db.php';

// ตรวจสอบห้องที่ว่าง
function isRoomAvailable($roomID, $startDate, $endDate) {
    global $conn;

    // แปลงรูปแบบวันที่และเวลา
    $formattedStartDate = date('Y-m-d 13:00:00', strtotime($startDate));
    $formattedEndDate = date('Y-m-d 12:00:00', strtotime($endDate));

    $sql = "SELECT COUNT(*) AS count
            FROM tblcalendarevent
            WHERE RoomID = $roomID
              AND CE_EndDate >= '$formattedStartDate'
              AND CE_StartDate <= '$formattedEndDate'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // ถ้าห้องว่างคืนค่า true
    // ถ้าห้องไม่ว่างคืนค่า false
    return $row['count'] == 0;
}

// รับข้อมูลจากฟอร์ม
$txtcheckin = $_POST['txtcheckin'];
$txtCheckout = $_POST['txtCheckout'];
$roomID = $_POST['roomID'];

// เพิ่มเงื่อนไขตรวจสอบวันที่
if (strtotime($txtCheckout) > strtotime($txtcheckin)) {
    // เพิ่มเงื่อนไขตรวจสอบวันที่ไม่น้อยกว่าวันที่ปัจจุบัน
    if (strtotime($txtcheckin) >= strtotime(date('Y-m-d'))) {
        // ตรวจสอบว่าห้องว่างหรือไม่
        if (isRoomAvailable($roomID, $txtcheckin, $txtCheckout)) {
            // บันทึกข้อมูลการจอง fix เวลาเช็คอินเช็คเอาท์
            $formattedCheckin = date('Y-m-d 13:00:00', strtotime($txtcheckin));
            $formattedCheckout = date('Y-m-d 12:00:00', strtotime($txtCheckout));

            $sql = "INSERT INTO tblcalendarevent (CE_StartDate, CE_EndDate, RoomID)
                    VALUES ('$formattedCheckin', '$formattedCheckout', $roomID)";

            if (mysqli_query($conn, $sql)) {
                echo "บันทึกข้อมูลการจองเรียบร้อยแล้ว!";
            } else {
                echo "มีข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
            }
        } else {
            echo "ห้องไม่ว่างในช่วงเวลาที่เลือก";
        }
    } else {
        echo "กรุณาเลือกวันที่เช็คอินไม่น้อยกว่าวันที่ปัจจุบัน";
    }
} else {
    echo "กรุณาเลือกวันที่เช็คเอาท์ที่มากกว่าวันที่เช็คอิน";
}
?>
