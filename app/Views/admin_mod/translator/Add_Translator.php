<meta charset="utf-8">
<?php
	$session=session();
	$InputAT=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include("public/database/pdo_library.php");
				include("public/database/class_library.php");					
				$LTr_Txt=$InputAT->getPost('LTr_Txt');
					if((isset($LTr_Txt))){
						$Add_Translator=new ManagementTranslator("-",$LTr_Txt,"Add");
						exit("<script>window.location='Admin?library_mod=translator';</script>");
					}else{
						exit("<script>window.location='Admin?library_mod=translator';</script>");
					}
			}else{
				exit("<script>window.location='Admin?library_mod=translator';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=translator';</script>");
		}
?>