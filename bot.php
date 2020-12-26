<?php
    $accessTokan = "gStuEkiVuNbueTctSHQBZBu1hfmuBaK7gfL9jAqUlMrl9wCx52x5yYkB2onZe87/VeWI0N0sRmHDwwbFSpVhEPQhjt9j3ddwduF2BT1r52OkFqZwLOr9B5gjS5++VyCTRl+e+RLHgMyOZ10LdEqm1QdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessTokan}";
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];

{
  "events": [{
    "type": "message",
    "replyToken": "2fad91d0e9424bb5...",
    "source": {
      "userId": "U3c28a70ed7c5e7ce2...",
      "type": "user"
    },
    "timestamp": 1546854929833,
    "message": {
      "type": "image",
      "id": "9141988397354",
      "contentProvider": { "type": "line" }
    }
  }],
  "destination": "U820116ffcbe3f3ca71b..."
}


    function pushMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
    exit;
?>
