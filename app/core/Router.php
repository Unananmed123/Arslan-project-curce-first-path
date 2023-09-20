<?php
namespace app\core\Router;


use app\core\View;
use core\roles;

class Router
{

    public function redirect($url)
    {
        header('Location' . $url);
        exit();
    }
    protected $params=[];
    public function match(){
        $url=trim($_SERVER['REQUEST_URI'], '/');
        if (!empty($url)){
            $params=explode('/', $url);
            if (!empty($params[0]) && !empty($params[1])){
                $this->params=[
                    'controller'=> $params[0],
                    'action'=>$params[1]
                ];
            } else{
                return false;
            }
        }else {
            $params = require 'app/config/params.php';
            $this->params = [
                'controller' => $params['defaultController'],
                'action' => $params['defaultAction']
            ];
        }
        return true;
    }

    public function run(){
        if ($this->match()){
            $path_controller='app\\controllers\\'. ucfirst($this->params['controller']). 'Controller';
            if (class_exists($path_controller)){
                $action = 'action'. ucfirst($this->params['action']);
                if (method_exists($path_controller, $action)){
                    $controller = new $path_controller($this->params);
                    $behaviors = $controller->behaviors();
                    if ($this->checkBehaviors($behaviors)){
                        $controller->$action();
                    }

                }    else{
                    echo 'Action не найден:'. $action;
                    ;
                }
            } else{
                ;
            }
        }else{
            ;
        }
    }
}