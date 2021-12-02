/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

function myFunction(idqtt,qtt) {
	console.log(idqtt);
	
	console.log(qtt);
	if(idqtt!="" & qtt != ""){
		$.ajax({
			type:'get',
			url:'http://127.0.0.1:8000/cart/update-ttquantity',
			data:{ idqtt: idqtt, qtt: qtt },
			
			success:function(resp){
				alert("cập nhật thành công số lượng!");
				location.reload();
				
				
			},error:function () {
				alert("cập nhật không thành công!");
			}
		});
	}
  }
$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
	///////////Size of Product
	$("#idSize").change(function () {
		var SizeAttr=$(this).val();
		if(SizeAttr!=""){
            $.ajax({
                type:'get',
                url:'http://127.0.0.1:8000/get-product-attr',
				data:{size:SizeAttr},
				
                success:function(resp){
					
                	var arr=resp.split("#");
                    $("#dynamic_price").html(arr[0]+'VNĐ');
                    $("#dynamicPriceInput").val(arr[0]);
                    if(arr[1]==0){
						$("#buttonAddToCart").hide();
						$("#availableStock").text("Đã hết hàng");
                        $("#inputStock").val(0);
					}else{
                        $("#buttonAddToCart").show();
                        $("#availableStock").text("Hàng còn lại trong kho");
                        $("#inputStock").val(arr[1]);
					}
                },error:function () {
                    alert("Error Select Size");
                }
            });
		}
	});


	
	// change quanity of carts
	$("#exampleforquanity").keyup(function () {
		
		var idqtt = $("#idqttexp").val();
		console.log(idqtt);
		var qtt = $("#quantityexp").val();
		console.log(qtt);
		if(idqtt!="" & qtt != ""){
            $.ajax({
                type:'get',
                url:'http://127.0.0.1:8000/cart/update-ttquantity',
				data:{ idqtt: idqtt, qtt: qtt },
				
                success:function(resp){
					alert("cập nhật thành công số lượng!");
					location.reload();
					
                	
                },error:function () {
                    alert("cập nhật không thành công!");
                }
            });
		}
	});
	

	
	///////////// Thumnail Image
	$(".changeImage").click(function () {
		newImage=$(this).attr('src');
		$("#dynamicImage").attr('src',newImage);
    });
	///// Copy Billing address to Shipping Address
	$("#checkme").click(function () {
		if(this.checked){
			$("#shipping_name").val($("#billing_name").val());
            $("#shipping_address").val($("#billing_address").val());
            $("#shipping_city").val($("#billing_city").val());
            $("#shipping_state").val($("#billing_state").val());
            $("#shipping_country").val($("#billing_country").val());
            $("#shipping_pincode").val($("#billing_pincode").val());
            $("#shipping_mobile").val($("#billing_mobile").val());
		}else{
            $("#shipping_name").val("");
            $("#shipping_address").val("");
            $("#shipping_city").val("");
            $("#shipping_state").val("");
            $("#shipping_country").val("Albania");
            $("#shipping_pincode").val("");
            $("#shipping_mobile").val("");
		}
	});
	

	// search live
	$('#search_name').keyup(function(){ 
		var query = $(this).val();
		if(query == ''){
			$('#countryList').fadeOut(1); 
		}
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:'/autocomplete/fetch',
          method:"get",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn(1);  
                    $('#countryList').html(data);
          }
         });
        }
	});
	
	

    $(document).on('click', '#countryList li', function(){  
        $('#search_name').val($(this).text());  
        $('#countryList').fadeOut();  
    });  

});


window.onscroll = function() {myFunction1()};

// Get the navbar
var navbar1 = document.getElementById("hello-sticky");

// Get the offset position of the navbar
var sticky1 = navbar1.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction1() {
  if (window.pageYOffset >= sticky1) {
    navbar1.classList.add("sticky-mune")
  } else {
    navbar1.classList.remove("sticky-mune");
  }
}
