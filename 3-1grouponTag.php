<?php
    require_once('phpDB/connectDB_CD103G3.php');
    $sql = "select * from groupontag";
    $tag = $pdo -> prepare($sql);
    $tag -> execute();
    $tagR = $tag -> fetchAll();
    foreach ($tagR as $i => $tagR) {
        
?>
<option value="tag<?php echo $tagR["groupon_TagNo"]; ?>">
    <?php echo $tagR["groupon_TagName"];  ?>
</option>

<?php
    }
    
   
?>