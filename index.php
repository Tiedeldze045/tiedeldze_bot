<?php
http_response_code(200);
ignore_user_abort(true);
set_time_limit(0);
flush();

// Hardcoded token for now
$token = "8053381152:AAF29eX69ZIoAURqcviADw2a1HQdYZlDo_A";

// Log incoming update
file_put_contents("log.txt", file_get_contents("php://input") . PHP_EOL, FILE_APPEND);

// Decode update
$update = json_decode(file_get_contents("php://input"), true);
$chat_id = $update["message"]["chat"]["id"] ?? null;
$message = $update["message"]["text"] ?? "";

// Respond to /start
if ($chat_id && $message === "/start") {
    $reply = "👋 Karibu to Bear Bot! Use /services to see what you can unlock with Stars.";
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($reply));
}

exit;
?>

