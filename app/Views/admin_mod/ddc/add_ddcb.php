<?php
	$session=session();
	$InputAD=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include("public/database/pdo_library.php");
				include("public/database/class_library.php");
//-----------------------------------------------------------------------------
				$code_run=$InputAD->getPost('code_run');
					if((isset($code_run))){
						//$code_run=$InputAD->getPost('code_run');
					}else{
						$code_run=filter_input(INPUT_POST,'code_run');
					}
//------------------------------------------------------------------------------					
						if(($code_run=="add")){
							$DDCB_No=$InputAD->getPost('DDCB_No');
							$DDCB_TxtTh=$InputAD->getPost('DDCB_TxtTh');
							$DDCB_TxtEh=$InputAD->getPost('DDCB_TxtEh');
							$DDCA_No=$InputAD->getPost('DDCA_No');
							$Add_DDCB=new ManagementDDCB($DDCA_No,$DDCB_No,$DDCB_TxtTh,$DDCB_TxtEh,"add");
							echo $Add_DDCB->RunManagementDDCB();
						}elseif(($code_run=="update")){
							$DDCB_TxtTh=$InputAD->getPost('DDCB_TxtTh');
							$DDCB_TxtEh=$InputAD->getPost('DDCB_TxtEh');
							$DDCB_Key=$InputAD->getPost('DDCB_Key');
							$Updata_DDCB=new ManagementDDCB("-",$DDCB_Key,$DDCB_TxtTh,$DDCB_TxtEh,"update");
							echo $Updata_DDCB->RunManagementDDCB();
						}elseif(($code_run=="code_delete")){
							$ddcB_key=$InputAD->getPost('ddcB_key');
							
							$Delete_DDCB=new ManagementDDCB("-",$ddcB_key,"-","-","RowBIdDelete");
							echo $Delete_DDCB->RunManagementDDCB();
						}else{ ?>

				<?php	}
			}else{
				exit("<script>window.location='admin?library_mod=ddc';</script>");
			}
		}else{
			exit("<script>window.location='admin?library_mod=ddc';</script>");
		}
?>