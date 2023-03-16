<?php
require __DIR__.'/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Container;
use App\Http\MainController;

class Router {
    private array $routes;
    public function register(string $method, string $route, callable|array $action): self
    {
        $this->routes[$method]['/public'.$route] = $action;

        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function resolve(string $uri, string $method)
    {
        $route = explode('?', $uri)[0];
        $action = $this->routes[$method][$route] ?? null;
        if (!$action) {
            throw new Exception('404 not found');
        }

        if(is_callable($action))
            return call_user_func($action);

        if(is_array($action)) {
            [$class, $method] = $action;
            if(class_exists($class)) {
                $class = new $class();

                if(method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }

        throw new Exception('404 not found');
    }
}

class App {
    private static Container $container;
    private Router $router;
    public function __construct()
    {
        $capsule = new Capsule();
        static::$container = new Container();

        $capsule->addConnection([
            "driver" => "mysql",
            "host" =>"127.0.0.1",
            "database" => "SGNL",
            "username" => "root",
            "password" => "mypass"
         ]);
        
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $this->router = new Router();
        $this->router->get('/migrate', [MainController::class, 'migrate']);
        $this->router->get('/check', [MainController::class, 'check']);
        $this->router->get('/main', [MainController::class, 'register']);
        // static::$container->set(MainController::class, fn() => new MainController());
    }

    public function run()
    {
        $this->router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
    }
}

