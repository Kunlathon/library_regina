
<?php
	//การจัดการทศนิยมดิวอี้หมวดใหญ่
	class ManagementDDCA{
		public $MDDCA_Id,$MDDCA_TxtTh,$MDDCA_TxtEn,$MDDCA_Type;
		public $MDDCATxt,$MDDCA;
		function __construct($MDDCA_Id,$MDDCA_TxtTh,$MDDCA_TxtEn,$MDDCA_Type){
			$this->MDDCA_Id=$MDDCA_Id;
			$this->MDDCA_TxtTh=$MDDCA_TxtTh;
			$this->MDDCA_TxtEn=$MDDCA_TxtEn;
			$this->MDDCA_Type=$MDDCA_Type;
			$MDDCA=array();
			$MDDCATxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				switch($this->MDDCA_Type){
					case "add":
						try{
							$AddMangementDDCASql="INSERT INTO `library_ddca`(`DDCA_No`, `DDCA_TxtTh`, `DDCA_TxtEh`) 
												  VALUES ('{$this->MDDCA_Id}','{$this->MDDCA_TxtTh}','{$this->MDDCA_TxtEn}')";
							$CountLibrary->exec($AddMangementDDCASql);
							$MDDCA="-";
							$MDDCATxt="NotError";							
						}catch(PDOException $e){
							$MDDCA="-";
							$MDDCATxt="Error";							
						}
					break;
					case "update":
						try{
							$UpDateMangementDDCASql="UPDATE `library_ddca` SET `DDCA_TxtTh`='{$this->MDDCA_TxtTh}',`DDCA_TxtEh`='{$this->MDDCA_TxtEn}' 
													 WHERE `DDCA_No`='{$this->MDDCA_Id}'";
							$CountLibrary->exec($UpDateMangementDDCASql);
							$MDDCA="-";
							$MDDCATxt="NotError";							
						}catch(PDOException $e){
							$MDDCA="-";
							$MDDCATxt="Error";							
						}
					break;
					case "RowAll":
						try{
							$ManagementDDCASql="SELECT * FROM `library_ddca` ORDER BY `DDCA_No` ASC";
								if($ManagementDDCARs=$CountLibrary->query($ManagementDDCASql)){
									while($ManagementDDCARow=$ManagementDDCARs->Fetch(PDO::FETCH_ASSOC)){
										if(is_array($ManagementDDCARow) && count($ManagementDDCARow)){
											$MDDCA[]=$ManagementDDCARow;
											$MDDCATxt="NotError";
										}else{
											$MDDCA="-";											
											$MDDCATxt="Error";
										}
									}
								}else{
									$MDDCA="-";	
									$MDDCATxt="Error";
								}
						}catch(PDOException $e){
							$MDDCA="-";
							$MDDCATxt="Error";							
						}
					break;
					case "RowId":
						try{
							$ManagementDDCASql="SELECT * FROM `library_ddca` WHERE `DDCA_No`='{$this->MDDCA_Id}' ORDER BY `DDCA_No` ASC";
								if($ManagementDDCARs=$CountLibrary->query($ManagementDDCASql)){
									while($ManagementDDCARow=$ManagementDDCARs->Fetch(PDO::FETCH_ASSOC)){
										if(is_array($ManagementDDCARow) && count($ManagementDDCARow)){
											$MDDCA[]=$ManagementDDCARow;
											$MDDCATxt="NotError";
										}else{
											$MDDCA="-";
											$MDDCATxt="Error";
										}
									}
								}else{
									$MDDCA="-";
									$MDDCATxt="Error";
								}
						}catch(PDOException $e){
							$MDDCA="-";
							$MDDCATxt="Error";							
						}					
					break;
					default:
						$MDDCA="-";
						$MDDCATxt="Error";
				}if(isset($MDDCATxt)){
					$this->MDDCATxt=$MDDCATxt;
					$this->MDDCA=$MDDCA;
					$CountLibrary=null;
				}else{
					$CountLibrary=null;
				}	
		}function RunManagementDDCA(){
			if(isset($this->MDDCATxt)){
				return $this->MDDCATxt;
			}else{}
		}function RowAllManagementDDCA(){
			if(isset($this->MDDCA)){
				return $this->MDDCA;
			}else{}			
		}
	}
?>

<?php
	//การจัดการทศนิยมดิวอี้หมวดย่อย
	class ManagementDDCB{
		public $SMDDCA_Id,$SMDDCB_Id,$MDDCB_TxtTh,$MDDCB_TxtEh,$MDDCB_Type;
		function __construct($SMDDCA_Id,$SMDDCB_Id,$MDDCB_TxtTh,$MDDCB_TxtEh,$MDDCB_Type){
			$this->SMDDCA_Id=$SMDDCA_Id;
			$this->SMDDCB_Id=$SMDDCB_Id;
			$this->MDDCB_TxtTh=$MDDCB_TxtTh;
			$this->MDDCB_TxtEh=$MDDCB_TxtEh;
			$this->MDDCB_Type=$MDDCB_Type;
			$MDDCB=array();
			$MDDCBTxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				switch($this->MDDCB_Type){
					case "add":
						try{
							$AddMangementDDCBSql="INSERT INTO `library_ddcb`(`DDCB_No`, `DDCB_TxtTh`, `DDCB_TxtEh`, `DDCA_No`) VALUES 
							                     ('{$this->SMDDCB_Id}','{$this->MDDCB_TxtTh}','{$this->MDDCB_TxtEh}','{$this->SMDDCA_Id}')";
							$CountLibrary->exec($AddMangementDDCBSql);
							$MDDCB="-";
							$MDDCBTxt="NotError";							
						}catch(PDOException $e){
							$MDDCB="-";
							$MDDCBTxt="Error";
						}
					break;
					case "update":
						try{
							$UpMangementDDCBSql="UPDATE `library_ddcb` SET `DDCB_TxtTh`='{$this->MDDCB_TxtTh}',`DDCB_TxtEh`='{$this->MDDCB_TxtEh}' 
							                     WHERE `DDCB_No`='{$this->SMDDCB_Id}'";
							$CountLibrary->exec($UpMangementDDCBSql);
							$MDDCB="-";
							$MDDCBTxt="NotError";							
						}catch(PDOException $e){
							$MDDCB="-";
							$MDDCBTxt="Error";
						}
					break;
					case "RowAll":
						try{
							$ManagementDDCBSql="SELECT * FROM `library_ddcb` ORDER BY `DDCB_No` ASC";
								if($ManagementDDCBRs=$CountLibrary->query($ManagementDDCBSql)){
									while($ManagementDDCBRow=$ManagementDDCBRs->Fetch(PDO::FETCH_ASSOC)){
										if(is_array($ManagementDDCBRow) && count($ManagementDDCBRow)){
											$MDDCB[]=$ManagementDDCBRow;
											$MDDCBTxt="NotError";
										}else{
											$MDDCB="-";
											$MDDCBTxt="Error";
										}
									}
								}else{
									$MDDCB="-";
									$MDDCBTxt="Error";
								}
						}catch(PDOException $e){
							$MDDCB="-";
							$MDDCBTxt="Error";							
						}
					break;
					case "RowId":
						try{
							$ManagementDDCBSql="SELECT * FROM `library_ddcb` WHERE `DDCA_No`='{$this->SMDDCA_Id}' ORDER BY `DDCB_No` ASC";
								if($ManagementDDCBRs=$CountLibrary->query($ManagementDDCBSql)){
									while($ManagementDDCBRow=$ManagementDDCBRs->Fetch(PDO::FETCH_ASSOC)){
										if(is_array($ManagementDDCBRow) && count($ManagementDDCBRow)){
											$MDDCB[]=$ManagementDDCBRow;
											$MDDCBTxt="NotError";
										}else{
											$MDDCB="-";
											$MDDCBTxt="Error";
										}
									}
								}else{
									$MDDCB="-";
									$MDDCBTxt="Error";
								}
						}catch(PDOException $e){
							$MDDCB="-";
							$MDDCBTxt="Error";							
						}					
					break;
					case "RowBId":
						try{
							$ManagementDDCBSql="SELECT * FROM `library_ddcb` WHERE `DDCB_No`='{$this->SMDDCB_Id}' ORDER BY `DDCB_No` ASC";
								if($ManagementDDCBRs=$CountLibrary->query($ManagementDDCBSql)){
									while($ManagementDDCBRow=$ManagementDDCBRs->Fetch(PDO::FETCH_ASSOC)){
										if(is_array($ManagementDDCBRow) && count($ManagementDDCBRow)){
											$MDDCB[]=$ManagementDDCBRow;
											$MDDCBTxt="NotError";
										}else{
											$MDDCBTxt="Error";
											$MDDCB[]="-";
										}
									}
								}else{
									$MDDCBTxt="Error";
									$MDDCB[]="-";
								}
						}catch(PDOException $e){
							$MDDCBTxt="Error";
							$MDDCB[]="-";							
						}	
					break;
					case "RowBIdDelete":
						try{
							$RowBIdSql="SELECT COUNT(`Books_Key`) AS `count_books` 
										FROM `library_books` 
										WHERE `DDCB_No`='{$this->SMDDCB_Id}'";
								if(($RowBIdRs=$CountLibrary->query($RowBIdSql))){
									$RowBIdRow=$RowBIdRs->Fetch(PDO::FETCH_ASSOC);
										if((is_array($RowBIdRow) && count($RowBIdRow))){
											$count_books=$RowBIdRow["count_books"];										
										}else{
											$count_books=0;
										}
								}else{
									$count_books=0;
								}
						}catch(PDOException $e){
							$count_books=0;
						}
						
						if(($count_books>=1)){
							$MDDCBTxt="Error";
						}else{
							try{
								$delete_ddc_sql="DELETE FROM `library_ddcb` 
												 WHERE `DDCB_No`='{$this->SMDDCB_Id}'";
								$CountLibrary->exec($delete_ddc_sql);
								$MDDCBTxt="NotError";
							}catch(PDOException $e){
								$MDDCBTxt="Error";
							}
						}
//set null
						$MDDCB="-";
//set null end
					break;
					default:
						$MDDCBTxt="Error";
						$MDDCB[]="-";
				}if(isset($MDDCBTxt)){
					$this->MDDCBTxt=$MDDCBTxt;
					$this->MDDCB=$MDDCB;
					$CountLibrary=null;
				}else{
					$CountLibrary=null;
				}	
		}function RunManagementDDCB(){
			if(isset($this->MDDCBTxt)){
				return $this->MDDCBTxt;
			}else{}
		}function RowIdManagementDDCB(){
			if(isset($this->MDDCB)){
				return $this->MDDCB;
			}else{}			
		}
	}
