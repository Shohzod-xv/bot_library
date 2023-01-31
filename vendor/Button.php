<?php

class Button{
    function language(){
        return json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "🇺🇿 Uzb", 'callback_data' => "uzb"],
                    ['text' => "🇷🇺 Rus", 'callback_data' => "rus"],
                    ['text' => "🇺🇸 Eng", 'callback_data' => "eng"]
                ],
            ]
        ]);
    }
    public function SendNumberButton($lang)
    {
        if ($lang == 'uzb') : return json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard'=>true,
            'keyboard' => [
                [['text' => "☎️ Raqam Yuborish", 'request_contact' => true]],
            ]
        ]);
        elseif ($lang == "rus") : return json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard'=>true,
            'keyboard' => [
                [['text' => "☎️ Отправить номер", 'request_contact' => true]],
            ]
        ]);
        elseif ($lang == "eng") : return json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard'=>true,

            'keyboard' => [
                [['text' => "☎️ Send Number", 'request_contact' => true]],
            ]
        ]);
        endif;
    }
    public function HomePageButton($lang)
    {
        if ($lang == 'uzb') :
            return json_encode([
                'resize_keyboard' => true,
                'keyboard' => [
                    [['text' => "Button-1"], ['text' => "Button-2"]],
                    [['text' => "Button-3"], ['text' => "Button-4"]],
                    [['text' => "Button-5"], ['text' => "Button-6"]],
                ]
            ]);
        elseif ($lang == "rus") :
            return json_encode([
                'resize_keyboard' => true,
                'keyboard' => [
                    [['text' => "Button-1"], ['text' => "Button-2"]],
                    [['text' => "Button-3"], ['text' => "Button-4"]],
                    [['text' => "Button-5"], ['text' => "Button-6"]],
                ]
            ]);
        elseif ($lang == "eng") :
            return json_encode([
                'resize_keyboard' => true,
                'keyboard' => [
                    [['text' => "Button-1"], ['text' => "Button-2"]],
                    [['text' => "Button-3"], ['text' => "Button-4"]],
                    [['text' => "Button-5"], ['text' => "Button-6"]],
                ]
            ]);
        endif;
    }


}

