<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");

	$Department='';
	$process=false;
	$DateType='';	
	$DateTypeID='';	
	$CalDate='';	
	$TotWorkingHours =0;
	$OTHoursx ='';
	$Late='';
	
	$DayOff='';
	$Auser='';
	$Terminal='';
	$WorkinDay='';
	$TotWorkingHours=0;
	$PayCut='';
	$DoubleOT='';
	$LateCount='';
	$TotalLate='';
	$PayCutEvenin='';
	$SundayAllownce='';
	$Datex='';
	$DateType='';
	$EmpDailyRate='';
	$TotalQTY='';
	$SaturdayQTY='';
	$SundayOT='';
	
	
	$ID='';						$Datex='';				$NewInDate='';
	$EMPDate='';				$EmpTime='';			$EMPCode='';
	$EmployeeID='';				$InDateTime='';			$DateType='';
	$OutDateTime='';			$DayOff='';				$NewInDate ='' ;
    $NewOutDate ='' ;     		$OT = '';
    $Late ='';    				$Auser ='' ;    		$MUser ='' ;
    $Terminal ='';    			$WorkinDay ='' ;    	$PayCut ='' ;
    $DoubleOT ='';    			$LateCount = 0;    	$TotalLate = '';
    $PayCutEvenin ='' ;    		$SundayAllownce = '';   $DataX = '';
    $DateType = '';    			$EmpDailyRate ='';    	$TotalQTY = '';
    $SundayOT = '';    			$SaturdayQTY = '';    	$TimeIn = '';
    $TimeOut = '';    			$WorkingHours = '';    	$PSDayType = '';
    $SundayWorkingDay = ''; 	$PoyaDayWorking = '';   $Rate = '';
    $RateID = '';    			$AttDate = '';    		$EmployeeType = '';
    $TWorkingMin = '';    		$QTY ='';				$EmployeeCode ='';	
	$CalDate='';				$AttendanceID='';		$RowDateType='';
	$OTHoursxm = '';            $RecCount = 0;          $process = '';
	$DayOffOTHours = '';		$DateCount_ = 0;		$DateCountTot = 0;
	$LateSum=0;
	
	$EmployeeID='';				$InDateTime='';				$OutDateTime='';
	$DayOff='';					$OT='';						$Late='';
	$Auser='';					$Muser='';					$Terminal='';
	$WorkinDay='';				$WorkingHours='';			$PayCut='';
	$DoubleOT='';				$LateCount='';				$TotalLate='';
	$PSDayType='';				$PayCutEvenin='';			$OnlyDate='';
	$SundayAllownce='';			$DateType='';				$EmpDailyRate='';
	$TotalQTY='';				$SaturdayQTY='';			$SundayWorkingDay='';
	$SundayOT='';				$PoyaDayWorking='';			$EmployeeID_L='';
	$SundayOT='';				$PoyaDayWorking='';			$EmployeeID_DOf='';
	$SaturdayAllowence='';		$TrnDate='';				$SundayAllow ='';
	$LeaveDays=0;				$EmployeeID_Ab = '';		$NotEmptyRecords=0;
	$OTHoursxmS =0; 			$OTHoursxmD=0;				$IDWorDay_AllHoursDOT =0;
	$IDWorDay_AllHoursOT=0;		$IDAddiHours_DOT=0;			$PayEHoursxmP='';
	$PayEhours='';		        $PayEminutes='';

	$EmployeeID = '';          		
	$InDateTime = '';          		
	$OutDateTime = '';         		
	$DayOff = '';              		
	$OT = 0;                   		
	$DoubleOT = 0;             		
	$Late = 0;                 		
	$UserID = '';              		
	$Terminal = '';            		
	$WorkinDay = 0;            		
	$WorkingHours = 0;         		
	$PayCut = 0;               		
	$LateCount = 0;            		
	$TotalLate = 0;            		
	$PSDayType = '';           		
	$PayCutEvenin = 0;         		
	$OnlyDate = '';            		
	$SundayAllow = 0;          		
	$DateType = '';            		
	$SaturdayAllowence = 0;    		
	$EmpDailyRate = 0.0;       		
	$QTY = 0;                  		
	$SaturdayQTY = 0;          		
	$SundayOT = 0;             		
	$SundayWorkingDay = 0;     		
	$PoyaDayWorking = 0;       		
	$OnlyDate = '';            		
	
	if(isset($_POST["Insert_cmbDepartment"]))
	{
	    //Get variable
		$Department=$_POST["Insert_cmbDepartment"];
		
		$queryF="SELECT `EMPDate` FROM `empattendance` WHERE `Status`='0'";
		$resultF = $db_handle->runQuery($queryF);
		if(empty($resultF)) {
			$NotEmptyRecords=1;
		
			?>
			<input type="text" hidden id="txtNotEmptyRecords" name="txtNotEmptyRecords" value="<?php echo $NotEmptyRecords;?>"class="field-divided6"/>
			<?php
		}
		else{
			$NotEmptyRecords=0;
			
			?>
			<input type="text" hidden id="txtNotEmptyRecords" name="txtNotEmptyRecords" value="<?php echo $NotEmptyRecords;?>"class="field-divided6"/>
			<?php
		}
		
		
		
		if($NotEmptyRecords=='0'){
			
		
		//Delete Data from TmpDayRowData
			$query ="Delete from TmpDayRowData ";
			$result = $db_handle->DeleteQuery($query);
			
			$query="SELECT `empattendance`.`EMPCode`,`empattendance`.`EMPDate` FROM EmpAttendance 
					INNER JOIN Employee ON EmpAttendance.EMPCode = Employee.EmployeeCode 
					WHERE (EmpAttendance.Status = 0)
					group by `empattendance`.`EMPCode`, `empattendance`.`EMPDate`";
			$result = $db_handle->runQuery($query);
			
			if(!empty($result)) {
				foreach ($result as $r1) {
					$EMPCode=$r1['EMPCode'];
					$EMPDate=$r1['EMPDate'];
				
					$query="SELECT EmpAttendance.EMPCode, Count(`empattendance`.`ID`) As RecCount,
							EmpAttendance.ID
							FROM EmpAttendance 
							INNER JOIN Employee ON EmpAttendance.EMPCode = Employee.EmployeeCode 
							WHERE (EmpAttendance.Status = 0) AND (EmpAttendance.EMPDate = '$EMPDate') 
							AND (EmpAttendance.EMPCode = '$EMPCode')";
					$result = $db_handle->runQuery($query);
					
					if(!empty($result)) {
						foreach ($result as $r1) {
							$RecCount=$r1['RecCount'];
					
							if($RecCount!= 2){
								$process = true;
							}
						}
					}
				}
			}
			
			$query="SELECT * FROM `contolfile` ";
			$result = $db_handle->runQuery($query);
			if (!empty($result)) {
				foreach ($result as $r1) {
					$PayYear = $r1['PayYear'];
					$PayMonth = $r1['PayMonth'];
				}
			}
			
			// Get the number of days in the month
			$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $PayMonth, $PayYear);
			
			
			if($process!=true){
				for ($i = 1; $i <= $daysInMonth; $i++) {
					// Pad the day with leading zeros (e.g., 1 becomes 01)
					$dtpDatecount = str_pad($i, 2, '0', STR_PAD_LEFT);
					$actualdate = $PayYear . '-' . $PayMonth . '-' . $dtpDatecount;
					
					// Run the query for each day of the month
					echo $query = "SELECT EmpAttendance.EMPCode, EmpAttendance.EMPDate, EmpAttendance.EmpTime,
									 EmpAttendance.InOut, EmpAttendance.Status, EmpAttendance.ID, EmpAttendance.DateType 
							  FROM EmpAttendance 
							  INNER JOIN Employee ON EmpAttendance.EMPCode = Employee.EmployeeID
							  WHERE (EmpAttendance.Status = 0) AND (EmpAttendance.EMPDate = '$actualdate') 
							  ORDER BY EmpAttendance.EMPDate, EmpAttendance.EMPCode, EmpAttendance.EmpTime";
					$result = $db_handle->runQuery($query);
					//Attend employees
						if(!empty($result)) {
							foreach ($result as $rowDep1) {
								$EMPCode=$rowDep1["EMPCode"];
								$DateType1=$rowDep1["DateType"];
								$AttendanceID=$rowDep1["ID"];
								$EMPDate=$rowDep1["EMPDate"];
								$EmpTime=$rowDep1["EmpTime"];
								$InOut=$rowDep1["InOut"];
								$EMPCode=$rowDep1["EMPCode"];
								$EmployeeID=$rowDep1["EMPCode"];
								
								$query22="SELECT EmployeeID,EmployeeCode FROM Employee WHERE (EmployeeCode = '$EMPCode')";
								$result1 = $db_handle->runQuery($query22);
								if(!empty($result1)) {
									foreach ($result1 as $rowDep11) {
										$EmployeeID=$rowDep11["EmployeeID"];	
									}
								}
								
								$query1 = "SELECT Calander.CalDate, DateType.DateType, calander.CalDateType
										FROM DateType 
										INNER JOIN Calander ON DateType.ID = Calander.CalDateType 
										WHERE Calander.CalDate='$EMPDate'";
								$result1 = $db_handle->runQuery($query1); 
								if(!empty($result1)){
									foreach ($result1 as $r) {
										$DateType=$r['DateType'];	
										$DateTypeID=$r['CalDateType'];	
										$CalDate=$r['CalDate'];	
										
										// $query_PayADO="SELECT ID_Sunday, ID_Saturday, ID_Poyaday FROM `nwsystems_pay`";
										// $result_PayADO= $db_handle->runQuery($query_PayADO);
										// if(!empty($result_PayADO)){
											// foreach ($result_PayADO as $r_OT) {
												// $ID_Sunday = $r_OT["ID_Sunday"];
												// $ID_Saturday = $r_OT["ID_Saturday"];
												// $ID_Poyaday = $r_OT["ID_Poyaday"];
											// }
										// }
										
										// if ($DateTypeID==$ID_Sunday){
											// $DateType = 'Sunday';
											
										// }else if($DateTypeID==$ID_Saturday){
											// $DateType = 'Saturday';
											
										// }else if($DateTypeID==$ID_Poyaday){
											// $DateType = 'Poya day';
										// }
									}
								}
								
								//Add to TmpDayRowData	 
								$query1 ="Select * from TmpDayRowData 
									Where EmployeeID = '$EmployeeID' 
									AND Datex = '$EMPDate' 
									ORDER BY ID";
								$result1 = $db_handle->runQuery($query1);
								if($result1 instanceof mysqli_result && $result1->num_rows > 0){
									foreach ($result1 as $r1) {
										$ID =  $r1["ID"];
										
										if($InOut==1){
											$query ="UPDATE `TmpDayRowData` SET 
													`NEWINDATE` = '$EmpTime', `Datex`='$EMPDate', `DateType`='$DateType' 
													 Where `ID`='$ID'";
											$result = $db_handle->updateQuery($query);
										}else{
											$query ="UPDATE `TmpDayRowData` SET 
													`NewOutDate` = '$EmpTime',`Datex`='$EMPDate' , `DateType`='$DateType' 
													Where `ID`='$ID'";
											$result = $db_handle->updateQuery($query);
										}
				
									}	
								}else{
									
									if($InOut==1){
										$query ="INSERT INTO TmpDayRowData(`EmployeeID`,`NEWINDATE`,`Datex`,`InDateTime`,`DateType`)
												VALUES('$EmployeeID', '$EmpTime','$EMPDate','$EMPDate','$DateType' )";
										$result = $db_handle->insertQuery($query);
									}else{
										$query ="INSERT INTO TmpDayRowData(`EmployeeID`,`NewOutDate`,`Datex`,`InDateTime`,`DateType`)
												VALUES('$EmployeeID', '$EmpTime','$EMPDate','$EMPDate','$DateType')";
										$result = $db_handle->insertQuery($query);
									}
									
								}
								
								$DateType='';
								$queryUpdate = "UPDATE EmpAttendance SET  Status = 1 WHERE ID = '$AttendanceID'";
								//$result = $db_handle->updateQuery($queryUpdate);	
							}
						}
						
				}
			}	
						
						
						
						
			// Delete data from RowDataDayEND table  ABCD 
			$query ="Delete from RowDataDayEND";
			$result = $db_handle->DeleteQuery($query);
			
			$query ="Select  `tmpdayrowdata`.`EmployeeID`, `tmpdayrowdata`.`InDateTime`, 
					`tmpdayrowdata`.`NEWINDATE`, `tmpdayrowdata`.`NEWOUTDATE`, `tmpdayrowdata`.`Datex`,
					`tmpdayrowdata`.`DateType` 
					from TmpDayRowData 
					Order By TmpDayRowData.EmployeeID,`tmpdayrowdata`.`ID`";  
			$result = $db_handle->runQuery($query);
				
			if(!empty($result)){
				foreach ($result as $r) {
					$EmployeeID = $r["EmployeeID"];
					$EmpTime = $r["NEWINDATE"];
					$OutDateTime = $r["NEWOUTDATE"];
					$DateType = $r["DateType"];
					$Datex = $r["Datex"];
					
					// if($InDateTime!=''){
						// $strDateVal=$InDateTime;		
					// }elseif($OutDateTime!=''){
						// $strDateVal=$OutDateTime;							
						
					// }
					
					$query="INSERT INTO RowDataDayEND(EmployeeID ,InDateTime,OutDateTime,DayOff,OT,Late,Auser, Terminal,
							WorkinDay,WorkingHours,PayCut, DoubleOT,LateCount,TotalLate,PayCutEvenin,SundayAllownce, 
							DataX,DateType,EmpDailyRate,TotalQTY,SaturdayQTY,SundayOT) 
							VALUES ('$EmployeeID','$EmpTime','$OutDateTime','$DayOff','$OTHoursx','$Late','$Auser', '$Terminal',
							'$WorkinDay','$TotWorkingHours','$PayCut','$DoubleOT','$LateCount','$TotalLate','$PayCutEvenin',
							'$SundayAllownce','$Datex','$DateType','$EmpDailyRate','$TotalQTY','$SaturdayQTY','$SundayOT')";	
					$result = $db_handle->insertQuery($query);	
					
				}
			}
						
						
						
			//Absent employee Records
			$query ="Select  `tmpdayrowdata`.`EmployeeID`, `tmpdayrowdata`.`Datex`
					from TmpDayRowData 
					Order By TmpDayRowData.EmployeeID,`tmpdayrowdata`.`ID`";  
			$result = $db_handle->runQuery($query);
			if(!empty($result)){
				foreach ($result as $r) {
					$Datex = $r["Datex"];
							
					$queryAb="SELECT Employee.EmployeeID, Employee.FirstName
						  From Employee
						  WHERE (((Employee.EmployeeID) Not In (select EmployeeID 
						  From RowDataDayEnd 
						  WHERE DataX='$Datex')) 
						  AND ((Employee.Status)=0 ))
						  ORDER BY (Employee.EmployeeID)"; //AND ((Employee.TempInactive)=0) 
						  
					$resultAb = $db_handle->runQuery($queryAb);
					if(!empty($resultAb)){
						foreach ($resultAb as $rA) {
							$EmployeeID_Ab = $rA["EmployeeID"];
							
							//Check Leave
							$queryr="SELECT `EmployeeID` FROM `leavetaken` 
									WHERE `FromDate` ='$Datex' 
									and `EmployeeID`='$EmployeeID_Ab'";
							$resultr = $db_handle->runQuery($queryr);
							if(empty($resultr)){
						
								//Check Day Off
								// $queryL="SELECT `EmployeeID` FROM `rowdayoff` 
										// WHERE `RowDate` = '$Datex' 
										// AND `EmployeeID` = '$EmployeeID_Ab'";
								// $resultL = $db_handle->runQuery($queryL);
								// if(empty($resultL)){
									
									//Factory Leave
									// $queryF="SELECT * FROM `factortleave` 
											// WHERE `LeaveDate` = '$Datex'";
									// $resultF = $db_handle->runQuery($queryF);
									// if(empty($resultF)){
							
										//Check Duplicate Records
										$queryL="SELECT EmployeeID FROM `absentemployeerecords` 
											WHERE `AbsentDate` = '$Datex' 
											AND `EmployeeID` = '$EmployeeID_Ab'";
										$resultL = $db_handle->runQuery($queryL);
										if(empty($resultL)){
											
											//Insert Absent Records
											$queryABS= "INSERT INTO `absentemployeerecords`(`EmployeeID`, `AbsentDate`) 
														VALUES ('$EmployeeID_Ab','$Datex')";
											$resultABS = $db_handle->insertQuery($queryABS);	
										}
									//}
								//}
							}
						}
					}
				}
			}
			
			
			
			
			//---------------------------------------------------------------------------------------------------------------->
			$LateCount = 0;
			//Get Data from RowDataDayEND table----------2
			$query45="SELECT EmployeeID, DataX, COUNT(*) AS RecCount 
					FROM RowDataDayEND 
					GROUP BY EmployeeID, DataX";
			$result = $db_handle->runQuery($query45);
			
			if(!empty($result)){
				foreach ($result as $r) {
					$EmployeeID = $r["EmployeeID"];
					$DateX = $r["DataX"];
					$DateX2 = $r["DataX"];
					$EmpRecCount = $r["RecCount"];
					
				
					$query1="SELECT  EmployeeCode,BasicSalary 
							From Employee 
							WHERE EmployeeID = '$EmployeeID'"; //FactoryEmploye,TempEmployee,NoOt
					$result1 = $db_handle->runQuery($query1);
				
					if(!empty($result1)){
						foreach ($result1 as $r1) {
							$BasicSalary = $r1["BasicSalary"];
							//$EmployeeType = $r1["TempEmployee"];
							//$NoOt =  $r1["NoOt"];
						}
					}else{
						$BasicSalary = 0;
						$EmployeeType = '';
						$NoOt = 0;
					}
					
					$xxx = 0;						$Late = 0;					$LateEve = 0;
					$DayOff = 0;					$OTHours = 0;				$dblMinuts = 0;
					$WorkingHours = 0;				$DoubleOT = 0;				$TWorkingHours = 0;
					$TWorkingMin = 0;				$WorkingMin = 0;			$WorkingDay = 0;
					$TotalLate = 0;												$PayCut = 0;
					$PSDayType = 0;					$PayCutEve = 0;				$SundayOT = 0;
					$TWorkingHoursx = 0;			$SundayWorkingDay = 0;		$PoyaDayWorking = 0;
					$DefTime = 0;					$WorkingDays = 0;           $PayCutTemp = 0;
					$isTransPort = 0;            	$isInsentive = 0;           $isSecurity	= 0;
					$isHolidayInsentive = 0;		$OutTime = 0;				$Count_Late=0;
					$OTminutes=0;					$OThours=0;					$LateMinutes = 0;
					$LateHours = 0;					$DateCount = 0;				$IsLateDate=0;				
					$DateCountX	= 0;				$OutDateTime='';			$InDateTime='';
					$RowDateType='';				$OT_Hours=0;
								
					$query="SELECT `ID`, `EmployeeID`, `InDateTime`, `OutDateTime`, `DataX`,
							`DateType`
							FROM RowDataDayEND 
							WHERE `EmployeeID` ='$EmployeeID' 
							AND `DataX` ='$DateX2' 
							ORDER BY `ID`";
					$result= $db_handle->runQuery($query);
					if(!empty($result)){
						foreach ($result as $r) {
							$EmployeeID = $r["EmployeeID"];
							$DateXX = $r["DataX"];
							$ID = $r["ID"];
							$OutDateTime = $r["OutDateTime"];
							$InDateTime = $r["InDateTime"];
							$RowDateType = $r["DateType"];

							// echo '<br>=== ' . $OutDateTime;
							// echo '<br>=== ' . $InDateTime;

							$inDateTimeObj = new DateTime($InDateTime);
							$outDateTimeObj = new DateTime($OutDateTime);
							$interval = $inDateTimeObj->diff($outDateTimeObj);

							$days = $interval->days;
							$hours = $interval->h;
							$minutes = $interval->i;

							//$totalHours = ($days * 24) + $hours;
							$totalMinutes = $minutes;

							if ($totalMinutes >= 60) {
								$additionalHours = intdiv($totalMinutes, 60);
								$totalHours += $additionalHours;
								$totalMinutes = $totalMinutes % 60;
							}

							//echo '<br>=== Time Difference: ' . $totalHours . ' hours and ' . $totalMinutes . ' minutes';

							if ($hours >= 6) {
								$WorkinDay = 1;
							} elseif ($hours >= 4) {
								$WorkinDay = 0.5;
							} else {
								$WorkinDay = 0;
							}

							// OT Calculation
							$OT_Hours = 0;
							if ($hours > 9) {
								$OT_Hours = $hours - 9;
							} else {
								$OT_Hours = 0;
							}

							//echo '<br>=== Overtime Hours: ' . $OT_Hours;

							
							//Late hours
							$LateHours=0;
							$DoubleOT=0;
							$TotalLate=0;
							$TotalLate=0;
							$TotalMEPayCutLate=0;
							$PayCut=0;
							$PSDayType=0;
							$PayCutEvenin=0;
							$SundayAllownce=0;
							$SundayWorkingDay=0;
							$SundayOT=0;
							$PoyaDayWorking=0;
							
							$query21="UPDATE `RowDataDayEND` SET 
									`DayOff`='$DayOff',`OT`='$OT_Hours',`DoubleOT`='$DoubleOT', `Late`='$TotalLate',
									`WorkingHours`='$hours',`WorkinDay`='$WorkinDay', `TotalLate`='$TotalMEPayCutLate',
									 `PayCut`='$PayCut', `PSDayType`='$PSDayType',
									`PayCutEvenin`='$PayCutEvenin',`SundayAllownce`='$SundayAllownce', 
									`SundayWorkingDay`='$SundayWorkingDay',`SundayOT`='$SundayOT', 
									`PoyaDayWorking`='$PoyaDayWorking' Where `ID`='$ID'";
							$result = $db_handle->updateQuery($query21);
							
							$OTHoursx=0;
							$OTHoursxm=0;
							$PayCut_Process=0;
							$TotalLate=0;
							$PayCutEvenin=0;
							$TotalMEPayCutLate=0;
							
							
						}	
					}	
						
				
		
			
				}
			}

			$query111 = "Delete from RowDataTestedDayEnd";
			$result1 = $db_handle->deleteQuery($query111);
				
			$query3 = "Select * from RowDataDayEND";
			$result3 = $db_handle->runQuery($query3); 
			if(!empty($result3)){
				foreach ($result3 as $r) {
					$InDateTime=$r['InDateTime'];
					$OutDateTime=$r['OutDateTime'];	
					$EmployeeID=$r['EmployeeID'];	
					$DayOff=$r['DayOff'];	
					echo '<br><br>****'.$OT=$r['OT'];	
					$Late=$r['Late'];	
					$Auser=$r['Auser'];	
					$MUser=$r['MUser'];	
					$Terminal=$r['Terminal'];	
					$WorkinDay=$r['WorkinDay'];	
					$WorkingHours=$r['WorkingHours'];	
					$PayCut=$r['PayCut'];	
					$DoubleOT=$r['DoubleOT'];	
					$LateCount=$r['LateCount'];	
					$TotalLate=$r['TotalLate'];	
					$PSDayType=$r['PSDayType'];	
					$PayCutEvenin=$r['PayCutEvenin'];	
					$SundayAllownce=$r['SundayAllownce'];	
					$DateType=$r['DateType'];	
					$EmpDailyRate=$r['EmpDailyRate'];	
					$TotalQTY=$r['TotalQTY'];	
					$SaturdayQTY=$r['SaturdayQTY'];	
					$SundayWorkingDay=$r['SundayWorkingDay'];	
					$SundayOT=$r['SundayOT'];	
					$PoyaDayWorking=$r['PoyaDayWorking'];	
					$OnlyDate=$r['InDateTime'];
					
					
					$query ="INSERT INTO RowDataTestedDayEnd(EmployeeID, InDateTime, OutDateTime, DayOff, OT, DoubleOT, 
							Late, Auser, MUser, Terminal, WorkinDay, WorkingHours, PayCut, LateCount, TotalLate,
							PSDayType,PayCutEvenin, OnlyDate, SundayAllownce, DateType,SaturdayAllowence, EmpDailyRate,
							TotalQTY, SaturdayQTY, SundayOT,SundayWorkingDay,PoyaDayWorking,DataX)
							VALUES('$EmployeeID','$InDateTime','$OutDateTime','$DayOff','$OT','$DoubleOT','$Late','$UserID',
							'$UserID','$Terminal','$WorkinDay','$WorkingHours','$PayCut','$LateCount','$TotalLate',
							'$PSDayType','$PayCutEvenin','$OnlyDate','$SundayAllow','$DateType','$SaturdayAllowence',
							'$EmpDailyRate','$QTY','$SaturdayQTY','$SundayOT','$SundayWorkingDay',
							'$PoyaDayWorking','$OnlyDate')";
					$result = $db_handle->insertQuery($query);
										
					

					// if($DayOff != 1 AND $IsPayCut==1){
						// if($Late>0){
							     // $query1 = "INSERT INTO PayCut(EmployeeID,PayDate,Late,Count) 
										// VALUES('$EmployeeID','$OnlyDate', '$Late','1')";
								// $result1 = $db_handle->insertQuery($query1); 
						// }	 
					// }	
				}
			}	
			
			$Leave = 0;
			$Absent = 0;
			$AccOT = 0;
			$TerminalID='';
			$NopayLeave = 0;
			$LateCount = 0;
			$LateMinuts = 0;
			$SpecAllownce = 0;
			$WeeklyLeave = 0;
			$SundayWeekLeave = 0;
			$LoadType = 0;
			$PayMonth = '';
			$PayYear = '';
				
			$query ="Delete from RowDataMonthEnd";
			$result = $db_handle->DeleteQuery($query);	
				
			$query="SELECT EmployeeID, SUM(DayOff) AS SumOfDayOff, SUM(OT) AS SumOfOT, SUM(Late) AS SumOfLate,
					SUM(WorkinDay) AS SumOfWorkinDay, SUM(WorkingHours) AS SumOfWorkingHours, 
					SUM(PayCut) AS SumOfPayCut,SUM(DoubleOT) AS SumOfDoubleOT,SUM(LateCount) AS SumOfLateCount,
					SUM(PayCutEvenin) AS SumOfPayCutEvenin, SUM(SundayAllownce) AS SumOfSundayAllownce,
					SUM(SaturdayAllowence) AS SaturdayAllowence, SUM(EmpDailyRate) AS EmpDailyRate,
					SUM(TotalQTY) as TotalQTY , SUM(SaturdayQTY) as SaturdayQTY,
					SUM(SundayWorkingDay) as SundayWorkingDay,SUM(SundayOT) as SundayOT,
					SUM(PoyaDayWorking) as PoyaDayWorking ,MONTH(OnlyDate) AS PayMonth, YEAR(OnlyDate) AS PayYear
					FROM rowdatatesteddayend 
					GROUP BY EmployeeID ORDER BY EmployeeID"; 
			$result = $db_handle->runQuery($query);
						
			if(!empty($result)){
				foreach ($result as $r) {
					
					$EmployeeID = $r["EmployeeID"];
					$DayOff = $r["SumOfDayOff"];
					$OT = $r["SumOfOT"];
					$Late = $r["SumOfLate"];
					$WorkinDay = $r["SumOfWorkinDay"];
					$WorkingHours = $r["SumOfWorkingHours"];
					$DoubleOT = $r["SumOfDoubleOT"];
					$AttAllowances = 0;
					$InformedLeave = 0;
					$Absent = 0;
					$AccOT = 0;
					$NopayLeave = 0;
					$LateMinuts = 0;
					$SpecAllownce = 0;
					$WeeklyLeave = 0;
					$SundayWeekLeave = 0;
					$DateType = '';
					$PayCut = $r["SumOfPayCut"];
					$PayCutEvenin = $r["SumOfPayCutEvenin"];
					$SundayAllownce = $r["SumOfSundayAllownce"];
					$SaturdayAllowence = $r["SaturdayAllowence"];
					$EmpDailyRate = $r["EmpDailyRate"];
					$SaturdayQTY = $r["SaturdayQTY"];
					$TotalQTY = $r["TotalQTY"];
					$SundayWorkingDay = $r["SundayWorkingDay"];
					$SundayOT = $r["SundayOT"];
					$PoyaDayWorking = $r["PoyaDayWorking"];
					$LateCount = $r["SumOfLateCount"];
					$PayMonth = $r["PayMonth"];
					$PayYear = $r["PayYear"];
					$PayCutEvenin = $PayCutEvenin/60;
					$Late = $Late/60;
					$Late = round($Late,2);	
					$PayCut = $PayCut/60;
					$PayCut = round($PayCut,2);	
					$PayCutEvenin = round($PayCutEvenin,2);	
					$SundayOT = $SundayOT/60;
					$SundayOT = round($SundayOT,2);	
					$DoubleOT = $DoubleOT /60;
					$DoubleOT = round($DoubleOT,2);
					//$OT = $OT/60;
					//$OT = round($OT,2);	
			
			
					// $query1="SELECT EmployeeID, DateType FROM RowDataMonthEnd 
							// WHERE PayMonth='$month' AND PayYear='$year'";
					// $result1 = $db_handle->runQuery($query1); 
					// if(!empty($result1)){
						
						// $query1="SELECT EmployeeID, DateType FROM RowDataMonthEnd 
								// WHERE (EmployeeID = '$EmployeeID')";
						// $result1 = $db_handle->runQuery($query1); 
						// if(!empty($result1)){
							
							// $query33="Update RowDataMonthEnd SET DayOff = '$DayOff',OT = OT + '$OT',Late= Late+'$Late',
								// WorkinDay = WorkinDay +'$WorkinDay', WorkingHours = WorkingHours +'$WorkingHours', 
								// `Leave` = '$LeaveDays' ,Absent = '$Absent',
								// AttAllowances = AttAllowances + '$AttAllowances',AccOT = AccOT + '$AccOT',  
								// Auser = '$UserID' ,Muser = '$UserID', Terminal = '$TerminalID',
								// PayCut = PayCut + '$PayCut', NopayLeave = NopayLeave + '$NopayLeave',
								// DoubleOT = DoubleOT +'$DoubleOT',LateCount = LateCount + '$LateCount',  
								// LateMinuts = LateMinuts + '$LateMinuts',PayCutEvenin = PayCutEvenin + '$PayCutEvenin',
								// SundayAllownce = SundayAllownce +'$SundayAllownce',	SpecAllownce = SpecAllownce + '$SpecAllownce' ,
								// WeeklyLeave = WeeklyLeave + '$WeeklyLeave',
								// SundayWeekLeave =SundayWeekLeave + '$SundayWeekLeave',
								// SaturdayAllowence = SaturdayAllowence +'$SaturdayAllowence',
								// EmpDailyRate = EmpDailyRate + '$EmpDailyRate' ,TotalQTY = TotalQTY + '$TotalQTY',
								// SaturdayQTY  = SaturdayQTY + '$SaturdayQTY', 
								// SundayWorkingDay = SundayWorkingDay + '$SundayWorkingDay',
								// SundayOT = SundayOT + '$SundayOT ',PoyaDayWorking =PoyaDayWorking + '$PoyaDayWorking'  
								// WHERE (EmployeeID = '$EmployeeID') AND (DateType = '$DateType')";
							// $result1 = $db_handle->updateQuery($query33);	
						
						// }ELSE{
							
							$query67="INSERT INTO RowDataMonthEnd(`Leave`,EmployeeID,DayOff,OT,Late,WorkinDay, WorkingHours,Absent,
								AttAllowances,	AccOT,Auser,Muser, Terminal,PayCut,NopayLeave,DoubleOT, 
								LateCount, LateMinuts,PayCutEvenin, SundayAllownce, SpecAllownce, 
								WeeklyLeave, SundayWeekLeave, DateType,SaturdayAllowence,EmpDailyRate,
								TotalQTY,SaturdayQTY, SundayWorkingDay,SundayOT,PoyaDayWorking,PayMonth,PayYear) 
								VALUES('$LeaveDays','$EmployeeID','$DayOff','$OT','$Late','$WorkinDay','$WorkingHours','$Absent',
								'$AttAllowances','$AccOT','$UserID','$UserID','$TerminalID','$PayCut','$NopayLeave','$DoubleOT','$LateCount','$LateMinuts','$PayCutEvenin','$SundayAllownce','$SpecAllownce',
								'$WeeklyLeave','$SundayWeekLeave','$DateType','$SaturdayAllowence','$EmpDailyRate','$TotalQTY ',
								'$SaturdayQTY','$SundayWorkingDay','$SundayOT','$PoyaDayWorking','$PayMonth','$PayYear')";
							$result1 = $db_handle->insertQuery($query67);
						//}
					// }else{
						
						////start of the Month-End-process
						
			
						// $query67="INSERT INTO RowDataMonthEnd(`Leave`,EmployeeID,DayOff,OT,Late,WorkinDay, WorkingHours,Absent,
								// AttAllowances,	AccOT,Auser,Muser, Terminal,PayCut,NopayLeave,DoubleOT, 
								// LateCount, LateMinuts,PayCutEvenin, SundayAllownce, SpecAllownce, 
								// WeeklyLeave, SundayWeekLeave, DateType,SaturdayAllowence,EmpDailyRate,
								// TotalQTY,SaturdayQTY, SundayWorkingDay,SundayOT,PoyaDayWorking,PayMonth,PayYear) 
								// VALUES('$LeaveDays','$EmployeeID','$DayOff','$OT','$Late','$WorkinDay','$WorkingHours','$Absent',
								// '$AttAllowances','$AccOT','$UserID','$UserID','$TerminalID','$PayCut','$NopayLeave','$DoubleOT','$LateCount','$LateMinuts','$PayCutEvenin','$SundayAllownce','$SpecAllownce',
								// '$WeeklyLeave','$SundayWeekLeave','$DateType','$SaturdayAllowence','$EmpDailyRate','$TotalQTY ',
								// '$SaturdayQTY','$SundayWorkingDay','$SundayOT','$PoyaDayWorking','$month','$year')";
						// $result1 = $db_handle->insertQuery($query67);
															
					// }
					$LeaveDays=0;
			
			
			
			
			
			
					
			
				}
			}	
			
			
			
			$ProjectID='';
			$ActualLaborCost=0;
			$sqlA = "SELECT r.SiteID AS ProjectID, SUM(r.WorkingHours * e.HourlyRate) AS ActualLaborCost 
			FROM rowdatadayend 
			r JOIN employee e ON r.EmployeeID = e.EmployeeID 
			GROUP BY r.SiteID;";
			$resultAS = $db_handle->runQuery($sqlA);
						
			if(!empty($resultAS)){
				foreach ($resultAS as $r) {
					$ProjectID = $r["ProjectID"];
					$ActualLaborCost = $r["ActualLaborCost"];
					
					$insert_sql = "INSERT INTO project_actual_costs (ProjectID, ActualLaborCost, Date,PayMonth,PayYear) VALUES ('$ProjectID', '$ActualLaborCost','$PayMonth','$PayYear' )";
					$result = $db_handle->insertQuery($insert_sql);
			
			
				}
			}	
			
			
			
			
			
			
			
			
			
		} //if($NotEmptyRecords=='0'){
		
		
		
		
		
		
		
		
		
		
		
		
		
	} // Last

?>







