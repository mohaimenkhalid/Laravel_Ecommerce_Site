<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Auth;
use Illuminate\Support\Facades\Session;


class CheckoutsController extends Controller
{
    public function index(){

    	$payments = Payment::orderBy('priority', 'asc')->get();
    	
    	return view('frontend.pages.checkouts', compact('payments'));
    }

    public function store(Request $request){

    	$this->validate($request, [

    		'name'=> 'required',
    		'email'=> 'required',
    		'phone_no'=> 'required',
    		'shipping_address'=> 'required',
    		'payment_method_id'=> 'required',
  
    	]);

    	$order = new Order();

    	//Transsaction Id has given or not

    	/*if ($request->payment_method_id != 'Cash_in') {
    		if ($request->transaction_id == NULL ||  empty($request->transaction_id)) {
    			session()->flash('error', 'Please give your Transaction Id');
    			return back();
    		}
    	}*/

        if ($request->payment_method_id == 'SSL Commerce') {
            $this->ssl_payment();
        }

		    	/*$order->name = $request->name;
		    	$order->email = $request->email;
		    	$order->phone_no = $request->phone_no;
		    	$order->shipping_address = $request->shipping_address;
		    	$order->transaction_id = $request->transaction_id;
		    	$order->ip_address = request()->ip();
		    	$order->message = $request->message;

		    	if (Auth::check()) {
		    		$order->user_id = Auth::id();
		    	}

		    	$order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
		    	$order->save();

		    	foreach (Cart::totalcarts() as $cart) {
		    		$cart->order_id = $order->id;
		    		$cart->save();	
		    	}

		    	session()->flash('message', 'Your Order has taken Successfully !! please wait admin will confirm it ');
		    	return redirect()->route('index');*/
    }


    


    private function ssl_payment()
    {
        /* PHP */
                    $post_data = array();
                    $post_data['store_id'] = "test5d9508a61dab4";
                    $post_data['store_passwd'] = "test5d9508a61dab4@ssl";
                    $gtotal = Session::get('total1');
                    $post_data['total_amount'] = $gtotal;
                    $post_data['currency'] = "BDT";
                    $post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
                    $post_data['success_url'] = "http://127.0.0.1:8000/checkout/store/success";
                    $post_data['fail_url'] = "http://localhost/new_sslcz_gw/fail.php";
                    $post_data['cancel_url'] = "http://localhost/new_sslcz_gw/cancel.php";
                    # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

                    # EMI INFO
                    $post_data['emi_option'] = "1";
                    $post_data['emi_max_inst_option'] = "9";
                    $post_data['emi_selected_inst'] = "9";

                    # CUSTOMER INFORMATION
                    $post_data['cus_name'] = "Test Customer";
                    $post_data['cus_email'] = "test@test.com";
                    $post_data['cus_add1'] = "Dhaka";
                    $post_data['cus_add2'] = "Dhaka";
                    $post_data['cus_city'] = "Dhaka";
                    $post_data['cus_state'] = "Dhaka";
                    $post_data['cus_postcode'] = "1000";
                    $post_data['cus_country'] = "Bangladesh";
                    $post_data['cus_phone'] = "01711111111";
                    $post_data['cus_fax'] = "01711111111";

                    # SHIPMENT INFORMATION
                    $post_data['ship_name'] = "Store Test";
                    $post_data['ship_add1 '] = "Dhaka";
                    $post_data['ship_add2'] = "Dhaka";
                    $post_data['ship_city'] = "Dhaka";
                    $post_data['ship_state'] = "Dhaka";
                    $post_data['ship_postcode'] = "1000";
                    $post_data['ship_country'] = "Bangladesh";

                    # OPTIONAL PARAMETERS
                    $post_data['value_a'] = "ref001";
                    $post_data['value_b '] = "ref002";
                    $post_data['value_c'] = "ref003";
                    $post_data['value_d'] = "ref004";

                    # CART PARAMETERS
                    $post_data['cart'] = json_encode(array(
                        array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
                        array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
                        array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
                        array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
                    ));
                    $post_data['product_amount'] = "100";
                    $post_data['vat'] = "5";
                    $post_data['discount_amount'] = "5";
                    $post_data['convenience_fee'] = "3";

                    # REQUEST SEND TO SSLCOMMERZ
                    $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

                    $handle = curl_init();
                    curl_setopt($handle, CURLOPT_URL, $direct_api_url );
                    curl_setopt($handle, CURLOPT_TIMEOUT, 30);
                    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
                    curl_setopt($handle, CURLOPT_POST, 1 );
                    curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
                    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


                    $content = curl_exec($handle );

                    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

                    if($code == 200 && !( curl_errno($handle))) {
                        curl_close( $handle);
                        $sslcommerzResponse = $content;
                    } else {
                        curl_close( $handle);
                        echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
                        exit;
                    }

                    # PARSE THE JSON RESPONSE
                    $sslcz = json_decode($sslcommerzResponse, true );

                    if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
                            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
                            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
                        echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
                        # header("Location: ". $sslcz['GatewayPageURL']);
                        exit;
                    } else {
                        echo "JSON Data parsing error!";
                    }

    }


    public function success()
    {
        echo "sdfsad";
    }

}
