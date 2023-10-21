<meta charset="utf-8">
<?php
	$session=session();
	$InputAK=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include("public/database/pdo_library.php");
				include("public/database/class_library.php");					
				$lk_txtTh=$InputAK->getPost('lk_txtTh');
                $lk_txtEn=$InputAK->getPost('lk_txtEn');
					if((isset($lk_txtTh,$lk_txtEn))){
						$Add_Keep=new ManagementKeep("-",$lk_txtTh,"$lk_txtEn","Add");
						exit("<script>window.location='Admin?library_mod=keep';</script>");
					}else{
						exit("<script>window.location='Admin?library_mod=keep';</script>");
					}
			}else{
				exit("<script>window.location='Admin?library_mod=keep';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=keep';</script>");
		}
?>