<?php
    //Develop By Kunlathon Saowakhon
    //พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    //Tel 0932670639
    //โทร 0932670639
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
	namespace App\Controllers;
	class borrow_book extends BaseController{

		public function index(){
			return view('admin_mod/borrow_book/book_select');
		}
		public function user_books($user_key){
			$copy_txt=array('user_key'=>$user_key);
			return view('admin_mod/borrow_book/borrow_book_show',$copy_txt);
		}
	}
?>