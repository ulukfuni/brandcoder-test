<?php
//required headers
header("Access-Control-Allow-Origin: *");
//header("Content-Type:application/json; charset=UTF-8");
header("Content-Type:application/x-www-form-urlencoded; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './fib.php';
$fib = new Fibonacci();

function response($status, $status_msg, $data) {
    header("HTTP/1.1 ".$status);

    $response['status'] = $status;
    $response['message'] = $status_msg;
    $response['data'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST' ) {
    response('500 Forbidden', 'POST requests only', 0);
}

try {
    $post = json_decode(file_get_contents('php://input'));
    // var_dump($post);
    if (!empty($post->number)) {
        response('200 OK', "got the number!", $fib->getFib($post->number));
    } else if ($post->number === '0') {
        response('200 OK', "got the number!", 'but its zero');
    } else {
        response('403 Forbidden', "no number, WTH", '');
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

