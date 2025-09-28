<?php
http_response_code(200);
ignore_user_abort(true);
set_time_limit(0);
flush();

$token = "7422219549:AAHgTws9iHWCXDa0JNkTW4nC8k1n4smCghs";

$raw = file_get_contents("php://input");
$update = json_decode($raw, true);

$chat_id = $update["message"]["chat"]["id"] ?? null;
$message = $update["message"]["text"] ?? "";

if ($chat_id) {
    $reply = "🐻 Raw update:\n" . $raw;
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($reply));
}

exit;
?>