?>

<?php
	//การจัดการข้อมูลประเภทหนังสือ
	class ManagementType{
		public $MLT_Key,$MLT_Txt,$MLT_Type;
		public $MLTType,$MLTTypeTxt;
		function __construct($MLT_Key,$MLT_Txt,$MLT_Type){
			$this->MLT_Key=$MLT_Key;
			$this->MLT_Txt=$MLT_Txt;
			$this->MLT_Type=$MLT_Type;
			$MLTType=array();
			$MLTTypeTxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				if($this->MLT_Type=="Add"){
					
						$RunKeyTypeSql="SELECT COUNT(`LT_No`) AS `CountLa` 
										  FROM `library_type` WHERE 1;";
							if($RunKeyTypeRs=$CountLibrary->query($RunKeyTypeSql)){
								$RunKeyTypeRow=$RunKeyTypeRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($RunKeyTypeRow) && count($RunKeyTypeRow)){
										$CountLa=$RunKeyTypeRow["CountLa"];
									}else{
										$CountLa=0;
									}
							}else{
								$CountLa=0;
							}
							if(isset($CountLa)){
	//----------------------------------------------------------------------------------------							
								$CountLa=$CountLa+1;
								$CountLaKey="LT".$CountLa;
									$TestKeySql="SELECT COUNT(`LT_No`) AS 'CountLK' 
												 FROM `library_type` 
												 WHERE `LT_No` = '{$CountLaKey}';";
										if($TestKeyRs=$CountLibrary->query($TestKeySql)){
											$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
											if(is_array($TestKeyRow) && count($TestKeyRow)){
												$CountLK=$TestKeyRow["CountLK"];
											}else{
												$CountLK=0;
											}
										}else{
											$CountLK=0;
										}
									while($CountLK!=0){
										$CountLa=$CountLa+1;
										$CountLaKey="LT".$CountLa;
											$TestKeySql="SELECT COUNT(`LT_No`) AS 'CountLK' 
														 FROM `library_type` 
														 WHERE `LT_No` = '{$CountLaKey}';";
												if($TestKeyRs=$CountLibrary->query($TestKeySql)){
													$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
													if(is_array($TestKeyRow) && count($TestKeyRow)){
														$CountLK=$TestKeyRow["CountLK"];
													}else{
														$CountLK=0;
													}
												}else{
													$CountLK=0;
												}
									}
	//----------------------------------------------------------------------------------------
								try{
									$AddLibraryTypeSql="INSERT INTO `library_type`(`LT_No`, `LT_Txt`) 
														VALUES ('{$CountLaKey}','{$this->MLT_Txt}')";
									$CountLibrary->exec($AddLibraryTypeSql);
									$MLTTypeTxt="NoError";
								}catch(PDOException $e){
									$MLTTypeTxt="Error";
								}
							}else{
								$MLTTypeTxt="Error";
							}					
					
				}elseif($this->MLT_Type=="read"){
					try{
						$ReadTypeSql="SELECT `LT_No`, `LT_Txt` FROM `library_type` WHERE 1 ORDER BY `LT_No` ASC";
							if($ReadTypeRs=$CountLibrary->query($ReadTypeSql)){
								while($ReadTypeRow=$ReadTypeRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($ReadTypeRow) && count($ReadTypeRow)){
										$MLTType[]=$ReadTypeRow;
										$MLTTypeTxt="NoError";										
									}else{
										$MLTType="-";
										$MLTTypeTxt="Error";										
									}
								}
							}else{
								$MLTType="-";
								$MLTTypeTxt="Error";								
							}
					}catch(PDOException $e){
						$MLTType="-";
						$MLTTypeTxt="Error";	
					}
				}elseif($this->MLT_Type=="up"){
					try{
						$Up_LibraryTypeSql="UPDATE `library_type` 
											SET `LT_Txt`='{$this->MLT_Txt}' 
											WHERE `LT_No`='{$this->MLT_Key}'";
						$CountLibrary->exec($Up_LibraryTypeSql);
						$MLTTypeTxt="NoError";
					}catch(PDOException $e){
						$MLTTypeTxt="Error";
					}
//--------------------------set null
				$MLTType="-";
//---------------------------set null end
				}elseif(($this->MLT_Type=="delete")){
					try{
						$ReadTypeSql="SELECT COUNT(`Books_Key`) AS `count_lb` 
									  FROM `library_books` 
									  WHERE `LT_No`='{$this->MLT_Key}';";
							if(($ReadTypeRs=$CountLibrary->query($ReadTypeSql))){
								$ReadTypeRow=$ReadTypeRs->Fetch(PDO::FETCH_ASSOC);
									if((is_array($ReadTypeRow) && count($ReadTypeRow))){
										$Count_LT=$ReadTypeRow["count_lb"];
									}else{
										$Count_LT=0;
									}
							}else{
								$Count_LT=0;
							}						
					}catch(PDOException $e){
						$Count_LT=0;
					}

					if(($Count_LT>=1)){
						$MLTTypeTxt="Error";
					}else{
						try{
							$Delete_LibraryTypeSql="DELETE FROM `library_type` 
												    WHERE `LT_No`='{$this->MLT_Key}';";
							$CountLibrary->exec($Delete_LibraryTypeSql);
							$MLTTypeTxt="NoError";
						}catch(PDOException $e){
							$MLTTypeTxt="Error";
						}
					}

//--------------------------set null
$MLTType="-";
//---------------------------set null end

				}elseif($this->MLT_Type=="read_txt"){
					try{
						$ReadTypeSql="SELECT `LT_No`, `LT_Txt` FROM `library_type` WHERE `LT_No`='{$this->MLT_Key}' ORDER BY `LT_No` ASC";
							if($ReadTypeRs=$CountLibrary->query($ReadTypeSql)){
								$ReadTypeRow=$ReadTypeRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($ReadTypeRow) && count($ReadTypeRow)){
										$MLTType="-";
										$MLTTypeTxt=$ReadTypeRow["LT_Txt"];										
									}else{
										$MLTType="-";
										$MLTTypeTxt="-";										
									}
							}else{
								$MLTType="-";
								$MLTTypeTxt="-";								
							}
					}catch(PDOException $e){
						$MLTType="-";
						$MLTTypeTxt="-";	
					}					
				}else{
					$MLTType="-";
					$MLTTypeTxt="Error";
				}
				
				if(isset($MLTType)){
					$this->MLTType=$MLTType;
				}else{}
				
				if(isset($MLTTypeTxt)){
					$this->MLTTypeTxt=$MLTTypeTxt;
				}else{}
				$CountLibrary=null;
		}function CallMLTType(){
			if(isset($this->MLTType)){
				return $this->MLTType;
			}else{}
		}function CallMLTTypeTxt(){
			if(isset($this->MLTTypeTxt)){
				return $this->MLTTypeTxt;
			}else{}
		}
	}
