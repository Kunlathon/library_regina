<meta charset="utf-8">
<?php
	$session=session();
	$InputP=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");
				include(APPPATH."Database-pdo/class_library.php");					
				$LP_Name=$InputP->getPost('LP_Name');
					if((isset($LP_Name))){
						$Add_Publisher=new ManagementPublisher("-",$LP_Name,"Add");
						exit("<script>window.location='Admin?library_mod=publisher';</script>");
					}else{
						exit("<script>window.location='Admin?library_mod=publisher';</script>");
					}
			}else{
				exit("<script>window.location='Admin?library_mod=publisher';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=publisher';</script>");
		}
?>