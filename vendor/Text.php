<?php

class Text
{
    public function HelloText($lang)
    {
        if ($lang == 'uzb') : return "Assalomu alekum";
        elseif ($lang == 'rus') : return "Привет";
        elseif ($lang == 'eng') : return "Hello";
        endif;
    }
    public function HomePageText($lang){
        if ($lang == 'uzb') : return "🏡 Bosh Menu";
        elseif ($lang == 'rus') : return "🏡 Главное меню";
        elseif ($lang == 'eng') : return "🏡 Main Menu";
        endif;
    }
    public function SendNumberText($lang)
    {
        if ($lang == 'uzb') : return "Botdan to'liq foydalanish uchun Telefon raqam yuboring 👇👇👇";
        elseif ($lang == 'rus') : return "Для полного использования бота отправьте номер телефона 👇👇👇";
        elseif ($lang == 'eng') : return "To fully use the bot, send the phone number 👇👇👇";
        endif;
    }
    public function ReturnNumberText($lang){
        if ($lang == 'uzb') : return "Telefon raqamingizni qayta yuboring 🔁";
        elseif ($lang == 'rus') : return "Повторно отправьте свой номер телефона 🔁";
        elseif ($lang == 'eng') : return "Resend your phone number 🔁";
        endif;
    }
    public function back($lang)
    {
        if ($lang == 'uzb') {
            return "🔙️ Orqaga";
        } elseif ($lang == 'rus') {
            return "🔙️ Назад";
        } elseif ($lang == 'eng') {
            return "🔙️ Back";
        }
    }
}
