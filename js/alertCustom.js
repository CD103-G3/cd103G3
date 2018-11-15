$(".food-button-buy").click(function(e) {
    e.preventDefault();
    swal({
        position: 'center',
        type: 'success',
        title: '你成功加入購物車',
        showConfirmButton: false,
        timer: 1500,
        background: '#FFE26A',
        width: '300px'
      });
  });