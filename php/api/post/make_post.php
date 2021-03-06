<?php
require '../../Post.php';
header('Content-Type: application/json');

if(isset($_SERVER['HTTP_API_KEY']) && $_SERVER['HTTP_API_KEY'] == 111111){

    if(isset($_GET['title']) && isset($_GET['desc']) 
            && isset($_GET['picLink']) && isset($_GET['publisher'])){
        $post_handler = new PostHandler();
        $title = $_GET['title'];
        $desc = $_GET['desc'];
        $pic_link = $_GET['picLink'];
        $publisher = $_GET['publisher'];
        $post_handler->makePost($title, $desc, $pic_link, $publisher);
        $result = array(
            'msg' => "Post created successfully",
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