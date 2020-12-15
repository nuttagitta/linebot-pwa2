  
<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'gStuEkiVuNbueTctSHQBZBu1hfmuBaK7gfL9jAqUlMrl9wCx52x5yYkB2onZe87/VeWI0N0sRmHDwwbFSpVhEPQhjt9j3ddwduF2BT1r52OkFqZwLOr9B5gjS5++VyCTRl+e+RLHgMyOZ10LdEqm1QdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '983c55f3689b2f81573f4393d4ab7971';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array



$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('<gStuEkiVuNbueTctSHQBZBu1hfmuBaK7gfL9jAqUlMrl9wCx52x5yYkB2onZe87/VeWI0N0sRmHDwwbFSpVhEPQhjt9j3ddwduF2BT1r52OkFqZwLOr9B5gjS5++VyCTRl+e+RLHgMyOZ10LdEqm1QdB04t89/1O/w1cDnyilFU=>');
$bot = new \LINE\LINEBot($httpClient, ['$channelSecret = '983c55f3689b2f81573f4393d4ab7971' => '<$channelSecret = '983c55f3689b2f81573f4393d4ab7971']);
$userIds = ['<userId1>', '<userId2>', ...];
$bot->multicast($userIds, '<ค้นหาใบแจ้งหนี้>');




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