?>

<?php
	//การจัดการข้อมูลผู้แปล
	class ManagementTranslator{
		public $MT_Key,$MT_Txt,$MT_Type;
		public $MTTranslatorTxt,$MTTranslator;
		function __construct($MT_Key,$MT_Txt,$MT_Type){
			$this->MT_Key=$MT_Key;
			$this->MT_Txt=$MT_Txt;
			$this->MT_Type=$MT_Type;
			$MTTranslator=array();
			$MTTranslatorTxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				if($this->MT_Type=="Add"){

						$RunKeyTranslatorSql="SELECT COUNT(`LTr_Key`) AS `CountLa` 
										  FROM `library_translator` WHERE 1;";
							if($RunKeyTranslatorRs=$CountLibrary->query($RunKeyTranslatorSql)){
								$RunKeyTranslatorRow=$RunKeyTranslatorRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($RunKeyTranslatorRow) && count($RunKeyTranslatorRow)){
										$CountLa=$RunKeyTranslatorRow["CountLa"];
									}else{
										$CountLa=0;
									}
							}else{
								$CountLa=0;
							}
							if(isset($CountLa)){
	//----------------------------------------------------------------------------------------							
								$CountLa=$CountLa+1;
								$CountLaKey="LTr".$CountLa;
									$TestKeySql="SELECT COUNT(`LTr_Key`) AS 'CountLK' 
												 FROM `library_translator` 
												 WHERE `LTr_Key` = '{$CountLaKey}';";
										if($TestKeyRs=$CountLibrary->query($TestKeySql)){
											$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
											if(is_array($TestKeyRow) && count($TestKeyRow)){
												$CountLK=$TestKeyRow["CountLK"];
											}else{
												$CountLK=0;
											}
										}else{
											$CountLK=0;
										}
									while($CountLK!=0){
										$CountLa=$CountLa+1;
										$CountLaKey="LTr".$CountLa;
											$TestKeySql="SELECT COUNT(`LTr_Key`) AS 'CountLK' 
														 FROM `library_translator` 
														 WHERE `LTr_Key` = '{$CountLaKey}';";
												if($TestKeyRs=$CountLibrary->query($TestKeySql)){
													$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
													if(is_array($TestKeyRow) && count($TestKeyRow)){
														$CountLK=$TestKeyRow["CountLK"];
													}else{
														$CountLK=0;
													}
												}else{
													$CountLK=0;
												}
									}
	//----------------------------------------------------------------------------------------
								try{
									$AddLibraryTranslatorSql="INSERT INTO `library_translator`(`LTr_Key`, `LTr_Txt`) 
														      VALUES ('{$CountLaKey}','{$this->MT_Txt}')";
									$CountLibrary->exec($AddLibraryTranslatorSql);
									$MTTranslatorTxt="NoError";
								}catch(PDOException $e){
									$MTTranslatorTxt="Error";
								}
							}else{
								$MTTranslatorTxt="Error";
							}
					
				}elseif($this->MT_Type=="read"){
					try{
						$ReadTranslatorSql="SELECT `LTr_Key`, `LTr_Txt` FROM `library_translator` WHERE 1 ORDER BY `LTr_Key` ASC";
							if($ReadTranslatorRs=$CountLibrary->query($ReadTranslatorSql)){
								while($ReadTranslatorRow=$ReadTranslatorRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($ReadTranslatorRow) && count($ReadTranslatorRow)){
										$MTTranslator[]=$ReadTranslatorRow;
										$MTTranslatorTxt="NoError";
									}else{
										$MTTranslator="-";
										$MTTranslatorTxt="Error";
									}
								}
							}else{
								$MTTranslator="-";
								$MTTranslatorTxt="Error";								
							}
					}catch(PDOException $e){
						$MTTranslator="-";
						$MTTranslatorTxt="Error";
					}
				}elseif($this->MT_Type=="read_txt"){
					try{
						$ReadTranslatorSql="SELECT `LTr_Key`, `LTr_Txt` FROM `library_translator` WHERE `LTr_Key`='{$this->MT_Key}' ORDER BY `LTr_Key` ASC";
							if($ReadTranslatorRs=$CountLibrary->query($ReadTranslatorSql)){
								$ReadTranslatorRow=$ReadTranslatorRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($ReadTranslatorRow) && count($ReadTranslatorRow)){
										$MTTranslator="-";
										$MTTranslatorTxt=$ReadTranslatorRow["LTr_Txt"];
									}else{
										$MTTranslator="-";
										$MTTranslatorTxt="-";
									}
							}else{
								$MTTranslator="-";
								$MTTranslatorTxt="-";								
							}
					}catch(PDOException $e){
						$MTTranslator="-";
						$MTTranslatorTxt="-";
					}					
				}elseif(($this->MT_Type=="up")){
					try{
						$UpLibraryTranslatorSql="UPDATE `library_translator` 
												 SET `LTr_Txt`='{$this->MT_Txt}' 
												 WHERE `LTr_Key`='{$this->MT_Key}'";
						$CountLibrary->exec($UpLibraryTranslatorSql);
						$MTTranslatorTxt="NoError";
					}catch(PDOException $e){
						$MTTranslatorTxt="Error";
					} 
//set null					
					$MTTranslator="-";
//set null end					
				}elseif(($this->MT_Type=="delete")){

					$RunKeyTranslatorSql="SELECT COUNT(`Books_Key`) AS `CountLa` 
										  FROM `library_books` 
										  WHERE `LTr_Key`='{$this->MT_Key}';";
						if($RunKeyTranslatorRs=$CountLibrary->query($RunKeyTranslatorSql)){
							$RunKeyTranslatorRow=$RunKeyTranslatorRs->Fetch(PDO::FETCH_ASSOC);
								if(is_array($RunKeyTranslatorRow) && count($RunKeyTranslatorRow)){
									$CountLa=$RunKeyTranslatorRow["CountLa"];
								}else{
									$CountLa=0;
								}
						}else{
							$CountLa=0;
						}

						if(($CountLa>=1)){
							$MTTranslatorTxt="Error";
						}else{

							try{
								$DeleteLibraryTranslatorSql="DELETE FROM `library_translator` 
															 WHERE `LTr_Key`='{$this->MT_Key}'";
								$CountLibrary->exec($DeleteLibraryTranslatorSql);
								$MTTranslatorTxt="NoError";
							}catch(PDOException $e){
								$MTTranslatorTxt="Error";
							} 

						}
//set null
					$MTTranslator="-";
//set mull end 
				}else{
					$MTTranslator="-";
					$MTTranslatorTxt="Error";
				}
				
				if(isset($MTTranslator)){
					$this->MTTranslator=$MTTranslator;
				}else{}
				
				if(isset($MTTranslatorTxt)){
					$this->MTTranslatorTxt=$MTTranslatorTxt;
				}else{}
				$CountLibrary=null;
		}function CallMTTranslator(){
			if(isset($this->MTTranslator)){
				return $this->MTTranslator;
			}else{}
		}function CallMTTranslatorTxt(){
			if(isset($this->MTTranslatorTxt)){
				return $this->MTTranslatorTxt;
			}else{}
		}
	}
