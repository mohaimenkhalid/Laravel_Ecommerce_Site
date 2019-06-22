<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

<script src="{{ asset('js/popper.js') }}" ></script>
<script src="{{ asset('js/bootstrap.min.js') }}" ></script>


<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>


<script>

//add to cart	
	function addToCart(product_id) {

		//csrf token
		$.ajaxSetup({
  			headers: {
    					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 		 			}
		});

	//store cart data

		$.post( "http://127.0.0.1:8000/api/carts/store", { product_id : product_id })
  			.done(function( data ) {
    		
    		data = JSON.parse(data);

    		if (data.status == 'success') {
    		
        //toast
    		alertify.set('notifier','position', 'top-center');
 				alertify.success('Item added to Cart successfully!! ' + '<a href="{{ route('carts') }}">GoTo Checkout</a>');
         
    			$("#totalItems").html(data.totalItems);
    		}
        
  		});
	}

</script>