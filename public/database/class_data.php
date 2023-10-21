
<?php
	class  dateofbirthRS{
		public $birthdate;
		public $wyear,$wmonth,$wday,$ystr,$agestr;
		function __construct($birthdate){
			$this->birthdate=$birthdate;
			$today = date('d-m-Y');
			list($bday,$bmonth,$byear) = explode('-',$this->birthdate);
			list($tday,$tmonth,$tyear) = explode('-',$today);
				if($byear < 1970){
					$yearad = 1970 - $byear;
					$byear = 1970;
				}else{
					$yearad = 0;
				}
			$mbirth = mktime(0,0,0, $bmonth,$bday,$byear);
			$mtoday = mktime(0,0,0, $tmonth,$tday,$tyear);
			
			$mage = ($mtoday - $mbirth);
			$wyear = (date('Y', $mage)-1970+$yearad);
			$wmonth = (date('m', $mage)-1);
			$wday = (date('d', $mage)-1);
			
			$ystr = ($wyear > 1 ? " ปี" : " ปี");
			$mstr = ($wmonth > 1 ? " เดือน" : " เดือน");
			$dstr = ($wday > 1 ? " วัน" : " วัน");
			
			if(($wyear > 0 and $wmonth > 0 and $wday > 0)) {
				$agestr = $wyear.$ystr." ".$wmonth.$mstr." ".$wday.$dstr;
			}elseif(($wyear == 0 and $wmonth == 0 and $wday > 0)) {
				$agestr = $wday.$dstr;
				//$wyear=0;
				//$wmonth=0;
			}elseif(($wyear > 0 and $wmonth > 0 and $wday == 0)) {
				$agestr = $wyear.$ystr." ".$wmonth.$mstr;
				//$wday=0;
			}elseif(($wyear == 0 and $wmonth > 0 and $wday > 0)) {
				$agestr = $wmonth.$mstr." ".$wday.$dstr;
				//$wyear=0;
			}elseif(($wyear > 0 and $wmonth == 0 and $wday > 0)) {
				$agestr = $wyear.$ystr." ".$wday.$dstr;
				//$wmonth=0;
			}elseif(($wyear == 0 and $wmonth > 0 and $wday == 0)) {
				$agestr = $wmonth.$mstr;
				//$wyear=0;
				//$wday=0;
			}else {
				$agestr ="";
				//$wyear="";
				//$wmonth="";
				//$wday="";
			}
			$this->wyear=$wyear;
			$this->wmonth=$wmonth;
			$this->wday=$wday;
			$this->ystr=$ystr;
			$this->agestr=$agestr;
		}function __destruct(){
			$this->wyear;
			$this->wmonth;
			$this->wday;
			$this->ystr;
			$this->agestr;
		}
	}
?>

