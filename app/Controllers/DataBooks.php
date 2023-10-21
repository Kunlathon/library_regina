<?php
	namespace App\Controllers;
	class DataBooks extends BaseController{
		public function index(){
			return view('admin_mod/data_books/data_books');
		}
	}
?>