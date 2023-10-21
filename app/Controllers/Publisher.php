<?php
	namespace App\Controllers;
	class Publisher extends BaseController{

		public function index(){
			return view('admin_mod/publisher/publisher_show');
		}

		public function processing(){
			return view('admin_mod/publisher/publisher_processing');
		}

	}
?>