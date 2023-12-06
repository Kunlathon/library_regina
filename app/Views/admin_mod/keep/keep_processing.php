<?php
	$session=session();
	$input_process=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");
				include(APPPATH."Database-pdo/class_library.php");					
                $manage=$input_process->getPost('manage');   
                    if(($manage=="process_add")){
                        $lk_txtTh=$input_process->getPost('lk_txtTh');
                        $add_keep=new ManagementKeep("-",$lk_txtTh,"-","Add");
							if(($add_keep->CallMK_KeepTxt()=="NoError")){
								echo "succeed";
							}elseif($add_keep->CallMK_KeepTxt()=="Error"){
								echo "failed";
							}else{
								echo "-";
							}
                    }elseif(($manage=="process_up")){
						$lk_txtTh=$input_process->getPost('lk_txtTh');
						$keep_key=$input_process->getPost('keep_key');
                        $up_keep=new ManagementKeep($keep_key,$lk_txtTh,"-","up");	
							if(($up_keep->CallMK_KeepTxt()=="NoError")){
								echo "succeed";
							}elseif(($up_keep->CallMK_KeepTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}
					}elseif(($manage=="process_delete")){
						$keep_key=$input_process->getPost('keep_key');
                        $delete_keep=new ManagementKeep($keep_key,"-","-","delete");	
							if(($delete_keep->CallMK_KeepTxt()=="NoError")){
								echo "succeed";
							}elseif(($delete_keep->CallMK_KeepTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}						
					}else{}
			}else{
				exit("<script>window.location='admin?library_mod=keep';</script>");
			}
		}else{
			exit("<script>window.location='admin?library_mod=keep';</script>");
		}
?>