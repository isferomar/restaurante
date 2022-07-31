<?php


function json($data = [], $status = 200)
{
    $response = new \App\Http\Response($data, $status);
    return $response;
}
function validate($objet, $validateList)
{
    $errorList = [];
    foreach ($validateList as $value) {
        if (empty($objet->$value)) {
            array_push($errorList, "el campo " . $value . " es obligatorio");
        }
    }
    if (!empty($errorList)) {
        return [
            "state" => "error",
            "type" => "validation",
            "list" => $errorList
        ];
    } else {
        return null;
    }
}
