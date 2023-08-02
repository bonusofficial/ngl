<?php
class Ngl {
    public function sendNgl($message,$user) {
        $url = 'https://ngl.link/api/submit';
        $data = array(
            "username"=> $user,
            "question"=> $message,
            "deviceId"=> "4ff457ac-dfbb-46a6-a30c-b523877312e1",
            "gameSlug"=> "",
            "referrer"=> "",
        );
        $headers = array(
            "Accept: */*",
            "Accept-Encoding: gzip, deflate, br",
            "Accept-Language: en-AS,en;q=0.9,th-TH;q=0.8,th;q=0.7,en-US;q=0.6,en-GB;q=0.5",
            "Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
            "Origin: https://ngl.link",
            "Referer: https://ngl.link/$user",
            'Sec-Ch-Ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
            "Sec-Ch-Ua-Mobile: ?0",
            "Sec-Ch-Ua-Platform: Windows",
            "Sec-Fetch-Dest: empty",
            "Sec-Fetch-Mode: cors",
            "Sec-Fetch-Site: same-origin",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36",
            "X-Requested-With: XMLHttpRequest",
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        try {
            $response = curl_exec($ch);

            if ($response === false) {
                throw new Exception(curl_error($ch));
            }

            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($status_code == 200) {
                $result = json_decode($response);
                return json_encode(array('message' => "สำเร็จ", "status" => true));
            } else {
                return json_encode(array('message' => "ส่งไปไม่สำเร็จ (HTTP Status Code: {$status_code})" , "status" => false));
            }
        } catch (Exception $e) {
            return json_encode(array("status" => false ,'message' => "เกิดข้อผิดพลาดในการเชื่อมต่อ API: " . $e->getMessage()));
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ngl = new Ngl;

    if (empty($_POST['message'])) {
        echo json_encode(array('status' => false, 'message' => "พิมหน่อยเด้อออ!"));
    } else {
        $msg = $_POST['message'];
        $response = $ngl->sendNgl($msg,"bon.usok");
        echo $response;
    }
} else {
    echo json_encode(array('status' => false, 'message' => "Invalid request method"));
}
?>
