<?php
	$session=session();
	$input_process=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");
				include(APPPATH."Database-pdo/class_library.php");					
                $manage=$input_process->getPost('manage');   
                    if(($manage=="process_add")){
                        $LTr_Txt=$input_process->getPost('LTr_Txt');
                        $add_translator=new ManagementTranslator("-",$LTr_Txt,"Add");
							if(($add_translator->CallMTTranslatorTxt()=="NoError")){
								echo "succeed";
							}elseif($add_translator->CallMTTranslatorTxt()=="Error"){
								echo "failed";
							}else{
								echo "-";
							}
                    }elseif(($manage=="process_up")){
						$LTr_Txt=$input_process->getPost('LTr_Txt');
						$translator_key=$input_process->getPost('translator_key');
                        $up_translator=new ManagementTranslator($translator_key,$LTr_Txt,"up");	
							if(($up_translator->CallMTTranslatorTxt()=="NoError")){
								echo "succeed";
							}elseif(($up_translator->CallMTTranslatorTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}
					}elseif(($manage=="process_delete")){
						$translator_key=$input_process->getPost('translator_key');
                        $delete_translator=new ManagementTranslator($translator_key,"-","delete");	
							if(($delete_translator->CallMTTranslatorTxt()=="NoError")){
								echo "succeed";
							}elseif(($delete_translator->CallMTTranslatorTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}						
					}else{}
			}else{
				exit("<script>window.location='admin?library_mod=translator';</script>");
			}
		}else{
			exit("<script>window.location='admin?library_mod=translator';</script>");
		}
?>