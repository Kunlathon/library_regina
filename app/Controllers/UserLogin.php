<?php
	namespace App\Controllers;
	use CodeIgniter\Controller;
	use App\Models\UserModel;
	class UserLogin extends BaseController{
		public function LibraryLogin(){
			$session = session();
			$request_library=\Config\Services::request();
			$db_library=\Config\Database::connect("default_library");
			
				if(($request_library->getPost("UserName")!=null and $request_library->getPost("UserPassword")!=null)){
					$UserName=$request_library->getPost("UserName");
					$UserPassword=md5($request_library->getPost("UserPassword"));
				}else{
					$UserName="-";
					$UserPassword="-";
				}

			$login_librarySql=$db_library->query("SELECT * FROM `librarylogin` 
												  WHERE `IL_Key`='{$UserName}' 
												  AND `IL_Pass`='{$UserPassword}' 
												  AND `IL_Status`='1'");
			$login_libraryRs=$login_librarySql->getResult();
			
				if((is_array($login_libraryRs) && count($login_libraryRs))){
					foreach($login_libraryRs as $login_libraryRow){
						if((isset($login_libraryRow->IL_Key))){
							$IL_Key=$login_libraryRow->IL_Key;
						}else{
							$IL_Key="-";
						}

						if((isset($login_libraryRow->IL_Pass))){
							$IL_Pass=$login_libraryRow->IL_Pass;
						}else{
							$IL_Pass="-";
						}

						if((isset($login_libraryRow->IL_Name))){
							$IL_Name=$login_libraryRow->IL_Name;
						}else{
							$IL_Name="-";
						}

						if((isset($login_libraryRow->IL_Status))){
							$IL_Status=$login_libraryRow->IL_Status;
						}else{
							$IL_Status="-";
						}

						if((isset($login_libraryRow->IL_Group))){
							$IL_Group=$login_libraryRow->IL_Group;
						}else{
							$IL_Group="-";
						}

						if((isset($login_libraryRow->IL_Time)))){
							$IL_Time=$login_libraryRow->IL_Time;
						}else{
							$IL_Time="-";
						}

					}
					if(($UserPassword==$IL_Pass)){
						$set_data=['IL_Key'=>$IL_Key,'IL_Name'=>$IL_Name,'IL_Group'=>$IL_Group,'IL_Status'=>$IL_Status];
						$session->set($set_data);
						return redirect()->to('/Admin');
					}else{
						$session->setFlashdata('rc','Login User Error');
						return redirect()->to('/Admin/login');
					}
				}else{
					$session->setFlashdata('rc','UserName And Password are The Null');
					return redirect()->to('/Admin/login');
				}
		}
		
		public function Logout(){
			$session=session();
			$session->destroy();
			return redirect()->to('/Admin/login');
		}
		
	}
?>