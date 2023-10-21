<meta charset="utf-8">
<?php
	$session=session();
	$InputAT=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include("public/database/pdo_library.php");
				include("public/database/class_library.php");					
				$LT_Txt=$InputAT->getPost('LT_Txt');
				
                    if((isset($LT_Txt))){
						$Add_Type=new ManagementType("-",$LT_Txt,"Add");
						exit("<script>window.location='Admin?library_mod=type';</script>");
					}else{
						exit("<script>window.location='Admin?library_mod=type';</script>");
					}
			}else{
				exit("<script>window.location='Admin?library_mod=type';</script>");
			}

		}else{
			exit("<script>window.location='Admin?library_mod=type';</script>");
		}
?>