?>

<?php
	//การจัดการข้อมูลสถานะหนังสือ
	class ManagementStatus{
		public $MS_Key,$MS_TxtTh,$MS_TxtEh,$MS_Type;
		function __construct($MS_Key,$MS_TxtTh,$MS_TxtEh,$MS_Type){
			$this->MS_Key=$MS_Key;
			$this->MS_TxtTh=$MS_TxtTh;
			$this->MS_TxtEh=$MS_TxtEh;
			$this->MS_Type=$MS_Type;
			$MSStatus=array();
			$MSStatusTxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				if($this->MS_Type=="Add"){
					
				}elseif($this->MS_Type=="read"){
					try{
						$ReadStatusSql="SELECT `Li_StatusNo`, `Li_StatusTxtTh`, `Li_StatusTxtEh` FROM `library_status` WHERE 1 ORDER BY `Li_StatusNo` ASC";
							if($ReadStatusRs=$CountLibrary->query($ReadStatusSql)){
								while($ReadStatusRow=$ReadStatusRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($ReadStatusRow) && count($ReadStatusRow)){
										$MSStatus[]=$ReadStatusRow;
										$MSStatusTxt="NoError";	
									}else{
										$MSStatus="-";
										$MSStatusTxt="Error";										
									}
								}
							}else{
								$MSStatus="-";
								$MSStatusTxt="Error";								
							}
					}catch(PDOException $e){
						$MSStatus="-";
						$MSStatusTxt="Error";						
					}
				}elseif($this->MS_Type=="read_txt"){
					try{
						$ReadStatusSql="SELECT `Li_StatusNo`, `Li_StatusTxtTh`, `Li_StatusTxtEh` FROM `library_status` WHERE `Li_StatusNo`='{$this->MS_Key}' ORDER BY `Li_StatusNo` ASC";
							if($ReadStatusRs=$CountLibrary->query($ReadStatusSql)){
								$ReadStatusRow=$ReadStatusRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($ReadStatusRow) && count($ReadStatusRow)){
										$MSStatus="-";
										$MSStatusTxt=$ReadStatusRow["Li_StatusTxtTh"];	
									}else{
										$MSStatus="-";
										$MSStatusTxt="-";										
									}
							}else{
								$MSStatus="-";
								$MSStatusTxt="-";								
							}
					}catch(PDOException $e){
						$MSStatus="-";
						$MSStatusTxt="-";						
					}					
				}elseif($this->MS_Type=="up"){
					
				}else{
					$MSStatus="-";
					$MSStatusTxt="Error";
				}
				
				if(isset($MSStatus)){
					$this->MSStatus=$MSStatus;					
				}else{}
				
				if(isset($MSStatusTxt)){
					$this->MSStatusTxt=$MSStatusTxt;
				}else{}
				$CountLibrary=null;
		}function CallMSStatus(){
			if(isset($this->MSStatus)){
				return $this->MSStatus;
			}else{}
		}function CallMSStatusTxt(){
			if(isset($this->MSStatusTxt)){
				return $this->MSStatusTxt;
			}else{}			
		}
	}
?>

