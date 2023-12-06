<?php //Data Books status
	class Books_Status{
		public $BS_Type,$BS_Id;
		public $BS_Error,$BS_Array;
		function __construct($BS_Type,$BS_Id){
			$this->BS_Type=$BS_Type;
			$this->BS_Id=$BS_Id;
//------------------------------------------------------------------------
			$BS_Error="Error";
			$BS_Array=array();
//------------------------------------------------------------------------
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();				
//------------------------------------------------------------------------		
				if($this->BS_Type=="DataRow"){
					try{
						$BookStatusSql="SELECT `Li_StatusNo`, `Li_StatusTxtTh`, `Li_StatusTxtEh` 
										FROM `library_status` 
										WHERE 1 ORDER BY `Li_StatusNo` ASC";
							if($BookStatusRs=$CountLibrary->query($BookStatusSql)){
								while($BookStatusRow=$BookStatusRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($$BookStatusRow) && count($BookStatusRow)){
										$BS_Error="NoError";
										$BS_Array[]=$$BookStatusRow;
									}else{
										$BS_Error="Error";
										$BS_Array[]="-";
									}
								}
							}else{
								$BS_Error="Error";
								$BS_Array[]="-";
							}
					}catch(PDOException $e){
						$BS_Error="Error";
						$BS_Array[]="-";
					}
				}elseif($this->BS_Type=="Data"){
					try{
						$BookStatusSql="SELECT `Li_StatusNo`, `Li_StatusTxtTh`, `Li_StatusTxtEh` 
						                FROM `library_status` 
										WHERE `Li_StatusNo`='{$this->BS_Id}';";
							if($BookStatusRs=$CountLibrary->query($BookStatusSql)){
								$BookStatusRow=$BookStatusRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($$BookStatusRow) && count($BookStatusRow)){
										$BS_Error="NoError";
										$BS_Array[]=$$BookStatusRow;
									}else{
										$BS_Error="Error";
										$BS_Array[]="-";
									}
							}else{
								$BS_Error="Error";
								$BS_Array[]="-";
							}
					}catch(PDOException $e){
						$BS_Error="Error";
						$BS_Array[]="-";
					}				
				}else{
					$BS_Error="Error";
					$BS_Array[]="-";
				}
			if(isset($BS_Error,$BS_Array)){
				$this->BS_Error=$BS_Error;
				$this->BS_Array=$BS_Array;
				$CountLibrary="-";
			}else{
				$CountLibrary="-";
			}
		}function CallBSError(){
			if(isset($this->BS_Error)){
				return $this->BS_Error;
			}else{}
		}function CallBSArray(){
			if(isset($this->BS_Array)){
				return $this->BS_Array;
			}else{}
		}
	}  ?>



<?php
	//จำนวนหนังสือ
	class Int_Library_Books{
		public $ILB_Type,$TLB_BooksKey;
		public $int_count_books;
		function __construct($ILB_Type,$TLB_BooksKey){
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();	
			$this->ILB_Type=$ILB_Type;
			$this->TLB_BooksKey=$TLB_BooksKey;
			$int_count_books=0;
				if(($this->ILB_Type=="count")){
					try{
						$ILB_Count_Sql="SELECT COUNT(`LLB_Key`) AS `int_count_books` 
									    FROM `library_listbooks` 
										WHERE `Books_Key`='{$this->TLB_BooksKey}';";
							if(($ILB_Count_Rs=$CountLibrary->query($ILB_Count_Sql))){
								$ILB_Count_Row=$ILB_Count_Rs->Fetch(PDO::FETCH_ASSOC);
									if((is_array($ILB_Count_Row) and count($ILB_Count_Row))){
										$int_count_books=$ILB_Count_Row["int_count_books"];
									}else{
										$int_count_books=0;
									}
							}else{
								$int_count_books=0;
							}
					}catch(PDOException $e){
						$int_count_books=0;
					}
				}else{
					$int_count_books=0;
				}
			$CountLibrary=null;
			$this->int_count_books=$int_count_books;
		}function CallCountBooks(){
			return $this->int_count_books;
		}
	}
