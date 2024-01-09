<?php
    //Develop By Kunlathon Saowakhon
    //พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    //Tel 0932670639
    //โทร 0932670639
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
	namespace App\Controllers;
	class create_qrcode extends BaseController{

        public function form_create($count_qrcode){
            $data_create=array('count_qrcode'=>$count_qrcode);
            return view('admin_mod/create_qrcode/form_creare_qrcode',$data_create);
        }

	}
?>