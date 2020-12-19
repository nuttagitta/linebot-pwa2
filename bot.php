<?php
    $accessTokan = "gStuEkiVuNbueTctSHQBZBu1hfmuBaK7gfL9jAqUlMrl9wCx52x5yYkB2onZe87/VeWI0N0sRmHDwwbFSpVhEPQhjt9j3ddwduF2BT1r52OkFqZwLOr9B5gjS5++VyCTRl+e+RLHgMyOZ10LdEqm1QdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessTokan}";
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
    //รับ id ของผู้ใช้
    $id = $arrayJson['events'][0]['source']['userId'];
    #ตัวอย่าง Message Type "Text + Sticker"
    if($message == "สวัสดี"){
        $arrayPostData['to'] = $id;
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้า";
        //$arrayPostData['messages'][1]['type'] = "sticker";
        //$arrayPostData['messages'][1]['packageId'] = "2";
        //$arrayPostData['messages'][1]['stickerId'] = "34";
        pushMsg($arrayHeader,$arrayPostData);
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
