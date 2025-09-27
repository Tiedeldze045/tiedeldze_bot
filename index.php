<?php
http_response_code(200); // Respond immediately
ignore_user_abort(true);
set_time_limit(0);
flush();

// Log incoming update
file_put_contents("log.txt", file_get_contents("php://input"));

// Load token
$token = getenv("BOT_TOKEN");

// Decode update
$update = json_decode(file_get_contents("php://input"), TRUE);
$chat_id = $update["message"]["chat"]["id"] ?? null;
$message = $update["message"]["text"] ?? "";

// Respond to /start
if ($chat_id && $message == "/start") {
    $reply = "👋 Karibu to Bear Bot! Use /services to see what you can unlock with Stars.";
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($reply));
}
?>
