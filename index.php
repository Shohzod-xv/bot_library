<?php
include "vendor/Database.php";
include "vendor/Button.php";
include "vendor/Text.php";
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chatId = $message->chat->id;
$tx = $message->text;
$first_name = $message->from->first_name;
$miid = $message->message_id;
$callback = $update->callback_query;
$mmid = $callback->inline_message_id;
$mes = $callback->message;
$mid = $mes->message_id;
$cbid = $callback->from->id;
$data = $callback->data;
$fromId = $message->from->id;
$num = $message->contact->phone_number;
$btn = new Button();
$text = new Text();

if ($tx == "/start") {
    bot('sendMessage', [
        'chat_id' => $chatId,
        'text' => "Tilni tanlang:\n Select language:",
        'reply_markup' => $btn->language()
    ]);
    if (!check_user("$chatId")) {
        query("Insert Into users(chat_id,first_name,phone,lang,created_at) values('$chatId','$first_name',0,'null',NOW())");
    }
}
if ($data == "uzb" || $data == "rus" || $data == "eng") {
    query("UPDATE users SET lang = '$data' WHERE chat_id='$cbid'");
    bot('editMessageText', [
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => $text->HelloText($data),
    ]);
    if (number($cbid) != ""){
        bot('sendMessage', [
            'chat_id' => $cbid,
            'text' => $text->HomePageText(lang($cbid)),
            'reply_markup' => $btn->HomePageButton(lang($cbid))
        ]);
    }else{
        bot('sendMessage', [
            'chat_id' => $cbid,
            'text' => $text->SendNumberText($data),
            'reply_markup' => $btn->SendNumberButton($data)
        ]);
    }
}
if ($num){
    if (substr($num, 0, 3) == "998" && strlen($num) == 12) {
        $db = query("UPDATE users SET phone='{$num}' where chat_id ='$fromId'");
        bot('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text->HomePageText(lang($chatId)),
            'reply_markup' => $btn->HomePageButton(lang($chatId))
        ]);
    }elseif (substr($num, 0, 4) == "+998" && strlen($num) == 13){
        $db = query("UPDATE users SET phone='{$num}' where chat_id ='$fromId'");
        bot('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text->HomePageText(lang($chatId)),
            'reply_markup' => $btn->HomePageButton(lang($chatId))
        ]);
    }
    else {
        bot('sendMessage', [
            'chat_id' => $fromId,
            'text' => $text->ReturnNumberText(lang($chatId)),
            'reply_markup' => $btn->SendNumberButton(lang($chatId))
        ]);
    }
}
echo "hellooooo";