<?php
	class PrintReginaStuDataClass{//ข้อมูลนักเรียนราบบุคคลเบืองต้น คำหน้านามคำนวนจาก clsss
		public $studentid;
		public $age,$DataAge,$PRS_nameTH,$PRS_nameEH,$PRS_NTH,$PRS_nickTh,$PRS_nickEn,$PRS_status,$PRS_SudId,$birth,$PRS_home;
		function __construct($studentid){
			$this->studentid=$studentid;
//-------------------------------------------------------------------------			
			$regina_dataID=$_SERVER['REMOTE_ADDR'];
			$connect_data=new count_pdodata($regina_dataID);
			$pdodata_regina=$connect_data->call_pdodata();
//-------------------------------------------------------------------------			
			try{
				$PrintReginaStuClassSql="SELECT `rsc_class` FROM `regina_stu_class` WHERE `rsd_studentid` = '{$this->studentid}' ORDER BY `rsc_year` DESC;";
					if(($PrintReginaStuClassRs=$pdodata_regina->query($PrintReginaStuClassSql))){
						$PrintReginaStuClassRow=$PrintReginaStuClassRs->Fetch(PDO::FETCH_ASSOC);
							if((is_array($PrintReginaStuClassRow) && count($PrintReginaStuClassRow))){
								$rsc_class=$PrintReginaStuClassRow["rsc_class"];
							}else{
								$rsc_class="-";
							}
					}else{
						$rsc_class="-";
					}
			}catch(PDOException $e){
				$rsc_class="-";
			}
			
			try{
				$DataReginaSal="SELECT `rsd_studentid`,`rsd_Identification`, `rsd_name` ,`rsd_surname`,LOWER(`rsd_nameEn`) AS `rsd_nameEn`,LOWER(`rsd_surnameEn`) AS `rsd_surnameEn` ,`nickTh`,`nickEn`,`rse_home`,`rse_student_status` 
								FROM `regina_stu_data` 
								WHERE `rsd_studentid`='{$this->studentid}';";
					if(($DataReginaRs=$pdodata_regina->query($DataReginaSal))){
						$DataReginaRow=$DataReginaRs->Fetch(PDO::FETCH_ASSOC);
							if((is_array($DataReginaRow) && count($DataReginaRow))){
								
	//-------------------------------------------------------------------------				
								$regina_conndatastuID=$_SERVER['REMOTE_ADDR'];
								$connect_conndatastu=new count_conndatastu($regina_conndatastuID);
								$pdoconndatastu_regina=$connect_conndatastu->call_coun_conndatastu();
	//-------------------------------------------------------------------------		
									try{
										$RcStuBirthSql="SELECT `stu_birth` FROM `data_student` WHERE `stu_id`='{$this->studentid}';";
											if(($RcStuBirthRs=$pdoconndatastu_regina->query($RcStuBirthSql))){
												$RcStuBirthRow=$RcStuBirthRs->Fetch(PDO::FETCH_ASSOC);
													if((is_array($RcStuBirthRow) && count($RcStuBirthRow))){
														if(($RcStuBirthRow["stu_birth"]!=null)){
															$data_birth=new dateofbirthRS(date("d-m-Y",strtotime($RcStuBirthRow["stu_birth"])));
															$DataAge=$data_birth->agestr;
															$birth=$RcStuBirthRow["stu_birth"];
															$age=$data_birth->wyear;															
														}else{
															$age="-";
															$DataAge="-";
															$birth="-";															
														}
													}else{
														$age="-";
														$DataAge="-";
														$birth="-";
													}
											}else{
												$age="-";
												$DataAge="-";
												$birth="-";
											}	
									}catch(PDOException $e){
										$age="-";
										$DataAge="-";
										$birth="-";
									}
	//-------------------------------------------------------------------------	
								
								if((is_numeric($age))){
									if(($age>=0 and $age<=14)){
										$PRS_nameTH="เด็กหญิง"."&nbsp;".$DataReginaRow["rsd_name"]."&nbsp;".$DataReginaRow["rsd_surname"];									
									}elseif(($age>=15)){
										$PRS_nameTH="นางสาว"."&nbsp;".$DataReginaRow["rsd_name"]."&nbsp;".$DataReginaRow["rsd_surname"];									
									}else{
										if(($rsc_class>=3 and $rsc_class<=33)){
											$PRS_nameTH="เด็กหญิง"."&nbsp;".$DataReginaRow["rsd_name"]."&nbsp;".$DataReginaRow["rsd_surname"];
										}elseif(($rsc_class>=41 and $rsc_class<=43)){
											$PRS_nameTH="นางสาว"."&nbsp;".$DataReginaRow["rsd_name"]."&nbsp;".$DataReginaRow["rsd_surname"];
										}else{
											$PRS_nameTH=$DataReginaRow["rsd_name"]."&nbsp;".$DataReginaRow["rsd_surname"];
										}									
									}									
								}else{
							
									if(($rsc_class>=3 and $rsc_class<=33)){
										$PRS_nameTH="เด็กหญิง"."&nbsp;".$DataReginaRow["rsd_name"]."&nbsp;".$DataReginaRow["rsd_surname"];
									}elseif(($rsc_class>=41 and $rsc_class<=43)){
										$PRS_nameTH="นางสาว"."&nbsp;".$DataReginaRow["rsd_name"]."&nbsp;".$DataReginaRow["rsd_surname"];
									}else{
										$PRS_nameTH=$DataReginaRow["rsd_name"]."&nbsp;".$DataReginaRow["rsd_surname"];
									}										
								}
								
									$PRS_nameEH=strtolower("Miss"." ".$DataReginaRow["rsd_nameEn"]." ".$DataReginaRow["rsd_surnameEn"]);
									$PRS_nameEH=ucwords($PRS_nameEH);
									$PRS_NTH=$DataReginaRow["rsd_name"]."&nbsp;".$DataReginaRow["rsd_surname"];
									$PRS_nickTh=$DataReginaRow["nickTh"];
									$PRS_nickEn=strtolower($DataReginaRow["nickEn"]);
									$PRS_nickEn=ucwords($PRS_nickEn);
									$PRS_home=$DataReginaRow["rse_home"];
									$PRS_status=$DataReginaRow["rse_student_status"];
									$PRS_SudId=$DataReginaRow["rsd_studentid"];
									
							}else{
								$PRS_nameTH="-";
								$PRS_nameEH="-";
								$PRS_NTH="-";
								$PRS_nickTh="-";
								$PRS_nickEn="-";
								$PRS_home="-";
								$PRS_status="-";
								$PRS_SudId="-";
							}
					}else{
						$PRS_nameTH="-";
						$PRS_nameEH="-";
						$PRS_NTH="-";
						$PRS_nickTh="-";
						$PRS_nickEn="-";
						$PRS_home="-";
						$PRS_status="-";
						$PRS_SudId="-";
					}
			}catch(PDOException $e){
				$PRS_nameTH="-";
				$PRS_nameEH="-";
				$PRS_NTH="-";
				$PRS_nickTh="-";
				$PRS_nickEn="-";
				$PRS_home="-";
				$PRS_status="-";
				$PRS_SudId="-";
			}
			@$this->age=$age;
			$this->PRS_home=$PRS_home;
			@$this->birth=$birth;
			@$this->DataAge=$DataAge;
			$this->PRS_nameTH=$PRS_nameTH;
			$this->PRS_nameEH=$PRS_nameEH;
			$this->PRS_NTH=$PRS_NTH;
			$this->PRS_nickTh=$PRS_nickTh;		
			$this->PRS_nickEn=$PRS_nickEn;
			$this->PRS_status=$PRS_status;
			$this->PRS_SudId=$PRS_SudId;	
			$pdodata_regina=null;
		}function __destruct(){
			$this->age;
			$this->PRS_home;
			$this->birth;
			$this->DataAge;
			$this->PRS_nameTH;
			$this->PRS_nameEH;
			$this->PRS_NTH;
			$this->PRS_nickTh;		
			$this->PRS_nickEn;
			$this->PRS_status;
			$this->PRS_SudId;
		}	
	}

