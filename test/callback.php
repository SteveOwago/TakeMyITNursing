<?php

$stkCallbackResponse = file_get_contents('php://input');
$logFile = "stkPushCallbackResponse.txt";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$data = json_decode($stkCallbackResponse);

$result_desc = $data->Body->stkCallback->ResultDesc;
$result_code = $data->Body->stkCallback->ResultCode;
$merchant_request_id = $data->Body->stkCallback->MerchantRequestID;
$checkout_request_id = $data->Body->stkCallback->CheckoutRequestID;
$amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$mpesa_receipt_number = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$transaction_date = $data->Body->stkCallback->CallbackMetadata->Item[3]->Value;
$phone_number = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;

?>