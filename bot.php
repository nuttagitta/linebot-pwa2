  
<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'gStuEkiVuNbueTctSHQBZBu1hfmuBaK7gfL9jAqUlMrl9wCx52x5yYkB2onZe87/VeWI0N0sRmHDwwbFSpVhEPQhjt9j3ddwduF2BT1r52OkFqZwLOr9B5gjS5++VyCTRl+e+RLHgMyOZ10LdEqm1QdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '983c55f3689b2f81573f4393d4ab7971';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array


if($message == "ค้นหาใบแจ้งหนี้"){
    $arrayPostData['to'] = $id;
    $arrayPostData['messages'][0]['type'] = "ใบแจ้งหนี้ คลิกที่นี่ ผู้ใช้น้ำสามารถสแกนหรือคลิกลิงก์เพื่อรับใบแจ้งหนี้ได้ทันที";
    <a href="http://www.doesystem.com/index.php">https://pwa.thailawyersoft.com/Output/202012/PDF/11332222530.pdf</a>;
    pushMsg($arrayHeader,$arrayPostData);
}

if ( sizeof($request_array['events']) > 0 ) {
      foreach ($request_array['events'] as $event) {
      
      $reply_message = 'ใบแจ้งหนี้ คลิกที่นี่ ผู้ใช้น้ำสามารถสแกนหรือคลิกลิงก์เพื่อรับใบแจ้งหนี้ได้ทันที';
      $reply_token = $event['replyToken'];
      $data = [
         'replyToken' => $reply_token,
         'messages' => [
            ['type' => 'ค้นหาใบแจ้งหนี้', 
             'text' => json_encode($request_array)]
         ]
      ];
      $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
      $send_result = ค้นหาใบแจ้งหนี้($API_URL.'/reply', $POST_HEADER, $post_body);
      echo "Result: ".$send_result."\r\n";
   }
}
echo "OK";


function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

?>