?>





<?php
	class PrintReginaYear{//ข้อมูลนักเรียนราบบุคคลเบืองต้นรายปี/เทอม เรียงเลขที่
		public $PRSC_year,$PRSC_term;
        public$ReginaStuClassArray;
		function __construct($PRSC_year,$PRSC_term){
//-------------------------------------------------------------------------
		$this->PRSC_year=$PRSC_year;
		$this->PRSC_term=$PRSC_term;
		//$this->PRSC_class=$PRSC_class;
		//$this->PRSC_room=$PRSC_room;
//-------------------------------------------------------------------------
		$ReginaStuClassArray=array();
//-------------------------------------------------------------------------
		$regina_dataID=$_SERVER['REMOTE_ADDR'];
		$connect_data=new count_pdodata($regina_dataID);
		$pdodata_regina=$connect_data->call_pdodata();			
//-------------------------------------------------------------------------			
			try{
				$PRSC_Sql="SELECT `rsc_roomid`, `rsc_year`, `rsc_term`, `rsc_plan`, `rsc_class`, `rsc_room`, `rsc_num` ,`rsc_update`, `rsd_studentid`, `rsc_status`, `rsc_txt`
						   FROM `regina_stu_class` 
						   WHERE `rsc_year`='{$this->PRSC_year}' 
						   AND `rsc_term`='{$this->PRSC_term}'
						   ORDER BY `regina_stu_class`.`rsc_class` ASC";
					if($PRSC_Rs=$pdodata_regina->query($PRSC_Sql)){
						while($PRSC_Row=$PRSC_Rs->Fetch(PDO::FETCH_ASSOC)){
							if(is_array($PRSC_Row) && count($PRSC_Row)){
								$ReginaStuClassArray[]=$PRSC_Row;
							}else{
								$ReginaStuClassArray="-";
							}
						}
					}else{
						$ReginaStuClassArray="-";
					}				
			}catch(PDOException $e){
				$ReginaStuClassArray="-";
			}
				if(isset($ReginaStuClassArray)){
					$this->ReginaStuClassArray=$ReginaStuClassArray;
					$pdodata_regina=null;
				}else{
					$pdodata_regina=null;
				}
		}function RunReginaStuClass(){
			if(isset($this->ReginaStuClassArray)){
				return $this->ReginaStuClassArray;
			}else{
				//-------------------------
			}
		}	
	}	

