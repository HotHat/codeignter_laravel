<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use App\Models\Admin;
use Illuminate\Database\Capsule\Manager as Capsule;

use App\Models\Validator;

class Home extends CI_Controller {

	public function index()
	{
	    // Admin::getConnectionResolver()->connection()->beginTransaction();
        $users = Capsule::table('admins')->get();
        // Capsule::connection()->beginTransaction();

        // dd($users);

		$list = Admin::all();

        // Admin::getConnectionResolver()->connection()->commit();


		$this->load->view('home/index', ['list' => $list]);
	}

    public function val()
    {

        $messages = [
            'required' => 'The :attribute field is required.',
        ];

        $dataToValidate = ['title' => 'Some title'];

        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        $validator = Validator::make($dataToValidate, $rules, $messages);

        if($validator->fails()){
            $errors = $validator->errors();
            foreach($errors->all() as $message){
                var_dump($message);
            }
        }
	}
}
