<meta charset="utf-8">
<?php
	$session=session();
	$InputAA=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include("public/database/pdo_library.php");
				include("public/database/class_library.php");					
				$LA_Name=$InputAA->getPost('LA_Name');
					if((isset($LA_Name))){
						$Add_Author=new ManagementAuthor("-",$LA_Name,"Add");
						exit("<script>window.location='Admin?library_mod=author';</script>");
					}else{
						exit("<script>window.location='Admin?library_mod=author';</script>");
					}
			}else{
				exit("<script>window.location='Admin?library_mod=author';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=author';</script>");
		}
?>