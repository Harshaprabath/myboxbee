$(document).ready(function(){
  
    load();


});


$(document).on('click','.increment-btn1',function(e) {
console.log('dygyiu');
e.preventDefault();
var incre_value = $(this).parents('.quantity').find('.qty-input1').val();
var value = parseInt(incre_value, 10);
value = isNaN(value) ? 0 : value;

    value++;
    $(this).parents('.quantity').find('.qty-input1').val(value);
    $('.operation').val('+');
    console.log(value);
    $('.decrement-btn').show();


});
$(document).on('click','.decrement-btn',function(e) {

e.preventDefault();
var decre_value = $(this).parents('.quantity').find('.qty-input1').val();
var value = parseInt(decre_value, 10);
value = isNaN(value) ? 0 : value;
console.log(value);
if (value > 1) {
    value--;
    console.log(value);
    $(this).parents('.quantity').find('.qty-input1').val(value);
    $('.operation').val('-');
}

});


$(document).on('click','.changeQuantity',function (e) {
var div =$('#sub1').text()
var op=  $('.operation').val()
e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var thiskclick =$(this);
var quantity = $(this).closest(".quantity").find('.qty-input1').val();
var product_id = $(this).closest(".quantity").find('.product_id').val();
var status = $(this).closest(".quantity").find('.status2').val();
var id = $(this).closest(".quantity").find('.box_id').val();
var getdata = $(this).closest(".quantity").find('.data').val();
var cart = JSON.parse(sessionStorage.getItem('cart'));
console.log('op',op);

if(status == 'card'){
    cart[id].card['item_quantity'] = quantity
    if(op == '+'){
        loadtotal(cart[id].card.item_price)
    }
    else{
        loadtotal(cart[id].card.item_price,'-',cart[id].card.item_price)
    }
}
else if(status =='box'){
    cart[id].box['item_quantity'] = quantity
    if(op == '+'){
        loadtotal(cart[id].box.item_price)
    }
    else{
        loadtotal(cart[id].box.item_price,'-',cart[id].box.item_price)
    }
}
else if(status =='gift'){
    
    let obj =  cart[id].gift.findIndex(o => o.item_id === product_id );
    console.log('id',obj);
    cart[id].gift[obj]['item_quantity'] = quantity
    if(op == '+'){
        loadtotal(cart[id].gift[obj].item_price)
    }
    else{
        loadtotal(cart[id].gift[obj].item_price,'-',cart[id].gift[obj].item_price)
    }
}
else if(status =='sticker'){
    cart[id].sticker['item_quantity'] = quantity
    if(op == '+'){
        loadtotal(cart[id].sticker.item_price)
    }
    else{
        loadtotal(cart[id].sticker.item_price,'-',cart[id].sticker.item_price)
    }
}
else if(status =='voucher'){
    cart[id].voucher['item_quantity'] = quantity
    if(op == '+'){
        loadtotal(cart[id].voucher.item_price)
    }
    else{
        loadtotal(cart[id].voucher.item_price,'-',cart[id].voucher.item_price)
    }
}
else if(status =='RTS'){
    cart[id].card['item_quantity'] = quantity
    if(op == '+'){
        loadtotal(cart[id].card.item_price)
    }
    else{
        loadtotal(cart[id].card.item_price,'-',cart[id].card.item_price)
    }
    
}


console.log('sdsd',quantity);
sessionStorage.setItem('cart',JSON.stringify(cart))
// window.location.href='';

});

