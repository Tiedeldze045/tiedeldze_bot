<?php
http_response_code(200);
ignore_user_abort(true);
set_time_limit(0);
flush();

$token = getenv("BOT_TOKEN");

$update = json_decode(file_get_contents("php://input"), TRUE);

$chat_id = $update["message"]["chat"]["id"] ?? null;
$message = $update["message"]["text"] ?? "";

if ($chat_id && $message == "/start") {
    $reply = "👋 Karibu to Bear Bot! Use /services to see what you can unlock with Stars.";
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($reply));
}
?>
