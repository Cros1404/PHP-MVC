<!DOCTYPE html>
<html>
<body>
<?php 
// MVC php code from https://www.sitepoint.com/the-mvc-pattern-and-php-1/
class Model
{
    public $string;

    public function __construct(){
        $this->string = "Hello World!";
    }

}
class View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        return '<p><a href="index.php?action=clicked">' . $this->model->string . "</a></p>";
    }
}
class Controller
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function clicked() {
        $this->model->string = "Updated Hello World!";
    }
}
if (empty($model)) {
    $model = new Model();
    $controller = new Controller($model);
    $view = new View($controller, $model);
}

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
}

echo $view->output();
?>
</body>
</html>