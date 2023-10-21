<?php
	namespace App\Controllers;
	class Author extends BaseController{
		public function index(){
			return view('admin_mod/author/author_show');
		}

		public function processing(){
			return view('admin_mod/author/author_processing');
		}

	}
?>