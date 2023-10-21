<?php
	$session=session();
	$input_process=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include("public/database/pdo_library.php");
				include("public/database/class_library.php");					
                $manage=$input_process->getPost('manage');   
                    if(($manage=="process_add")){
                        $LE_Txt=$input_process->getPost('LE_Txt');
                        $add_editor=new ManagementEditor("-",$LE_Txt,"Add");
							if(($add_editor->CallEditorTxt()=="NoError")){
								echo "succeed";
							}elseif($add_editor->CallEditorTxt()=="Error"){
								echo "failed";
							}else{
								echo "-";
							}
                    }elseif(($manage=="process_up")){
						$LE_Txt=$input_process->getPost('LE_Txt');
						$editor_key=$input_process->getPost('editor_key');
                        $up_editor=new Managementeditor($editor_key,$LE_Txt,"up");	
							if(($up_editor->CallEditorTxt()=="NoError")){
								echo "succeed";
							}elseif(($up_editor->CallEditorTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}
					}elseif(($manage=="process_delete")){
						$editor_key=$input_process->getPost('editor_key');
                        $delete_editor=new Managementeditor($editor_key,"-","delete");	
							if(($delete_editor->CallEditorTxt()=="NoError")){
								echo "succeed";
							}elseif(($delete_editor->CallEditorTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}						
					}else{}
			}else{
				exit("<script>window.location='admin?library_mod=editor';</script>");
			}
		}else{
			exit("<script>window.location='admin?library_mod=editor';</script>");
		}
?>