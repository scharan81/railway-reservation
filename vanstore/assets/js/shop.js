let carts= document.querySelectorAll('.add-cart');

for (let i=0;i<carts.length;i++){
  carts[i].addEventListener('click',()=>{
    cartNumbers(products[i]);
    totalCost(products[i]);
  })
}

function onLoadCartNumbers(){
  let productNumbers=localStorage.getItem('cartNumbers');
  if (productNumbers){
    document.querySelector('.header-icons span').textContent=productNumbers;
  }
}

function cartNumbers(product){
    let productNumbers=localStorage.getItem('cartNumbers');
    productNumbers=parseInt(productNumbers);
    if (productNumbers){
      localStorage.setItem("cartNumbers",productNumbers+1);
      document.querySelector('.header-icons span').textContent=productNumbers+1;
    }
    else{
      localStorage.setItem("cartNumbers",1);
      document.querySelector('.header-icons span').textContent=1;
    }
  setItems(product);
}

function setItems(product){
  let cartItems=localStorage.getItem('productsInCart');
  cartItems=JSON.parse(cartItems);
  if(cartItems!=null){
    if(cartItems[product.id]==undefined){
      cartItems={...cartItems,[product.id]:product}
    }
    cartItems[product.id].inCart+=1;
  }
  else{
    product.inCart=1;
    cartItems={[product.id]:product}
  }
  localStorage.setItem('productsInCart',JSON.stringify(cartItems));
}
function totalCost(product){
  //console.log(product.price);
  let cartCost=localStorage.getItem("totalCost");
  if(cartCost!=null){
    cartCost=parseInt(cartCost);
    localStorage.setItem("totalCost",cartCost+product.price);
  }
  else{
    localStorage.setItem("totalCost",product.price);
  }
}
function displayCartNumbers(){
  let cartItems=localStorage.getItem("productsInCart");
  cartItems=JSON.parse(cartItems);
  let productContainer=document.querySelector(".table-body");
  var i=-1;
  if(cartItems && productContainer){
    
    productContainer.innerHTML='';
    Object.values(cartItems).map(item =>{
      i+=1
      productContainer.innerHTML+=`
      <tr class="table-body-row">
        <td class="product-remove" ><a id=${item.id} href="#total-section" onclick="deleteById(this)"><i class="far fa-window-close"></i></a></td>
        <td class="product-name">${item.name}</td>
        <td class="product-price">₹${item.price}.00</td>
        <td class="product-quantity"><input type="number" class="input-cart" name="inp-qua${item.id}" title="cart-quant" value=${item.inCart}></td>
        <td class="product-total">₹${item.price*item.inCart}.00</td>
      </tr>
      `
    })
  }

  //total table
  let totalContainer=document.querySelector(".total-table-body");
  if(cartItems && totalContainer){
    let cartCost=localStorage.getItem("totalCost");
    cartCost=parseInt(cartCost);
    if (cartCost==0){
      totalContainer.innerHTML='';
      totalContainer.innerHTML+=`
        <tr class="total-data">
          <td><strong>Subtotal: </strong></td>
          <td>₹${cartCost}0.00</td>
        </tr>
        <tr class="total-data">
          <td><strong>Shipping: </strong></td>
          <td>₹00.00</td>
        </tr>
        <tr class="total-data">
          <td><strong>Total: </strong></td>
          <td>₹${cartCost}0.00</td>
        </tr>
        `
        clearInterval(checkInputValue);
    }
    else{
      totalContainer.innerHTML='';
      totalContainer.innerHTML+=`
        <tr class="total-data">
          <td><strong>Subtotal: </strong></td>
          <td>₹${cartCost}.00</td>
        </tr>
        <tr class="total-data">
          <td><strong>Shipping: </strong></td>
          <td>₹45.00</td>
        </tr>
        <tr class="total-data">
          <td><strong>Total: </strong></td>
          <td>₹${cartCost+45}.00</td>
        </tr>
        `
    }
  }
}

//var products1=JSON.parse(localStorage.getItem("products"));

var retrievedData=JSON.parse(localStorage.getItem("productsInCart"));
var temp_price=0;
var temp_cart=0;
//console.log("RE",retrievedData,Object.values(retrievedData).length,retrievedData.length);

