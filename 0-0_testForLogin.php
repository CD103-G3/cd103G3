<?php
    ob_start();
    session_start();

    $memId = $_REQUEST['id'];
       
    require_once('phpDB/connectDB_CD103G3.php');
    $sql = "SELECT * from member WHERE `member_Id`= '$memId'";
    $member = $pdo -> prepare($sql);
    $member -> execute();

    if($member -> rowCount() != 0) {
        $_SESSION['memId'] = $memId;
        
        $memberR = $member -> fetchAll();
        $_SESSION['memNo'] = $memberR[0]['member_No'];
        
        $url = $_SESSION['where'];
        echo $url;
        // $_SESSION['where'] = '';
        header('Location:'. $url);
    } else {
        echo '查無帳號';
        
        unset($_SESSION['memId']);
        $_SESSION['memId'] = '';
        unset($_SESSION['memNo']);
        unset($_SESSION['memMealCount']); //錯誤就把session清空
    }

    
    
    
    




?>