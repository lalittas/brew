<?php
$access_token = '23qkdo2FuV+BuAPw8ZPDtTH0UrlglSArFZj5so8jPzF8HYgV9jeWcIJS6zkDdYkJAunKf5KnqRRJh15OkxvaK5LDet714q0DkMf/E4YZEYp8y/eRsMzf5wRllHQSI9azIGo87nuV0B8FnBbfK8zGbgdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
$to = 'pwa_waterboy';
$text ='สาขาได้ตรวจสอบข้อมูลแล้ว พิกัดที่แจ้งมาอยู่ในแนวเส้นท่อระยะเหมาจ่าย ท่านสามารถยื่นคำร้องที่ กปภ.สาขา  เพื่อทราบข้อมูลโดยละเอียดอึกครั้ง';
$waterboy = 'U722e9cde1e20f1159013929fb5763fff';
$oub = 'U216a2ccfe018792ea5e8d65489b05552';
$tone = 'Ucad3015537fba0a2376cc14aa223fe64';
$bom = 'U478b61f898b2d4e0ff5dc4b8b0ee21ab';
$ae = 'Ua8fff50dc753f357218ba11dbfb6966f';
//https://reg7.pwa.co.th/img/add.png
//https://sendline.herokuapp.com/images.jpg
$messages = [
				'type' => 'image',
				'originalContentUrl' => 'https://sendline.herokuapp.com/images.jpg',
				'previewImageUrl' => 'https://sendline.herokuapp.com/images.jpg'
				];

	$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to' => $oub,
				'messages' => [$messages]
			];
			
			$post =  json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "ส่งข้อความยืนยันแนวท่อ เสร็จสมบูรณ์\r\n";
echo "OK";
?>
