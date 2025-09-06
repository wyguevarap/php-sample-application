
<?php
require_once __DIR__ . '/../autoloader.php';

$lastJoinedUsers = (require __DIR__ . '/../dic/users.php')->getLastJoined();

switch (require __DIR__ . '/../dic/negotiated_format.php') {
    case "text/html":
        (new Views\Layout(
            "Twitter - Newcomers", new Views\Users\Listing($lastJoinedUsers), true
        ))();
        exit;

    case "application/json":
        header("Content-Type: application/json");
        echo json_encode($lastJoinedUsers);
        exit;
}

http_response_code(406);
