<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>日食餐點</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.css">

	<!-- -----------------日食餐點--------------- -->
	<link rel="stylesheet" href="css/dishes.css">
	
</head>
<body>

	<?php
		require_once('nav.php');
	?>
	
	<!-- -----banner--- -->
	<div class="food-banner swiper-container">
		<div id="elimg" class="swiper-wrapper">
			<div class="swiper-slide">
				<div class="food-main">
					11/23號 新品上市 
				</div>
			</div>
			<div class="swiper-slide">
				<div class="food-main">
					店長推薦新品
				</div>
			</div>
			<!-- <div class="swiper-slide">
				<div class="food-main">
					館長強烈推薦
				</div>
			</div> -->
		</div>
		<canvas id="elcanvas"></canvas>
	</div>
	

	<!-- -----搜尋--- -->
	<div class="bg-images">
		<div class="wrap">
		<div class="searchBar">
        <!-- <form action="4-1_grouponList.php"> -->
            <div class="searchBar-container">
                <input type="text" placeholder="搜尋你的美食餐點" name="MealKW" id="searchInputMeal">
                <button id="MealBTN" type="submit" onclick="getDishes()">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        <!-- </form> -->
    </div>

        <div class="food-choose sliderSlick clearfix">
            <div class="part--4 part-md-2">
				
				<img class="food-icon-lan" src="images/icon/lame.png" alt="">

                <div class="food-choose_item">
                    <p data-rel="ra">拉面</p>
                </div>
            </div>
            <div class="part--4 part-md-2">
			<img class="food-icon-don" src="images/icon/don.png" alt="">
               <div class="food-choose_item">
                   	<p data-rel="don">井飯</p>
                </div>
            </div>  
            <div class="part--4 part-md-2">
				<img class="food-icon-soup" src="images/icon/soup.png" alt="">
                <div class="food-choose_item">
                    <p data-rel="nabe">鍋物</p>
                </div>
            </div>
			<div class="rwd-dek part--4 part-md-2">
				<img class="food-icon-den" src="images/icon/denshyoku.png" alt="">
                <div class="food-choose_item">
                    <p data-rel="tei">定食</p>
                </div>
            </div>
            <div class="rwd-dek part--4 part-md-2">
				<img class="food-icon-ban" src="images/icon/bandon.png" alt="">
                <div class="food-choose_item">
                    <p data-rel="ben">便當</p>
                </div>
            </div>
            <div class="rwd-dek part--4 part-md-2">
				<img class="food-icon-veb" src="images/icon/veget.png" alt="">
                <div class="food-choose_item">
                    <p data-rel="vg">素食</p>
                </div>
            </div>
        </div>
		<div class="food-choose fdnot clearfix">
            
			<div class="part--4 part-md-2">
				<img class="food-icon-den" src="images/icon/denshyoku.png" alt="">
                <div class="food-choose_item">
                    <p data-rel="tei">定食</p>
                </div>
            </div>
            <div class="part--4 part-md-2">
				<img class="food-icon-ban" src="images/icon/bandon.png" alt="">
                <div class="food-choose_item">
                    <p data-rel="ben">便當</p>
                </div>
            </div>
            <div class="part--4 part-md-2">
				<img class="food-icon-veb" src="images/icon/veget.png" alt="">
                <div class="food-choose_item">
                    <p data-rel="vg">素食</p>
                </div>
            </div>
        </div>
    </div>

	<!-- 菜單一覽 -->
    <div class="wrap-2">
        <h1>餐點一覽</h1>  
        <div class="food-content search-content clearfix">
		<?php
			try{
				require_once('phpDB/connectDB_CD103G3.php');
				// -------------------------------------------------------------------
				//下sql查詢抓表格
				$sql = "select * from meal";
				$dishes = $pdo -> query($sql);
				while($dishesRow = $dishes -> fetchObject()){			
		?>		
				<div class="food-item part--12 part-md-6 part-lg-4 part-xl-3 scale-anm <?php echo substr_replace($dishesRow->meal_Pic,'',-7); ?>">
						<div class="food-item-box">
							<a href="eatDetail.php?meal_No=<?php echo $dishesRow->meal_No;?>">
								<div class="food-pic">
									<img class="food-pic-intro" src="images/meals/<?php echo $dishesRow->meal_Pic;?>" alt="">
									<!-- <div id="circle">
										<img src="images/icon/chili.svg" alt="">
									</div> -->
								</div>
							</a>
							<div class="food-title">
								<h2><?php echo $dishesRow->meal_Name;?></h2>
							</div>
							<div class="food-price">
								<span>NT$ <?php echo $dishesRow->meal_Price;?></span>
							</div>
							<div class="food-score clearfix">
								<span class="calc-score">評分</span>
								<div class="score-container clearfix">
									<span class="scoreNum"><?php echo $dishesRow->meal_Total;?></span>
									<div class="scoreEgg-container" score="2.7" >
										<ul>
											<li>
												<div class="pic">
													<img src="images/eggEmpty.svg" alt="scoreYes" class="score">
												</div>
											</li>
											<li>
												<div class="pic">
													<img src="images/eggEmpty.svg" alt="scoreYes" class="score">
												</div>
											</li>
											<li>
												<div class="pic">
													<img src="images/eggEmpty.svg" alt="scoreYes" class="score">
												</div>
											</li>
											<li>
												<div class="pic">
													<img src="images/eggEmpty.svg" alt="scoreYes" class="score">
												</div>
											</li>
											<li>
												<div class="pic">
													<img src="images/eggEmpty.svg" alt="scoreYes" class="scoreW">
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<!-- 收藏寫入/加入購物車session -->
							<div class="food-button clearfix">
								<a class="food-button-save mainBTN v2" href="javascript::">
									<p class="heart_icon">
								        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								            viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
								            <g>
								                <path class="st0" d="M83.2,16.3c-3.3-3-7.6-4.5-12.1-4.5c-5.2,0-10.2,2.2-13.7,5.9c-1.7,1.8-3,3.9-4.3,6.6c-0.5,1.3-1.8,2.1-3.1,2.1
								                c-1.3-0.1-2.6-0.7-3.2-2l-0.6-1.2C42.6,16,36.2,11.8,29,11.8c-1.2,0-2.3,0.2-3.5,0.4c-6.1,1.1-10.9,4.7-14.3,10.5
								                c-5,8.6-5.5,16.1-1.4,23.6c2.6,4.7,6,9.4,10.3,14.2c8.1,9,17.6,17.6,29.9,26.9c11.3-8.6,20.1-16.3,27.8-24.5
								                C82,58.3,86.9,52.7,90.3,46c1.3-2.6,2.6-5.7,2.4-9C92.5,28.4,89.4,21.7,83.2,16.3z"/>
								                <path class="st0" d="M87.9,10.6c-4.6-4-10.5-6.2-16.6-6.2c-7.1,0-13.9,2.9-18.8,8.1c-0.9,0.9-1.7,1.9-2.5,3C44,7.2,34.1,2.9,24.2,4.9
								                c-8.1,1.5-14.5,6.2-19,13.9C-1.1,29.6-1.6,40.2,3.7,50c2.8,5.3,6.5,10.4,11.3,15.7c8.7,9.7,19,18.9,32.4,28.9c0.9,0.6,1.8,1,2.7,1
								                c1.5,0,2.5-0.8,3-1.2C65,85.3,74.5,77,82.8,68.1c4.6-4.9,9.9-11,13.7-18.6c1.6-3.3,3.5-7.7,3.4-12.6C99.7,26.2,95.7,17.3,87.9,10.6z
								                M90.3,46c-3.4,6.7-8.3,12.3-12.5,16.9C70.1,71.1,61.3,78.8,50,87.4c-12.3-9.3-21.8-17.9-29.9-26.9c-4.3-4.8-7.7-9.5-10.3-14.2
								                c-4.1-7.5-3.6-15,1.4-23.6c3.4-5.8,8.2-9.4,14.3-10.5c1.2-0.2,2.3-0.4,3.5-0.4c7.2,0,13.6,4.2,17.2,11.4l0.6,1.2
								                c0.6,1.3,1.9,1.9,3.2,2c1.3,0,2.6-0.8,3.1-2.1c1.3-2.7,2.6-4.8,4.3-6.6c3.5-3.7,8.5-5.9,13.7-5.9c4.5,0,8.8,1.5,12.1,4.5
								                c6.2,5.4,9.3,12.1,9.5,20.7C92.9,40.3,91.6,43.4,90.3,46z"/>
								            </g>
								        </svg>
								        <span>收藏</span>
								    </p>
								
									    <input class="mealState" type="hidden" name="mealstate" value="false">
									    <input class="mealNo" type="hidden"  name="mealNo" value="A0<?php echo $dishesRow->meal_No;?>">
									<div class="subBall b1"></div>
								</a>
								<a class="food-button-buy v2" id="A0<?php echo $dishesRow->meal_No;?>">
									<span class="fas fa-cart-plus"></span>
									<p>加入購物車</p>
									<input type="hidden" value="<?php echo $dishesRow->meal_Name;?>|<?php echo $dishesRow->meal_Pic; ?>|<?php echo $dishesRow->meal_Price;?>|1|false">
									<div class="wrap">
										<div class="mainBall b1"></div>
										<div class="mainBall b2"></div>	
										<div class="mainBall b3"></div>	
									</div>
								</a>
							</div>
						</div>
					</div>
			<?php
				}	
			}catch(PDOException $e){
				echo "錯誤 ? ",$e -> getMessage(),"<br>";
				echo "錯誤行號",$e ->getLine(),"<br>";
			}		
			?>
        </div>
	</div>
