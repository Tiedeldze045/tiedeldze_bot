<?php
http_response_code(200);
ignore_user_abort(true);
set_time_limit(0);
flush();

// Hardcoded token
$token = "8053381152:AAF29eX69ZIoAURqcviADw2a1HQdYZlDo_A";

// Raw update
$raw = file_get_contents("php://input");
file_put_contents("log.txt", $raw . PHP_EOL, FILE_APPEND);

// Decode update
$update = json_decode($raw, true);
file_put_contents("error_log.txt", print_r($update, true) . PHP_EOL, FILE_APPEND);

// Extract chat_id and message
$chat_id = $update["message"]["chat"]["id"] ?? null;
$message = $update["message"]["text"] ?? "";

// Fallback reply to confirm bot is alive
if ($chat_id) {
    $reply = "🐻 Bear Bot received: " . $message;
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($reply));
}

exit;
?>
