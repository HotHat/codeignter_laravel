<?php
/**
 * Created by cncn.com.
 * User: lyhux
 * Date: 2018/1/12
 * Time: 14:48
 */

use App\Models\Admin;

class Manage extends CI_Controller
{
    public function user() {
        $users = Admin::all();

        $this->blade->view('home.index', ['list' => $users]);
    }

}