<?php

namespace elbaz\Http;

class Response
{
    public function setStatusCode($code)
    {
        http_response_code(404);
    }
    public function back()
    {
        header('Location:' . $_SERVER['HTTP_REFERER']);
        return $this;
    }
}
