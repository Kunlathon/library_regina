<?php
	$session=session();
	$input_process=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include("public/database/pdo_library.php");
				include("public/database/class_library.php");					
                $manage=$input_process->getPost('manage');   
                    if(($manage=="process_add")){
                        $LA_Name=$input_process->getPost('LA_Name');
                        $add_author=new ManagementAuthor("-",$LA_Name,"Add");
							if(($add_author->RunMAAuthorTxt()=="NoError")){
								echo "succeed";
							}elseif($add_author->RunMAAuthorTxt()=="Error"){
								echo "failed";
							}else{
								echo "-";
							}
                    }elseif(($manage=="process_up")){
						$LA_Name=$input_process->getPost('LA_Name');
						$author_key=$input_process->getPost('author_key');
                        $up_author=new ManagementAuthor($author_key,$LA_Name,"up");	
							if(($up_author->RunMAAuthorTxt()=="NoError")){
								echo "succeed";
							}elseif(($up_author->RunMAAuthorTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}
					}elseif(($manage=="process_delete")){
						$author_key=$input_process->getPost('author_key');
                        $delete_author=new ManagementAuthor($author_key,"-","delete");	
							if(($delete_author->RunMAAuthorTxt()=="NoError")){
								echo "succeed";
							}elseif(($delete_author->RunMAAuthorTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}						
					}else{}
			}else{
				exit("<script>window.location='admin?library_mod=author';</script>");
			}
		}else{
			exit("<script>window.location='admin?library_mod=author';</script>");
		}
?>