?>


<?php
	class MD_LibraryBooks{ //การจัดการข้อมูลหนังสือ
		public $MDLB_Type,$MDLB_BK,$MDLB_BNT,$MDLB_BNE,$MDLB_BB,$MDLB_BI,$MDLB_BP,$MDLB_BT,$MDLB_LA,$MDLB_LT,$MDLB_LE,$MDLB_LTr,$MDLB_LP,$MDLB_DDCB,$MDLB_DDCA,$MDLB_BPA,$MDLB_BYA,$MDLB_IK,$MDLB_ACode;
		public $Error_MDLB;
		function __construct($MDLB_Type,$MDLB_BK,$MDLB_BNT,$MDLB_BNE,$MDLB_BB,$MDLB_BI,$MDLB_BP,$MDLB_BT,$MDLB_LA,$MDLB_LT,$MDLB_LE,$MDLB_LTr,$MDLB_LP,$MDLB_DDCB,$MDLB_DDCA,$MDLB_BPA,$MDLB_BYA,$MDLB_IK,$MDLB_ACode){
			$this->MDLB_Type=$MDLB_Type;
			$this->MDLB_BK=$MDLB_BK;
			$this->MDLB_BNT=$MDLB_BNT;
			$this->MDLB_BNE=$MDLB_BNE;
			$this->MDLB_BB=$MDLB_BB;
			$this->MDLB_BI=$MDLB_BI;
			$this->MDLB_BP=$MDLB_BP;
			$this->MDLB_BT=$MDLB_BT;
			$this->MDLB_LA=$MDLB_LA;
			$this->MDLB_LT=$MDLB_LT;
			$this->MDLB_LE=$MDLB_LE;
			$this->MDLB_LTr=$MDLB_LTr;
			$this->MDLB_LP=$MDLB_LP;
			$this->MDLB_DDCB=$MDLB_DDCB;
			$this->MDLB_DDCA=$MDLB_DDCA;
			$this->MDLB_BPA=$MDLB_BPA;
			$this->MDLB_BYA=$MDLB_BYA;
			$this->MDLB_IK=$MDLB_IK;
			$this->MDLB_ACode=$MDLB_ACode;
			$Error_MDLB="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();	
				switch($this->MDLB_Type){
					case "Add":
							try{
								$MDLB_Sql="INSERT INTO `library_books`(`Books_Key`, `Books_NameTh`, `Books_NameEn`, `Books_Bid`, `Books_ISBN`, `Books_Price`, `Books_Time`, `LA_Key`, `LT_No`, `LE_Key`, `LTr_Key`, `LP_Key`, `DDCB_No`, `DDCA_No`, `Books_print_at`, `Books_year_at`, `lk_ID`, `abbreviation_code`) 
										   VALUES ('{$this->MDLB_BK}','{$this->MDLB_BNT}','{$this->MDLB_BNE}','{$this->MDLB_BB}','{$this->MDLB_BI}','{$this->MDLB_BP}','{$this->MDLB_BT}','{$this->MDLB_LA}'
										   ,'{$this->MDLB_LT}','{$this->MDLB_LE}','{$this->MDLB_LTr}','{$this->MDLB_LP}','{$this->MDLB_DDCB}','{$this->MDLB_DDCA}','{$this->MDLB_BPA}'
										   ,'{$this->MDLB_BYA}','{$this->MDLB_IK}','{$this->MDLB_ACode}')";
								$CountLibrary->exec($MDLB_Sql);	
								$Error_MDLB="NotError";
							}catch(PDOException $e){
								$Error_MDLB="Error";
							}
						break;
					case "UpData":	
							try{
								$MDLB_Sql="UPDATE `library_books` SET `Books_NameTh`='{$this->MDLB_BNT}',`Books_NameEn`='{$this->MDLB_BNE}',`Books_Bid`='{$this->MDLB_BB}'
										 ,`Books_ISBN`='{$this->MDLB_BI}',`Books_Price`='{$this->MDLB_BP}',`Books_Time`='{$this->MDLB_BT}',`LA_Key`='{$this->MDLB_LA}'
										 ,`LT_No`='{$this->MDLB_LT}',`LE_Key`='{$this->MDLB_LE}',`LTr_Key`='{$this->MDLB_LTr}',`LP_Key`='{$this->MDLB_LP}',`DDCB_No`='{$this->MDLB_DDCB}'
										 ,`DDCA_No`='{$this->MDLB_DDCA}',`Books_print_at`='{$this->MDLB_BPA}',`Books_year_at`='{$this->MDLB_BYA}',`lk_ID`='{$this->MDLB_IK}'
										 ,`abbreviation_code`='{$this->MDLB_ACode}' WHERE `Books_Key`='{$this->MDLB_BK}'";
								$CountLibrary->exec($MDLB_Sql);	
								$Error_MDLB="NotError";
							}catch(PDOException $e){
								$Error_MDLB="Error";
							}					
						break;
					default:
						$Error_MDLB="Error";
				}
				if(isset($Error_MDLB)){
					$this->Error_MDLB=$Error_MDLB;
					$CountLibrary=null;
				}else{
					$CountLibrary=null;
				}
		}function Run_MD_LibraryBooks(){
			if(isset($this->Error_MDLB)){
				return $this->Error_MDLB;
			}else{}
		}
	}
