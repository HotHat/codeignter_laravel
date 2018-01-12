<?php
/**
 * Created by cncn.com.
 * User: lyhux
 * Date: 2018/1/12
 * Time: 14:17
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Blade
{
    public function __construct()
    {
        $views = APPPATH . '/views';
        $cache = APPPATH . '/cache/views';

        $this->factory = new \Philo\Blade\Blade($views, $cache);
    }
    public function view($path, $vars = [])
    {
        echo $this->factory->view()->make($path, $vars);
    }
    public function exists($path)
    {
        return $this->factory->view()->exists($path);
    }
    public function share($key, $value)
    {
        return $this->factory->view()->share($key, $value);
    }
    public function render($path, $vars = [])
    {
        return $this->factory->view()->make($path, $vars)->render();
    }
}