<?php
	//การจัดการข้อมูลสำนักพิมพ์
	class ManagementPublisher{
		public $MP_Key,$MP_Txt,$MP_Type;
		public $MP_Publisher,$MP_PublisherTxt;
		function __construct($MP_Key,$MP_Txt,$MP_Type){
			$this->MP_Key=$MP_Key;
			$this->MP_Txt=$MP_Txt;
			$this->MP_Type=$MP_Type;
			$MP_Publisher=array();
			$MP_PublisherTxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				if($this->MP_Type=="Add"){
					
						$RunKeyPublisherSql="SELECT COUNT(`LP_Key`) AS `CountLa` 
										     FROM `library_publisher` WHERE 1;";
							if(($RunKeyPublisherRs=$CountLibrary->query($RunKeyPublisherSql))){
								$RunKeyPublisherRow=$RunKeyPublisherRs->Fetch(PDO::FETCH_ASSOC);
									if((is_array($RunKeyPublisherRow) && count($RunKeyPublisherRow))){
										$CountLa=$RunKeyPublisherRow["CountLa"];
									}else{
										$CountLa=0;
									}
							}else{
								$CountLa=0;
							}
							if((isset($CountLa))){
	//----------------------------------------------------------------------------------------							
								$CountLa=$CountLa+1;
								$CountLaKey="LP".$CountLa;
									$TestKeySql="SELECT COUNT(`LP_Key`) AS 'CountLK' 
												 FROM `library_publisher` 
												 WHERE `LP_Key` = '{$CountLaKey}';";
										if(($TestKeyRs=$CountLibrary->query($TestKeySql))){
											$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
											if(is_array($TestKeyRow) && count($TestKeyRow)){
												$CountLK=$TestKeyRow["CountLK"];
											}else{
												$CountLK=0;
											}
										}else{
											$CountLK=0;
										}
									while($CountLK!=0){
										$CountLa=$CountLa+1;
										$CountLaKey="LP".$CountLa;
											$TestKeySql="SELECT COUNT(`LP_Key`) AS 'CountLK' 
														 FROM `library_publisher` 
														 WHERE `LP_Key` = '{$CountLaKey}';";
												if(($TestKeyRs=$CountLibrary->query($TestKeySql))){
													$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
													if((is_array($TestKeyRow) && count($TestKeyRow))){
														$CountLK=$TestKeyRow["CountLK"];
													}else{
														$CountLK=0;
													}
												}else{
													$CountLK=0;
												}
									}
	//----------------------------------------------------------------------------------------
								try{
									$AddLibraryPublisherSql="INSERT INTO `library_publisher`(`LP_Key`, `LP_Name`) 
														      VALUES ('{$CountLaKey}','{$this->MP_Txt}')";
									$CountLibrary->exec($AddLibraryPublisherSql);
									$MP_PublisherTxt="NoError";
								}catch(PDOException $e){
									$MP_PublisherTxt="Error";
								}
							}else{
								$MP_PublisherTxt="Error";
							}					
					
				}elseif($this->MP_Type=="read"){
					try{
						$ReadPublisherSql="SELECT `LP_Key`, `LP_Name` FROM `library_publisher` WHERE 1 ORDER BY `LP_Key` ASC";
							if($ReadPublisherRs=$CountLibrary->query($ReadPublisherSql)){
								while($ReadPublisherRow=$ReadPublisherRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($ReadPublisherRow) && count($ReadPublisherRow)){
										$MP_Publisher[]=$ReadPublisherRow;
										$MP_PublisherTxt="NoError";
									}else{
										$MP_Publisher="-";
										$MP_PublisherTxt="Error";
									}									
								}
							}else{
								$MP_Publisher="-";
								$MP_PublisherTxt="Error";
							}
					}catch(PDOException $e){
						$MP_Publisher="-";
						$MP_PublisherTxt="Error";
					}
				}elseif($this->MP_Type=="read_txt"){
					try{
						$ReadPublisherSql="SELECT `LP_Key`, `LP_Name` FROM `library_publisher` WHERE `LP_Key`='{$this->MP_Key}' ORDER BY `LP_Key` ASC";
							if($ReadPublisherRs=$CountLibrary->query($ReadPublisherSql)){
								while($ReadPublisherRow=$ReadPublisherRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($ReadPublisherRow) && count($ReadPublisherRow)){
										$MP_PublisherTxt=$ReadPublisherRow["LP_Name"];
									}else{
										$MP_PublisherTxt="-";
									}
								}
							}else{
								$MP_PublisherTxt="-";
							}
//set null
					$MP_Publisher="-";
//set null end							
					}catch(PDOException $e){
						$MP_Publisher="-";
						$MP_PublisherTxt="Error";
					}					
				}elseif(($this->MP_Type=="up")){
					try{
						$UpLibraryPublisherSql="UPDATE `library_publisher` 
												SET `LP_Name`='{$this->MP_Txt}' WHERE `LP_Key`='{$this->MP_Key}';";
						$CountLibrary->exec($UpLibraryPublisherSql);
						$MP_PublisherTxt="NoError";
					}catch(PDOException $e){
						$MP_PublisherTxt="Error";
					}
//set null
				$MP_Publisher="-";
//set null end

				}elseif(($this->MP_Type=="delete")){

					$TestKeySql="SELECT COUNT(`Books_Key`) AS `CountLK` 
								 FROM `library_books` 
								 WHERE `LP_Key`='{$this->MP_Key}';";
					if(($TestKeyRs=$CountLibrary->query($TestKeySql))){
						$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
						if((is_array($TestKeyRow) && count($TestKeyRow))){
							$CountLK=$TestKeyRow["CountLK"];
						}else{
							$CountLK=0;
						}
					}else{
						$CountLK=0;
					}

					if(($CountLK>=1)){
						$MP_PublisherTxt="Error";
					}else{

						try{
							$DeleteLibraryPublisherSql="DELETE FROM `library_publisher` 
														WHERE `LP_Key`='{$this->MP_Key}'";
							$CountLibrary->exec($DeleteLibraryPublisherSql);
							$MP_PublisherTxt="NoError";
						}catch(PDOException $e){
							$MP_PublisherTxt="Error";
						}

					}
// set null
					$MP_Publisher="-";
//set null end
				}else{
					$MP_Publisher="-";
					$MP_PublisherTxt="Error";
				}
				
				if(isset($MP_Publisher)){
					$this->MP_Publisher=$MP_Publisher;
				}else{}
				
				if(isset($MP_PublisherTxt)){
					$this->MP_PublisherTxt=$MP_PublisherTxt;
				}else{}
				$CountLibrary=null;
		}function CallMP_Publisher(){
			if(isset($this->MP_Publisher)){
				return $this->MP_Publisher;
			}else{}
		}function CallMP_PublisherTxt(){
			if(isset($this->MP_PublisherTxt)){
				return $this->MP_PublisherTxt;
			}else{}
		}
	}
?>

<?php //การจัดการข้อมูลที่เก็บหนังสือ
	class ManagementKeep{
		public $MK_Key,$MK_TxtTh,$MK_TxtEn,$MK_Type;
		public $MK_Keep,$MK_KeepTxt;
		function __construct($MK_Key,$MK_TxtTh,$MK_TxtEn,$MK_Type){
			$this->MK_Key=$MK_Key;
			$this->MK_TxtTh=$MK_TxtTh;
			$this->MK_TxtEn=$MK_TxtEn;
			$this->MK_Type=$MK_Type;
			$MK_Keep=array();
			$MK_KeepTxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				if($this->MK_Type=="Add"){

					try{
						$AddLibraryKeepSql="INSERT INTO `library_keep` (`lk_ID`, `lk_txtTh`, `lk_txtEn`) VALUES (NULL, '{$this->MK_TxtTh}', NULL);";
						$CountLibrary->exec($AddLibraryKeepSql);
						$MK_KeepTxt="NoError";
					}catch(PDOException $e){
						$MK_KeepTxt="Error";
					}
					
				}elseif($this->MK_Type=="read"){
					try{
						$MK_KeepSql="SELECT `lk_ID`, `lk_txtTh`, `lk_txtEn` FROM `library_keep` WHERE 1 ORDER BY `lk_ID` ASC";
							if($MK_KeepRs=$CountLibrary->query($MK_KeepSql)){
								while($MK_KeepRow=$MK_KeepRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($MK_KeepRow) && count($MK_KeepRow)){
										$MK_Keep[]=$MK_KeepRow;
										$MK_KeepTxt="NoError";
									}else{
										$MK_Keep="-";
										$MK_KeepTxt="Error";												
									}
								}
							}else{
								$MK_Keep="-";
								$MK_KeepTxt="Error";
							}
					}catch(PDOException $e){
						$MK_Keep="-";
						$MK_KeepTxt="Error";
					}
				}elseif($this->MK_Type=="read_txt"){
					try{
						$MK_KeepSql="SELECT `lk_ID`, `lk_txtTh`, `lk_txtEn` FROM `library_keep` WHERE `lk_ID`='{$this->MK_Key}' ORDER BY `lk_ID` ASC";
							if($MK_KeepRs=$CountLibrary->query($MK_KeepSql)){
								$MK_KeepRow=$MK_KeepRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($MK_KeepRow) && count($MK_KeepRow)){
										$MK_Keep="-";
										$MK_KeepTxt=$MK_KeepRow["lk_txtTh"];
									}else{
										$MK_Keep="-";
										$MK_KeepTxt="-";												
									}
							}else{
								$MK_Keep="-";
								$MK_KeepTxt="-";
							}
					}catch(PDOException $e){
						$MK_Keep="-";
						$MK_KeepTxt="-";
					}					
				}elseif($this->MK_Type=="up"){
					try{
						$UpLibraryKeepSql="UPDATE `library_keep` 
										   SET `lk_txtTh`='{$this->MK_TxtTh}',`lk_txtEn`='{$this->MK_TxtEn}' 
										   WHERE `lk_ID`='{$this->MK_Key}'";
						$CountLibrary->exec($UpLibraryKeepSql);
						$MK_KeepTxt="NoError";
					}catch(PDOException $e){
						$MK_KeepTxt="Error";
					}
//set null
					$MK_Keep="-";
//set null end					
				}elseif(($this->MK_Type=="delete")){
					try{
						$count_book_sql="SELECT COUNT(`Books_Key`) AS `count_lb` 
										 FROM `library_books` 
										 WHERE `lk_ID`='{$this->MK_Key}';";
						if(($count_book_rs=$CountLibrary->query($count_book_sql))){
							$count_book_row=$count_book_rs->Fetch(PDO::FETCH_ASSOC);
								if((is_array($count_book_row) && count($count_book_row))){
									$count_lb=$count_book_row["count_lb"];
								}else{
									$count_lb=0;
								}
						}else{
							$count_lb=0;
						}
					}catch(PDOException $e){
						$count_lb=0;
					}

					if(($count_lb>=1)){
						$MK_KeepTxt="Error";
					}else{

						try{
							$DeleteLibraryKeepSql="DELETE FROM `library_keep` 
												   WHERE `lk_ID`='{$this->MK_Key}'";
							$CountLibrary->exec($DeleteLibraryKeepSql);
							$MK_KeepTxt="NoError";
						}catch(PDOException $e){
							$MK_KeepTxt="Error";
						}

					}

				}else{
					$MK_Keep="-";
					$MK_KeepTxt="Error";
				}

				//if(isset($MK_Keep)){
					$this->MK_Keep=$MK_Keep;
				//}else{}
				
				//if(isset($MK_KeepTxt)){
					$this->MK_KeepTxt=$MK_KeepTxt;
				//}else{}
				$CountLibrary=null;
		}function CallMK_Keep(){
			if(isset($this->MK_Keep)){
				return $this->MK_Keep;
			}else{}
		}function CallMK_KeepTxt(){
			if(isset($this->MK_KeepTxt)){
				return $this->MK_KeepTxt;
			}else{}
		}
	}