?>

<?php
	class MD_Library_Listbooks{ //การจัดการ รายการหนังสือ (เลขทะเบียน)
		public $MDLL_Type,$MDLL_LLB_Key,$MDLL_LLB_Time,$MDLL_Books_Key,$MDLL_LAd_No,$MDLL_StatusNo;
		public $ErrorMDLL,$LLB_Key,$ArrayMDLL;
		function __construct($MDLL_Type,$MDLL_LLB_Key,$MDLL_LLB_Time,$MDLL_Books_Key,$MDLL_LAd_No,$MDLL_StatusNo){
			$this->MDLL_Type=$MDLL_Type;
			$this->MDLL_LLB_Key=$MDLL_LLB_Key;
			$this->MDLL_LLB_Time=$MDLL_LLB_Time;
			$this->MDLL_Books_Key=$MDLL_Books_Key;
			$this->MDLL_LAd_No=$MDLL_LAd_No;
			$this->MDLL_StatusNo=$MDLL_StatusNo;
			$ErrorMDLL="Error";
			$ArrayMDLL=array();
			$Li_DataTime=date("Y-m-d H:i:s");
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();	
				switch($this->MDLL_Type){
					case "Add":
//Run Id Listbooks
						try{
							$Listbooks_KeySql="SELECT `LLB_Key` FROM `library_listbooks` ORDER BY `LLB_Key` DESC";
								if($Listbooks_KeyRs=$CountLibrary->query($Listbooks_KeySql)){
									$Listbooks_KeyRow=$Listbooks_KeyRs->Fetch(PDO::FETCH_ASSOC);
										if(is_array($Listbooks_KeyRow) && count($Listbooks_KeyRow)){
											$LLB_Key=$Listbooks_KeyRow["LLB_Key"];
										}else{
											$LLB_Key=0;
										}
								}else{
									$LLB_Key=0;
								}
						}catch(PDOException $e){
							$LLB_Key=0;
						}
//Count LLB_Key					
	
						$LLB_Key=$LLB_Key+1;
//						
						if($LLB_Key<=9){
							$LLB_Key="0000".$LLB_Key;
						}elseif($LLB_Key<=99){
							$LLB_Key="000".$LLB_Key;
						}elseif($LLB_Key<=999){
							$LLB_Key="00".$LLB_Key;
						}elseif($LLB_Key<=9999){
							$LLB_Key="0".$LLB_Key;
						}else{
							$LLB_Key;
						}
						
//						
						try{
							$TestListbooks_KeySql="SELECT COUNT(`LLB_Key`) AS `LLB_Count` FROM `library_listbooks` WHERE `LLB_Key`='{$LLB_Key}';";
								if($TestListbooks_KeyRs=$CountLibrary->query($TestListbooks_KeySql)){
									$TestListbooks_KeyRow=$TestListbooks_KeyRs->Fetch(PDO::FETCH_ASSOC);
										if(is_array($TestListbooks_KeyRow) && count($TestListbooks_KeyRow)){
											$LLB_Count=$TestListbooks_KeyRow["LLB_Count"];
										}else{
											$LLB_Count=0;
										}
								}else{
									$LLB_Count=0;
								}
						}catch(PDOException $e){
							$LLB_Count=0;
						}
//Count LLB_Key End
//Test  LLB_Key
						while($LLB_Count!=0){
							$LLB_Key=$LLB_Key+1;
//							
						if($LLB_Key<=9){
							$LLB_Key="0000".$LLB_Key;
						}elseif($LLB_Key<=99){
							$LLB_Key="000".$LLB_Key;
						}elseif($LLB_Key<=999){
							$LLB_Key="00".$LLB_Key;
						}elseif($LLB_Key<=9999){
							$LLB_Key="0".$LLB_Key;
						}else{
							$LLB_Key;
						}							
//							
							try{
								$TestListbooks_KeySql="SELECT COUNT(`LLB_Key`) AS `LLB_Count` FROM `library_listbooks` WHERE `LLB_Key`='{$LLB_Key}';";
									if($TestListbooks_KeyRs=$CountLibrary->query($TestListbooks_KeySql)){
										$TestListbooks_KeyRow=$TestListbooks_KeyRs->Fetch(PDO::FETCH_ASSOC);
											if(is_array($TestListbooks_KeyRow) && count($TestListbooks_KeyRow)){
												$LLB_Count=$TestListbooks_KeyRow["LLB_Count"];
											}else{
												$LLB_Count=0;
											}
									}else{
										$LLB_Count=0;
									}
							}catch(PDOException $e){
								$LLB_Count=0;
							}							
						}
//Test  LLB_Key End
//Run Id Listbooks End
//into 						
						try{
							$AddListbooksSql="INSERT INTO `library_listbooks`(`LLB_Key`, `LLB_Time`, `Books_Key`, `LAd_No`, `Li_StatusNo`, `Li_DataTime`) 
										      VALUES ('{$LLB_Key}','{$Li_DataTime}','{$this->MDLL_Books_Key}','{$this->MDLL_LAd_No}','{$this->MDLL_StatusNo}','{$Li_DataTime}')";
							$CountLibrary->exec($AddListbooksSql);
							$ErrorMDLL="NotError";
							$ArrayMDLL[]="-";
						}catch(PDOException $e){
							$ErrorMDLL="Error";
							$ArrayMDLL[]="-";
						}		
//into End						
					break;
					case "UpDateLi":
//Update 						
						try{
							$UpListbooksSql="UPDATE `library_listbooks` SET `Li_StatusNo`='{$this->MDLL_StatusNo}',`LAd_No`='{$this->MDLL_LAd_No}',`Li_DataTime`='{$Li_DataTime}' WHERE `LLB_Key`='{$this->MDLL_LLB_Key}'";
							$CountLibrary->exec($UpListbooksSql);
							$ErrorMDLL="NotError";
							$ArrayMDLL[]="-";
						}catch(PDOException $e){
							$ErrorMDLL="Error";
							$ArrayMDLL[]="-";
						}		
//Update End					
					break;
					case "UpData":
//Update 						
						try{
							$UpListbooksSql="UPDATE `library_listbooks` SET `LLB_Time`='{$Li_DataTime}',`Books_Key`='{$this->MDLL_Books_Key}',`LAd_No`='{$this->MDLL_LAd_No}',`Li_StatusNo`='{$this->MDLL_StatusNo}',`Li_DataTime`='{$Li_DataTime}' WHERE `LLB_Key`='{$this->MDLL_LLB_Key}'";
							$CountLibrary->exec($UpListbooksSql);
							$ErrorMDLL="NotError";
							$ArrayMDLL[]="-";
						}catch(PDOException $e){
							$ErrorMDLL="Error";
							$ArrayMDLL[]="-";
						}		
//Update End					
					break;
					case "Delete":
						try{
							$DeleteListbooksSql="DELETE FROM `library_listbooks` WHERE `LLB_Key`='{$this->MDLL_LLB_Key}';";
							$CountLibrary->exec($DeleteListbooksSql);
							$ErrorMDLL="NotError";
							$ArrayMDLL[]="-";
						}catch(PDOException $e){
							$ErrorMDLL="Error";
							$ArrayMDLL[]="-";
						}
					break;
					case "RowArray":
						try{
							$LibraryListbooksSql="select * from `library_books` left join `library_listbooks` on (`library_books`.`Books_Key`=`library_listbooks`.`Books_Key`) 
												  where `library_listbooks`.`Books_Key`='{$this->MDLL_LLB_Key}' 
												  ORDER BY `library_listbooks`.`LLB_Key` ASC";
								if($LibraryListbooksRs=$CountLibrary->query($LibraryListbooksSql)){
									while($LibraryListbooksRow=$LibraryListbooksRs->Fetch(PDO::FETCH_ASSOC)){
										if(is_array($LibraryListbooksRow) && count($LibraryListbooksRow)){
											$ErrorMDLL="NotError";
											$ArrayMDLL[]=$LibraryListbooksRow;
										}else{
											$ErrorMDLL="Error";
											$ArrayMDLL[]="-";
										}
									}
								}else{
									$ErrorMDLL="Error";
									$ArrayMDLL[]="-";
								}
						}catch(PDOException $e){
							$ErrorMDLL="Error";
							$ArrayMDLL[]="-";
						}
					break;
					default:
						$ErrorMDLL="Error";
						$Arrayc[]="-";
				}
				
				if(isset($ErrorMDLL)){
					$this->ErrorMDLL=$ErrorMDLL;
				}else{}
				if(isset($LLB_Key)){
					$this->LLB_Key=$LLB_Key;
				}else{}
				if(isset($ArrayMDLL)){
					$this->ArrayMDLL=$ArrayMDLL;
				}else{}
		}function CallMLLError(){
			if(isset($this->ErrorMDLL)){
				return $this->ErrorMDLL;
			}else{}
		}function CallMLLLlb(){
			if(isset($this->LLB_Key)){
				return $this->LLB_Key;
			}else{}
		}function CallArrayMDLL(){
			if(isset($this->ArrayMDLL)){
				return $this->ArrayMDLL;
			}else{}
		}
	}
