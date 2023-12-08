<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เช็คห้องว่าง</title>
    
    <!-- เชื่อมโยงกับ Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container col-md-5 mt-5 shadow p-3 mb-5 bg-body rounded"> 
        <!-- ทดสอบส่งฟอร์มบันทึกข้อมูล -->
        <h1 class="mb-4">ระบบจองห้องพัก</h1>

        <form action="process_reservation.php" method="post">
            <div class="mb-3">
                <label for="txtcheckin" class="form-label">วันที่เช็คอิน:</label>
                <input type="date" name="txtcheckin" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="txtCheckout" class="form-label">วันที่เช็คเอาท์:</label>
                <input type="date" name="txtCheckout" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="roomID" class="form-label">หมายเลขห้อง:</label>
                <input type="text" name="roomID" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">ทำการจอง</button>
        </form>
    </div>

    <!-- เชื่อมโยงกับ Bootstrap JavaScript (ให้เพื่อให้ Modal และฟีเจอร์อื่น ๆ ทำงาน) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
