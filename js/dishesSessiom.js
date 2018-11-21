var storage = sessionStorage;

function dishAddToCart(){

    if(storage.addItemList == null){
        storage.addItemList = '';
    }
    var list = document.querySelectorAll('.food-button-buy.v2'); 
    console.log(list);
    for(var i=0;i<list.length;i++){
        list[i].addEventListener('click',function(){
            alert('該餐點已加入購物車');
            var dishes = document.querySelector('#'+this.id+' input').value;
            addItem(this.id, dishes);
        });
    }
}

function addItem(itemId, itemValue){
    if(storage[itemId]){
        console.log('got it');
    }else{
        storage[itemId] = itemValue;
        console.log(storage[itemId]);
        storage['addItemList'] += itemId + ',';
    }
}
window.addEventListener('load',dishAddToCart);