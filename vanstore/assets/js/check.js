var cart=Object.values(JSON.parse(localStorage.getItem('productsInCart')));
var item=[],quant=[];
for (i=0;i<cart.length;i++){
    item.push(cart[i].name);
    quant.push(cart[i].inCart);
}
console.log(cart);

function submitForm(event){
var nam=document.getElementById('name').value,phone=document.getElementById('phone').value,address=document.getElementById('address').value;
console.log(nam,phone,address);
if (nam=="" || phone=="" || address==""){
    alert("All Fields Are Required");
    document.getElementById('name').value=nam;
    document.getElementById('phone').value=phone;
    document.getElementById('address').value=address;
}
else{

document.getElementById('form2').action="checkout.php";

document.getElementById('custid').value=localStorage.getItem('custid');
document.getElementById('email').value=localStorage.getItem('email');
document.getElementById('phone1').value=document.getElementById('phone').value;
document.getElementById('item').value=item;
document.getElementById('quant').value=quant;
document.getElementById('address1').value=document.getElementById('name').value+"\n"+document.getElementById('address').value;
document.getElementById('totalpay').value=parseInt(localStorage.getItem('totalCost'))+45;
console.log(document.getElementById('totalpay').value);
}
}