?>

<?php //การจัดการข้อมูลบรรณาธิการ
	class ManagementEditor{
		public $MEdi_key,$MEdi_Txt,$MEdi_Type;
		public $MEdi_Editor,$MEdi_EditorTxt;
		function __construct($MEdi_key,$MEdi_Txt,$MEdi_Type){
			$this->MEdi_key=$MEdi_key;
			$this->MEdi_Txt=$MEdi_Txt;
			$this->MEdi_Type=$MEdi_Type;
			$MEdi_Editor=array();
			$MEdi_EditorTxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				if($this->MEdi_Type=="Add"){
//----------------------------------------------------------------------------------------					
						$RunKeyEditorSql="SELECT COUNT(`LE_Key`) AS `CountLa` 
										  FROM `library_editor` WHERE 1;";
							if($RunKeyEditorRs=$CountLibrary->query($RunKeyEditorSql)){
								$RunKeyEditorRow=$RunKeyEditorRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($RunKeyEditorRow) && count($RunKeyEditorRow)){
										$CountLa=$RunKeyEditorRow["CountLa"];
									}else{
										$CountLa=0;
									}
							}else{
								$CountLa=0;
							}
							if(isset($CountLa)){
//----------------------------------------------------------------------------------------							
								$CountLa=$CountLa+1;
								$CountLaKey="LE".$CountLa;
									$TestKeySql="SELECT COUNT(`LE_Key`) AS 'CountLK' 
												 FROM `library_editor` 
												 WHERE `LE_Key` = '{$CountLaKey}';";
										if($TestKeyRs=$CountLibrary->query($TestKeySql)){
											$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
											if(is_array($TestKeyRow) && count($TestKeyRow)){
												$CountLK=$TestKeyRow["CountLK"];
											}else{
												$CountLK=0;
											}
										}else{
											$CountLK=0;
										}
									while($CountLK!=0){
										$CountLa=$CountLa+1;
										$CountLaKey="LE".$CountLa;
											$TestKeySql="SELECT COUNT(`LE_Key`) AS 'CountLK' 
														 FROM `library_editor` 
														 WHERE `LE_Key` = '{$CountLaKey}';";
												if($TestKeyRs=$CountLibrary->query($TestKeySql)){
													$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
													if(is_array($TestKeyRow) && count($TestKeyRow)){
														$CountLK=$TestKeyRow["CountLK"];
													}else{
														$CountLK=0;
													}
												}else{
													$CountLK=0;
												}
									}
//----------------------------------------------------------------------------------------
								try{
									$AddLibraryEditorSql="INSERT INTO `library_editor`(`LE_Key`, `LE_Txt`) 
														  VALUES ('{$CountLaKey}','{$this->MEdi_Txt}')";
									$CountLibrary->exec($AddLibraryEditorSql);
									$MEdi_EditorTxt="NoError";
								}catch(PDOException $e){
									$MEdi_EditorTxt="Error";
								}
							}else{
								$MEdi_EditorTxt="Error";
							}	
//----------------------------------------------------------------------------------------							
				}elseif($this->MEdi_Type=="read"){
					try{
						$ReadEditorSql="SELECT `LE_Key`, `LE_Txt` FROM `library_editor` WHERE 1 ORDER BY `LE_Key` ASC";
							if($ReadEditorRs=$CountLibrary->query($ReadEditorSql)){
								while($ReadEditorRow=$ReadEditorRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($ReadEditorRow) && count($ReadEditorRow)){
										$MEdi_Editor[]=$ReadEditorRow;
										$MEdi_EditorTxt="NoError";
									}else{
										$MEdi_Editor="-";
										$MEdi_EditorTxt="Error";
									}
								}
							}else{
								$MEdi_Editor="-";
								$MEdi_EditorTxt="Error";
							}
					}catch(PDOException $e){
						$MEdi_Editor="-";
						$MEdi_EditorTxt="Error";
					}
				}elseif($this->MEdi_Type=="read_txt"){
					try{
						$ReadEditorSql="SELECT `LE_Key`, `LE_Txt` FROM `library_editor` WHERE `LE_Key`='{$this->MEdi_key}' ORDER BY `LE_Key` ASC";
							if($ReadEditorRs=$CountLibrary->query($ReadEditorSql)){
								$ReadEditorRow=$ReadEditorRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($ReadEditorRow) && count($ReadEditorRow)){
										$MEdi_Editor="-";
										$MEdi_EditorTxt=$ReadEditorRow["LE_Txt"];
									}else{
										$MEdi_Editor="-";
										$MEdi_EditorTxt="-";
									}
							}else{
								$MEdi_Editor="-";
								$MEdi_EditorTxt="-";
							}
					}catch(PDOException $e){
						$MEdi_Editor="-";
						$MEdi_EditorTxt="-";
					}					
				}elseif(($this->MEdi_Type=="up")){
					try{
						$UpLibraryEditorSql="UPDATE `library_editor` 
											 SET `LE_Txt`='{$this->MEdi_Txt}' 
											 WHERE `LE_Key`='{$this->MEdi_key}'";
						$CountLibrary->exec($UpLibraryEditorSql);
						$MEdi_EditorTxt="NoError";
					}catch(PDOException $e){
						$MEdi_EditorTxt="Error";
					}		
//set null
					$MEdi_Editor="-";
//set null end
				}elseif(($this->MEdi_Type=="delete")){

					try{
						$count_book_sql="SELECT COUNT(`Books_Key`) AS `count_lb` 
										 FROM `library_books` 
										 WHERE `LE_Key`='{$this->MEdi_key}';";
						if(($count_book_rs=$CountLibrary->query($count_book_sql))){
							$count_book_row=$count_book_rs->Fetch(PDO::FETCH_ASSOC);
								if((is_array($count_book_row) && count($count_book_row))){
									$count_lb=$count_book_row["count_lb"];
								}else{
									$count_lb=0;
								}
						}else{
							$count_lb=0;
						}
					}catch(PDOException $e){
						$count_lb=0;
					}	

					if(($count_lb>=1)){
						$MEdi_EditorTxt="Error";
					}else{
						try{
							$UpLibraryEditorSql="DELETE FROM `library_editor` WHERE `LE_Key`='{$this->MEdi_key}'";
							$CountLibrary->exec($UpLibraryEditorSql);
							$MEdi_EditorTxt="NoError";
						}catch(PDOException $e){
							$MEdi_EditorTxt="Error";
						}	
					}
//set null
				$MEdi_Editor="-";
//set null end
				}else{
					$MEdi_Editor="-";
					$MEdi_EditorTxt="Error";
				}
				
				if(isset($MEdi_Editor)){
					$this->MEdi_Editor=$MEdi_Editor;
				}else{}
				
				if(isset($MEdi_EditorTxt)){
					$this->MEdi_EditorTxt=$MEdi_EditorTxt;
				}else{}
				$CountLibrary=null;
		}function CallEditor(){
			if(isset($this->MEdi_Editor)){
				return $this->MEdi_Editor;
			}else{}
		}function CallEditorTxt(){
			if(isset($this->MEdi_EditorTxt)){
				return $this->MEdi_EditorTxt;
			}else{}
		}
	}