$(document).on('click','.changeQuantity1',function (e) {
var div =$('#sub1').text()
var op=  $('.operation').val()
 e.preventDefault();
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
 var thiskclick =$(this);
 var quantity = $(this).closest(".quantity").find('.qty-input1').val();
 var product_id = $(this).closest(".quantity").find('.product_id').val();
 var uniqueid = $(this).closest(".quantity").find('.uniq_id').val();
 var status = $(this).closest(".quantity").find('.status2').val();
 var id = $(this).closest(".quantity").find('.box_id').val();
 var getdata = $(this).closest(".quantity").find('.data').val();
 var cart = JSON.parse(sessionStorage.getItem('cart'));
 console.log('op',op);
 
 if(status == 'card'){
     cart[id].card['item_quantity'] = quantity
     if(op == '+'){
         loadtotal(cart[id].card.item_price)
     }
     else{
         loadtotal(cart[id].card.item_price,'-',cart[id].card.item_price)
     }
 }
 else if(status =='box'){
     cart[id].box['item_quantity'] = quantity
     if(op == '+'){
         loadtotal(cart[id].box.item_price)
     }
     else{
         loadtotal(cart[id].box.item_price,'-',cart[id].box.item_price)
     }
 }
 else if(status =='gift'){
     
     let obj =  cart[id].gift.findIndex(o => o.id === uniqueid );
     console.log('id',obj);
     cart[id].gift[obj]['item_quantity'] = quantity
     if(op == '+'){
         loadtotal(cart[id].gift[obj].item_price)
     }
     else{
         loadtotal(cart[id].gift[obj].item_price,'-',cart[id].gift[obj].item_price)
     }
 }
 else if(status =='sticker'){
     cart[id].sticker['item_quantity'] = quantity
     if(op == '+'){
         loadtotal(cart[id].sticker.item_price)
     }
     else{
         loadtotal(cart[id].sticker.item_price,'-',cart[id].sticker.item_price)
     }
 }
 else if(status =='voucher'){
     cart[id].voucher['item_quantity'] = quantity
     if(op == '+'){
         loadtotal(cart[id].voucher.item_price)
     }
     else{
         loadtotal(cart[id].voucher.item_price,'-',cart[id].voucher.item_price)
     }
 }
 else if(status =='RTS'){
     cart[id].card['item_quantity'] = quantity
     if(op == '+'){
         loadtotal(cart[id].card.item_price)
     }
     else{
         loadtotal(cart[id].card.item_price,'-',cart[id].card.item_price)
     }
     
 }
 
 
 console.log('sdsd',quantity);
 sessionStorage.setItem('cart',JSON.stringify(cart))
 window.location.href='';

});
$(document).on('click','.remove1',function (e) {

e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
sessionStorage.setItem('state','')
var thiskclick =$(this);


var product_id = $(this).closest(".remove").find('.product_id').val();
var uniqueid = $(this).closest(".remove").find('.uniq_id').val();

var status = $(this).closest(".remove").find('.status2').val();
var id = $(this).closest(".remove").find('.box_id').val();
var getdata = $(this).closest(".remove").find('.data').val();
var cart = JSON.parse(sessionStorage.getItem('cart'));
var whichtr = $(this).closest(".item");
whichtr.remove();
if(status == 'card'){
    loadtotal(cart[id].card.item_price,'-',cart[id].card.item_price * cart[id].card.item_quantity)
    cart[id].card = ''
    
}
else if(status =='box'){
    loadtotal(cart[id].box.item_price,'-',cart[id].box.item_price  * cart[id].box.item_quantity)
    cart[id].box = ''
}
else if(status =='gift'){
    let obj =  cart[id].gift.findIndex(o => o.id === uniqueid );
    console.log('id',obj);
    loadtotal(cart[id].gift[obj].item_price,'-',cart[id].gift[obj].item_price * cart[id].gift[obj].item_quantity )
    cart[id].gift[obj] = ''
}
else if(status =='sticker'){
    loadtotal(cart[id].sticker.item_price,'-',cart[id].sticker.item_price  * cart[id].sticker.item_quantity)
    cart[id].sticker = ''
}
else if(status =='voucher'){
    loadtotal(cart[id].voucher.item_price,'-',cart[id].voucher.item_price  * cart[id].voucher.item_quantity)
    cart[id].voucher = ''
}
else if(status =='RTS'){
    loadtotal(cart[id].card.item_price,'-',cart[id].card.item_price  * cart[id].card.item_quantity)
    cart[id].card = ''
    
}

sessionStorage.setItem('cart',JSON.stringify(cart))
// window.location.href='';

});

