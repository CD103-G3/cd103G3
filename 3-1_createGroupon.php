<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <title>3-1</title>
</head>
<body>
    <nav>
        <!-- 這裡放導覽列   --> 
    </nav>
<div class="penguinPage">
        
    <div class="maxWidthWrapper">
        <div class="step-container clearfix">
                <!-- 這裡放步驟    -->
                <h2>發起飯團!</h2>
                <ul class="step-wrapper clearfix">
                    <li class="grid-4 active">
                        <span class="active">
                            1
                        </span>
                        選擇開始日期
                        
                    </li>
                    <li class="grid-4">
                        <span>2<div class="decoLine"></div></span>
                        選擇餐點和人數
                    </li>
                    <li class="grid-4">
                        <span>3<div class="decoLine"></div></span>
                        確認發起日期
                    </li>
                </ul>
        </div>
        <div class="woodTemp">
            <div class="chooseDay-container clearfix">
                <div class="chooseDay-wrapper">
                    <h2>請選擇飯團開始日</h2>
                    <ul class="element-day">
                        <!-- <li><span>10/20</span> MON</li> -->
                    </ul>
                </div>
            </div>
            <div class="name-container clearfix">
                <h2>請輸入名稱和選擇飯團標籤</h2>
                <div class="input-wrapper grid-12 grid-md-8">
                    <h3>
                        請輸入飯團名稱
                    </h3>
                    <input type="text" placeholder="請輸入飯團名稱" id="grouponTitle" value="">
                    <div class="hint">請輸入3~12個字，<br>或是隨機產生名稱</div>
                    <div class="randomTitle">
                        隨機產生飯團名稱
                    </div>    
                </div>
                <div class="select-wrapper grid-12 grid-md-4">
                    <h3>
                        請選擇此飯團的標籤
                    </h3>
                    <select name="grouponTag" id="grouponTag">
                        <!-- <option value="gt0">超滿足</option>
                        <option value="gt1">超健康</option>
                        <option value="gt1">超省錢</option>
                        <option value="gt1">大家快來吃!</option> -->
                        <?php require_once("3-1grouponTag.php"); ?>
                    </select>
                </div>
                
            </div>
            
        </div>
        <div class="btn-container page3_1 clearfix">
            <div class="cancelBTN">
                回首頁
            </div>
            <a class="nextBTN" id="page3_1_BTN" href="3-2_createGroupon_selectMeal.html">
                確認並繼續
            </a>
        </div>
        
    </div>

</div>


    <footer>
        <!-- 放footer -->
    </footer>
</body>
</html>