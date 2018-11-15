<?php
    ob_start();
    session_start();
    require_once('phpDB/connectDB_CD103G3.php');
    $memId = $_SESSION['memId'];
    $sql = "SELECT * from groupontag WHERE `groupon_TagName` != '官方飯團'";
    $tag = $pdo -> prepare($sql);
    $tag -> execute();
    $tagR = $tag -> fetchAll();
    foreach ($tagR as $i => $tagRe) {
        
?>
<option value="tag<?php echo $tagRe["groupon_TagNo"]; ?>">
    <?php echo $tagRe["groupon_TagName"];   ?>
</option>

<?php
    }
    
?>


<?php
if( strrpos($memId,'ayCook') ) {?>
    <option value="tag8">
        官方飯團
    </option>
    <?php  }
  
   
?>