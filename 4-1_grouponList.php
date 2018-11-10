<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/gsap/src/minified/TweenMax.min.js"></script>
    <script src="js/gsap/src/minified/easing/CustomEase.min.js"></script>
    <script src="js/main.js"></script>

    <title>全部飯團</title>
</head>
<body>
    <nav>
            <!-- 這裡放導覽列 -->
            <?php
                // require_once();
            ?>
    </nav>

<div class="penguinPage"> 
    
    <div class="searchBar">
        <!-- <form action="4-1_grouponList.php"> -->
            <div class="searchBar-container">
                <input type="text" placeholder="搜尋你想參加的飯團" name="grouponKW" id="searchInput">
                <button id="kwBTN">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        <!-- </form> -->
    </div>
    <div class="page-BTN">
        <!-- <ul>
            <li class="active">全部飯團一覽</li>
            <li>官方特惠飯團</li>
            <li>飯友的飯團</li>
        </ul> -->
    </div>
    <input type="checkbox" id="search-BTN4_1">
    <div class="searchGroupon-wrapper">
        <label class="search4_1 subBTN" for="search-BTN4_1">
                <i class="fas fa-plus-circle"></i> 參加飯團
        </label>
        <div class="search-container">
            <h2>請輸入飯團代碼</h2>
            <p>或是開啟相機掃描QRcode</p>
            <!-- <form action="##"> -->
                <input type="text" placeholder="請輸入5個字的飯團代碼" id="searchId">
                <button id="searchGrouponById">尋找飯團</button>
            <!-- </form> -->
        </div>
    </div>
    <label class="search-BTN-bg" for="search-BTN4_1"></label>
    <div class="maxWidthWrapper pade4_1">
        <div class="filter-container clearfix">
            <span class="filter-span">排序</span>
            <div class="filter-wrapper">
                <input type="radio" name="groupon_filter" class="groupon_filter" id="groupon_filter_price">
                <label for="groupon_filter_price" class="filter time">飯團截止日
                    <span class="filter-condition">由近到遠</span>
                    <!-- <span class="filter-condition">由低到高</span> -->
                </label>
            </div>
            <div class="filter-wrapper">
                <input type="radio" name="groupon_filter" class="groupon_filter" id="groupon_filter_time">
                <label for="groupon_filter_time" class="filter success">門檻達標
                    <span class="filter-condition">即將達標</span>
                    <input type="hidden" name="order" value="success">
                    <!-- <span class="filter-condition">由低到高</span> -->
                </label>
            </div>
            
        </div>
        <div class="groupon-container">

        </div>
    </div>

</div>
    
    <footer>
        <!-- 放footer -->
        <div class="tempHere">

        </div>
    </footer>
