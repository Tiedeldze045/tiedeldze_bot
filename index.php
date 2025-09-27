<?php
// ✅ Respond immediately to Telegram to avoid timeout
http_response_code(200);
ignore_user_abort(true);
set_time_limit(0);
flush();

// ✅ Read the bot token from environment variable
$token = getenv("BOT_TOKEN");

// ✅ Decode incoming Telegram update
$update = json_decode(file_get_contents("php://input"), TRUE);

// ✅ Extract chat ID and message text safely
$chat_id = $update["message"]["chat"]["id"] ?? null;
$message = $update["message"]["text"] ?? "";

if ($chat_id && $message == "/start") {
    $reply = "👋 Karibu to Bear Bot! Use /services to see what you can unlock with Stars.";
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($reply));
}
?>