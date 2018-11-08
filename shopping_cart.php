<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>日食購物車</title>
    <link rel="stylesheet" href="css/shopping_cart.css">
</head>
<body>

    <?php
        require_once("nav.php");
    ?>

    <div class="shopping_step">    
        <div class="step_list">
            <div class="step_box">
                <div>
                    <span>Step1</span>
                </div>
                <span>購物明細</span>
            </div>
            <div class="step_box">
                <div>
                    <span>Step2</span>
                </div>
                <span>確認訂單</span>
            </div>
            <div class="step_box">
                <div>
                    <span>Step3</span>
                </div>
                <span>購物完成</span>
            </div>
        </div>

        <div class="step_contain">
            <div class="step_contain_mask">
                <div class="shopping_details">
                    <table>
                        <tr>
                            <th>商品</th>
                            <th class="phone_hide">商品名稱</th>
                            <th>數量</th>
                            <th>單價</th>
                            <th>功能</th>
                        </tr>
                        <tr>
                            <td><img src="images/logo.png" alt="product_img" class="product_img"></td>
                            <td>綠咖哩海鮮麵</td>
                            <td>
                                <div class="number_box">
                                    <span id="number_cut">－</span>
                                    <span class="number_value">1</span> 
                                    <span id="number_add">＋</span> 
                                </div>
                            </td>
                            <td>NT$200</td>
                            <td>
                                <p><img src="images/icon/heart_black.svg" alt="collection" id="collection"><span>收藏</span></span></p>
                                <p><img src="images/icon/trash_black.svg" alt="delete" id="delete"><span>刪除</span></p>
                            </td>
                        </tr>
                    </table>
                    <div class="shopping_message">
                        <span class="taketime">預計等待時間：15分</span>
                        <div class="shopping_message_box">
                            <span class="shopping_number">共 1 件</span>
                            <span class="shopping_sum">總計 NT$200</span>
                            <span>使用購物金</span>
                            <span class="groupon_bonus">NT$　10</span>
                        </div>
                        <span class="memOrder_amount">結帳金額 NT$200</span>
                    </div>
                    <div class="shopping_choose">
                        <button class="continue_shopping_button">繼續購物</button>
                        <button id="shopping_Next_button">下一步</button>
                    </div>                   
                </div>
                
                <div class="confirm_order">
                    <table>
                        <tr>
                            <th>商品</th>
                            <th>商品名稱</th>
                            <th>數量</th>
                            <th>單價</th>
                        </tr>
                        <tr>
                            <td><img src="images/logo.png" alt="product_img" class="product_img"></td>
                            <td>綠咖哩海鮮麵</td>
                            <td>
                                <div class="number_box">
                                    <span class="number_value">1</span> 
                                </div>
                            </td>
                            <td>NT$200</td>
                        </tr>
                    </table>
                    <div class="shopping_message">
                        <span class="taketime">預計等待時間：15分</span>
                        <div class="shopping_message_box">
                            <span class="shopping_number">共 1 件</span>
                            <span class="shopping_sum">總計 NT$200</span>
                            <span>使用購物金</span>
                            <span class="groupon_bonus">NT$　10</span>
                        </div>
                        <span class="memOrder_amount">結帳金額 NT$200</span>
                    </div>
                    <div class="shopping_choose">
                        <button class="continue_shopping_button" id="shopping_pre_button">上一步</button>
                        <button id="checkout_immediately_button">立即結帳</button>
                    </div>  
                </div>
                
                <div class="shopping_completed">
                    <div>
                        <p class="p1">謝謝您的訂購<br class="table_hide">請於現場付款(自取)</p>
                        <p class="p2">訂單編號：25<br>下單日期：2018/09/27</p>
                        <div class="take_meal_way">
                            <div class="take_meal_qr">
                                <p>手機上顯示此QRcode來取餐</p>
                                <img src="images/QR_code.png" alt="QRcode" id="take_meal_qr">
                                <p>(此QRcode會暫存於快速取餐中)</p>
                            </div>
                            <p>或是</p>
                            <div class="take_meal_code">
                                <p>記住以下代碼以取餐</p>
                                <p id="take_meal_code">Meal0020239</p>
                            </div>
                        </div>
                        <button id="order_record_button">查看訂購記錄</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
     
        var shoppingNextButton = document.querySelector('#shopping_Next_button');
        var shoppingPreButton = document.querySelector('#shopping_pre_button');
        var checkoutImmediatelyButton = document.querySelector('#checkout_immediately_button');

        shoppingPreButton.addEventListener('click', windowMove);
        shoppingNextButton.addEventListener('click', windowMove1);
        checkoutImmediatelyButton.addEventListener('click', windowMove2);

        var stepBox = document.querySelectorAll('.step_box');
        var stepContainMask = document.querySelector('.step_contain_mask');

        stepBox[0].addEventListener('click', windowMove);

        var stepPosition = 1;
          
        function windowMove(){
            stepContainMask.style.transform = "translateX(0%)";
            stepContainMask.style.height = "50vh";
            
            stepPosition = 1;
            stepBoxAnimation();
        }

        function windowMove1(){
            stepContainMask.style.transform = "translateX(-33.33333333%)";
            stepContainMask.style.height = "50vh";
            
            stepBox[1].addEventListener('click', windowMove1);
            stepPosition = 2;
            stepBoxAnimation();
        }
        
        function windowMove2(){
            stepContainMask.style.transform = "translateX(-66.66666666%)";
            stepContainMask.style.height = "100vh";

            stepBox[2].addEventListener('click', windowMove2);
            stepPosition = 3;
            stepBoxAnimation();
        }

        stepBoxAnimation();
   
        function stepBoxAnimation(){

            for(i=0;i<3;i++){
                stepBox[i].children[0].children[0].style.color = "#76391B";
                stepBox[i].children[0].style.background = "#fcf2ca";
            }
            
            switch(stepPosition){
                case 3:
                    stepBox[2].children[0].children[0].style.color = "#fcf2ca";
                    stepBox[2].children[0].style.background = "#76391B";
                    stepBox[2].children[0].style.cursor = "pointer";
                
                case 2:
                    stepBox[1].children[0].children[0].style.color = "#fcf2ca";
                    stepBox[1].children[0].style.background = "#76391B";
                    stepBox[1].children[0].style.cursor = "pointer";
                
                case 1:
                    stepBox[0].children[0].children[0].style.color = "#fcf2ca";
                    stepBox[0].children[0].style.background = "#76391B";
                    stepBox[0].children[0].style.cursor = "pointer";
                
                break;
            }                
        }

        var numberCut = document.querySelector('#number_cut');
        var numberAdd = document.querySelector('#number_add');
        var numberValue = document.querySelectorAll('.number_value');     
        
        numberCut.addEventListener('click', function(){
            
        });

        numberAdd.addEventListener('click', function(){
            
        });

        numberAdd.addEventListener('mousedown', function(){
            
        });

    </script>
</body>
</html>