?>

<?php //การจัดการแหล่งที่มา
	class ManagementAdder{
		public $MAdd_Key,$MAdd_Txt,$MAdd_Type;
		public $MAdd_AdderTxt,$MAdd_Adder;
		function __construct($MAdd_Key,$MAdd_Txt,$MAdd_Type){
			$this->MAdd_Key=$MAdd_Key;
			$this->MAdd_Txt=$MAdd_Txt;
			$this->MAdd_Type=$MAdd_Type;
			$MAdd_Adder=array();
			$MAdd_AdderTxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				if($this->MAdd_Type=="Add"){
					try{
						$count_adder_sql="SELECT COUNT(`LAd_No`) AS `count_la` 
										  FROM `library_adder` 
										  WHERE `LAd_txt`='{$this->MAdd_Txt}';";
						if(($count_adder_rs=$CountLibrary->query($count_adder_sql))){
							$count_adder_row=$count_adder_rs->Fetch(PDO::FETCH_ASSOC);
							if((is_array($count_adder_row) && count($count_adder_row))){
								$count_la=$count_adder_row["count_la"];
							}else{
								$count_la=0;
							}
						}
					}catch(PDOException $e){
						$count_la=0;
					}

					if(($count_la>=1)){
						$MAdd_AdderTxt="Error";
					}else{

//----------------------------------------------------------------------------------------							
						$RunKeyAdderSql="SELECT COUNT(`LAd_No`) AS `CountLa` 
										 FROM `library_Adder` WHERE 1;";
							if($RunKeyAdderRs=$CountLibrary->query($RunKeyAdderSql)){
								$RunKeyAdderRow=$RunKeyAdderRs->Fetch(PDO::FETCH_ASSOC);
								if(is_array($RunKeyAdderRow) && count($RunKeyAdderRow)){
									$CountLa=$RunKeyAdderRow["CountLa"];
								}else{
									$CountLa=0;
								}
							}else{
								$CountLa=0;
							}

							if(isset($CountLa)){
							//----------------------------------------------------------------------------------------							
								$CountLa=$CountLa+1;
								$CountLaKey="LAdd".$CountLa;
								$TestKeySql="SELECT COUNT(`LAd_No`) AS 'CountLK' 
											 FROM `library_Adder` 
											 WHERE `LAd_No` = '{$CountLaKey}';";
								if($TestKeyRs=$CountLibrary->query($TestKeySql)){
									$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($TestKeyRow) && count($TestKeyRow)){
										$CountLK=$TestKeyRow["CountLK"];
									}else{
										$CountLK=0;
									}
								}else{
									$CountLK=0;
								}

								while($CountLK!=0){
									$CountLa=$CountLa+1;
									$CountLaKey="LAdd".$CountLa;
									$TestKeySql="SELECT COUNT(`LAd_No`) AS 'CountLK' 
												 FROM `library_Adder` 
												 WHERE `LAd_No` = '{$CountLaKey}';";
									if($TestKeyRs=$CountLibrary->query($TestKeySql)){
										$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
										if(is_array($TestKeyRow) && count($TestKeyRow)){
											$CountLK=$TestKeyRow["CountLK"];
										}else{
											$CountLK=0;
										}
									}else{
										$CountLK=0;
									}
								}

							//----------------------------------------------------------------------------------------
								try{
									$AddLibraryAdderSql="INSERT INTO `library_Adder`(`LAd_No`, `LE_Txt`) 
														VALUES ('{$CountLaKey}','{$this->MAdd_Txt}')";
									$CountLibrary->exec($AddLibraryAdderSql);
									$MEdi_AdderTxt="NoError";
								}catch(PDOException $e){
									$MEdi_AdderTxt="Error";
								}
							}else{
								$MEdi_AdderTxt="Error";
							}	
//----------------------------------------------------------------------------------------
					}

				}elseif($this->MAdd_Type=="read"){
					try{
						$ReadAdderSql="SELECT `LAd_No`, `LAd_txt` FROM `library_adder` WHERE 1 ORDER BY `LAd_No` ASC";
							if($ReadAdderRs=$CountLibrary->query($ReadAdderSql)){
								while($ReadAdderRow=$ReadAdderRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($ReadAdderRow) && count($ReadAdderRow)){
										$MAdd_Adder[]=$ReadAdderRow;
										$MAdd_AdderTxt="NoError";
									}else{
										$MAdd_Adder="-";
										$MAdd_AdderTxt="Error";
									}
								}
							}else{
								$MAdd_Adder="-";
								$MAdd_AdderTxt="Error";
							}						
					}catch(PDOException $e){
						$MAdd_Adder="-";
						$MAdd_AdderTxt="Error";						
					}
				}elseif($this->MAdd_Type=="read_txt"){
					try{
						$ReadAdderSql="SELECT `LAd_No`, `LAd_txt` FROM `library_adder` WHERE `LAd_No`='{$this->MAdd_Key}' ORDER BY `LAd_No` ASC";
							if($ReadAdderRs=$CountLibrary->query($ReadAdderSql)){
								$ReadAdderRow=$ReadAdderRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($ReadAdderRow) && count($ReadAdderRow)){
										$MAdd_Adder="-";
										$MAdd_AdderTxt=$ReadAdderRow["LAd_txt"];
									}else{
										$MAdd_Adder="-";
										$MAdd_AdderTxt="-";
									}
							}else{
								$MAdd_Adder="-";
								$MAdd_AdderTxt="-";
							}						
					}catch(PDOException $e){
						$MAdd_Adder="-";
						$MAdd_AdderTxt="-";						
					}					
				}elseif(($this->MAdd_Type=="up")){
					try{
						$UpLibraryAdderSql="UPDATE `library_adder` 
										    SET `LAd_txt`='{this->MAdd_Txt}' 
											WHERE `LAd_No`='{$this->MAdd_Key}'";
						$CountLibrary->exec($UpLibraryAdderSql);
						$MEdi_AdderTxt="NoError";
					}catch(PDOException $e){
						$MEdi_AdderTxt="Error";
					}
//set null
					$MAdd_Adder="-";
//set null end
				}elseif(($this->MAdd_Type=="delete")){
					try{
						$count_listbooks_sql="SELECT COUNT(`LLB_Key`) AS `count_list` 
											  FROM `library_listbooks` 
											  WHERE `LAd_No`='{$this->MAdd_Key}';";
							if(($count_listbooks_rs=$CountLibrary->query($count_listbooks_sql))){
								$count_listbooks_row=$count_listbooks_rs->Fetch(PDO::FETCH_ASSOC);
								if((is_array($count_listbooks_row) && count($count_listbooks_row))){
									$count_list=$count_listbooks_row["count_list"];
								}else{
									$count_list=0;
								}
							}else{
								$count_list=0;
							}
					}catch(PDOException $e){
						$count_list=0;
					}

					if(($count_list>=1)){
						$MAdd_AdderTxt="Error";
					}else{
						try{
							$DeleteLibraryAdderSql="DELETE FROM `library_adder` 
													WHERE `LAd_No`='{$this->MAdd_Key}'";
							$CountLibrary->exec($DeleteLibraryAdderSql);
							$MEdi_AdderTxt="NoError";
						}catch(PDOException $e){
							$MEdi_AdderTxt="Error";
						}
					}
//set null
	$MAdd_Adder="-";
//set null end
				}else{
					$MAdd_AdderTxt="Error";
					$MAdd_Adder="-";
				}
				if(isset($MAdd_AdderTxt)){
					$this->MAdd_AdderTxt=$MAdd_AdderTxt;
				}else{}
				
				if(isset($MAdd_Adder)){
					$this->MAdd_Adder=$MAdd_Adder;
				}else{}
				$CountLibrary=null;
		}function CallMAdd_AdderTxt(){
			if(isset($this->MAdd_AdderTxt)){
				return $this->MAdd_AdderTxt;
			}else{}
		}function CallMAdd_Adder(){
			if(isset($this->MAdd_Adder)){
				return $this->MAdd_Adder;
			}else{}
		}
	}	