?>

<?php
	class MD_Ibrary_Subject{  //การจัดการ หัวข้อเรื่อง
		public $MDIS_Type,$MDIS_NO,$MDIS_Txt,$MDIS_Key;
		public $ErrorMDIS,$ArrayMDIS;
		function __construct($MDIS_Type,$MDIS_NO,$MDIS_Txt,$MDIS_Key){
			$this->MDIS_Type=$MDIS_Type;
			$this->MDIS_NO=$MDIS_NO;
			$this->MDIS_Txt=$MDIS_Txt;
			$this->MDIS_Key=$MDIS_Key;
			$ErrorMDIS="Error";
			$ArrayMDIS=array();
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();			
				switch($this->MDIS_Type){
					case "Add":
//Delete To The library_subject
				        /*try{
							$Delete_MDISSql="DELETE FROM `library_subject` WHERE `Books_Key`='{$this->MDIS_Key}'";
							$CountLibrary->exec($Delete_MDISSql);
						}catch(PDOException $e){}*/						
//Delete To The library_subject End				
						try{
							$MDIS_Sql="INSERT INTO `library_subject`(`Isu_No`, `Isu_Txt`, `Books_Key`) 
									   VALUES ('{$this->MDIS_NO}','{$this->MDIS_Txt}','{$this->MDIS_Key}')";
							$CountLibrary->exec($MDIS_Sql);
							$ErrorMDIS="NotError";
							$ArrayMDIS[]="-";
						}catch(PDOException $e){
							$ErrorMDIS="Error";
							$ArrayMDIS[]="-";
						}
						break;
					case "UPDATE":
						try{
							$MDIS_Sql="UPDATE `library_subject` 
									   SET `Isu_Txt`='{$this->MDIS_Txt}',`Books_Key`='{$this->MDIS_Key}' 
									   WHERE `Isu_No`='{$this->MDIS_NO}'";
							$CountLibrary->exec($MDIS_Sql);
							$ErrorMDIS="NotError";
							$ArrayMDIS[]="-";
						}catch(PDOException $e){
							$ErrorMDIS="Error";
							$ArrayMDIS[]="-";
						}					
						break;
					case "Read":
						try{
							$MDIS_readSql="SELECT `Isu_No`, `Isu_Txt`, `Books_Key` 
										   FROM `library_subject` 
										   WHERE `Books_Key`='{$this->MDIS_NO}'";
								if($MDIS_readRs=$CountLibrary->query($MDIS_readSql)){
									while($MDIS_readRow=$MDIS_readRs->Fetch(PDO::FETCH_ASSOC)){
										if(is_array($MDIS_readRow) && count($MDIS_readRow)){
											$ArrayMDIS[]=$MDIS_readRow;
											$ErrorMDIS="NotError";
										}else{
											$ArrayMDIS[]="-";
											$ErrorMDIS="Error";
										}
									}
								}else{
									$ArrayMDIS[]="-";
									$ErrorMDIS="Error";
								}
						}catch(PDOException $e){
							$ArrayMDIS[]="-";
							$ErrorMDIS="Error";
						}
						break;
					default:
						$ArrayMDIS[]="-";
						$ErrorMDIS="Error";
				}
				if(isset($ErrorMDIS,$ArrayMDIS)){
					$this->ErrorMDIS=$ErrorMDIS;
					$this->ArrayMDIS=$ArrayMDIS;
					$CountLibrary=null;
				}else{
					$CountLibrary=null;
				}
		}function RunMDIbrarySubject(){
			if(isset($this->ErrorMDIS)){
				return $this->ErrorMDIS;
			}else{}
		}function RunSubjectRow(){
			if(isset($this->ArrayMDIS)){
				return $this->ArrayMDIS;
			}else{}
		}
	}
