<?php
	$session=session();
	$input_process=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");
				include(APPPATH."Database-pdo/class_library.php");					
                $manage=$input_process->getPost('manage');   
                    if(($manage=="process_add")){
                        $LP_Name=$input_process->getPost('LP_Name');
                        $add_publisher=new ManagementPublisher("-",$LP_Name,"Add");
							if(($add_publisher->CallMP_PublisherTxt()=="NoError")){
								echo "succeed";
							}elseif($add_publisher->CallMP_PublisherTxt()=="Error"){
								echo "failed";
							}else{
								echo "-";
							}
                    }elseif(($manage=="process_up")){
						$LP_Name=$input_process->getPost('LP_Name');
						$publisher_key=$input_process->getPost('publisher_key');
                        $up_publisher=new ManagementPublisher($publisher_key,$LP_Name,"up");	
							if(($up_publisher->CallMP_PublisherTxt()=="NoError")){
								echo "succeed";
							}elseif(($up_publisher->CallMP_PublisherTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}
					}elseif(($manage=="process_delete")){
						$publisher_key=$input_process->getPost('publisher_key');
                        $delete_publisher=new ManagementPublisher($publisher_key,"-","delete");	
							if(($delete_publisher->CallMP_PublisherTxt()=="NoError")){
								echo "succeed";
							}elseif(($delete_publisher->CallMP_PublisherTxt()=="Error")){
								echo "failed";
							}else{
								echo "-";
							}						
					}else{}
			}else{
				exit("<script>window.location='admin?library_mod=publisher';</script>");
			}
		}else{
			exit("<script>window.location='admin?library_mod=publisher';</script>");
		}
?>