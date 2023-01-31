<?php
function query($sorov){
    global $conn;
    return mysqli_query($conn,$sorov);
//    return pg_query($conn, $sorov);
}
function check_user($chatId)
{
    $db = query("Select chat_id from users where chat_id='$chatId'");
    if (mysqli_num_rows($db) != 0) {
        return true;
    } else {
        return false;
    }
//    if (pg_num_rows($db) != 0) {
//        return true;
//    } else {
//        return false;
//    }
}
function Api_Token()
{
    $db = query("Select * from token");
    while ($row = mysqli_fetch_assoc($db)) {
        return $row['api_token'];
    }
//    while ($row = pg_fetch_assoc($db)) {
//        return $row['api_token'];
//    }
}
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . Api_Token() . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
function getButton($text, $callback_data, $inline_keyboard = null)
{
    $button = [
        'text' => $text,
        'callback_data' => $callback_data
    ];
    if ($inline_keyboard) {
        $button['inline_keyboard'] = $inline_keyboard;
    }
    return $button;
}
function InlineButton($chatId, $lang){
    if ($lang == "uzb") {
        $button = array();
        $db = query("Select * from product");
        while ($row = mysqli_fetch_assoc($db)) {
            $button[] = array(['text' => $row['description_uz'], 'callback_data' => $row['description_uz']]);
        }

        bot('SendMessage', [
            'chat_id' => $chatId,
            'text' => "📌 Yangiliklar",
            'reply_markup' => json_encode([
                'inline_keyboard' => $button
            ])
        ]);
    }elseif ($lang == "rus") {
        $button = array();
        $db = query("Select * from product");
        while ($row = mysqli_fetch_assoc($db)) {
            $button[] = array(['text' => $row['description_ru'], 'callback_data' => $row['description_ru']]);
        }

        bot('SendMessage', [
            'chat_id' => $chatId,
            'text' => "📌 Новости",
            'reply_markup' => json_encode([
                'inline_keyboard' => $button
            ])
        ]);
    }elseif ($lang == "eng") {
        $button = array();
        $db = query("Select * from product");
        while ($row = mysqli_fetch_assoc($db)) {
            $button[] = array(['text' => $row['description_en'], 'callback_data' => $row['description_en']]);
        }

        bot('SendMessage', [
            'chat_id' => $chatId,
            'text' => "📌 News",
            'reply_markup' => json_encode([
                'inline_keyboard' => $button
            ])
        ]);
    }
}
function lang($chatId){
    $db = query("SELECT lang FROM users WHERE chat_id='$chatId'");
    while ($row = mysqli_fetch_assoc($db)) {
        return $row['language'];
    }
}
function number($chatId){
    $db = query("SELECT phone FROM users WHERE chat_id = '$chatId'");
    while ($row = mysqli_fetch_assoc($db)) {
        return $row['phone'];
    }
}

