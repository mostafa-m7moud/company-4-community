<?php
require '../../Comment.php';
header('Content-Type: application/json');

if(isset($_SERVER['HTTP_API_KEY']) && $_SERVER['HTTP_API_KEY'] == 111111){
    if(isset($_GET['cID']) && isset($_GET['comment'])){
        $comment_handler = new CommentHandler();
        $comment = $_GET['comment'];
        $id = $_GET['cID'];
        $comment_handler->editComment($id, $comment);
        $result = array(
            'msg' => "Comment Edited successfully",
            'code' => 200
        );
        echo json_encode($result);
    }else{
        $result = array(
            'msg' => "Bad Request",
            'code' => 403
        );
        echo json_encode($result);
    }
}else{
    $result = array(
        'msg' => "Bad Authentications",
        'code' => 402
    );
    echo json_encode($result);
}
