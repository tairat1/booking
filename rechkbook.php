<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>Untitled Document</title>
</head>

<body>
<?php
include 'connect_db/connect_db.php';

if (!empty($_POST['txtcheckin']) || !empty($_POST['txtChekout'])) {
    date_default_timezone_set('UTC');
    $startdate = $_POST['txtcheckin']; // '2023-12-08';
    $enddate = $_POST['txtChekout']; // '2023-12-10';
    $enddate1 = $_POST['txtcheckin'];

    while (strtotime($startdate) <= strtotime($enddate)) {
    
        echo "วันที่   " . "$startdate" . '<br>';

        $conn = new mysqli("localhost", "root", "", "booking");

        if ($_POST['chktype'] == 1) {
            $stmt = $conn->prepare("SELECT
                tblcalendarevent.Event_ID,
                tblcalendarevent.CE_StartDate,
                tblcalendarevent.CE_EndDate,
                tblcalendarevent.CE_Title,
                tblcalendarevent.CE_Descript,
                tblcalendarevent.RoomID,
                tblcalendarevent.szState,
                tblrooms.RoomType,
                tblrooms.RoomName
                FROM
                tblcalendarevent
                INNER JOIN tblrooms ON tblcalendarevent.RoomID = tblrooms.RoomID
                WHERE NOT( ? < CE_StartDate OR ? > CE_EndDate)
                ORDER BY RoomID");

            $stmt->bind_param("ss", $enddate1, $startdate);
            $stmt->execute();
            $result = $stmt->get_result();
        } elseif ($_POST['chktype'] == 2) {
            $stmt = $conn->prepare("SELECT
                tblrooms.RoomID,
                tblrooms.RoomName,
                tblrooms.RoomType
                FROM
                tblrooms
                WHERE tblrooms.roomID NOT IN (SELECT tblrooms.RoomID FROM tblrooms
                INNER JOIN tblcalendarevent ON tblrooms.RoomID =tblcalendarevent.RoomID
                WHERE NOT( ? < CE_StartDate OR ? > CE_EndDate))");

            $stmt->bind_param("ss", $enddate1, $startdate);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        while ($objResult2 = $result->fetch_assoc()) {
            echo "ห้อง " . $objResult2["RoomID"] . "<br>";
        }

        echo "<hr>";

        $stmt->close();
        $conn->close();

        $startdate = date("Y-m-d", strtotime("+1 day", strtotime($startdate)));
        $enddate1 = date("Y-m-d", strtotime("+1 day", strtotime($enddate1)));
    }
}
?>

</body>
</html>

