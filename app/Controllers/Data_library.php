<?php
    //Develop By Kunlathon Saowakhon
    //พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    //Tel 0932670639
    //โทร 0932670639
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	

	namespace App\Controllers;
	class Data_library extends BaseController{
		public function index(){
			return view('admin_mod/data_library/show_data_library');
		}

		public function notebook($books_key){
            $data_notbook=array('books_key'=>$books_key);
			return view('admin_mod/data_library/show_data_notebook',$data_notbook);
		}
	}
?>