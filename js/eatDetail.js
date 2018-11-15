// 數字增減
function detailQty(){
    var qty = document.getElementById("qty");
    var qtyAdd = document.getElementById("qty-add");
    var qtyCut = document.getElementById("qty-cut");
    var min = 0;
    var max = 100;

    qtyAdd.onclick = function(){
        if(qty.value == max || qty.value > max){  
            qty.value = max;  
        }else{  
            qty.value = parseInt(qty.value) + 1;  //parseInt() 將輸入的字串轉成整數
        }   
    };

    qtyCut.onclick = function(){
        if(qty.value == min || qty < min){  
            qty.value = min;  
        }else{  
            qty.value = parseInt(qty.value) - 1;
        }  
    };

    qty.onkeyup = function(){
        if(isNaN(qty.value)){      //isNaN()是否為數字
            qty.value = min;  
        }  
        if (qty.value.length > 2){
            qty.value = max; 
        }
    };
};
window.addEventListener('load',detailQty)
//數字增減結束

//加入購物車
//加入購物車結束

//新增留言
function eatDetailMsg() {
    
    document.getElementById('commentsBtn').onclick = function() {  //當點擊送出後新增留言
        var text = document.getElementById('memberLetter');  //找到textarea中的字
        var today = new Date();  //建立物件
        var year = today.getFullYear();
        var mon = today.getMonth()+1;
        var day = today.getDate();
        var memberImg = "images/logo.png";  //變更圖片路徑

        var textDiv = `<div class="member-msg">           
                            <div class="member-pic clearfix">
                                <figure class="member-img fl">
                                    <img src=${memberImg}>
                                </figure>
                                <div class="member-txt fl">
                                    <div class="member-id">訪客</div>
                                    <div class="comments-time">${year}/${mon}/${day}</div>
                                </div>
                            </div>
                            <div class="comments clearfix">
                                <p>${text.value}</p>
                                <div class="msg-btn"> 
                                    <button type="submit" name="comments" id="commentsBtn" class="nextBTN">檢舉</button>
                                </div>
                            </div>
                        </div>`;    //把留言內容用要包的div名稱包起來

        document.getElementsByClassName('text-container')[0].innerHTML += textDiv;  //新增留言到留言區
        
    }
};
window.addEventListener('load', eatDetailMsg);

function sendForm(){
    // alert("HI");
    var xhr = new XMLHttpRequest();

    xhr.onload = function(){
        if(xhr.status == 200){
            eatDetailMsg();
            document.querySelector('#memberLetter').value='';
        }else{
            alert(xhr.status);
        }
    }
    // console.log('executing');

    xhr.open("post","comment.php",true);
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    var data = "mealNo=" + document.querySelector("#commentsBtn").value + "&msg=" + document.querySelector("#memberLetter").value;
    alert(data);

    xhr.send(data);
}

window.addEventListener('load',function(){
    alert("hi");
    
    document.getElementById('commentsBtn').addEventListener('click',sendForm);
});
//新增留言結束

//隨機產生留言
function msg() {

    document.getElementById('commentsChange').onclick = function() {
        var title=document.getElementById('memberLetter');
        var n = ['太好吃了吧!!!','天啊!這麼好吃的東西!我要感謝媽媽!','我一定要帶妹妹17來吃!阿~我沒有妹妹'];
        var max=2;
        var min=0;
        var title = n[Math.floor(Math.random()*(max-min+1)+min)];

        memberLetter.value = title;
    }
}
window.addEventListener('load',msg);
//隨機產生留言結束

//輪播
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

//評分蛋
function $all(all) {
    return document.querySelectorAll(all);
};
const eggScore = {
    egg(egg) {
        egg.container.forEach(function(e,w) {
            var score = Math.round(e.children[0].innerText);
            // console.log(score);
            
            var figure = e.querySelectorAll('figure');
            for(let i = 0; i < figure.length ; i ++) {
                let img = figure[i].querySelectorAll('img')[0];
                img.src = egg.whiteEgg;
            }
            for(let i = 0; i < score ; i ++) {
                let img = figure[i].querySelectorAll('img')[0];
                img.src = egg.blackEgg;
            }
        })
    }
}
window.addEventListener('load', function(){
    eggScore.egg({
        container: $all('.grade'),
        whiteEgg: 'images/eggEmpty.png',
        blackEgg: 'images/eggFull.png',
    });
});













// 人數條
// function peopleLine() {
//     var pNow = parseInt(document.querySelectorAll('.people')[0].innerText);
//     var pNeed = parseInt(document.querySelectorAll('.people-total')[0].innerText);
//     // console.log(pNeed);
//     tl = new TimelineMax();
//     tl.fromTo('.peopleLine', 2.5 ,{
//         width: '0px',
//     },{
//         width: (pNow / pNeed)*100 + '%',
//     });
// }


// window.addEventListener('load',peopleLine);
