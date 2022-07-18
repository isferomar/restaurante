<?php


function json($data,$status)
{
    $response = call_user_func([new $controller, $method], $id);

    $response->send();
}