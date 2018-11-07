

<?php

try {
    require_once('phpDB/connectDB_CD103G3.php');
    $sql = "select * from meal";
    $meal = $pdo -> prepare($sql);
    $meal -> execute();
    if( $meal -> rowCount() != 0) {
        $mealR = $meal -> fetchAll();
        $jsonStr = json_encode($mealR);
    }else {
        $jsonStr = 'not found';
    }

    echo $jsonStr;
}catch(PDOException $e) {
    echo $e->getMessage();
}
    
  
?>