?>


<?php //การจัดการข้อมูลผู้แต่ง
	class ManagementAuthor{
		public $MA_Key,$MA_Txt,$MA_Type;
		public $MA_AuthorTxt,$MA_Author;
		function __construct($MA_Key,$MA_Txt,$MA_Type){
			$this->MA_Key=$MA_Key;
			$this->MA_Txt=$MA_Txt;
			$this->MA_Type=$MA_Type;
			$MA_Author=array();
			$MA_AuthorTxt="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				if(($this->MA_Type=="Add")){
						$RunKeyAuthorSql="SELECT COUNT(`LA_Key`) AS `CountLa` 
										  FROM `library_author` WHERE 1";
							if(($RunKeyAuthorRs=$CountLibrary->query($RunKeyAuthorSql))){
								$RunKeyAuthorRow=$RunKeyAuthorRs->Fetch(PDO::FETCH_ASSOC);
									if((is_array($RunKeyAuthorRow) && count($RunKeyAuthorRow))){
										$CountLa=$RunKeyAuthorRow["CountLa"];
									}else{
										$CountLa=0;
									}
							}else{
								$CountLa=0;
							}
							if((is_numeric($CountLa))){
	//----------------------------------------------------------------------------------------							
								$CountLa=$CountLa+1;
								$CountLaKey="LA".$CountLa;
									$TestKeySql="SELECT COUNT(`LA_Key`) AS 'CountLK' 
												 FROM `library_author` 
												 WHERE `LA_Key` = '{$CountLaKey}'";
										if($TestKeyRs=$CountLibrary->query($TestKeySql)){
											$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
											if(is_array($TestKeyRow) && count($TestKeyRow)){
												$CountLK=$TestKeyRow["CountLK"];
											}else{
												$CountLK=0;
											}
										}else{
											$CountLK=0;
										}
									while($CountLK!=0){
										$CountLa=$CountLa+1;
										$CountLaKey="LA".$CountLa;
											$TestKeySql="SELECT COUNT(`LA_Key`) AS 'CountLK' 
														 FROM `library_author` 
														 WHERE `LA_Key` = '{$CountLaKey}'";
												if($TestKeyRs=$CountLibrary->query($TestKeySql)){
													$TestKeyRow=$TestKeyRs->Fetch(PDO::FETCH_ASSOC);
													if(is_array($TestKeyRow) && count($TestKeyRow)){
														$CountLK=$TestKeyRow["CountLK"];
													}else{
														$CountLK=0;
													}
												}else{
													$CountLK=0;
												}
									}
	//----------------------------------------------------------------------------------------
								try{
									$AddLibraryAuthorSql="INSERT INTO `library_author`(`LA_Key`, `LA_Name`) 
														  VALUES ('{$CountLaKey}','{$this->MA_Txt}')";
									$CountLibrary->exec($AddLibraryAuthorSql);
									$MA_AuthorTxt="NoError";
								}catch(PDOException $e){
									$MA_AuthorTxt="Error";
								}
							}else{
								$MA_AuthorTxt="Error";
							}
					}elseif(($this->MA_Type=="read")){
						try{
							$ReadAuthorSql="SELECT `LA_Key`, `LA_Name` 
											FROM `library_author` 
											WHERE 1 
											ORDER BY `LA_Key` ASC";
								if(($ReadAuthorRs=$CountLibrary->query($ReadAuthorSql))){
									while($ReadAuthorRow=$ReadAuthorRs->Fetch(PDO::FETCH_ASSOC)){
										if((is_array($ReadAuthorRow) && count($ReadAuthorRow))){
											$MA_Author[]=$ReadAuthorRow;
											$MA_AuthorTxt="NoError";
										}else{
											$MA_Author="-";
											$MA_AuthorTxt="Error";
										}
									}
								}else{
									$MA_Author="-";
									$MA_AuthorTxt="Error";
								}						
						}catch(PDOException $e){
							$MA_Author="-";
							$MA_AuthorTxt="Error";
						}
					}elseif(($this->MA_Type=="read_txt")){
						try{
							$ReadAuthorSql="SELECT `LA_Key`, `LA_Name` 
											FROM `library_author` 
											WHERE `LA_Key`='{$this->MA_Key}' 
											ORDER BY `LA_Key` ASC";
								if($ReadAuthorRs=$CountLibrary->query($ReadAuthorSql)){
									$ReadAuthorRow=$ReadAuthorRs->Fetch(PDO::FETCH_ASSOC);
										if(is_array($ReadAuthorRow) && count($ReadAuthorRow)){
											$MA_Author="-";
											$MA_AuthorTxt=$ReadAuthorRow["LA_Name"];
										}else{
											$MA_Author="-";
											$MA_AuthorTxt="-";
										}
								}else{
									$MA_Author="-";
									$MA_AuthorTxt="-";
								}						
						}catch(PDOException $e){
							$MA_Author="-";
							$MA_AuthorTxt="-";
						}						
					}elseif(($this->MA_Type=="up")){
						try{
							$UpLibraryAuthorSql="UPDATE `library_author` 
							                     SET `LA_Name`='{$this->MA_Txt}' 
												 WHERE `LA_Key`='{$this->MA_Key}'";
							$CountLibrary->exec($UpLibraryAuthorSql);
							$MA_AuthorTxt="NoError";
						}catch(PDOException $e){
							$MA_AuthorTxt="Error";
						}
					}elseif($this->MA_Type=="delete"){
						try{
							$test_author_sql="SELECT COUNT(`Books_Key`) AS `test_count` FROM `library_books` WHERE `LA_Key`='{$this->MA_Key}'";
								if(($test_author_rs=$CountLibrary->query($test_author_sql))){
									$test_author_row=$test_author_rs->Fetch(PDO::FETCH_ASSOC);
										if((is_array($test_author_row) && count($test_author_row))){
											$test_count=$test_author_row["test_count"];
										}else{
											$test_count=0;
										}
								}else{
									$test_count=0;
								}
						}catch(PDOException $e){
							$test_count=0;
						}
						
						if(($test_count>=1)){
							$MA_AuthorTxt="Error";
						}else{
							try{
								$delete_author_sql="DELETE FROM `library_author` 
													WHERE`LA_Key`='{$this->MA_Key}';";
								$CountLibrary->exec($delete_author_sql);
								$MA_AuthorTxt="NoError";
							}catch(PDOException $e){
								$MA_AuthorTxt="Error";
							}
						}

					}else{
						$MA_AuthorTxt="Error";
					}

			$this->MA_AuthorTxt=$MA_AuthorTxt;
			$this->MA_Author=$MA_Author;

			$CountLibrary=null;
		}function RunMAAuthorTxt(){
			if(isset($this->MA_AuthorTxt)){
				return $this->MA_AuthorTxt;
			}else{}
		}function RunAuthor(){
			if(isset($this->MA_Author)){
				return $this->MA_Author;
			}else{}			
		}
	}//การจัดการข้อมูลผู้แต่ง จบ
?>

