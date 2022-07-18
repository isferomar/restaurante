<?php

namespace App\Http;

class Response
{
    private $data;
    private $status;

    public function __construct($data, $status)
    {
        $this->data = $data;
        $this->status = $status;
    }
    public function send()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json',true,$this->status);
        echo json_encode($this->data);
    }
}
