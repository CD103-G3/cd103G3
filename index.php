<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>日食 Day Cook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">
    <link media="(max-width: 840px)" href="css/swiper.css" rel="stylesheet">
</head>
<body>
    <!-- 導覽列 -->

    <?php
    require_once('nav.php');
    ?>


    <!-- 第一屏 搜尋/迴轉台 -->

    <section class="indexSearch">
        <div class="wrap">
            <div class="indexSearch-wrap">
                <div class="indexSearch-bg">
                    <img src="images/index_1_bg_desktop.png" alt="">
                </div>
                <div class="indexSearch-searchBar">
                    <form action="">
                        <div>
                            <select name="search" id="indexSearch-select">
                                <option value="meal">餐點</option>
                                <option value="meal">飯團</option>
                            </select>
                        </div>
                        <input type="text" placeholder="以餐點關鍵字搜尋">
                        <button class="indexSearch-btn">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="indexSearch-rope">
                            <img src="images/index_rope.svg" alt="">
                            <img src="images/index_rope.svg" alt="">
                        </div>
                    </form>
                </div>
                <div class="indexSearch-conveyor">
                    <div class="indexSearch-owner">
                        <img src="images/index_owner.svg" alt="">
                        <img src="images/index_ownerWing.svg" alt="">
                        <div>
                            <p>餐點可以點看看喔！</p>
                        </div>
                    </div>
                    <div class="indexSearch-conveyorBox">
                        <div class="indexSearch-table">
                            <div class="indexSearch-tableImg">
                                <img src="images/index_1_conveyor.svg" alt="">
                            </div>
                            <ol>
                                <?php   
                                try{          
                                require_once("connect_book.php");
                                // $sql = "select meal_Name,meal_Pic,meal_Price,meal_Total from meal where mealGenre_No = 2 and meal_Sold = 1 ";
                                $sql = "select * from meal where mealGenre_No = 2 and meal_Sold = 1 ";

                                $meal = $pdo -> query($sql);

                                $count = 0;
                                while($mealRow = $meal -> fetchObject()){
                                    $count++;
                               ?>
                                <li class="indexSearch-meal-<?php echo $count ?>">
                                    <div class="indexSearch-hover">
                                        <p>
                                            <a href="eatDetail.php?meal_No=<?php echo $mealRow->meal_No;?>"><?php echo $mealRow->meal_Name;?></a>
                                        </p>
                                        <p>
                                            <span class="scoreNum"><?php echo $mealRow->meal_Total;?></span>
                                            <div class="scoreEgg-container">
                                                <ul>
                                                    <li>
                                                        <div class="pic">
                                                            <img src="images/scoreEgg_w.svg" alt="scoreYes" class="score">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="pic">
                                                            <img src="images/scoreEgg_w.svg" alt="scoreYes" class="score">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="pic">
                                                            <img src="images/scoreEgg_w.svg" alt="scoreYes" class="score">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="pic">
                                                            <img src="images/scoreEgg_w.svg" alt="scoreYes" class="score">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="pic">
                                                            <img src="images/scoreEgg_w.svg" alt="scoreYes" class="scoreW">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </p>
                                        <p><?php echo $mealRow->meal_Price;?>元</p>
                                    </div>
                                    <img class="indexSearch-mealImg" src="images/meal/<?php echo $mealRow->meal_Pic;?>" alt="">
                                </li>
                                 <?php
                                    }   
                                }catch(PDOException $e){
                                    echo "error ~<br>";
                                    echo $e->getMessage(),"<br>";
                                }
                                ?>
                            </ol>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<div class="indexScroll">
    <!-- 第二屏 參加飯團動畫 -->
    <div class="indexScroll-wrap">
        <div class="indexScroll-hand">
            <img src="images/indexScrollHand.svg" alt="">
        </div>
        <div class="indexScroll-chicken">
            <img src="images/indexScrollChicken.svg" alt="">
        </div>
        <div class="indexScroll-top">
            <img src="images/index_woodtopMobile.png" alt="">
            <img src="images/index_woodtop.png" alt="">
        </div>
    </div>

    <div class="indexScroll-box"></div>
    <section class="indexJoin">
        <div class="wrap">
            <div class="indexJoin-wrap">
                <div class="indexJoin-title indexTitle">
                    <!-- <h1>如何參加飯團</h1> -->
                    <img src="images/index_title2.svg" alt="">
                </div>
                <div class="indexJoin-phoneBox">
                    <div class="indexJoin-phone">
                        <div class="indexJoin-bg">
                            <img id="indexJoin-ckO" src="images/index_joinChicken1.svg" alt="">
                            <!-- <img src="images/index_joinChickenFeet1.svg" alt=""> -->
                            <img id="indexJoin-ckQr" src="images/index_joinChicken2.svg" alt="">
                            <!-- <img src="images/index_joinChickenFeet2.svg" alt=""> -->
                        </div>
                        <div class="indexJoin-info">
                            <img src="images/index_joinLogo.png" alt="">
                            <p>點選按鈕<br>觀看飯團教學</p>
                        </div>
                        <div class="indexJoin-stepOrigin">
                            <div class="indexJoin-stepO1">
                                <img src="images/index_joinSurfing.png" alt="">
                                <img src="images/index_finger.svg" alt="">
                            </div>
                            <div class="indexJoin-stepO2">
                                <img src="images/index_joinEnter.png" alt="">
                                <p class="indexJoin-stepO2-btn">參加此飯團</p>
                                <img class="finger2" src="images/index_finger.svg" alt="">
                            </div>
                            <div class="indexJoin-stepO3">
                                <div>
                                    <p>取餐QRcode</p>
                                    <p>豬排親子丼蓋飯</p>
                                </div>
                                <div class="indexJoin-stepO3-img">
                                    <div></div>
                                    <img src="images/index_joinQrcode.png" alt="">
                                </div>
                            </div>
                            <div class="indexJoin-stepO4">
                                <div>
                                    <p>感謝您的消費</p>
                                    <p>請於賞味期2小時內享用完畢</p>
                                </div>
                                <div>
                                    <i class="fas fa-check"></i>
                                    <span>取餐認證完成</span>
                                </div>
                            </div>
                        </div>
                        <div class="indexJoin-stepQrcode">
                            <div class="indexJoin-stepQr1">
                                <div>
                                    <p>參加我發起的飯團：<br>「吃丼飯一週吧！」<br>使用邀請碼：0666<br>或掃QRcode：</p>
                                    <img src="images/index_joinQrcode.png" alt="">
                                </div>
                            </div>
                            <div class="indexJoin-stepQr2">
                                <div>
                                    <p>我也要參加！</p>
                                </div>
                            </div>
                            <div class="indexJoin-stepQr3">
                                <div class="indexJoin-stepQr3-box">
                                    <p>掃描QRcode或輸入飯團代碼</p>
                                    <p>飯團代碼 :</p>
                                    <div class="indexJoin-stepQr3-input">
                                        <p>0666</p>
                                    </div>
                                    <div>
                                        <p class="indexJoin-stepQr3-btn">輸入確認</p>
                                        <img src="images/index_finger.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="indexJoin-btn">
                        <button type="button" id="indexJoin-btnO" style="--color: #fe9954">
                            <p>自行挑選</p>
                        </button>
                        <button type="button" id="indexJoin-btnQr" style="--color: #faad2b">
                            <p>邀請碼</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 第三屏 官方飯團推薦-->
    <section class="indexGroupon indexGroupon-mobile">
        <div class="wrap">
            <div class="indexGroupon-wrap">
                <div class="indexGroupon-title indexTitle">
                    <!-- <h1>推薦官方飯團</h1> -->
                    <img src="images/index_title3.svg" alt="">
                </div>
                <div class="indexGroupon-stage">
                    <div class="indexGroupon-box owl-carousel">
                        <div class="indexGroupon-part indexGroupon-part1 item">
                            <div class="indexGroupon-sumTitle">
                                <h3>
                                    <a href="#">一週超值便當小資團</a>
                                </h3>
                                <div class="indexGroupon-average">
                                    <p>75</p>
                                    <p>平均一餐</p>
                                </div>
                            </div>
                            <img src="images/index_meal1.png" alt="">
                            <p class="indexGroupon-info">每日搭配不同菜色，省錢之餘也能兼具美味。</p>
                            <div class="indexGroupon-sum">
                                <div class="indexGroupon-days">
                                    <span>飯團天數｜</span>
                                    <span>7天</span>
                                </div>
                                <div class="indexGroupon-count">
                                    <span>參加人數｜</span>
                                    <div class="indexGroupon-countBar">
                                        <p>87/100</p>
                                    </div>
                                </div>
                                <div class="indexGroupon-deadline">
                                    <span>門檻截止｜</span>
                                    <span>11/30前</span>
                                </div>
                            </div>
                            <div class="indexGroupon-btn">
                                <a href="#">查看飯團</a>
                            </div>
                        </div>
                        <div class="indexGroupon-part indexGroupon-part2 item">
                            <div class="indexGroupon-sumTitle">
                                <h3>
                                    <a href="#">今天吃丼飯</a>
                                </h3>
                                <div class="indexGroupon-average">
                                    <p>80</p>
                                    <p>平均一餐</p>
                                </div>
                            </div>
                            <img src="images/index_meal2.png" alt="">
                            <p class="indexGroupon-info">每日搭配不同菜色，省錢之餘也能兼具美味。</p>
                            <div class="indexGroupon-sum">
                                <div class="indexGroupon-days">
                                    <span>飯團天數｜</span>
                                    <span>10天</span>
                                </div>
                                <div class="indexGroupon-count">
                                    <span>參加人數｜</span>
                                    <div class="indexGroupon-countBar">
                                        <p>10/50</p>
                                    </div>
                                </div>
                                <div class="indexGroupon-deadline">
                                    <span>門檻截止｜</span>
                                    <span>10/30前</span>
                                </div>
                            </div>
                            <div class="indexGroupon-btn">
                                <a href="#">查看飯團</a>
                            </div>
                        </div>
                        <div class="indexGroupon-part indexGroupon-part3 item">
                            <div class="indexGroupon-sumTitle">
                                <h3>
                                    <a href="#">增肥計畫大挑戰</a>
                                </h3>
                                <div class="indexGroupon-average">
                                    <p>75</p>
                                    <p>平均一餐</p>
                                </div>
                            </div>
                            <img src="images/index_meal3.png" alt="">
                            <p class="indexGroupon-info">每日搭配不同菜色，省錢之餘也能兼具美味。</p>
                            <div class="indexGroupon-sum">
                                <div class="indexGroupon-days">
                                    <span>飯團天數｜</span>
                                    <span>14天</span>
                                </div>
                                <div class="indexGroupon-count">
                                    <span>參加人數｜</span>
                                    <div class="indexGroupon-countBar">
                                        <p>10/30</p>
                                    </div>
                                </div>
                                <div class="indexGroupon-deadline">
                                    <span>門檻截止｜</span>
                                    <span>11/30前</span>
                                </div>
                            </div>
                            <div class="indexGroupon-btn">
                                <a href="#">查看飯團</a>
                            </div>
                        </div>
                        <div class="indexGroupon-part indexGroupon-part4 item">
                            <div class="indexGroupon-sumTitle">
                                <h3>
                                    <a href="#">月底這樣吃</a>
                                </h3>
                                <div class="indexGroupon-average">
                                    <p>60</p>
                                    <p>平均一餐</p>
                                </div>
                            </div>
                            <img src="images/index_meal4.png" alt="">
                            <p class="indexGroupon-info">每日搭配不同菜色，省錢之餘也能兼具美味。</p>
                            <div class="indexGroupon-sum">
                                <div class="indexGroupon-days">
                                    <span>飯團天數｜</span>
                                    <span>7天</span>
                                </div>
                                <div class="indexGroupon-count">
                                    <span>參加人數｜</span>
                                    <div class="indexGroupon-countBar">
                                        <p>95/100</p>
                                    </div>
                                </div>
                                <div class="indexGroupon-deadline">
                                    <span>門檻截止｜</span>
                                    <span>12/30前</span>
                                </div>
                            </div>
                            <div class="indexGroupon-btn">
                                <a href="#">查看飯團</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="indexGroupon indexGroupon-desc">
        <div class="wrap">
            <div class="indexGroupon-wrap">
                <div class="indexGroupon-title indexTitle">
                    <!-- <h1>推薦官方飯團</h1> -->
                    <img src="images/index_title3.svg" alt="">
                </div>
                <div class="indexGroupon-stage">
                    <img src="images/index_grouponBentoCover.svg" alt="">
                    <div class="indexGroupon-box">
                        <div class="indexGroupon-part indexGroupon-part1">
                            <div class="indexGroupon-sumTitle">
                                <h3>
                                    <a href="#">一週超值便當小資團</a>
                                </h3>
                                <div class="indexGroupon-average">
                                    <p>75</p>
                                    <p>平均一餐</p>
                                </div>
                            </div>
                            <img src="images/index_meal1.png" alt="">
                            <p class="indexGroupon-info">每日搭配不同菜色，省錢之餘也能兼具美味。</p>
                            <div class="indexGroupon-sum">
                                <div class="indexGroupon-days">
                                    <span>飯團天數｜</span>
                                    <span>7天</span>
                                </div>
                                <div class="indexGroupon-count">
                                    <span>參加人數｜</span>
                                    <div class="indexGroupon-countBar">
                                        <p>87/100</p>
                                    </div>
                                </div>
                                <div class="indexGroupon-deadline">
                                    <span>門檻截止｜</span>
                                    <span>11/30前</span>
                                </div>
                            </div>
                            <div class="indexGroupon-btn">
                                <a href="#">查看飯團</a>
                            </div>
                        </div>
                        <div class="indexGroupon-part indexGroupon-part2">
                            <div class="indexGroupon-sumTitle">
                                <h3>
                                    <a href="#">今天吃丼飯</a>
                                </h3>
                                <div class="indexGroupon-average">
                                    <p>80</p>
                                    <p>平均一餐</p>
                                </div>
                            </div>
                            <img src="images/index_meal2.png" alt="">
                            <p class="indexGroupon-info">每日搭配不同菜色，省錢之餘也能兼具美味。</p>
                            <div class="indexGroupon-sum">
                                <div class="indexGroupon-days">
                                    <span>飯團天數｜</span>
                                    <span>10天</span>
                                </div>
                                <div class="indexGroupon-count">
                                    <span>參加人數｜</span>
                                    <div class="indexGroupon-countBar">
                                        <p>10/50</p>
                                    </div>
                                </div>
                                <div class="indexGroupon-deadline">
                                    <span>門檻截止｜</span>
                                    <span>10/30前</span>
                                </div>
                            </div>
                            <div class="indexGroupon-btn">
                                <a href="#">查看飯團</a>
                            </div>
                        </div>
                        <div class="indexGroupon-part indexGroupon-part3">
                            <div class="indexGroupon-sumTitle">
                                <h3>
                                    <a href="#">增肥計畫大挑戰</a>
                                </h3>
                                <div class="indexGroupon-average">
                                    <p>75</p>
                                    <p>平均一餐</p>
                                </div>
                            </div>
                            <img src="images/index_meal3.png" alt="">
                            <p class="indexGroupon-info">每日搭配不同菜色，省錢之餘也能兼具美味。</p>
                            <div class="indexGroupon-sum">
                                <div class="indexGroupon-days">
                                    <span>飯團天數｜</span>
                                    <span>14天</span>
                                </div>
                                <div class="indexGroupon-count">
                                    <span>參加人數｜</span>
                                    <div class="indexGroupon-countBar">
                                        <p>10/30</p>
                                    </div>
                                </div>
                                <div class="indexGroupon-deadline">
                                    <span>門檻截止｜</span>
                                    <span>11/30前</span>
                                </div>
                            </div>
                            <div class="indexGroupon-btn">
                                <a href="#">查看飯團</a>
                            </div>
                        </div>
                        <div class="indexGroupon-part indexGroupon-part4">
                            <div class="indexGroupon-sumTitle">
                                <h3>
                                    <a href="#">月底這樣吃</a>
                                </h3>
                                <div class="indexGroupon-average">
                                    <p>60</p>
                                    <p>平均一餐</p>
                                </div>
                            </div>
                            <img src="images/index_meal4.png" alt="">
                            <p class="indexGroupon-info">每日搭配不同菜色，省錢之餘也能兼具美味。</p>
                            <div class="indexGroupon-sum">
                                <div class="indexGroupon-days">
                                    <span>飯團天數｜</span>
                                    <span>7天</span>
                                </div>
                                <div class="indexGroupon-count">
                                    <span>參加人數｜</span>
                                    <div class="indexGroupon-countBar">
                                        <p>95/100</p>
                                    </div>
                                </div>
                                <div class="indexGroupon-deadline">
                                    <span>門檻截止｜</span>
                                    <span>12/30前</span>
                                </div>
                            </div>
                            <div class="indexGroupon-btn">
                                <a href="#">查看飯團</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 第四屏 好評餐點-->
    <section class="indexMeal-mobile">
        <div class="wrap">
            <div class="indexMeal-wrap">
                <div class="indexMeal-title indexTitle">
                    <!-- <h1>好評餐點</h1> -->
                    <img src="images/index_title4.svg" alt="">
                </div>
                <div class="indexMeal-slider swiper-container">
                    <div class="swiper-scrollbar"></div>
                    <div class="indexMeal-spotlight"></div>
                    <div class="indexMeal-box swiper-wrapper">
                        <div class="indexMeal-part top1 swiper-slide">
                            <div class="indexMeal-top">
                                <img class="indexMeal-topCk indexMeal-top1Ck" src="images/index_top01.svg" alt="">
                                <img class="indexMeal-meal" src="images/index_don2.png" alt="">
                                <img class="indexMeal-topW" src="images/index_topWings01.svg" alt="">
                            </div>
                            <div class="indexMeal-topSum indexMeal-top1Sum">
                                <h3><a href="../eatDetail/eatDetail.html">海鮮親子丼</a>
                                    <h4>75</h4>
                                </h3>
                                <p>評分
                                    <span>
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                    </span>
                                </p>
                                <div class="indexMeal-btn">
                                    <a href="../eatDetail/eatDetail.html">查看餐點</a>
                                    <button>收藏</button>
                                </div>
                            </div>
                        </div>
                        <div class="indexMeal-part top2 swiper-slide">
                            <div class="indexMeal-top">
                                <img class="indexMeal-topCk" src="images/index_top02.svg" alt="">
                                <img class="indexMeal-meal" src="images/index_nabe_05.png" alt="">
                                <img class="indexMeal-topW" src="images/index_topWings02.svg" alt="">
                            </div>
                            <div class="indexMeal-topSum">
                                <h3><a href="../eatDetail/eatDetail.html">雞肉親子丼</a>
                                    <h4>75</h4>
                                </h3>
                                <p>評分
                                    <span>
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                    </span>
                                </p>
                                <div class="indexMeal-btn">
                                    <a href="../eatDetail/eatDetail.html">查看餐點</a>
                                    <button>收藏</button>
                                </div>
                            </div>
                        </div>
                        <div class="indexMeal-part top3 swiper-slide">
                            <div class="indexMeal-top">
                                <img class="indexMeal-topCk" src="images/index_top03.svg" alt="">
                                <img class="indexMeal-meal" src="images/index_ben_04.png" alt="">
                                <img class="indexMeal-topW" src="images/index_topWings03.svg" alt="">
                            </div>
                            <div class="indexMeal-topSum">
                                <h3><a href="../eatDetail/eatDetail.html">牛肉親子丼</a>
                                    <h4>80</h4>
                                </h3>
                                <p>評分
                                    <span>
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                    </span>
                                </p>
                                <div class="indexMeal-btn">
                                    <a href="../eatDetail/eatDetail.html">查看餐點</a>
                                    <button>收藏</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="indexMeal-desc">
        <canvas id="indexMeal-canvas"></canvas>
        <div class="wrap">
            <div class="indexMeal-wrap">
                <div class="indexMeal-title indexTitle">
                    <!-- <h1>好評餐點</h1> -->
                    <img src="images/index_title4.svg" alt="">
                </div>
                <div class="mount"></div>
                <div class="indexMeal-confetti trigger">
                    <div class="indexMeal-confetti-after"></div>
                    <div class="indexMeal-confetti-rope">
                        <img src="images/index_celebrationRope.svg" alt="">
                    </div>
                    <div class="indexMeal-confetti-left">
                        <img src="images/index_celebrationL.svg" alt="">
                    </div>
                    <div class="indexMeal-confetti-right">
                        <img src="images/index_celebrationR.svg" alt="">
                    </div>
                </div>
                <div class="indexMeal-slider swiper-container">
                    <div class="swiper-scrollbar"></div>
                    <div class="indexMeal-spotlight"></div>
                    <div class="indexMeal-box">
                        <div class="indexMeal-part top1">
                            <div class="indexMeal-top">
                                <img class="indexMeal-topCk indexMeal-top1Ck" src="images/index_top01.svg" alt="">
                                <img class="indexMeal-meal" src="images/index_don2.png" alt="">
                                <img class="indexMeal-topW" src="images/index_topWings01.svg" alt="">
                            </div>
                            <div class="indexMeal-topSum indexMeal-top1Sum">
                                <h3><a href="../eatDetail/eatDetail.html">海鮮親子丼</a>
                                    <h4>75</h4>
                                </h3>
                                <p>評分
                                    <span>
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                    </span>
                                </p>
                                <div class="indexMeal-btn">
                                    <a href="../eatDetail/eatDetail.html">查看餐點</a>
                                    <button>收藏</button>
                                </div>
                            </div>
                        </div>
                        <div class="indexMeal-part top2 swiper-slide">
                            <div class="indexMeal-top">
                                <img class="indexMeal-topCk" src="images/index_top02.svg" alt="">
                                <img class="indexMeal-meal" src="images/index_nabe_05.png" alt="">
                                <img class="indexMeal-topW" src="images/index_topWings02.svg" alt="">
                            </div>
                            <div class="indexMeal-topSum">
                                <h3><a href="../eatDetail/eatDetail.html">雞肉親子丼</a>
                                    <h4>75</h4>
                                </h3>
                                <p>評分
                                    <span>
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                    </span>
                                </p>
                                <div class="indexMeal-btn">
                                    <a href="../eatDetail/eatDetail.html">查看餐點</a>
                                    <button>收藏</button>
                                </div>
                            </div>
                        </div>
                        <div class="indexMeal-part top3 swiper-slide">
                            <div class="indexMeal-top">
                                <img class="indexMeal-topCk" src="images/index_top03.svg" alt="">
                                <img class="indexMeal-meal" src="images/index_ben_04.png" alt="">
                                <img class="indexMeal-topW" src="images/index_topWings03.svg" alt="">
                            </div>
                            <div class="indexMeal-topSum">
                                <h3><a href="../eatDetail/eatDetail.html">牛肉親子丼</a>
                                    <h4>80</h4>
                                </h3>
                                <p>評分
                                    <span>
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggFull.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                        <img src="images/eggEmpty.png" alt="">
                                    </span>
                                </p>
                                <div class="indexMeal-btn">
                                    <a href="../eatDetail/eatDetail.html">查看餐點</a>
                                    <button>收藏</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 第五屏 現在加入日食-->
    <section class="indexLogin">
        <div class="indexLogin-BG">
        </div>
        <div class="wrap">
            <div class="indexLogin-wrap">
                <div class="indexLogin-title indexTitle">
                    <!-- <h1>現在加入日食</h1> -->
                    <img src="images/index_title5.svg" alt="">
                </div>
                <div class="indexLogin-sum">
                    <div class="indexLogin-main">
                        <div class="indexLogin-info">
                            <div class="indexLogin-balloon">
                                <p>註冊帳號，獲得你的第一張刮刮樂！刮開「荷包蛋」，查看日食購物金使用規則。</p>
                            </div>
                            <img src="images/index_login.svg" alt="">
                        </div>
                        <div class="indexLogin-pan">
                            <div class="indexLogin-handle"></div>
                            <div class="indexLogin-outer"></div>
                            <div class="indexLogin-inner"></div>
                        </div>
                        <div class="indexLogin-scratch" id="indexLoginScratch">
                            <canvas class="indexLogin-canvas " id="indexLoginCanvas" width="300" height="300"></canvas>
                            <div class="indexLogin-scratch-wrap"></div>
                        </div>
                    </div>
                </div>
                <div class="indexLogin-btn">
                    <button>立即註冊</button>
                </div>
            </div>
        </div>
    </section>
