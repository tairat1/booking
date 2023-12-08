<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="rechkbook.php">
  <table width="333" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="186"><label>txtChekIn
      <label for="txtcheckin">วันที่เข้า</label>
     <input type="date" id="txtcheckin" name="txtcheckin">
        </label>      
    </td>
      <td width="141" rowspan="2"><label>
          <div align="center">
            <input type="submit" name="Submit" value="ค้นหา">
          </div>
        </label>      </td>
    </tr>
    <tr>
      <td><label>txtChekout
      <label for="txtChekout">วันที่ออก</label>
     <input type="date" id="txtChekout" name="txtChekout">
        </label>      
    </td>
    </tr>
    <tr>
      <td colspan="2">เลือกประเภท
      
      <p>
        <label>
        <input type="radio" name="chktype" value="1">
          เช็คห้องที่ถูกจอง</label>
        <br>
        <label>
          <input type="radio" name="chktype" value="2">
          เช็คห้องว่าง ไม่ถูกจอง </label>
        <br>
      </p></td>
    </tr>
  </table>
  <br>
</form>
</body>
</html>