function load(){
var cart = JSON.parse(sessionStorage.getItem('cart'));
//  console.log(cart);
var data =[];
 var result = Object.values(cart).reduce((a, c) => {
    if (Array.isArray(c)) return a.concat(Array.from(c, (r) => [r]));
    return a.concat([c]);
  }, []);
  for(var i = 0; i<result.length;i++){
    var result1 = Object.values(result[i]).reduce((a, c) => {
        if (Array.isArray(c)) return a.concat(Array.from(c, (r) => [r]));
        return a.concat([c]);
      }, []);
    
      for(var b=0;b<result1.length;b++){
         if(result1[b] != ''){
            data.push(result1[b]);
         }
         
        
      }
     
  }
  
 console.log(data);
var total =0;
var gtotal =0;
for(var r=0;r<data.length;r++){


    
   var data1 = '<div class="item">'+
    '<div class="row flex-nowrap items-center py-2">'+
        '<div class="col-6 col-lg-3">'+
           '<div class="row">'+
               ' <div class="col-lg-8"> <div class="image"><div class="embed-responsive embed-responsive-1by1"> <div class="embed-responsive-item text-center">'
                 if(Array.isArray(data[r])){
                   
                    data1 = data1 +'<img src="../upload/'+data[r][0].item_image +'" class="w-100" alt="">'     
                 }else{
                    data1 = data1  +'<img src="../upload/'+data[r].item_image +'" class="w-100" alt="">'  
                 }
               
                     data1 = data1 +'<noscript>'+

                                   ' <img class="w-100" src="{{asset("upload/1637595363.png")}}" alt="">'+

                                '</noscript></div></div></div> </div> </div></div><div class="col">'+

            '<div class="row justify-content-between">'+

                '<div class="col-lg-4">'
                if(Array.isArray(data[r])){
                    data1 = data1 + ' <p>'+
                   data[r][0].status2
                    '<br> </p>'
                    data1 = data1 + ' <p>'+
                   data[r][0].item_name
                    '<br> </p>'
                    data1 = data1 + ' <p>'+
                    'box: ' +  data[r][0].box
                     '<br> </p>'
                   
                }else
                {
                    data1 = data1 + ' <p>'+
                    data[r].status2
                     '<br> </p>'
                     data1 = data1 + ' <p>'+
                    data[r].item_name
                     '<br> </p>'
                     data1 = data1 + ' <p>'+
                    'box: ' + data[r].box
                      ' </p>'
                      if(data[r].status2 == 'RTS'){
                      data1 = data1 + ' <p>'+
                      'card: ' +  data[r].card
                       '<br> </p>'
                      }
                }
                    
                    data1 = data1+' <div class="text-muted">'
                    if(data[r].status2 == 'card' || data[r].status2 == 'RTS'){
                        
                        data1 = data1 + '<br>to: '+ data[r].to
                        '<br>'
                        data1 = data1 + '<br>from: ' + data[r].from 
                        '<br>'
                        data1 = data1 + '<br>Messaage: ' + data[r].message 
                        data1 = data1 + '<br>font: ' + data[r].font
                        if(data[r].status2 == 'card'){
                        data1 = data1 + '<br><div class="box"> <button style="border:2px solid;border-color:blue;padding:0 13px" id="showcard">Edit</button><input type="hidden" class="boxid" value="'+ data[r].box +'"></div>' 
                        }
                    }
                    
data1 = data1 + '</div> </div> <div class="col-lg-2">'
if(data[r].status2 == 'card' || data[r].status2 == 'box' || data[r].status2 == 'voucher' || data[r].status2 == 'sticker'){

data1 = data1 +'<div class="input-group quantity">'
data1 = data1 +  '<div class="input-group-prepend decrement-btn changeQuantity1" style="cursor: pointer">'

  data1 = data1 +  '</div>'
 
    data1 = data1 +'<div class="input-group-append increment-btn1 changeQuantity1" style="cursor: pointer" >'
   
    data1 = data1 +   '</div>'
    data1 = data1 +  '</div>'
    data1 = data1 +'</div>'
    data1 = data1 +'</div>'    

}
else{


data1 = data1 +'<div class="input-group quantity">'
data1 = data1 +  '<div class="input-group-prepend decrement-btn changeQuantity1" style="cursor: pointer">'
data1 = data1 +    '<span class="input-group-text" style="border: none;background: none;font-size:20px">-</span>'
data1 = data1 +  '</div>'
data1 = data1  + ' <input type="hidden" class="operation" id="operation" value="">'
if(Array.isArray(data[r])){
  data1 = data1 +  '<input type="hidden" value="'+data[r][0].item_id+'" class="product_id">'
  data1 = data1 +  '<input type="hidden" value="'+data[r][0].id+'" class="uniq_id">'
  data1 = data1 +  '<input type="hidden" value="'+data[r][0].box+'" class="box_id">'
  data1 = data1 +  '<input type="hidden" value="'+data[r][0].status2+'" class="status2">'
  data1 = data1 + '<input type="hidden"  value="'+r+'" class="data">'

  data1 = data1 +  '<input type="text" class="qty-input1 form-control" style="border: none;box-shadow: none;"value="'+data[r][0].item_quantity+'">'
    data1 = data1 +'<div class="input-group-append increment-btn1 changeQuantity1" style="cursor: pointer" >'
data1 = data1 +    '<span class="input-group-text" style="border: none;background: none;font-size:20px">+</span>'
data1 = data1 +   '</div>'
data1 = data1 +  '</div>'
data1 = data1 +'</div>'
data1 = data1 +'</div>'
}
else{
    data1 = data1+   '<input type="hidden" value="'+data[r].item_id+'" class="product_id">'
    data1 = data1 +  '<input type="hidden" value="'+data[r].id+'" class="uniq_id">'
    data1 = data1 + '<input type="hidden" value="'+data[r].box+'" class="box_id">'
    data1 = data1 + '<input type="hidden"  value="'+data[r].status2+'" class="status2">'
    data1 = data1 + '<input type="hidden"  value="'+r+'" class="data">'
data1 = data1 + '<input type="text" class="qty-input1 form-control" style="border: none;box-shadow: none;" value="'+data[r].item_quantity+'">'
data1 = data1 +'<div class="input-group-append increment-btn1 changeQuantity1" style="cursor: pointer" >'
data1 = data1 +    '<span class="input-group-text" style="border: none;background: none;font-size:20px">+</span>'
data1 = data1 +   '</div>'
data1 = data1 +  '</div>'
data1 = data1 +'</div>'
data1 = data1 +'</div>'    
}

}

data1 = data1+'</div>'+

       '<div class="col-auto col-lg-3 grand">'
       if(Array.isArray(data[r])){
          data1 = data1 +  '<p class="text-right grandtotal ">LKR '+((data[r][0].item_quantity * data[r][0].item_price).toFixed(2)).toString() +'</p>' 
            gtotal = data[r][0].item_quantity * data[r][0].item_price;
          
        } else{
            gtotal =data[r].item_quantity * data[r].item_price;
            data1 = data1 +  '<p class="text-right grandtotal ">LKR '+((data[r].item_quantity * data[r].item_price).toFixed(2)).toString() +'</p>'
            }
            data1 = data1 + '</div><div class="remove">'
            if(Array.isArray(data[r])){
                data1 = data1 +  '<input type="hidden" value="'+data[r][0].item_id+'" class="product_id">'
                data1 = data1 +  '<input type="hidden" value="'+data[r][0].id+'" class="uniq_id">'
                data1 = data1 +  '<input type="hidden" value="'+data[r][0].box+'" class="box_id">'
                data1 = data1 +  '<input type="hidden" value="'+data[r][0].status2+'" class="status2">'
            }
            else{
                data1 = data1+   '<input type="hidden" value="'+data[r].item_id+'" class="product_id">'
                data1 = data1 + '<input type="hidden" value="'+data[r].box+'" class="box_id">'
                data1 = data1 +  '<input type="hidden" value="'+data[r].id+'" class="uniq_id">'
                data1 = data1 + '<input type="hidden"  value="'+data[r].status2+'" class="status2">'
            }
          
            data1 = data1+  '<button class="btn btn-danger remove1" style="border-radius: 25px;"><i class="fas fa-trash"></i></button> </div></div> </div>'
            total = total + gtotal;



         var data2 =   '<div class="cart-item ng-scope item">'

         data2 = data2 + '<div class="item-info">'
         data2 = data2 + '<div class="item-photo">'
         if(Array.isArray(data[r])){
                   
            data2 = data2 +'<a  href="/product/readytoship/'+data[r][0].item_id+'"><img src="../../upload/'+data[r][0].item_image +'" class="w-100" alt=""></a>'     
         }else{
            data2 = data2  +'<a  href="/product/readytoship/'+data[r].item_id+'"><img src="../../upload/'+data[r].item_image +'" class="w-100" alt=""></a>'  
         }
        
         data2 = data2   + '</div>'
         data2 = data2 +'<div class="item-details remove">'
         if(Array.isArray(data[r])){
            data2 = data2 +  '<input type="hidden" value="'+data[r][0].item_id+'" class="product_id">'
            data2 = data2 +  '<input type="hidden" value="'+data[r][0].box+'" class="box_id">'
            data2 = data2 +  '<input type="hidden" value="'+data[r][0].status2+'" class="status2">'
            data1 = data1 +  '<input type="hidden" value="'+data[r][0].id+'" class="uniq_id">'
        }
        else{
            data2 = data2+   '<input type="hidden" value="'+data[r].item_id+'" class="product_id">'
            data2 = data2 + '<input type="hidden" value="'+data[r].box+'" class="box_id">'
            data2 = data2 + '<input type="hidden"  value="'+data[r].status2+'" class="status2">'
            data1 = data1 +  '<input type="hidden" value="'+data[r].id+'" class="uniq_id">'
        }
        
         data2 = data2  +'<a class="item-remove ng-scope remove1" >'
         data2 = data2  +' <i class="far fa-trash" ></i>'
         data2 = data2  + ' </a>'
         if(Array.isArray(data[r])){
         data2 = data2  +'<div class="item-title">'
                         
         data2 = data2 + ' <a class="item-product-vendor ng-binding"  href="/product/readytoship/'+data[r][0].item_id+'">BOXFOX</a>'
         
         data2 = data2  +'<a class="item-product-title ng-binding"  href="/product/readytoship/'+data[r][0].item_id+'">'+data[r][0].item_name+'</a>'
         data2 = data2  + '<div class="item-variant-title ng-binding" ></div>'
         data2 = data2  +' <div class="item-properties">'
                               
         data2 = data2  +'<div class="item-property ng-scope" >'
                                   
         data2 = data2 +'<strong>Box Color: </strong><span class="ng-binding">'+data[r][0].box_id+'</span>'
         
         data2 = data2  + '</div>'
         data2 = data2  +'<div class="item-property ng-scope">'
         data2 = data2  +'<strong>Box: </strong><span class="ng-binding">'+data[r][0].box+'</span>'
         data2 = data2  +'</div>'        
      
                                 

                               
         data2 = data2  +'<div class="item-property ng-scope" >'
         data2 = data2  +'<strong>Box Type: </strong><span class="ng-binding">'+data[r][0].type+'</span>'
         data2 = data2  +'</div>'
                              
                             
         data2 = data2  +'<div class="item-property ng-scope">'
                               
         data2 = data2   + '<strong>Card: </strong><span class="ng-binding">'+data[r][0].card+'</span>'
                                    
         data2 = data2  + ' </div>'
                                
         data2 = data2  + ' <div class="item-property ng-scope" >'
         data2 = data2  + '<strong>To: </strong><span class="ng-binding">'+data[r][0].to+'</span>'
         data2 = data2  +' </div>'
         data2 = data2  +'<div class="item-property ng-scope" >'
         data2 = data2  + '<strong>From: </strong><span class="ng-binding'+data[r][0].from+'</span>'
         data2 = data2  + '</div>'
                                
         data2 = data2  +' <div class="item-property ng-scope" >'
         data2 = data2  +'<strong>Message: </strong><span class="ng-binding">'+data[r][0].message+'</span>'
         data2 = data2  + '</div>'
                               
         data2 = data2  +' </div>'
          } else{
            data2 = data2  +'<div class="item-title">'
                         
            data2 = data2 + ' <a class="item-product-vendor ng-binding"  href="/product/readytoship/'+data[r].item_id+'">BOXFOX</a>'
            
            data2 = data2  +'<a class="item-product-title ng-binding"  href="/product/readytoship/'+data[r].item_id+'">'+data[r].item_name+'</a>'
            data2 = data2  + '<div class="item-variant-title ng-binding" ></div>'
            data2 = data2  +' <div class="item-properties">'
                                  
            data2 = data2  +'<div class="item-property ng-scope" >'
                                      
            data2 = data2 +'<strong>Box Color: </strong><span class="ng-binding">'+data[r].box_id+'</span>'
            data2 = data2  + '</div>'
         data2 = data2  +'<div class="item-property ng-scope">'
         data2 = data2  +'<strong>Box: </strong><span class="ng-binding">'+data[r].box+'</span>'
         data2 = data2  +'</div>' 
                                  
            data2 = data2  +'<div class="item-property ng-scope" >'
            data2 = data2  +'<strong>Box Type: </strong><span class="ng-binding">'+data[r].type+'</span>'
            data2 = data2  +'</div>'
                                 
                                
            data2 = data2  +'<div class="item-property ng-scope">'
                                  
            data2 = data2   + '<strong>Card: </strong><span class="ng-binding">'+data[r].card+'</span>'
                                       
            data2 = data2  + ' </div>'
                                   
            data2 = data2  + ' <div class="item-property ng-scope" >'
            data2 = data2  + '<strong>To: </strong><span class="ng-binding">'+data[r].to+'</span>'
            data2 = data2  +' </div>'
            data2 = data2  +'<div class="item-property ng-scope" >'
            data2 = data2  + '<strong>From: </strong><span class="ng-binding">'+data[r].from+'</span>'
            data2 = data2  + '</div>'
                                   
            data2 = data2  +' <div class="item-property ng-scope" >'
            data2 = data2  +'<strong>Message: </strong><span class="ng-binding">'+data[r].message+'</</span>'
            data2 = data2  + '</div>'
                                  
            data2 = data2  +' </div>'
         }
         data2 = data2  +' </div>'

         data2 = data2  + '<div class="item-price-quantity">'
                          

         data2 = data2  + ' <div class="item-price ng-scope grand">'
         data2 = data2  +'<span  class="money ng-binding grandtotal"> </span>'
         data2 = data2  +' </div>'

         data2 = data2  + ' <div class="item-quantity">'
         data2 = data2  + '<div class="quantity-widget quantity">'
         data2 = data2  + '<button class="quantity-control minus decrement-btn changeQuantity" >'
         data2 = data2  + ' <i class="far fa-minus" ></i>'
         data2 = data2  + '</button>'
         data2 = data2  + ' <input type="hidden" class="operation" id="operation" value="">'
         if(Array.isArray(data[r])){
            data2 = data2 +  '<input type="hidden" value="'+data[r][0].item_id+'" class="product_id">'
            data2 = data2 +  '<input type="hidden" value="'+data[r][0].box+'" class="box_id">'
            data2 = data2 +  '<input type="hidden" value="'+data[r][0].status2+'" class="status2">'
            data2 = data2  + '<input class="quantity-input ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-min ng-valid-pattern qty-input1"  data-quantity="1" data-quantity-value="" type="number" min="0" pattern="\d*" value="'+data[r][0].item_quantity+'">'

        }
        else{
            data2 = data2+   '<input type="hidden" value="'+data[r].item_id+'" class="product_id">'
            data2 = data2 + '<input type="hidden" value="'+data[r].box+'" class="box_id">'
            data2 = data2 + '<input type="hidden"  value="'+data[r].status2+'" class="status2">'
            data2 = data2  + '<input class="quantity-input  ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-min ng-valid-pattern qty-input1"  data-quantity="1" data-quantity-value="" type="number" min="0" pattern="\d*" value="'+data[r].item_quantity+'">'

        }
        
                  
         
         data2 = data2  + '<button class="quantity-control plus increment-btn1 changeQuantity"  type="button">'
         data2 = data2  + ' <i class="far fa-plus" ></i>'
         data2 = data2  + '</button>'
         data2 = data2  + '</div>'
         data2 = data2  + ' </div>'
         data2 = data2   + '</div>'
         data2 = data2   + ' </div>'
         data2 = data2  + ' </div>'

               
               

         data2 = data2 +'</div>'

var data3 = '<div class="item">'

data3 = data3 +'<div class="row flex-nowrap items-center py-2">'

data3 = data3 +'<div class="col-6 col-lg-3">'

data3 = data3 +'<div class="row">'

data3 = data3 +'<div class="col-lg-8">'

data3 = data3 +'<div class="image">'
if(Array.isArray(data[r])){
                   
data3 = data3 +'<p style="background-color: black;color: white;border-radius: 38px;width: 23px;text-align: center;position: absolute;margin: 0 41px;z-index: 999;font-size: 15px;">'+data[r][0].item_quantity +'</p>'    
}else{
data3 = data3 +'<p style="background-color: black;color: white;border-radius: 38px;width: 23px;text-align: center;position: absolute;margin: 0 41px;z-index: 999;font-size: 15px;">'+data[r].item_quantity +'</p>'
}

data3 = data3 +'<div class="embed-responsive embed-responsive-1by1" style="width:50px">'

data3 = data3 +'<div class="embed-responsive-item text-center">'


if(Array.isArray(data[r])){
                   
data3 = data3 +'<img src="../upload/'+data[r][0].item_image +'" class="w-100" alt="">'     
}else{
data3 = data3  +'<img src="../upload/'+data[r].item_image +'" class="w-100" alt="">'  
}



data3 = data3 +'</div>'

data3 = data3 +'</div>'

data3 = data3 +'</div>'



data3 = data3 +'</div>'

data3 = data3 +'</div>'

data3 = data3 +'</div>'

data3 = data3 +'<div class="col">'

data3 = data3 +'<div class="row justify-content-between">'

data3 = data3 +'<div>'


                if(Array.isArray(data[r])){
                  
                data3 = data3 + '<p>'+data[r][0].item_name +'</p>'
                }
                else{
                 
                    data3 = data3 + '<p>'+data[r].item_name +'</p>'
                }
                data3 = data3 +'<div class="text-muted">'
               if(Array.isArray(data[r])){
                    data3 = data3 + ' <p>'+
                   data[r][0].status2
                    '<br> </p>'
                    data3 = data3 + ' <p>'+
                   data[r][0].item_name
                    '<br> </p>'
                    data3 = data3 + ' <p>'+
                    'box: ' +  data[r][0].box
                     '<br> </p>'
                   
                }else
                {
                    data3 = data3 + ' <p>'+
                    data[r].status2
                     '<br> </p>'
                     data3 = data3 + ' <p>'+
                    data[r].item_name
                     '<br> </p>'
                     data3 = data3 + ' <p>'+
                    'box: ' + data[r].box
                      ' </p>'
                      if(data[r].status2 == 'RTS'){
                      data3 = data3 + ' <p>'+
                      'card: ' +  data[r].card
                       '<br> </p>'
                      }
                }
              
              if(data[r].status2 == 'card' || data[r].status2 == 'RTS'){
                        
                        data3 = data3 + '<br>to: '+ data[r].to
                       
                        data3 = data3 + '<br>from: ' + data[r].from 
                        
                        data3 = data3 + '<br>Messaage: ' + data[r].message

                        data3 = data3 + '<br>font: ' + data[r].font
                    }


                    data3 = data3 +'</div>'

            

                    data3 = data3 +'</div>'

                    data3 = data3 +'</div>'

                    data3 = data3 +'</div>'

                    data3 = data3 +'<div class="col-auto col-lg-3 grand">'
                    if(Array.isArray(data[r])){
                        data3 = data3 +  '<p class="text-right grandtotal ">LKR '+((data[r][0].item_quantity * data[r][0].item_price).toFixed(2)).toString() +'</p>' 
                          gtotal = data[r][0].item_quantity * data[r][0].item_price;
                        
                      } else{
                          gtotal =data[r].item_quantity * data[r].item_price;
                          data3 = data3 +  '<p class="text-right grandtotal ">LKR '+((data[r].item_quantity * data[r].item_price).toFixed(2)).toString() +'</p>'
                          }

                    data3 = data3 +'</div>'


                    data3 = data3 +'</div>'

                    data3 = data3 +'<hr>'

                    data3 = data3 +'</div>'

            $("#loadcart").append("<br/>"+data1)  
            $("#loadcart2").append("<br/>"+data2)    
            $("#lcheckut").append("<br/>"+data3)  
           


}
var ship =$('#ship').val();
var blnce = Number(ship) + total;
$('#sub').text('LKR '+((total).toFixed(2)).toString());
$('#sub1').text('LKR '+((total).toFixed(2)).toString());
$('#esti').text('LKR '+((total).toFixed(2)).toString());
$('#total').text('LKR '+((Number(blnce)).toFixed(2)).toString());
$('.count').text('LKR '+((Number(total)).toFixed(2)).toString());
$('#total1').val((Number(blnce)).toFixed(2)).toString();
$('#subtotal').val(((total).toFixed(2)).toString());

sessionStorage.setItem('total',total)
// loadtotal()
// console.log('cartt',total);
}
var loadtotal = function(value,status,change) {
console.log(status,change);
var total1 = sessionStorage.getItem('total');
if(status == 'change'){
    sessionStorage.setItem('total',Number(total1) - Number(change))
    var get = sessionStorage.getItem('total');
    sessionStorage.setItem('total',Number(get) + Number(value))
}
else if(status=='-'){
    sessionStorage.setItem('total',Number(total1) - Number(change))
}
else{
    sessionStorage.setItem('total',Number(total1) + Number(value))
}
// sessionStorage.setItem('total',Number(total1) + Number(value))
var total2 = sessionStorage.getItem('total');
console.log(total1);
$('.count').text('LKR  '+((Number(total2)).toFixed(2)).toString());
$('#sub').text('LKR '+((Number(total2)).toFixed(2)).toString());
$('#sub1').text('LKR '+((Number(total2)).toFixed(2)).toString());
$('#esti').text('LKR '+((Number(total2)).toFixed(2)).toString());
}

