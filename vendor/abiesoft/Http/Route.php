<?php 

namespace Abiesoft\Resources\Http;

use Abiesoft\Resources\Utilities\Config;

class Route {

    use Request;
    private $route = [];

    public function __construct()
    {
        if(is_array(Config::yaml('route'))){
            foreach (Config::yaml('route') as $all => $only) {
                if (!is_array($only)) {
                    $this->get("/api/" . $all, [ucfirst($all) . "Api", "load"]);
                    $this->get("/api/" . $all . "/:id", [ucfirst($all) . "Api", "load"]);
                    $this->get("/api/" . $all . "/:parameter", [ucfirst($all) . "Api", "load"]);
                    $this->post("/api/" . $all, [ucfirst($all) . "Api", "load"]);
                    $this->put("/api/" . $all, [ucfirst($all) . "Api", "load"]);
                    $this->delete("/api/" . $all, [ucfirst($all) . "Api", "load"]);
                }else{
                    $method = $only['method'];
                    $this->$method($only['url'], [ucfirst($only['service']) . "Api", $only['function']]);
                }
            }
        } else {
            return $this->route;
        }
    }

    public function get(string $path, string|array $callback)
    {
        $this->route['get'][$path] = $callback;
    }

    public function post(string $path, string|array $callback)
    {
        $this->route['post'][$path] = $callback;
    }

    public function put(string $path, string|array $callback)
    {
        $this->route['put'][$path] = $callback;
    }

    public function delete(string $path, string|array $callback)
    {
        $this->route['delete'][$path] = $callback;
    }

    public function aktif(){
        $method = $this->method();
        $path = $this->path();
        $parameter = $this->params();

        (isset($this->route[$method][$path])) ? $callback = $this->route[$method][$path] : $callback = $this->notFound();

        if (is_array($callback)) {
            $controller = "\App\Service\Api\\" . $callback[0];
            $ctrl = new $controller;
            $function = $callback[1];
            $ctrl->$function($parameter);
        }

        if (is_string($callback)) {
            die($callback);
        }

    }

    protected function notFound() {
        $result = [];
        $result['code'] = 404;
        $result['message'] = "NOT FOUND";
        echo json_encode($result);
    }

    public function listRoute()
    {
        return $this->route;
    }

}