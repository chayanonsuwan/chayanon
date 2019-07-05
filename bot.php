<?php
$access_token = 'UHVfEcWiNbhq9r+HmWKjoihcCHj7DX/i8YoihTFMuRN3EdA8rxzGueMsu9y+d5pHHueHQfkO4pevBVVPmNKT8VDHlMW0tK4htcIhYL/72Pbo5Fy0/ZajSjFXn5JjoVNGYWfZKqGjtevxQ9XaX+a2LwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
	if($text=="ดี")
	{
	$send="สวัสดี";
	}
	elseif($text=="ชื่อไร")
	{
		$send="ไร้ชื่อไร้แซ่";
	}
	elseif($text=="สบายดี")
	{
		$send="ก็สบายดีอยู่";
	}
	elseif($text=="หิวเปล่า")
	{
		$send="เป็นบอทจะหิวไปทำไม";
	}
	else
	{
		$send=$text.$replyToken;
	}
			
			
			$messages = ['type' => 'text','text' => $send];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
