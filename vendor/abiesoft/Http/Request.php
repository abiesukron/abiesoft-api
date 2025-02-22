<?php 

namespace Abiesoft\Resources\Http;

use Abiesoft\Resources\Utilities\Input;

trait Request {

    public function method()
    {
        $method = "get";

        if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
            if (Input::get('__method') == "PATCH") {
                $method = "patch";
            } else if (Input::get('__method') == "DELETE") {
                $method = "delete";
            } else {
                $method = "post";
            }
        }

        return $method;
    }

    public function path()
    {
        $path = "";

        (substr($_SERVER['REQUEST_URI'], -1) == "/") ? $path = substr($_SERVER['REQUEST_URI'], 0, -1) : $path = $_SERVER['REQUEST_URI'];
        ($path == "") ? $path = "/" : $path = $path;

        if (count(explode("/", $path)) == 4) {
            if (explode("/", $path)[3] != "excel") {
                $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/:id";
            } else {
                $path = $path;
            }
        } else if (count(explode("/", $path)) > 4) {
            $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/:parameter";
        } else {
            $path = $path;
        }
        
        return $path;
    }

    public function params()
    {
        $path = "";
        $params = [];

        (substr($_SERVER['REQUEST_URI'], -1) == "/") ? $path = substr($_SERVER['REQUEST_URI'], 0, -1) : $path = $_SERVER['REQUEST_URI'];
        ($path == "") ? $path = "/" : $path = $path;

        if (explode("/", $path)[1] == "api") {
            if (count(explode("/", $path)) > 3) {
                $dataparam = explode("/", $path);
                for ($i = 0; $i < count($dataparam); $i++) {
                    if ($i > 2) {
                        array_push($params, $dataparam[$i]);
                    }
                }
            } else {
                $params = [];
            }
        }

        return $params;
    }

}