//deleteById function
var deleteById=function(self){
  for (var j=0;j<Object.values(retrievedData).length;j++){

    //console.log(Object.values(retrievedData)[j])

    if (Object.values(retrievedData)[j]!=undefined){
      //console.log("hii");
      if (Object.values(retrievedData)[j].id==self.id){
        temp_cart=Object.values(retrievedData)[j].inCart;
        temp_price=Object.values(retrievedData)[j].price*Object.values(retrievedData)[j].inCart;
        //console.log("r",Object.values(retrievedData)[j].id,self.id,temp_price,temp_cart);
        break;
      }
    }
  }

  retrievedData=Object.values(retrievedData).filter(function(elem){
    return elem.id != self.id;
  });

  //console.log("e",self,self.id);

  localStorage.setItem("productsInCart",JSON.stringify(retrievedData));
  self.parentNode.parentNode.remove(self.parentNode);
  let cartNos=localStorage.getItem("cartNumbers");
  let cartCost=localStorage.getItem("totalCost");
  cartNos=parseInt(cartNos);
  cartCost=parseInt(cartCost);
  localStorage.setItem("cartNumbers",cartNos-temp_cart)
  localStorage.setItem("totalCost",cartCost-temp_price);
  location.reload();

  //console.log(retrievedData);
  //console.log(products1);

}

var quantities=document.getElementsByClassName("input-cart");

function checkInputValue(){
  //console.log(quantities,quantities.length, Object.values(retrievedData).indexOf(Object.values(retrievedData[quantities.length-1])));
  for (var i=0;i<Object.values(retrievedData).length;i++){
    if (parseInt(quantities[i].value)!=Object.values(retrievedData)[i].inCart){
      //console.log(quantities.length,"hii",Object.values(retrievedData)[i].name)
      //console.log(quantities[i].value,parseInt(quantities[i].value));
      if (!isNaN(parseInt(quantities[i].value))){
        updateInputCart(i,quantities[i].value);
      }
    }
    //console.log(parseInt(quantities[i].value));
  }
}
function updateInputCart(num,val){
  let cartNos=parseInt(localStorage.getItem("cartNumbers"));
  let cartCost=parseInt(localStorage.getItem("totalCost"));
  temp_cart=Object.values(retrievedData)[num].inCart;
  temp_price=Object.values(retrievedData)[num].price*temp_cart;
  //console.log(cartNos,cartCost,temp_cart,temp_price);
  Object.values(retrievedData)[num].inCart=parseInt(val);
  localStorage.setItem("productsInCart",JSON.stringify(retrievedData));
  localStorage.setItem("cartNumbers",cartNos-temp_cart+Object.values(retrievedData)[num].inCart);
  localStorage.setItem("totalCost",cartCost-temp_price+Object.values(retrievedData)[num].inCart*Object.values(retrievedData)[num].price);
  location.reload();
}

function checkOutPrint(){
  let cartItems=localStorage.getItem("productsInCart");
  cartItems=JSON.parse(cartItems);
  let productContainer=document.querySelector(".order-details-body");
  var i=-1;
  if(cartItems && productContainer){
    
    productContainer.innerHTML='';
    Object.values(cartItems).map(item =>{
      i+=1
      productContainer.innerHTML+=`
      <tr class="table-body-row">
        <td class="product-name">${item.name}</td>
        <td class="product-total">₹${item.price*item.inCart}.00</td>
      </tr>
      `
    })
  }

  //total table
  let totalContainer=document.querySelector(".checkout-details");
  if(cartItems && totalContainer){
    let cartCost=localStorage.getItem("totalCost");
    cartCost=parseInt(cartCost);
    if (cartCost==0){
      totalContainer.innerHTML='';
      totalContainer.innerHTML+=`
        <tr class="total-data">
          <td><strong>Subtotal: </strong></td>
          <td>₹${cartCost}0.00</td>
        </tr>
        <tr class="total-data">
          <td><strong>Shipping: </strong></td>
          <td>₹00.00</td>
        </tr>
        <tr class="total-data">
          <td><strong>Total: </strong></td>
          <td>₹${cartCost}0.00</td>
        </tr>
        `
      }
    else{
      totalContainer.innerHTML='';
      totalContainer.innerHTML+=`
        <tr class="total-data">
          <td><strong>Subtotal: </strong></td>
          <td>₹${cartCost}.00</td>
        </tr>
        <tr class="total-data">
          <td><strong>Shipping: </strong></td>
          <td>₹45.00</td>
        </tr>
        <tr class="total-data">
          <td><strong>Total: </strong></td>
          <td>₹${cartCost+45}.00</td>
        </tr>
        `
    }
  }
}
checkOutPrint();
displayCartNumbers();
onLoadCartNumbers();
setInterval(checkInputValue,1000);