var storage = sessionStorage;

function doFirst(){

    if(storage['addItemList']==null){
        storage['addItemList']= '';
    }
    var list = document.querySelectorAll('.food-button-buy');
    for(var i=0;i<list.length;i++){
        list[i].addEventListener('click',function(){
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
window.addEventListener('load',doFirst);