?>




<?php
//BK=BookKey BN=BookName BA=BookALL  BL=Library -> $DBA_Type   LI=listbooks(All)
	class ReadDataBooksAll{
		public $DBA_Txt,$DBA_Type;
		public $DBA_ReadData,$DBA_ReadError;
		function __construct($DBA_Txt,$DBA_Type){
			$this->DBA_Txt=$DBA_Txt;
			$this->DBA_Type=$DBA_Type;
			$DBA_ReadData=array();
			$DBA_ReadError="Error";
			$PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();
				if($this->DBA_Type=="BK"){
					try{
						$DataBooksAllSql="SELECT * FROM `library_books` WHERE `Books_Key`='{$DBA_Txt}'";
							if($DataBooksAllRs=$CountLibrary->query($DataBooksAllSql)){
								while($DataBooksAllRow=$DataBooksAllRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($DataBooksAllRow) && count($DataBooksAllRow)){
										$DBA_ReadData[]=$DataBooksAllRow;
										$DBA_ReadError="NoError";
									}else{
										$DBA_ReadData="-";
										$DBA_ReadError="Error";
									}
								}
							}else{
								$DBA_ReadData="-";
								$DBA_ReadError="Error";
							}
					}catch(PDOException $e){
						$DBA_ReadData="-";
						$DBA_ReadError="Error";
					}
				}elseif($this->DBA_Type=="BN"){
					try{
						$DataBooksAllSql="SELECT * FROM `library_books` WHERE `Books_NameTh` LIKE '%{$DBA_Txt}%'";
							if($DataBooksAllRs=$CountLibrary->query($DataBooksAllSql)){
								while($DataBooksAllRow=$DataBooksAllRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($DataBooksAllRow) && count($DataBooksAllRow)){
										$DBA_ReadData[]=$DataBooksAllRow;
										$DBA_ReadError="NoError";
									}else{
										$DBA_ReadData="-";
										$DBA_ReadError="Error";
									}
								}
							}else{
								$DBA_ReadData="-";
								$DBA_ReadError="Error";
							}
					}catch(PDOException $e){
						$DBA_ReadData="-";
						$DBA_ReadError="Error";
					}					
				}elseif($this->DBA_Type=="BA"){
					try{
						$DataBooksAllSql="SELECT * FROM `library_books` ORDER BY `library_books`.`Books_Time` ASC";
							if($DataBooksAllRs=$CountLibrary->query($DataBooksAllSql)){
								while($DataBooksAllRow=$DataBooksAllRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($DataBooksAllRow) && count($DataBooksAllRow)){
										$DBA_ReadData[]=$DataBooksAllRow;
										$DBA_ReadError="NoError";
									}else{
										$DBA_ReadData="-";
										$DBA_ReadError="Error";
									}
								}
							}else{
								$DBA_ReadData="-";
								$DBA_ReadError="Error";
							}
					}catch(PDOException $e){
						$DBA_ReadData="-";
						$DBA_ReadError="Error";
					}					
				}elseif($this->DBA_Type=="BL"){
					try{
						$DataBooksAllSql="SELECT * FROM `library_books` right join `library_listbooks`on(`library_books`.`Books_Key`=`library_listbooks`.`Books_Key`)
									      where `library_listbooks`.`LLB_Key` = '{$this->DBA_Txt}';";
							if($DataBooksAllRs=$CountLibrary->query($DataBooksAllSql)){
								while($DataBooksAllRow=$DataBooksAllRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($DataBooksAllRow) && count($DataBooksAllRow)){
										$DBA_ReadData[]=$DataBooksAllRow;
										$DBA_ReadError="NoError";
									}else{
										$DBA_ReadData="-";
										$DBA_ReadError="Error";
									}
								}
							}else{
								$DBA_ReadData="-";
								$DBA_ReadError="Error";
							}
					}catch(PDOException $e){
						$DBA_ReadData="-";
						$DBA_ReadError="Error";
					}					
				}elseif(($this->DBA_Type=="LI")){
					try{
						$DataBooksAllSql="SELECT * FROM `library_listbooks` 
										  LEFT JOIN `library_books` ON (`library_listbooks`.`Books_Key`=`library_books`.`Books_Key`)
										  ORDER BY `library_listbooks`.`LLB_Key` ASC;";
							if($DataBooksAllRs=$CountLibrary->query($DataBooksAllSql)){
								while($DataBooksAllRow=$DataBooksAllRs->Fetch(PDO::FETCH_ASSOC)){
									if(is_array($DataBooksAllRow) && count($DataBooksAllRow)){
										$DBA_ReadData[]=$DataBooksAllRow;
										$DBA_ReadError="NoError";
									}else{
										$DBA_ReadData="-";
										$DBA_ReadError="Error";
									}
								}
							}else{
								$DBA_ReadData="-";
								$DBA_ReadError="Error";
							}
					}catch(PDOException $e){
						$DBA_ReadData="-";
						$DBA_ReadError="Error";
					}
				}else{
					$DBA_ReadData="-";
					$DBA_ReadError="Error";
				}
				
				if(isset($DBA_ReadData,$DBA_ReadError)){
					$this->DBA_ReadData=$DBA_ReadData;
					$this->DBA_ReadError=$DBA_ReadError;
					$CountLibrary=null;
				}else{
					$CountLibrary=null;
				}
				
		}function RunReadDataBooksAll(){
			if(isset($this->DBA_ReadData)){
				return $this->DBA_ReadData;
			}else{}
		}function RunReadDataBooksError(){
			if(isset($this->DBA_ReadError)){
				return $this->DBA_ReadError;
			}else{}
		}
	}

?>