</div>








    <!-- 套件 -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.mousewheel.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/js/swiper.esm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/js/swiper.esm.bundle.js"></script>
    <script src="js/parallax.min.js"></script>

    <script src="js/indexJoin.js"></script>
    <script src="js/indexBtn.js"></script>
    <script src="js/indexSlider.js"></script>
    <script src="js/indexCube.js"></script>
    <script src="js/indexCelebration.js"></script>
    <script src="js/indexConfetti.js"></script>
    <script src="js/indexLift.js"></script>
    <script src="js/indexScratch.js"></script>
    <script src="js/indexRun.js"></script>


    <script>
       $('html,body').scrollTop(0);
    </script>


    <script>
        function $all(all) {
            return document.querySelectorAll(all);
        }
        score = {};
        score = {
            get: function(ee, src1, src2) {
                if(ee) {
                    // alert(ee);
                    var score;
                    score =  Math.round($all(ee)[0].innerText);
                    var src1 = src1;
                    var src2 = src2;
                    getScore(score, src1, src2);
                }
                
            },
            src_white: '',
            src_black: '',
        }
        function getScore(x, srcW, srcB) {
            // 找到所有需要計算的分數container;
            // document.createElement('div');
            var scoreEgg = document.getElementsByClassName('scoreEgg-container');
            // 轉換分數為蛋蛋
            for(let i = 0; i < scoreEgg.length ; i++) {
                console.log(i);
                // var score = Math.round(scoreEgg[i].getAttribute('score'));
                for(let x = 0 ; x < $all('.scoreEgg-container ul li').length; x++) {
                    console.log(x);
                scoreEgg[i].children[0].children[x].children[0].children[0].src = srcW;}
                var score = x;
                for(let j = 0; j < score ; j ++) {
                    scoreEgg[i].children[0].children[j].children[0].children[0].src = 
                    srcB;
                }
            }
        }
    </script>
    <script>
        window.onload = function() {
            score.get(
            '.scoreNum', //抓取分數的容器，自訂class名稱
            'images/scoreEgg_w.svg' ,  //預設的白色評分
            'images/scoreEgg_y.svg');  //顯示的有顏色評分
            // 'https://freeiconshop.com/wp-content/uploads/edd/star-outline.png' ,  //預設的白色評分
            // 'http://simpleicon.com/wp-content/uploads/star.png');  //顯示的有顏色評分
        }
    </script>
</body>

</html>