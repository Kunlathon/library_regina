<meta charset="utf-8">
<?php
	$session=session();
	$InputAE=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include("public/database/pdo_library.php");
				include("public/database/class_library.php");					
				$LE_Txt=$InputAE->getPost('LE_Txt');
					if((isset($LE_Txt))){
						$Add_Editor=new ManagementEditor("-",$LE_Txt,"Add");
						exit("<script>window.location='Admin?library_mod=Editor';</script>");
					}else{
						exit("<script>window.location='Admin?library_mod=Editor';</script>");
					}
			}else{
				exit("<script>window.location='Admin?library_mod=Editor';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=Editor';</script>");
		}
?>