function categorysubmit(link){
if(link.value == 'box1'){
    window.location.href='/collections/gift-box-builder-gifts/box';
}
else{
    console.log(link.value);
    window.location.href='/collections/gift-box-builder-gifts/'+link.value+'';
}

}
function brandsubmit(link){
if(link.value == 'box1'){
    window.location.href='/collections/gift-box-builder-gifts/box';
}
else{
    console.log(link.value);
    window.location.href='/collections/gift-box-builder-gifts/'+link.value+'';
}

}
function setcart(data,type){
console.log(data);
var cart = JSON.parse(sessionStorage.getItem('cart'));
if(cart == null) 
cart ={
    card:'',
    
      
}

if(cart[data[0].box] == null) 
  
      cart[data[0].box] ={
    card:'',
    gift:[],
    box:'',
    sticker:'',
    voucher:''
      
}


if(type == 'box'){
     cart[data[0].box]['box'] = data[0];
}
else if(type == 'card'){
    cart[data[0].box]['card'] =data[0]; 
   
}
else if(type == 'gift'){
    
    var gift ={};
    gift[data[0].item_id] = data[0];
 
    // Array.prototype.push.apply(cart[data[0].box]['gift'], gift);
    
    cart[data[0].box]['gift'].push(data[0]);  
}
else if(type == 'sticker'){
    cart[data[0].box]['sticker']=data[0]; 
}
else if(type == 'voucher'){
    cart[data[0].box]['voucher']=data[0]; 
}
 else if (type == 'image') {
            cart[data[0].box]['card'].image = data[0].id;
}
else if(type == 'rts'){
    cart[data[0].box]['card']=data[0];
    $('.cart-flyout').addClass('visible');
                    $('#cart_load').load('/cart/model');
    //                 load();
    reset1(); 
}
else{
   
// cart.push(data);  
}


sessionStorage.setItem('cart',JSON.stringify(cart));
}

function reset1() {
localStorage.removeItem('setcard');
localStorage.removeItem('boxid');
}


       

