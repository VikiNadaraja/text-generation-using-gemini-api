<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");
$apiKey = 'GEMINI_API_KEY';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $search = $_POST['search'];
        $content = [
        "contents" => [
            [
                "parts" => [
                    [
                        "text" => $search
                    ]
                ]
            ]
        ]
        ];
        $data = json_encode($content);
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=GEMINI_API_KEY');
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, ($data));

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $headers = array(
                "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($curl);

            if ($response === false) {
                echo 'Curl error: ' . curl_error($curl);
            } else {
                //echo 'Response: ' . $response . $data . '<br>';
                $rsp = json_decode($response, true);
                if(isset($rsp['candidates'][0]['content']['parts'][0]['text'])){
                    $txt = $rsp['candidates'][0]['content']['parts'][0]['text'];
                    echo '<h4> Search Result : </h4>';
                    echo '<p> '.nl2br(htmlspecialchars($txt)).'</p>';
                }else{
                    echo 'no data in api';
                }
            }
            curl_close($curl);


}else {
    echo "Invalid request.";
}
        
?>
