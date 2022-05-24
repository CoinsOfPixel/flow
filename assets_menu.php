<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php

$store_order_id = $_GET['soid'];

$prod_price = $_GET['pc_price'];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.changenow.io/v1/market-info/available-pairs/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

$js_decode = json_decode($response, true);

$arr = $js_decode;

curl_close($curl);

?>

<h1>Payment Page:</h1>

<p></p>

<form action="payment.php">


  <label for="assets">Select the currency: </label>
    <select name="assets" id="assets">
        <?php
        $pattern = "/(_btc)$/";
        $only_first = "_";
        foreach ($arr as $i) 
        {
            if(preg_match($pattern, $i))
            {
                $input_currency = strtok($i, $only_first);
                echo "<option value='$input_currency'>$input_currency</option>";
             }
            
        }

        //Send the selected currency to next page
        $_POST['assets'];

        ?>
    </select>

        <div class="empty_box">
            <br>
        </div>

        
        <!-- Here's the price box. There's an example value inside but just for test purpose -->
        <label for="refund_address_label">Paste your refund address (NEVER TYPE and after paste, ALWAYS DOUBLE CHECK): 
        <div class="refund_box"> 
        <input type="text" id="refund_address" name="refund_address"><br><br>
        </div>

        <!-- Here's the price box. There's an example value inside but just for test purpose -->
        <label for="price_box">Order Price: </label>
        <div class="price_box"> 
            <input type="text" id="price_amount" name="price_amount" value=<?php echo $prod_price; ?>><br><br>
        </div>

        <?php

            //Send the refund address to the next page
            $_POST['refund_address'];

            //Send the amount to the next page
            $_POST['price_amount'];

            echo $store_order_id;
            echo $prod_price;

        ?>

    </optgroup>
    </select>
  <br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>