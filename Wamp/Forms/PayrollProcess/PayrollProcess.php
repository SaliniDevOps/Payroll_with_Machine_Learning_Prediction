<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");

	$ID='';							$EmployeeID='';					$AccSalary='';
	$BankCode='';					$BranchID='';					$Branchcode='';
	$TempEmployee='';				$IsServerUpdate ='';    		$TInactiveDate ='' ;
    $NoOT = '';    					$TempInactive = '';    			$FactoryEmploye ='' ;
    $UserID ='' ;    				$TreadUnionAmount ='';    		$InsuranceAmount ='' ;
    $AccountNumber ='' ;    		$Salarytobank ='';    			$BasicSalary = 0;
    $EmailAddress = '';  			$Phone ='' ;    				$ZipCode = '';
    $State = '';    				$City = '';    					$Street ='';
    $JoinDate = '';    				$CivilStatus = '';    			$NIDNumber = '';
    $Sex = '';   					$Age = '';    					$DateofBirth = '';
    $SurName = '';    				$LastName = '';    				$FirstName = '';
    $DesignationID = '';    		$AllownceFix = '';   		 	$GradeID = '';
    $ETFNumber = '';    			$EPFNumber = '';    			$DepartmentID = '';
    $TradeUni ='';    				$Insurance ='';    				$StampDuty ='';
    $IsFemail ='';    				$isPieceEmployee ='';    		$nNopayDates =0;
    $FixedAlowAmount ='';   		$VariAllEPF ='';    			$VariaAlowAmount ='';
    $FixedDeduction =0;    		$VariaDeduction ='';    		$SalaryAdvance ='';
    $LonePayment ='';    			$SalaryArrears ='';    			$SalaArrAmount ='';
    $PayCut ='';    				$PayCutEvenin ='';    			$LoanBalance ='';
    $NonCashBenefits ='';   		$PreviousBalance ='';    		$GrossSalary =0;
    $NetSalary ='';					$TotalAllwance ='';    			$nopayAmount =0;
    $totalBasicSal ='';    			$ETF ='';    					$EPFEmployee ='';
    $EPFCompany ='';    			$TotalEPF ='';    				$BalanceCF ='';
    $DeductionDescription ='';  	$attAllowance ='';    			$Late ='';
    $GrossSaForTax ='';    			$NewNetSalary ='';    			$TakeHome ='';
    $BasicSalaryForEPF ='';   		$objRecSetFixedDeduct ='';    	$objAttMonthly ='';
    $MaxTranNumber ='';    			$DeductionType ='';   	 		$DeductionAmount ='';
    $objRecSetVarianceDeduct =''; 	$NormalOT ='';    				$DoubleOT ='';
	$OThrs ='';  					$TRLogNumber ='';    			$SaturdayAllowence ='';
    $EmpRateAmount ='';   	 		$QTY ='';    					$SatWorkday ='';
    $SundayWorkingDay ='';    		$PoyaDayWorking ='';			$nWorkingDates = 0;
	$IsOTAmount ='';    			$strSQLTail ='';    			$Amount ='';
    $acLeName ='';    				$IsOTPoSu ='';   	 			$TotalAmount ='';
    $SunDayOtHours ='';    			$OrgBasicSalery ='';   	 		$LateHour ='';
    $mYear ='';    					$NCashBenefits ='';    			$NWNumber ='';
    $TreadUnion ='';    			$NoPay ='';    					$EarnedLeave =''; 
    $FixedAllowance ='';   			$NoPayDays ='';    				$BalanceBF ='';
    $Cash ='';	    				$mTen ='';    					$mTwenty ='';
    $mFifty ='';    				$mTwoHundred ='';    			$mFiveHundred ='';	
	$mThousand='';     				$LongTypeID ='';    			$LoneID ='';
    $BalanceAmount ='';    			$InstallmentAmount ='';    		$PaidAmount ='';
    $CurrentInstallment ='';    	$CurrentMonthStatus ='';    	$LoneAmount ='';
    $LoanNewDate ='';    			$LoneDate ='';   				$erestRateAnnually ='';
    $Installments ='';    			$PaidInstallment ='';    		$PaidFullAmount ='';
    $Status ='';    				$VarianceAmount ='';      		$txtID ='';
    $isAccLink ='';    				$Sal_Arre_Days_Office ='';   	$Sal_Arre_Days_Fact ='';
    $BF_Remain_Sal ='';    			$ETF_Emp_Rate ='';    			$EPFRate ='';
    $ETFRate ='';    				$factoryEmployee ='';    		$NumberofOTHours=''; 
    $PayProcess_OTHrs='';    		$acLGDisc='';					$acLGRemarks='';
	$acLGDate='';					$acLGTime='';					$acLGDE='';
	$acLGCr='';						$acTRLogNo='';					$acAUser='';
	$acMUser='';					$acTerminal='';					$LedgerType='';
	$LedgerStatus='';				$VoucherType='';				$VoucherNo='';
	$acLGBDE='';					$acLGBCr='';					$acLeAlias='';
	$CostCenID='';					$TRLogNumber='';				$TRLogDate='';
	$TrDescription='';				$ETF_8='';						$NetSalary=0;
	$EPF_12='';						$ETF_3='';						$AllownceType='';
	$AllownceAmount='';				$TakeHome='';					$ProceesDate='';
	$VarAllownceAmount='';			$PayYear='';					$PayMonth='';
	$attAllowance='';				$PayCut='';						$Ten='';
	$Towenty='';					$Fifty='';						$Hundered='';	
	$twoHunderd='';					$FiveHundered='';				$StrTail='';
    $Year_Renamed='';				$Month_Renamed='';				$AdvanceProces='';
	$PayProcess ='';				$MonthEndProcess='';			$User='';
	$OTTypeID ='';    				$OTAmount =0;    				$OTHours ='';
    $TotalOTAmount ='';    			$OTRate ='';    				$CategoryID ='';  
	$PoySunAmount ='';    			$OTAmountNormal ='';   		 	$OTAmountPoyaSunday ='';    
	$OTAmpunt ='';    				$PoSuRate ='';   	 			$OTAmountNormalPOSU ='';
	$SPAllwanceBSal='';				$TypeID='';     				$Amount='';
    $TotalAmount='';				$TotalBaci='';					$PieceAlowAmount='';
	$IncentiveAllowanceAmount='';	$SunDayOT='';					$xx='';
	$SundayBasicSalary='';			$TotalWorkingDate='';			$PoyaDayexalloID = ''; 
	$PoyaDayAllownse = ''; 			$AllowancesTypeID = ''; 		$acLGDateComm='';
	$EmpAllias='';					$WorkingDays = '';              $SundayAllowanceID ='';	
	$WorkinDay=0;
	$cmbweek='';
	$TotalVarianceAllowAmount='';
	$DaySalary=0;
	$Day_Salary=0;
	$DaySalary_Amount=0;
	$Lone_Amount=0;
	$TotalLonePayment=0;
	$newBalanceAmount=0;
	$newPaidInstalment=0;
	$payrollDon=0;
	
	if(isset($_POST["Insert_PayrollBTN"]))
	{
	    //Get variable
		$NoValue=$_POST["Insert_PayrollBTN"];
		
		$query1 =("SELECT `PayProcess` FROM `contolfile`");
		$result1 = $db_handle->runQuery($query1);
		if(!empty($result1)){
			foreach ($result1 as $r1) {
				$PayProcess = $r1["PayProcess"];
				if($PayProcess==1){
					$payrollDon=1;
				?>
					<script>
						// $(".alertDup").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Payroll Already Process...!');
						// $(".alertDup").fadeIn().delay(2000).fadeOut(); 
						alert("already done!")
					</script>
				<?php
				}else{
		
					$payrollDon=0;
		
				}
			}
		}
		
		
		if($payrollDon==0){
			
			//$query2 ="Delete from PayFixedAllowance";
			//$result2= $db_handle->deleteQuery($query2);	
			
			// $query3 ="Delete from PayFixedDeduction";
			// $result3= $db_handle->deleteQuery($query3);	
			
			// $query4 ="Delete from PayOT";
			// $result4= $db_handle->deleteQuery($query4);	
			
			$query5 ="Delete from Payroll";
			$result5= $db_handle->deleteQuery($query5);	
			
			// $query8 ="Delete from PaySalaryAdvance";
			// $result8= $db_handle->deleteQuery($query8);	
			
			// $query9 ="Delete from PayVarianceAllowances";
			// $result9= $db_handle->deleteQuery($query9);	
			
			// $query10 = "Delete from PayVarianceDeduction";
			// $result10= $db_handle->deleteQuery($query10);	
			
			
			$query28 =("SELECT employee.`BasicSalary`,EmpAttendance.`EMPCode`, Employee.`EmployeeCode`,Employee.`EmployeeID`
						FROM EmpAttendance 
						INNER JOIN Employee ON EmpAttendance.EMPCode = Employee.EmployeeID 
						WHERE (EmpAttendance.Status = 1) AND (Employee.Status = 0) AND (EmpAttendance.IsPayroll = 0)
						Group BY `EmpAttendance`.`EMPCode` 
						ORDER BY  Employee.EmployeeID ASC;");			
			$result = $db_handle->runQuery($query28);
			
			if(!empty($result)){
				foreach ($result as $r) {
					$BasicSalary = $r["BasicSalary"];
					//$Gender = $r["Sex"];
					//$TempEmployee = $r["InactiveEmplyee"];
					echo '======EmployeeID'.$EmployeeID = $r["EmployeeID"];
					//$FactoryEmploye = $r["FactoryEmploye"];
					//$DaySalary = $r["DaySalary"];
					
					
					$OT_Hours=0;
					$queryOT =("SELECT * FROM `rowdatamonthend` WHERE EmployeeID='$EmployeeID'");			
					$resultOT = $db_handle->runQuery($queryOT);
					
					if(!empty($resultOT)){
						foreach ($resultOT as $r) {
							$OT_Hours = $r["OT"];
							$WorkinDay = $r["WorkinDay"];
						}
					}	
					
					//Basic salary/26/8×OT hrs×1.25 = Overtime amount (on normal working days)
					
					$NormalOT = $BasicSalary / 26 / 8   * $OT_Hours * 1.25;
					$OTAmount=$NormalOT;
					$OTAmount = round($OTAmount,2);
					
					
					
					
					
					
					//OTAmount
					/*
					$query1_1="SELECT  `ottype`.`OTTypeID`,`ottype`.`Description`,`ottype`.`Rate` , `ot`.`OTHours` 
								FROM OT  
								INNER JOIN ottype ON `ot`.`OTTypeID` = `ottype`.`OTTypeID`
								INNER JOIN employee ON `employee`.`EmployeeCode` = `ot`.`EmployeeID`
								WHERE (`employee`.`EmployeeCode` ='$EmployeeID' AND `ottype`.`OTTypeID`='1') ";
					$result1_1 = $db_handle->runQuery($query1_1);
					if(!empty($result1_1)){
						foreach ($result1_1 as $r1_1) {
							$OTTypeID = $r1_1["OTTypeID"];
							$OTTypeDescription = $r1_1["Description"];
							$OTRate = $r1_1["Rate"];
							$OTHours = $r1_1["OTHours"];
							
							If($OTTypeDescription='OT'){
								//$OTRate = ($BasicSalary / 8) * 1.5;
								$OTAmount = $OTRate * $OTHours;

								 // $query="INSERT INTO PayOT (EmployeeID,OTTypeID,NumberofOTHours,Amount,OtRate) 
										// Values('$EmployeeID','$OTTypeID','$OTHours','$OTAmount','$OTRate')";
								// $result = $db_handle->insertQuery($query); 
								
								$TotalOTAmount = $TotalOTAmount + $OTAmount;
								
								$NormalOT = $NormalOT + $OTAmount;
							}
						}
					}		
					*/
					
					$TotalAllwance=0;
					
					
					//FixedAllowances
					$FixedAlowAmount = 0;
					$Amount = 0;
					$TotalAmount = 0;
					
					$query="SELECT * From FixedAllowances  
							WHERE EmployeeID ='$EmployeeID'";
					$result = $db_handle->runQuery($query);	
					if(!empty($result)){
						foreach ($result as $r) {
						$TypeID=$r["AllowancesTypeID"];	   
						$Amount=$r["Amount"];	
						
						 $Amount = floatval($Amount);
							//$SundayWorkingDay=$r["WorkingDay"];	
						
							// $query="INSERT INTO PayFixedAllowance(EmployeeID,AllwanceTypeID,Amount,WorkingDay) 
									// Values('$EmployeeID','$TypeID','$Amount','$SundayWorkingDay')";
							// $result = $db_handle->insertQuery($query);	

							$TotalAmount = $TotalAmount + $Amount;
				
						}
					}
							
					echo '<br>FixedAlowAmount'.$FixedAlowAmount = $TotalAmount;
					
					
					//Variance Allwances
					$VariaAlowAmount = 0;
					$VarianceAllowAmount = 0;
					$TotalAmount = 0;
					$s=0;
					$query="SELECT * From VarianceAllowance  
							WHERE EmployeeID='$EmployeeID'";
					$result = $db_handle->runQuery($query); 
					if(!empty($result)){
						foreach ($result as $r) {				
						$TypeID=$r["AllowancesTypeID"];	   
						$VarianceAllowAmount=$r["Amount"];
						
						 $VarianceAllowAmount = floatval($VarianceAllowAmount);

						// $query="INSERT INTO  PayVarianceAllowances (EmployeeID, AllwanceTypeID,Amount) 
								// Values('$EmployeeID','$TypeID','$Amount')";
							// $result = $db_handle->insertQuery($query);

							$TotalAmount = $TotalAmount + $VarianceAllowAmount;
							//$TotalVarianceAllowAmount = $TotalVarianceAllowAmount + $VarianceAllowAmount;
						}
					}
						
					echo '<br>VariaAlowAmount'. $VariaAlowAmount = $TotalAmount;
					
					
					$TotalAllwance = $FixedAlowAmount + $VariaAlowAmount;
					
					//  Fixed Deduction
					$TotalDeduction =0;
					$FixedDeduction = 0; 
					$Amount = 0;
					$TotalAmount = 0;
					  
					$query="SELECT EmployeeID,DeductionTypeID,Amount  
							From FixedDeduction  
							WHERE EmployeeID='$EmployeeID'";
					$result = $db_handle->runQuery($query); 
					if(!empty($result)){
						foreach ($result as $r) {				 
							$TypeID=$r["DeductionTypeID"];	   
							$Amount=$r["Amount"];	
					
							// $query="INSERT INTO PayFixedDeduction (EmployeeID,AllwanceTypeID,Amount) 
									// Values('$EmployeeID', '$TypeID','$Amount')";
							// $result = $db_handle->insertQuery($query);
							
							$TotalAmount = $TotalAmount + $Amount;
						}
					}

					$FixedDeduction = $TotalAmount;
					
					$TotalDeduction = $TotalDeduction + $FixedDeduction;
					
					
					//  Variance Deductions
					$VariaDeduction = 0;
					$Amount = 0;
					$TotalAmount = 0;
					
					$query="SELECT * From VarienceDeduction 
							WHERE EmployeeID='$EmployeeID'";
					$result = $db_handle->runQuery($query);
					if(!empty($result)){
						foreach ($result as $r) {			
						$TypeID=$r["DeductionTypeID"];	   
						$Amount=$r["Amount"];
						
							// $query="INSERT INTO  PayVarianceDeduction (EmployeeID,AllwanceTypeID,Amount)
									// Values('$EmployeeID','$TypeID','$Amount')";
									// $result = $db_handle->insertQuery($query);
							
									$TotalAmount = $TotalAmount + $Amount;
						}	
					}
							
					$VariaDeduction = $TotalAmount;
					
					$TotalDeduction = $TotalDeduction + $VariaDeduction;
					
					
					//'Salary Advance
					$SalaryAdvance = 0;
					$Amount = 0;
					$TotalAmount = 0;
					$nopayAmountAllownse=0;
					$CASH=0;
					
					$query="SELECT * From SalaryAdvance  
							WHERE EmployeeID='$EmployeeID'";
					$result = $db_handle->runQuery($query);
					if(!empty($result)){
						foreach ($result as $r) {				
							$Amount=$r["Amount"];	

						// $query="INSERT INTO  PaySalaryAdvance (EmployeeID,Amount) 
								// Values('$EmployeeID','$Amount')";
						// $result = $db_handle->insertQuery($query);	
						
						$TotalAmount = $TotalAmount + $Amount;	
						}
					}
						
					$SalaryAdvance = $TotalAmount;
					$TotalDeduction = $TotalDeduction + $SalaryAdvance;
					
					
					
					
					$GrossSalary = ($BasicSalary - $nopayAmount) + ($OTAmount + $TotalAllwance );
					//$TotalDeduction =0;
					//$TotalDeduction =$EPFEmployee + $SalaryAdvance + $TotalLonePayment + $FixedDeduction + $VariaDeduction + $TradeUni + $PayCut + $PayCutEvenin;
					
					$NetSalary = $GrossSalary - $TotalDeduction;
					
					$BasicSalaryNew =0;

					$BasicSalaryNew = $BasicSalary;
					
					$query="INSERT INTO payroll (EmployeeID,WorkingDays, NopayDays,FixedDeduction,FixedAllowance,VarianceDeduction, 
							VarianceAllowance,OTAmount,EarnedLeave,SalaryAdvance,Nopay, Insurance,TreadUnion,Status,BasicSalary,
							GrossSalary,NetSalary, StampDuty,ETF,EPFEmployee,EPFCompany,nopayAmountAllownse, LonePayment,
							TotalDeduction,BalanceCF,Cash,BalanceBF,NormalOt, DoubleOt,SalaryArrears,PayCut,NCashBenefits,
							PayCutEvenin, TempEmployee,LoanBalance,BasicSalaryForEPFPay,ProceMonth, PayProceYear,attAllowance,
							LateHour,OTHours,SaturdayAllowence, EmpRateAmount,PieceAlowAmount,SunDayOT, SundayWorkingDay,
							OrgBasicSalery,PoyaDayWorking,WeekNo,DaySalary,SunDayOtHours)
							
							Values('$EmployeeID','$WorkinDay','$nNopayDates','$FixedDeduction','$FixedAlowAmount ', 
							'$VariaDeduction','$VariaAlowAmount','$OTAmount',0,'$SalaryAdvance ',
							'$nopayAmount','$Insurance','$TradeUni',1,'$BasicSalaryNew','$GrossSalary','$NetSalary',
							'$StampDuty ','$ETF','$EPFEmployee','$EPFCompany','$nopayAmountAllownse','$TotalLonePayment', 
							'$TotalDeduction','$BalanceCF','$CASH ','$PreviousBalance ','$NormalOT','$DoubleOT','$SalaArrAmount',
							'$PayCut + $PayCutEvenin','$NonCashBenefits',0,'$TempEmployee','$LoanBalance','$BasicSalaryForEPF',
							'$PayMonth','$PayYear','$attAllowance','$LateHour','$OThrs','$SaturdayAllowence','$EmpRateAmount', 
							'$PieceAlowAmount','$SunDayOT','$SundayWorkingDay','$OrgBasicSalery','$PoyaDayWorking','$cmbweek','$DaySalary_Amount',
							'$SunDayOtHours')";
					$result = $db_handle->insertQuery($query);
					
					?>
						<script>
							$(".alert_save").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Process Successfuly.');
							$(".alert_save").fadeIn().delay(2000).fadeOut(); 
						</script>
					<?php
					
					$queryUpdateE = "UPDATE `empattendance` SET `IsPayroll`='1' WHERE `Status`='1'";
					//$resultR = $db_handle->updateQuery($queryUpdateE);
					
					
				}
			}

				
			
			
			
		}	//if($payrollDon==0)
		
		
		
		
		
		
		
	} // Last

?>







