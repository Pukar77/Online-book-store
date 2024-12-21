<?php
// Function to generate the eSewa signature
function generateEsewaSignature($secretKey, $amount, $transactionUuid, $merchantCode) {
    // Prepare the signature string as required by eSewa
    $signatureString = "total_amount=$amount,transaction_uuid=$transactionUuid,product_code=$merchantCode";
    
    // Generate the HMAC SHA256 hash
    $hash = hash_hmac('sha256', $signatureString, $secretKey, true);
    
    // Convert the hash to Base64
    return base64_encode($hash);
}

// Payment initiation logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $amount = $_POST['amount'] ?? '';
    $productName = $_POST['productName'] ?? '';
    $transactionId = $_POST['transactionId'] ?? '';

    // Validate input
    if (empty($amount) || empty($productName) || empty($transactionId)) {
        die('Missing required parameters.');
    }

    // eSewa Configuration
    $merchantCode = "EPAYTEST"; // Replace with your actual merchant code
    $secretKey = "8gBm/:&EnhH.1/q"; // Replace with your actual secret key
    $successUrl = "http://yourdomain.com/payment-success"; // Replace with your success URL
    $failureUrl = "http://yourdomain.com/payment-failure"; // Replace with your failure URL
    $transactionUuid = uniqid("txn-", true); // Unique identifier for the transaction

    // Generate the signature
    $signature = generateEsewaSignature($secretKey, $amount, $transactionUuid, $merchantCode);

    // Prepare eSewa payment parameters
    $esewaConfig = [
        "amount" => $amount,
        "tax_amount" => "0",
        "total_amount" => $amount,
        "transaction_uuid" => $transactionUuid,
        "product_code" => $merchantCode,
        "product_service_charge" => "0",
        "product_delivery_charge" => "0",
        "success_url" => $successUrl,
        "failure_url" => $failureUrl,
        "signed_field_names" => "total_amount,transaction_uuid,product_code",
        "signature" => $signature,
    ];

    // eSewa Payment URL
    $paymentUrl = "https://rc-epay.esewa.com.np/api/epay/main/v2/form";
    // $paymentUrl = "https://epay.esewa.com.np/api/epay/main/v2/form";

    // Redirect to eSewa payment gateway
    echo "<form id='esewaForm' method='POST' action='$paymentUrl'>";
    foreach ($esewaConfig as $key => $value) {
        echo "<input type='hidden' name='$key' value='$value'>";
    }
    echo "</form>";
    echo "<script>document.getElementById('esewaForm').submit();</script>";
} else {
    // Show a sample form to initiate payment
    ?>
    <form method="POST" action="" style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #4CAF50; margin-bottom: 20px;">eSewa Payment</h2>
        
        <label for="amount" style="font-weight: bold; display: block; margin-bottom: 5px;">Amount:</label>
        <input type="text" id="amount" name="amount" required readonly style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
        
        <label for="productName" style="font-weight: bold; display: block; margin-bottom: 5px;">Product Name:</label>
        <input type="text" id="productName" name="productName" required readonly style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
        
        <label for="transactionId" style="font-weight: bold; display: block; margin-bottom: 5px;">Transaction ID:</label>
        <input type="text" id="transactionId" name="transactionId" value="12344" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">
        
        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; font-size: 16px; border: none; border-radius: 4px; cursor: pointer;">Pay with eSewa</button>
    </form>
    <script>
    let getData = localStorage.getItem("setData");
    let parsedata = JSON.parse(getData);
    console.log(parsedata);
    let amount = document.getElementById("amount");
    amount.value = parsedata.totalprice;

    let title = document.getElementById("productName");
    title.value = parsedata.booktitle;
    </script>
    <?php
}
?>
