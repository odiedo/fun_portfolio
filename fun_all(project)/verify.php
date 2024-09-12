<?php

header('Content-Type: application/json');

// Get the input data
$input = json_decode(file_get_contents('php://input'), true);
$idNumber = $input['idNumber'];

// Define the API URL
$url = "https://api.spinmobile.co/api/analytics/account/iprs";

// Initialize cURL
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the headers
$headers = array(
   "Accept: application/json",
   "Authorization: Bearer ODkzODMyYTlmMjg3ZWI2NGM2NDg1ZDkzMDRmM2M5",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// Prepare the data
$data = json_encode([
    'search_type' => 'identity',
    'identifier' => $idNumber
]);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// Disable SSL verification for debugging purposes (do not use in production)
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// Execute the cURL request
$response = curl_exec($curl);
if (curl_errno($curl)) {
    echo json_encode(['code' => '500', 'message' => curl_error($curl)]);
    curl_close($curl);
    exit;
}
curl_close($curl);

// Output the response
echo $response;
?>