?>




<?php
	class PrintLavaL{
		public $PL_key;
        public $LavaTh,$LavaEh,$LavaTxt;
		function __construct($PL_key){
//-------------------------------------------------------------------------
			$this->PL_key=$PL_key;
//-------------------------------------------------------------------------		
			switch($this->PL_key){
				case 3:
					$LavaTh="อ.3";
					$LavaTxt="อนุบาล 3";
					$LavaEh="K3";
				break;
				case 11:
					$LavaTh="ป.1";
					$LavaTxt="ประถมศึกษาปีที่ 1";
					$LavaEh="P1";
				break;			
				case 12:
					$LavaTh="ป.2";
					$LavaTxt="ประถมศึกษาปีที่ 2";
					$LavaEh="P2";
				break;				
				case 13:
					$LavaTh="ป.3";
					$LavaTxt="ประถมศึกษาปีที่ 3";
					$LavaEh="P3";
				break;				
				case 21:
					$LavaTh="ป.4";
					$LavaTxt="ประถมศึกษาปีที่ 4";
					$LavaEh="P4";
				break;				
				case 22:
					$LavaTh="ป.5";
					$LavaTxt="ประถมศึกษาปีที่ 5";
					$LavaEh="P5";
				break;				
				case 23:
					$LavaTh="ป.6";
					$LavaTxt="ประถมศึกษาปีที่ 6";
					$LavaEh="P6";
				break;				
				case 31:
					$LavaTh="ม.1";
					$LavaTxt="มัธยมศึกษาปีที่ 1";
					$LavaEh="S1";
				break;				
				case 32:
					$LavaTh="ม.2";
					$LavaTxt="มัธยมศึกษาปีที่ 2";
					$LavaEh="S2";
				break;				
				case 33:
					$LavaTh="ม.3";
					$LavaTxt="มัธยมศึกษาปีที่ 3";
					$LavaEh="S3";
				break;				
				case 41:
					$LavaTh="ม.4";
					$LavaTxt="มัธยมศึกษาปีที่ 4";
					$LavaEh="S4";
				break;				
				case 42:
					$LavaTh="ม.5";
					$LavaTxt="มัธยมศึกษาปีที่ 5";
					$LavaEh="S5";
				break;				
				case 43:
					$LavaTh="ม.6";
					$LavaTxt="มัธยมศึกษาปีที่ 6";
					$LavaEh="S6";
				break;
				default:
					$LavaTxt=null;
					$LavaTh=null;
					$LavaEh=null;
			}
			if(isset($LavaTh,$LavaEh,$LavaTxt)){
				$this->LavaTh=$LavaTh;
				$this->LavaEh=$LavaEh;
				$this->LavaTxt=$LavaTxt;
			}else{
				//--------------------
			}
		}function RunPrintLavaL(){
			if(isset($this->LavaTh)){
				return $this->LavaTh;
			}else{}
		}function RunPrintLavaEh(){
			if(isset($this->LavaEh)){
				return $this->LavaEh;
			}else{}
		}function RunprintLavaTxtTh(){
			if(isset($this->LavaTxt)){
				return $this->LavaTxt;
			}else{}
		}
	}

?>