<?php
	namespace App\Controllers;
	class Keep extends BaseController{
		public function index(){
			return view('admin_mod/keep/keep_show');
		}

		public function processing(){
			return view('admin_mod/keep/keep_processing');
		}
	}
?>