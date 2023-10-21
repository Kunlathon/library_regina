<?php
	namespace App\Controllers;
	class Admin extends BaseController{
		public function index(){
			return view('admin/administrator');
		}public function login(){
			return view('admin/login');
		}
	}
?>