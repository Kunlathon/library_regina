<?php
	namespace App\Controllers;
	class Type extends BaseController{
		public function index(){
			//return view('admin_mod/type/add_type');
			return view('admin_mod/type/type_show');
		}
		public function processing(){
			return view('admin_mod/type/type_processing');
		}

	}
?>