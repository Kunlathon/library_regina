<?php
	$session=session();
	$input_process=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");
				include(APPPATH."Database-pdo/class_library.php");					
                $manage=$input_process->getPost('manage');   
                    if(($manage=="process_add")){
                        $LT_Txt=$input_process->getPost('LT_Txt');
                        $add_type=new ManagementType("-",$LT_Txt,"Add");
							if(($add_type->CallMLTTypeTxt()=="NoError")){
								echo "succeed";
							}elseif($add_type->CallMLTTypeTxt()=="Error"){
								echo "failed";
							}else{
								echo "-";
							}
                    }elseif(($manage=="process_up")){
						$LT_Txt=$input_process->getPost('LT_Txt');
						$type_key=$input_process->getPost('type_key');
                        $up_type=new ManagementType($type_key,$LT_Txt,"up");	
							if(($up_type->CallMLTTypeTxt()=="NoError")){
								echo "succeed";
							}elseif(($up_type->CallMLTTypeTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}						
					}elseif(($manage=="process_delete")){
						$type_key=$input_process->getPost('type_key');
                        $delete_type=new Managementtype($type_key,"-","delete");	
							if(($delete_type->CallMLTTypeTxt()=="NoError")){
								echo "succeed";
							}elseif(($delete_type->CallMLTTypeTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}
					}else{}
			}else{
				exit("<script>window.location='admin?library_mod=type';</script>");
			}
		}else{
			exit("<script>window.location='admin?library_mod=type';</script>");
		}
?>