</div>

	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
		
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.js"></script>
	<script src="node_modules\sweetalert\dist\sweetalert.min.js"></script>
	<script src="js/alertCustom.js"></script>
	<script src="js/Swiper.js"></script>
	<script src="js/puzzle.js"></script>
	<script src="js/filiter.js"></script>  
	<script src="js/dishes-icon.js"></script>
	<script src="js/eggView.js"></script>
	<script src="js/dishesSessiom.js"></script>
	<script src='https://cdn.jsdelivr.net/mojs/0.265.6/mo.min.js'></script>
	<script src="js/iconClick.js"></script>
	<script>
	var index = sessionStorage;
		function getDishes(){
			
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4){
					if(xhr.status == 200){
						document.querySelector(".food-content").innerHTML = xhr.responseText;  
						if(index['index_search']!=null){
							index.removeItem('index_search');
						}
					}else{
						alert(xhr.status);
					}
				}
			}
			var url = "searchDish.php?search="+ document.getElementById("searchInputMeal").value;
			xhr.open("Get", url, true);
  			xhr.send( null );
		}
        
        window.addEventListener("load", function(){
			if(index['index_search']!=null){
				alert("1" + index['index_search']);
				document.getElementById('searchInputMeal').value=index.getItem('index_search');
				alert("2" + document.getElementById('searchInputMeal').value);
				getDishes();
			}

        	document.getElementById("searchInputMeal").addEventListener("keypress",function(e){
         		// window.alert(2);
        		console.log("eeeeeeeeee");
        		console.log(e);
        		if(e.keyCode == 13){
        			getDishes();
        		}       		
			});
        });
		var coll = document.querySelectorAll('.food-button-save'); 
	    for(var i=0;i<coll.length;i++){
	        coll[i].addEventListener('click',function(){
	          // alert('hi');
	          var mealState = this.getElementsByClassName('mealState')[0];
	          var mealNo = this.getElementsByClassName('mealNo')[0];
	          if(mealState.value == 'false') {
	          	mealState.value = 'true';
	          } else {
	          	mealState.value = 'false';
	          } //切換該筆餐點的收藏狀態
 
	          // console.log(mealState.value);
	          // if(this.value == '')
	          // console.log(this);
	             var xhr = new XMLHttpRequest();
	                    
	                    xhr.onload = function (){
	                        if( xhr.status == 200){
	                            alert("收藏資料修改成功");
	                        }else{
	                            alert(xhr.status);
	                        }
	                    }
	                    xhr.open("post", "heartDataUpdate.php", true);
	                    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	                    //餐點收藏狀態
	                    var data_info = "mealState=" + mealState.value + "&mealNo=" + mealNo.value;
	                    console.log(data_info);
	                                     //餐點編號
	                    xhr.send(data_info);
	        });
	    }
	</script>

</body>
</html>