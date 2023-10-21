<?php
	namespace App\Controllers;
	class Editor extends BaseController{

		public function index(){
			return view('admin_mod/editor/editor_show');
		}

		public function processing(){
			return view('admin_mod/editor/editor_processing');
		}

	}
?>