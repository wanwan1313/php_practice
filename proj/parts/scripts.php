<script src=" <?= WEB_ROOT ?>/lib/jquery-3.6.0.js"></script>
<script src=" <?= WEB_ROOT ?>/bootstrap/js/bootstrap.bundle.js"></script>

<script>

function showCartCount(cart){
    let total = 0
    for(let i in cart){  //for-in抓到索引值 = product的sid
        
        // total += cart[i].quantity
        total++
    }
    $('.cart-count').text(total)
}

$.get('cart-api.php',function(data){
    showCartCount(data)
}, 'json')

</script>