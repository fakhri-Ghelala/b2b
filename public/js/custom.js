function confirmatin(){
    return confirm("are you sure you want to delete this product?")
}
function calcul_total(){
    var total = Number(document.getElementById('total').innerHTML);
    var modifier = Number(document.getElementById('retenu').value);
    document.getElementById('total').innerHTML = total -(total*modifier/100);
}
