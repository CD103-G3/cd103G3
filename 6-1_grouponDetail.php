<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Reset.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/gsap/src/minified/TweenMax.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
<!--  phpStartHere -->
<?php

try {
    require_once('phpDB/connectDB_CD103G3.php');
    $sql = "select * from groupontag";
    $tag = $pdo -> prepare($sql);
    $tag -> execute();
    $tagR = $tag -> fetchAll(); //標籤

    $sql = "select * from groupon where groupon_No = :no";
    $groupon = $pdo -> prepare($sql);
    $groupon -> bindValue('no', $_REQUEST['no']);
    $groupon -> execute();
    if( $groupon -> rowCount() != 0) {
        $grouponR = $groupon -> fetchAll();
        foreach($grouponR as $i => $grouponR) {
?>





    <title><?php echo $grouponR["groupon_Name"] ?></title>
</head>
<body>
    <nav>
            <!-- 這裡放導覽列 -->
    </nav>

<div class="penguinPage"> 

    <div class="maxWidthWrapper" >
        <div class="grouponDetail-container">
            <div class="grouponTitle-wrapper">
                <div class="text-box">
                    <span class="tag">#
                        <?php 
                    
                            echo $tagR[$grouponR["groupon_No"]-1]['groupon_TagName'] 
                        
                        ?>
                    
                    </span>
                    <h2><?php echo $grouponR["groupon_Name"] ?></h2>
                </div>                
                <div class="backRibbon"></div>  
                <div class="leftRibbon"></div>
                <div class="rightRibbon"></div>
                <div class="userInfo-wrapper clearfix">
                    <div class="grouponUser">
                        <span>發起人: </span>
                    </div>
                    <div class="userPic">
                        <div class="pic">
                            <img src="asset/user01.png" alt="user">
                        </div>
                    </div>
                    <div class="user grid-9">
                        <h3 class="userId">
                        <?php echo $grouponR["groupon_Founder"] ?>
                        </h3>
                        <div class="userExp clearfix">
                            <div class="achievePic grid-4">
                                <div class="pic">
                                    <img src="asset/achieve01.png" alt="">
                                </div>
                            </div>
                            <div class="achStatus grid-8 clearfix">
                                <h3>
                                    小菜蟲
                                </h3>
                                <p>
                                    <span>300 </span> EXP
                                </p>
                            </div>
                            <div class="hint--achievement">
                                <div class="pic grid-6">
                                    <img src="asset/achieve01.png" alt="">
                                </div>
                                <p>
                                    <span class="achName">小菜蟲成就</span> <br> 吃完10餐後可獲得，可拿到<span>10</span>元折價券
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bonus-wrapper clearfix">
                <div class="endDate grid-12 grid-md-3">
                    <p>募集截止日</p>
                    <span>
                        <?php 
                            $date = substr($grouponR["endDate"], 5);
                            $endDate = str_replace('-','/' ,$date);
                            echo $endDate;
                        ?>
                    </span>
                </div>
                <div class="progress-container grid-12 grid-md-5">
                    <h3>已參加人數  /  門檻人數</h3>
                    <div class="people-container">
                        <span class="peopleNow">
                            <?php echo $grouponR["memberNow"] ?>
                        </span> / 
                        <span class="peopleNeeded">
                            <?php echo $grouponR["groupon_MemberNeed"] ?>
                        </span>
                    </div>
                    <div class="progressBar">
                        <div class="progressBar_B"></div>
                    </div>
                    <input type="hidden" id="grouponProgressRatio" value="<?php echo ($grouponR["memberNow"] / $grouponR["groupon_MemberNeed"]) ?>">
                </div>
                <div class="bonus-container  grid-6 grid-md-4 clearfix">
                    <div class="bonus grid-3">
                        <div class="pic">
                            <img src="asset/bonusIcon-05.svg" alt="bonus">
                            <span class="bonus-coin">
                                <?php echo $grouponR["groupon_Bonus"] ?>
                            </span>
                        </div>
                    </div>
                    <div class="bonusPeople grid-9">
                        <h3>達到後 前 
                            <span class="people">0</span>
                            人每人:  
                        </h3>
                        <p>
                            <span class="bonus">
                                <?php echo $grouponR["groupon_Bonus"] ?>
                            </span>
                            元購物金
                        </p>
                    </div>
                </div>
                <div class="almostSucc-icon">
                    即將達標    
                </div>
            </div>
            <div class="mealDetail-wrapper clearfix">
                <div class="meal-count grid-12">
                    <h3>
                        飯團餐點: 總共
                        <span>
                            0
                        </span>
                        餐
                    </h3>
                </div>
                <div class="mealSmallPic-container grid-12">
                    <h3>
                        全部餐點預覽</h3>
                </div>
                <div class="mealPic grid-10 grid-md-4">
                    <div class="pic">
                        <img src="asset/bentou04.jpg" alt="meal" id="grouponDetail_pic">
                    </div>
                </div>
                <div class="mealInfo-container grid-12 grid-md-8">
                    <h2 id="grouponDetail_title">
                        番茄蛋包飯
                    </h2>
                    <p id="grouponDetail_info">
                        簡單幾句話說明一切: 目前為止吃過最有品質的日式料理吃到飽，尤其烤牛排生魚片跟炸蝦真的好棒!!! 都得用週年慶的力氣去排隊~
                    </p>
                    <div class="score-wrapper">
                        <span>綜合評分: </span>
                        <span class="scoreNum" id="grouponDetail_score">4.0</span>
                        <div class="scoreEgg-container" score="2.7" >
                            <ul>
                                <li>
                                    <div class="pic">
                                        <img src="asset/scoreEgg_w.svg" alt="scoreYes" class="score">
                                    </div>
                                </li>
                                <li>
                                    <div class="pic">
                                        <img src="asset/scoreEgg_w.svg" alt="scoreYes" class="score">
                                    </div>
                                </li>
                                <li>
                                    <div class="pic">
                                        <img src="asset/scoreEgg_w.svg" alt="scoreYes" class="score">
                                    </div>
                                </li>
                                <li>
                                    <div class="pic">
                                        <img src="asset/scoreEgg_w.svg" alt="scoreYes" class="score">
                                    </div>
                                </li>
                                <li>
                                    <div class="pic">
                                        <img src="asset/scoreEgg_w.svg" alt="scoreYes" class="scoreW">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kcal-wrapper">
                        <span>餐點熱量</span>
                        <p>
                            <span class="kcal" id="grouponDetail_kcal">870</span>
                            大卡
                        </p>
                    </div>
                </div>
            </div>
            <div class="mealInfo-wrapper clearfix">
                <div class="mealAndKcal grid-12 grid-md-5">
                    <div class="avgPrice grid-6 grid-md-6">平均
                        <span>72</span>
                        元 / 餐
                    </div>
                    <div class="avgKcal grid-6 grid-md-6">
                        平均<span>
                            700
                        </span>
                        大卡 / 餐
                    </div>
                </div>
                <div class="price grid-12 grid-md-3">
                    <div class="originalPrice grid-6">
                        原價<span>
                            800元
                        </span>
                    </div>
                    <div class="grouponPrice grid-12">
                        飯團價(6折) <span>
                            640元
                        </span>
                    </div>
                </div>
                <div class="callToAction grid-12 grid-md-4">
                    <a href="6-2_grouponPayment.php?no=<?php echo $_REQUEST['no'] ?>" class="subBTN">
                        參加此飯團 
                    </a>
                </div>
            </div>
            <input type="checkbox" id="share6_1">
            <div class="share-wrapper">
                <label class="shareGroupon-BTN" for="share6_1">
                    分享此飯團
                </label>
                <div class="shareInfo-container">
                    <div class="shareInfo-wrapper clearfix">
                        <h2>
                            使用以下QRcode / 代碼分享給朋友
                        </h2>
                        <p>
                            即可查看此飯團，達到門檻的朋友們，<br>
                            通通都可以拿到購物金!!
                        </p>
                        <div class="shareInfo-wrapper clearfix">
                            <div class="QRcode grid-12 grid-md-6">
                                <h3>
                                    QRcode
                                </h3>
                                <p>
                                    掃描此QRcode即可看到此飯團
                                </p>
                                <div class="QR-container">
                                    <div class="pic">
                                        <img src="asset/QR.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="shareCode grid-12 grid-md-6">
                                <h3>
                                    飯團代碼
                                </h3>
                                <span class="">
                                    可點擊"參加好友飯團"的按鈕，輸入此代碼來直接查看此飯團
                                </span>
                                <div class="codeHere clearfix">
                                    <input type="text" class="grid-9 groupon_shareCode" value="Absjj001" readonly> 
                                    <span class="grid-3 copyCode">
                                        複製代碼
                                    </span>
                                    <div class="hint">
                                        已複製此代碼
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shareFB-wrapper">
                        <span class="shareFB">或是直接分享此飯團到您的FB</span>
                        <div class="fb-share-button" data-href="http://127.0.0.1:5500/6-1_grouponDetail.html" data-layout="button_count" data-size="large" data-mobile-iframe="true">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A5500%2F6-1_grouponDetail.html&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">分享</a>
                        </div>
                    </div>
                </div>
            </div>
            <label class="share6_1-bg" for="share6_1"></label>
        </div>
    </div>
    <div class="recommendGroupon-wrapper">
        <h2>其他推薦飯團</h2>
        <div class="owl-carousel">
            <div class="groupon-box">
                <div class="groupon_topUI clearfix">
                    <div class="leftUI grid-12">
                        <div class="titleTag grid-12">
                            <span class="tag">#超滿足</span>
                            <h3>日式和食小資飯團</h3>
                        </div>
                        <div class="meal-container grid-12 clearfix">
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="豪華便當組"  title="豪華便當組">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="andMoreMeal-counter">
                                ...總共 <span>5</span>個餐點
                            </div>
                        </div>
                    </div>
                </div>
                <div class="groupon_bottomUI clearfix">
                    <div class="grid-12">
                        <div class="mealAndKcal grid-6">
                            <div class="avgPrice grid-12">平均
                                <span>72</span>
                                元 / 餐
                            </div>
                        </div>
                        <div class="price grid-6">
                            <div class="grouponPrice">
                                飯團價(6折) <span>
                                    640元
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-container grid-12">
                        <a href="##" class="subBTN">
                            查看此飯團
                        </a>
                    </div>
                </div>
                <div class="almostSucc-icon">
                    即將達標
                </div>
            </div>
            <div class="groupon-box">
                <div class="groupon_topUI clearfix">
                    <div class="leftUI grid-12">
                        <div class="titleTag grid-12">
                            <span class="tag">#超滿足</span>
                            <h3>日式和食小資飯團</h3>
                        </div>
                        <div class="meal-container grid-12 clearfix">
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="豪華便當組"  title="豪華便當組">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="andMoreMeal-counter">
                                ...總共 <span>5</span>個餐點
                            </div>
                        </div>
                    </div>
                </div>
                <div class="groupon_bottomUI clearfix">
                    <div class="grid-12">
                        <div class="mealAndKcal grid-6">
                            <div class="avgPrice grid-12">平均
                                <span>72</span>
                                元 / 餐
                            </div>
                        </div>
                        <div class="price grid-6">
                            <div class="grouponPrice">
                                飯團價(6折) <span>
                                    640元
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-container grid-12">
                        <a href="##" class="subBTN">
                            查看此飯團
                        </a>
                    </div>
                </div>
                <div class="almostSucc-icon">
                    即將達標
                </div>
            </div>
            <div class="groupon-box">
                <div class="groupon_topUI clearfix">
                    <div class="leftUI grid-12">
                        <div class="titleTag grid-12">
                            <span class="tag">#超滿足</span>
                            <h3>日式和食小資飯團</h3>
                        </div>
                        <div class="meal-container grid-12 clearfix">
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="豪華便當組"  title="豪華便當組">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="andMoreMeal-counter">
                                ...總共 <span>5</span>個餐點
                            </div>
                        </div>
                    </div>
                </div>
                <div class="groupon_bottomUI clearfix">
                    <div class="grid-12">
                        <div class="mealAndKcal grid-6">
                            <div class="avgPrice grid-12">平均
                                <span>72</span>
                                元 / 餐
                            </div>
                        </div>
                        <div class="price grid-6">
                            <div class="grouponPrice">
                                飯團價(6折) <span>
                                    640元
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-container grid-12">
                        <a href="##" class="subBTN">
                            查看此飯團
                        </a>
                    </div>
                </div>
                <div class="almostSucc-icon">
                    即將達標
                </div>
            </div>
            <div class="groupon-box">
                <div class="groupon_topUI clearfix">
                    <div class="leftUI grid-12">
                        <div class="titleTag grid-12">
                            <span class="tag">#超滿足</span>
                            <h3>日式和食小資飯團</h3>
                        </div>
                        <div class="meal-container grid-12 clearfix">
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="豪華便當組"  title="豪華便當組">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="andMoreMeal-counter">
                                ...總共 <span>5</span>個餐點
                            </div>
                        </div>
                    </div>
                </div>
                <div class="groupon_bottomUI clearfix">
                    <div class="grid-12">
                        <div class="mealAndKcal grid-6">
                            <div class="avgPrice grid-12">平均
                                <span>72</span>
                                元 / 餐
                            </div>
                        </div>
                        <div class="price grid-6">
                            <div class="grouponPrice">
                                飯團價(6折) <span>
                                    640元
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-container grid-12">
                        <a href="##" class="subBTN">
                            查看此飯團
                        </a>
                    </div>
                </div>
                <div class="almostSucc-icon">
                    即將達標
                </div>
            </div>
            <div class="groupon-box">
                <div class="groupon_topUI clearfix">
                    <div class="leftUI grid-12">
                        <div class="titleTag grid-12">
                            <span class="tag">#超滿足</span>
                            <h3>日式和食小資飯團</h3>
                        </div>
                        <div class="meal-container grid-12 clearfix">
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="豪華便當組"  title="豪華便當組">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="meal-box">
                                <div class="price">
                                    75元
                                </div>
                                <div class="pic">
                                    <img src="asset/bentou01.jpg" alt="">
                                </div>
                                <div class="title">
                                    豪華便當組
                                </div>
                            </div>
                            <div class="andMoreMeal-counter">
                                ...總共 <span>5</span>個餐點
                            </div>
                        </div>
                    </div>
                </div>
                <div class="groupon_bottomUI clearfix">
                    <div class="grid-12">
                        <div class="mealAndKcal grid-6">
                            <div class="avgPrice grid-12">平均
                                <span>72</span>
                                元 / 餐
                            </div>
                        </div>
                        <div class="price grid-6">
                            <div class="grouponPrice">
                                飯團價(6折) <span>
                                    640元
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-container grid-12">
                        <a href="##" class="subBTN">
                            查看此飯團
                        </a>
                    </div>
                </div>
                <div class="almostSucc-icon">
                    即將達標
                </div>
            </div>                                            
        </div>
    </div>
    
</div>

    <footer>
        <!-- 放footer -->
    </footer>
    
</body>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            center: true,
            items: 1,
            loop: true,
            margin: 60,
            responsiveClass:true,
            nav:true,
            responsive:{
                0:{
                    items:1,
                    autoWidth: true,
                    nav:true
                },
                768:{
                    items:3,
                    autoWidth: true,
                    nav:true,
                }
            }
        });
    });
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=1392583167542762&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script src="js/main.js"></script>
<script>
// 取得此飯團的餐點資料
window.addEventListener('load',function() {
    getMealAll();
    getQRcode();
    function showMealInfo(jsonStr) {
        var mealArr = JSON.parse(jsonStr);
        
        // 數量就是餐點array的長度
        var mealCount = mealArr.length;
        // console.log(mealCount);
        //餐點數量計算++
        
        //價格計算
        var totalPrice = 0;
        //熱量計算
        var totalKcal= 0;
        for(let i in mealArr) {
            totalPrice += parseInt(mealArr[i].meal_Price);
            totalKcal += parseInt(mealArr[i].meal_Cal);
            var mealBox = `<div class="meal-box" id="meal${mealArr[i].meal_No}" score='${mealArr[i].meal_Total}'>
                    <div class="price">
                    ${mealArr[i].meal_Price}
                    </div>
                    <div class="pic">
                        <img src="asset/meals/${mealArr[i].meal_Pic}" alt="${mealArr[i].meal_Name}"  title="${mealArr[i].meal_Name}">
                    </div>
                    <div class="title">
                        ${mealArr[i].meal_Name}
                    </div>
                    <input type='hidden' class='mealInfo' value = '${mealArr[i].meal_Info}'>
                    <input type='hidden' class='mealCal' value = '${mealArr[i].meal_Cal}'>
                </div>`;

            $class('mealSmallPic-container')[0].innerHTML += mealBox;
        }
        //寫入平均價格、熱量、總價
        $all('.meal-count')[0].children[0].children[0].innerText = mealCount;
        $all('.avgPrice')[0].children[0].innerText = 
        Math.round(totalPrice / mealCount);
        $all('.avgKcal')[0].children[0].innerText = 
        Math.round(totalKcal / mealCount);
        $all('.originalPrice')[0].children[0].innerText = totalPrice;
        $all('.grouponPrice')[0].children[0].innerText = Math.round(totalPrice * 0.6);
        

        
        //註冊每一個新生成的餐點事件
        var smallPicChange = $all('.mealSmallPic-container .meal-box');
        smallPicChange.forEach(function(e) { e.addEventListener('mouseover', changeMealInfo)});

        if($id('grouponProgressRatio').value >= 0.8 && window.innerWidth >= 600) {
            $all('.almostSucc-icon')[0].style.display = 'block';
        } else {
            $all('.almostSucc-icon')[0].style.display = 'none';
        } //第i個即將達標的顯示，且手機板不顯示
        
    }
    function getMealAll() {
        var xhr = new XMLHttpRequest();
        xhr.onload=function (){
            if( xhr.status == 200 ){
                if( xhr.responseText.indexOf("not found") != -1){//回傳的資料中含有 not found
                    
                } else {
                    showMealInfo( xhr.responseText );  //json 字串
                }
                
            }else{
                alert( xhr.status );
            }
        }

        var url = "getMealInfo.php" + window.location.search;
        xhr.open("Get", url, true);
        xhr.send( null );
    }
    function getQRcode() {
        copyCode(); //註冊copy事件
        // $all('.').src = '';
        // $all('.').innerText = '';

    }
})
</script>
</html>





<?php            
        }
    }else {
}

}catch(PDOException $e) {
    echo $e->getMessage();
}
    
  
?>
<!-- phpEndHere -->