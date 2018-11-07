
<?php

try {
    require_once('phpDB/connectDB_CD103G3.php');
    $jsonStr = $_REQUEST['jsonStr'];

    // echo  $jsonStr;
    $createG = json_decode($jsonStr);
    $sql = "INSERT INTO `groupon` (`groupon_No`, `groupon_Name`,  `groupon_TagNo`, `groupon_Founder`, `startDate`, `endDate`, `groupon_Bonus`,`groupon_MemberNeed`, `memberNow`, `discount`) VALUES
    (NULL, '$createG->groupon_Name', '$createG->groupon_TagNo', '$createG->groupon_Founder', CURDATE() + $createG->startDate, CURDATE() + $createG->endDate, '$createG->groupon_Bonus', '$createG->groupon_MemberNeed', '0', '0')";
    echo $sql;

    // 抓系統日期 + N天
    // 抓最新一筆的飯團編號
    $meal = $pdo -> prepare($sql);
    $meal -> execute();
    

    header("Location: 3-4_createGroupon_successful.html");
}catch(PDOException $e) {
    echo $e->getMessage();
}
    
  
?>

<!-- INSERT INTO `groupon` (`groupon_No`, `groupon_Name`, `groupon_TagNo`, `groupon_Founder`, `startDate`, `endDate`, `groupon_Bonus`, `memberNow`, `discount`) VALUES (NULL, '驚天霹靂吃飽飽的拿購物金!', '', '2', 'AAA', '2018-11-11', '2018-11-15', '22', '0', '0'); -->