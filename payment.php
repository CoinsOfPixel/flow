<html>
<head>
	<title>Payment</title>

</head>
<body>
    <h2>Please, proceed with the payment:</h2>

    <?php
        include 'db_connection.php';
        $conn = OpenCon();

        $api_key = "YOUR CHANGENOW API KEY";


        $asset_selected = $_GET['assets'];
        //echo "$asset_selected";

        $pl_from = $asset_selected;
        $pl_to = "btc";
        $pl_address = "YOUR BRAZILIAN EXCHANGE DEPOSIT ADDRESS";
        $pl_amount = $_GET['price_amount'];
        $pl_extraID = "";
        $pl_userID = "";
        $pl_contactEmail = "";
        $pl_refundAddress = $_GET['refund_address'];
        $pl_refundExtraID = "";
        
        $url_tx_cn = "https://api.changenow.io/v1/transactions/" . $api_key;
        
        $curl = curl_init();

        $post_data = [
            'from' => $pl_from,
            'to' => $pl_to,
            'address' => $pl_address,
            'amount' => $pl_amount,
            'extraId' => $pl_extraID,
            'userId' => $pl_userID,
            'contactEmail' => $pl_contactEmail,
            'refundAddress' => $pl_refundAddress,
            'refundExtraId' => $pl_refundExtraID
        ];

        //print_r($post);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_tx_cn,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($post_data),
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
          
          $response = curl_exec($curl);
          
          curl_close($curl);
  
          $js_resp = json_decode($response, true);

          

          $s_from_curr = $js_resp['fromCurrency'];
          $s_to_curr = $js_resp['toCurrency'];
          $s_payin_add = $js_resp['payinAddress'];
          $s_amount = $js_resp['amount'];
          $s_order_id = $js_resp['id'];
          $s_from_curr = $js_resp['fromCurrency'];

          //Save in db
          $s_date = "00/00/00";
          $s_store_name = "store name";
          $s_order_id = "store order id";
          $s_amount_brl = "00.00";
          $s_swap_order_id = $js_resp['id'];
          $s_amount = $s_amount;
          $s_pair = $s_from_curr . "/" . $s_to_curr;
          $s_address = $s_payin_add;
          $s_payment_hash = "xxxx";
          $s_br_ex_cript_dep_id = "xxxxx-xxxx";
          $s_amount_brex = "00.00";
          $s_dep_brex_in = "BTC";
          $s_brl_withdraw_id = "xxxxxx";
          $s_brl_withdraw_amount = "00.00";
          $s_bank_dep_id = "xxx";
          $s_pix_id = "xxxxx";
          $s_amount_sent_pix = "00.00";
          $s_date_pix = "00/00/00";
          $s_status = "status";

          //Save information from this step into DB
          $sql = "INSERT INTO flow(date, store_name, order_id, amount_brl, swap_order_id, amount_swap, pair_swap, payment_address, payment_hash, br_ex_cript_dep_id, amount_brex, dep_brex_in, brl_withdraw_id, brl_withdraw_amount, bank_dep_id, pix_id, amount_sent_pix, date_pix, status) VALUES('$s_date', '$s_store_name', '$s_order_id', '$s_amount_brl', '$s_swap_order_id', '$s_amount', '$s_pair', '$s_address', '$s_payment_hash', '$s_br_ex_cript_dep_id', '$s_amount_brex', '$s_dep_brex_in', '$s_brl_withdraw_id', '$s_brl_withdraw_amount', '$s_bank_dep_id', '$s_pix_id', '$s_amount_sent_pix', '$s_date_pix', '$s_status');";

          if(mysqli_query($conn, $sql)){
            echo "Records inserted successfully.";
          } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }

          echo "<br>";
          echo "Please, send:";
          echo "<br>";
          echo $js_resp['amount'] . " " . $s_from_curr;
          echo "<br>";
          echo "To the address below:";
          echo " <br>";
          echo $js_resp['payinAddress'];
          echo " <br>";
          echo $js_resp['id'];
          echo " <br>";


    ?>

    </form>
</body>
</html>