</body>
<script>
    var url = "4-1_searchGrouponList.php" + location.search;
    function showGroupon(jsonStr) {
            var grouponSearchR = JSON.parse(jsonStr);   
            grouponSearchR_length = grouponSearchR.length;
            console.log(grouponSearchR);
            for(let i = 0; i < grouponSearchR_length; i++) {
                var toCount = grouponSearchR[i][11].length;
                var endDate = grouponSearchR[i][5].substr(5).replace('-','/');
                var grouponTemp = 
                `<div class="groupon-wrapper">
                    <div class="user-info"></div>
                    <div class="groupon_topUI clearfix">
                        <div class="leftUI grid-12 grid-lg-8">
                            <div class="titleTag grid-12 grid-lg-6">
                                <span class="tag">#${grouponSearchR[i][2]}</span>
                                <h3>${grouponSearchR[i][1]}</h3>
                            </div>
                            <div class="mealAndScore-container grid-12 grid-lg-6">
                                <div class="meal-counter grid-5">
                                    共
                                    <span>${toCount}</span>
                                    餐
                                </div>
                                <div class="score-counter grid-7">
                                        平均評分為: 
                                        <span class="scoreHere"></span>
                                </div>
                            </div>
                            <div class="meal-container grid-12 clearfix">
                                
                                <div class="andMoreMeal-counter">
                                    ...總共 <span>${toCount}</span>個餐點
                                </div>
                            </div>
                        </div>
                        <div class="rightUI grid-12 grid-lg-4">
                            <div class="endDate-container clearfix">
                                <div class="date grid-12">
                                    截止日<span class="date-span">
                                        ${endDate}
                                    </span>
                                </div>
                                
                            </div>
                            <div class="threshold">
                                <h3>已參加人數/門檻人數</h3>
                                <div class="circleChart">
                                    <div class="people-container">
                                        <span class="peopleNow">${grouponSearchR[i][7]}</span>
                                        <span class="peopleNeeded">${grouponSearchR[i][9]}</span>
                                    </div>
                                    <div class="circleDisplay">
                                        <div class="circleDisplayB"></div>
                                        <div class="circleDisplayA"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="bonus-container clearfix">
                                    <div class="bonus grid-3">
                                        <div class="pic">
                                            <img src="asset/bonusIcon-05.svg" alt="bonus">
                                            <span class="bonus-coin">${grouponSearchR[i][6]}</span>
                                        </div>
                                    </div>
                                    <div class="bonusPeople grid-9">
                                        <h3>達到後 前 
                                            <span class="people">${grouponSearchR[i][9]}</span>
                                            人每人:  
                                        </h3>
                                        <p>
                                            <span class="bonus">${grouponSearchR[i][6]}</span>
                                            元購物金
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="groupon_bottomUI clearfix">
                        <div class="mealAndKcal grid-7 grid-lg-5">
                            <div class="avgPrice grid-6">平均<br>
                                <span>0</span>
                                元 / 餐
                            </div>
                            <div class="avgKcal grid-6">
                                平均<br><span>
                                    0
                                </span>
                                大卡 / 餐
                            </div>
                        </div>
                        <div class="price grid-5 grid-lg-3">
                            <div class="originalPrice grid-6">
                                原價<span>
                                    0元
                                </span>
                            </div>
                            <div class="grouponPrice grid-12 grid-lg-6">
                                飯團價(6折) <span>
                                    0元
                                </span>
                            </div>
                        </div>
                        <div class="callToAction grid-12 grid-lg-4">
                            <a href="6-1_grouponDetail.php?no=${grouponSearchR[i][0]}" class="subBTN">
                                查看此飯團
                            </a>
                        </div>
                    </div>
                    <div class="almostSucc-icon">
                        即將達標
                    </div>
                </div>`;
                $all('.groupon-container')[0].innerHTML += grouponTemp;

                if(grouponSearchR[i][7] / grouponSearchR[i][9] >= 0.8) {
                    $all('.almostSucc-icon')[i].style.display = 'block';
                } //第i個即將達標的顯示

                //填入餐點
                var toPrice = 0; //總價
                var toScore = 0; //總分
                var toKcal = 0; //總大卡
                for(let j = 0; j < grouponSearchR[i][11].length;j++) {
                    var count = grouponSearchR[i][11].lentgh; //餐點數量
                    toPrice += parseInt(grouponSearchR[i][11][j][2]);
                    toScore += parseInt(grouponSearchR[i][11][j][3]);
                    toKcal += parseInt(grouponSearchR[i][11][j][4]);
                    var mealBox = 
                    `<div class="meal-box">
                        <div class="price">
                            ${grouponSearchR[i][11][j][2]}元
                        </div>
                        <div class="pic">
                            <img src="asset/meals/${grouponSearchR[i][11][j][1]}" alt="豪華便當組"  title="${grouponSearchR[i][11][j][0]}">
                        </div>
                        <div class="title">
                            ${grouponSearchR[i][11][j][0]}
                        </div>
                    </div>`;
                    if(j <= 3) {
                        $all('.meal-container')[i].innerHTML += mealBox;
                    }
                    
                }
                $all('.avgPrice')[i].getElementsByTagName('span')[0].innerHTML = Math.round(toPrice * 0.6 / toCount);
                $all('.avgKcal')[i].getElementsByTagName('span')[0].innerHTML = Math.round(toKcal / toCount);
                $all('.scoreHere')[i].innerHTML = Math.round(toScore / toCount);
                $all('.originalPrice')[i].getElementsByTagName('span')[0].innerHTML = toPrice +'元';
                $all('.grouponPrice')[i].getElementsByTagName('span')[0].innerHTML = Math.round(toPrice * 0.6) +'元';
            }
            //全部加載之後，再加載動畫
            circleChart();

        };
    function getGroupon() {
        var xhr = new XMLHttpRequest();
        xhr.onload=function (){
            if( xhr.status == 200 ){
                if( xhr.responseText.indexOf("not found") != -1){//回傳的資料中含有 not found
                    $all('.groupon-container')[0].innerHTML = "<h1>查無飯團資料</h1>";
                } else {
                    showGroupon(xhr.responseText);  //json 字串
                }
                
            }else{
                alert( xhr.status );
            }
        }
    
        //搜尋用php
        console.log(url);
        xhr.open("Get" ,url, true);
        xhr.send(null);
    }
    
window.addEventListener('load', function() {
    getGroupon(); //load 資料庫中的飯團
    $all('.filter')[0].addEventListener('click', filter);
    $all('.filter')[1].addEventListener('click', filter); //篩選飯團
    $id('kwBTN').addEventListener('click', searchGroupon); //搜尋飯團
    $id('searchInput').addEventListener('keyup', searchGroupon); //搜尋飯團

    function filter(e) {
        var searchKW = $id('searchInput').value;
        if(this.className == 'filter time') {
            $all('.groupon-container')[0].innerHTML = ''; //清空容器
            url = "4-1_searchGrouponList.php?search=" + searchKW + '&order=endDate';
            getGroupon(); //跳轉
        } else {
            $all('.groupon-container')[0].innerHTML = ''; //清空容器
            url = "4-1_searchGrouponList.php?search=" + searchKW + '&order=success';
            getGroupon();
        }
        // location.href = '4-1_grouponList.php?search=' + searchKW + '&order=' + ;
    }
    function searchGroupon(e) {
        var searchKW = $id('searchInput').value;
        if(e.keyCode == 13) {
            $all('.groupon-container')[0].innerHTML = ''; //清空容器
            url = "4-1_searchGrouponList.php?search=" + searchKW + '&order=';
            getGroupon();
            // location.href = '4-1_grouponList.php?search=' + searchKW + '&order='; //跳轉
        } else if(e.button == 0) {
            $all('.groupon-container')[0].innerHTML = ''; //清空容器
            url = "4-1_searchGrouponList.php?search=" + searchKW + '&order=';
            getGroupon(); //跳轉
        }
    }
    //把剛剛輸入的結果顯示在搜尋欄裡
    //先把字切開
    // searchStrC = decodeURIComponent(location.search); //將網址中的中文decode
    // console.log(searchStrC);
    // $id('searchInput').value = searchStrC.substr(8,location.search.length-1);
});

</script>
</html>

