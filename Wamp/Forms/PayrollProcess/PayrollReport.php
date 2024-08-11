<?php ob_start(); ?>
<html>
	<head>
		<title>Report</title>
		<style type="text/css">
			#PrintPage1 table tr td {
				font-size: large;
			}
			#PrintPage1{
				page-break-after:always;

			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<script>
		window.print();
	</script>
<style>
	table {
		table-layout:fixed;
		word-wrap:break-word;
		text-align: left;
	}
	#jj {
		color: #00F;
	}
	.gg {
		color: #00F;
	}
	.gg {
		font-family: "MS Serif", "New York", serif;
	}
	.HHY {
		color: #F00;
	}
	.gg { 
		color: #CFF;
	}
	#PrintPage1{
		page-break-after:always;
	}
	.d {
		border-top-style: '';
		border-bottom-style:double;
		border-left:'';
		border-right:'';
	}
	.gap {
		height :15px;
	}
</style>
<body>
	<?php 
	require_once("../../Connection/dbconnecting.php");
    // $db_handle = new DBController();  
	// $Header1=$_SESSION['Header1'];
	// $Header2=$_SESSION['Header2'];
	// $Header3=$_SESSION['Header3'];
	// $Header4=$_SESSION['Header4'];
	// $Footer1=$_SESSION['Footer1'];	
	
	// $IsAttendance = $_SESSION['IsAttendance'];
	// $SundayPayM = $_SESSION['SundayPayM'];
	
	// require_once("../../../../../Connection/securelogindetail.php");
	// $secure_login = new SecureLoginDetail();
	
	// $UserIDses=$_SESSION['username'];
	// $Header1=$_SESSION['Header1'];
	// $Header2=$_SESSION['Header2'];			
	// $TerminalID = getenv('REMOTE_ADDR');
	// $Header3=$_SESSION['Header3'];
	// $Header4=$_SESSION['Header4'];
	// $Footer1=$_SESSION['Footer1'];
	
	// $EncryptUsername = '';	
	// $EncryptUsername = $secure_login->encryptUsername($UserIDses);
	
	$today=date("Y-m-d");
	date_default_timezone_set("Asia/Colombo");
	$todayTime=date("h:i:sa");
	$t=date("Y");
	$M=date("M");
	
	
	$TrnType='';					$Amount='';								$prvEmployeeID='';
	$BasicSalay='';					$BasicSalaryforEPF ='';					$OT='';
	$EPFEmployee ='';				$EPFCompany ='';						$ETF ='';
	$AllownceNopay ='';				$Lone ='';								$NetSalary ='';
	$SaturdayAllowence ='';			$PieceAlowAmount ='';					$TotalEPF=0;
	$SalaryAdavance ='';			$GrossSalary ='';						$NormalOt ='';
	$DoubleOT ='';					$SalaryArrears ='';						$X=0;
 	$ORD=1;	$Cash='';				$BalanceCF='';							$TotGrossSalary=0;
	$TotalAlownses='';				$TotalDeduction='';						$BalanceBF='';
	$GrossSalaryForTax='';			$PayCut= 0;								$PayCutEvenin= 0;
	$LoneBalaAmount='';				$TempEmployee='';						$NonCashBenefits ='';
    $d ='';    						$Y = '';    							$xx = '';
    $SunDayOT ='';    				$OTHours ='';    						$OTHoursDiscri ='';
    $OrgBasicSalery ='';    		$WorkingDaysdr ='';    					$sundayworkingDay ='';
    $PoyaDayWorking ='';    		$WeekNo ='';    						$DatePeriod ='';
    $Fromdate ='';   				$Todate ='';    						$isMale =0;
    $Sex ='';    					$SunDayOtHours ='';    					$fullName ='';
    $BASICSALARYPS ='';   			$prasentdayamount ='';    				$CalSundayWoDay ='';
    $CalPoyaday ='';    			$intOrder ='';    						$prvEmployeeID ='';
	$CalPayCut ='';					$OTRate ='';    						$DOUBLEOTPS ='';
	$COINBFPS =0;					$NETSALARYPS =0;						$EPFCOMPANYPS =0;
	$ETFPS =0;						$LOANBALANCEPS =0;						$CASHPS =0;
	$COINSCFPS =0;					$TotalOT = 0;							$NOPAYPS =0;
	$ALLOWNCEPS =0;					$SALARYARREARSPS=0;						$NOPAYPS=0;
	$BASICSALARYFOREPFPS=0;			$NONCASHBENEFITSPS=0;					$GROSSSALARYFORTAXPS=0;
	$OTPS=0;						$NOPAYPS=0;								$GROSSSALARYPS=0;
	$ALLOWNCEPS=0;					$DEDUCTIONPS=0;							$COINBFPS=0;
	$EPFEMPLOYEEPS=0;				$NETSALARYPS=0;							$CASHPS=0;
	$COINSCFPS=0;					$EPFCOMPANYPS=0;						$ETFPS=0;
	$ALLOWNCENOPAYPS=0;				$NORMALOTPS=0;							$DOUBLEOTPS=0;
	$LOANBALANCEPS=0;				$SUNDAYALLOWPS=0;						$AllOWANCES='';
	$DEDUCTIONS='';					$SundayAllownce=0;						$ALLOWNCENOPAYPS =0;
	$BASICSALARYPS=0;				$SPECIALLOPS=0;							$PAYCUTPS =0;
	$WithoutPoyaday ='';			$DEDUCTIONPS =0;						
	$GROSSSALARYFOREPF='';			$TotalDeduction = 0;					$DaySalary=0;
	$EncryptUsername='';
	
	
	//load user wise location & user level
	// $query="SELECT location.`Contact`,location.`Address` ,location.`LocationID`,
			// location.`Description`
			// FROM `userx` 
			// INNER JOIN location ON userx.`LocaID`=location.`LocationID`
			// WHERE userx.`UserID`='$EncryptUsername'";
			// $result = $db_handle->runQuery($query);
		// if(!empty($result)) {
			// foreach ($result as $rowDep1) {
				// $Address=$rowDep1['Address'];
				// $Contact=$rowDep1['Contact'];
				// $LocationID=$rowDep1['LocationID'];
				// $LocationDes=$rowDep1['Description'];
			// }
		// }

	$QueryPayslip ="SELECT `BASICSALARYPS`, `SALARYARREARSPS`, `NOPAYPS`, `BASICSALARYFOREPFPS`, 
				`NONCASHBENEFITSPS`, `GROSSSALARYFORTAXPS`, `OTPS`, `GROSSSALARYPS`, `PAYCUTPS`, 
				`ALLOWNCEPS`, `DEDUCTIONPS`, `COINBFPS`, `EPFEMPLOYEEPS`, `NETSALARYPS`, `CASHPS`, 
				`COINSCFPS`, `EPFCOMPANYPS`, `ETFPS`, `ALLOWNCENOPAYPS`, `NORMALOTPS`, `DOUBLEOTPS`, 
				`LOANBALANCEPS`, `SUNDAYALLOWPS`, `SPECIALLOPS` 
				FROM `payslip`";
	$resultPayslip = $db_handle->runQuery($QueryPayslip);
	if(!empty($resultPayslip)) {
		foreach ($resultPayslip as $rowPayslip) {
			$BASICSALARYPS=$rowPayslip["BASICSALARYPS"];
			$SALARYARREARSPS=$rowPayslip["SALARYARREARSPS"];
			$NOPAYPS=$rowPayslip["NOPAYPS"];
			$BASICSALARYFOREPFPS=$rowPayslip["BASICSALARYFOREPFPS"];
			$NONCASHBENEFITSPS=$rowPayslip["NONCASHBENEFITSPS"];
			$GROSSSALARYFORTAXPS=$rowPayslip["GROSSSALARYFORTAXPS"];
			$OTPS=$rowPayslip["OTPS"];
			$NOPAYPS=$rowPayslip["GROSSSALARYPS"];
			$PAYCUTPS=$rowPayslip["PAYCUTPS"];
			$ALLOWNCEPS=$rowPayslip["ALLOWNCEPS"];
			$DEDUCTIONPS=$rowPayslip["DEDUCTIONPS"];
			$COINBFPS=$rowPayslip["COINBFPS"];
			$EPFEMPLOYEEPS=$rowPayslip["EPFEMPLOYEEPS"];
			$NETSALARYPS=$rowPayslip["NETSALARYPS"];
			$CASHPS=$rowPayslip["CASHPS"];
			$COINSCFPS=$rowPayslip["COINSCFPS"];
			$EPFCOMPANYPS=$rowPayslip["EPFCOMPANYPS"];
			$ETFPS=$rowPayslip["ETFPS"];
			$ALLOWNCENOPAYPS=$rowPayslip["ALLOWNCENOPAYPS"];
			$NORMALOTPS=$rowPayslip["NORMALOTPS"];
			$DOUBLEOTPS=$rowPayslip["DOUBLEOTPS"];
			$LOANBALANCEPS=$rowPayslip["LOANBALANCEPS"];
			$SUNDAYALLOWPS=$rowPayslip["SUNDAYALLOWPS"];
			$SPECIALLOPS=$rowPayslip["SPECIALLOPS"];
		}
	}
   
	if(isSet($_GET['cmbCategory'])){
		$Category=$_GET['cmbCategory'];

		if($Category==''){
			  $query="SELECT Department.Name, Payroll.BasicSalary,Payroll.PoyaDayWorking, Payroll.SundayWorkingDay,Payroll.DaySalary, 
					Payroll.Nopay, 	Payroll.OTAmount,  Payroll.PieceAlowAmount, Payroll.SalaryArrears,
					Payroll.SunDayOtHours, Employee.Sex, Payroll.TreadUnion, Payroll.EPFEmployee, Payroll.PayCut, 
					Payroll.EPFCompany, Payroll.ETF, Payroll.NCashBenefits, Payroll.nopayAmountAllownse,  
					Payroll.LonePayment, Payroll.NetSalary, Payroll.SalaryAdvance, Payroll.LoanBalance, 
					Payroll.GrossSalary, Payroll.EmployeeID, Payroll.SunDayOT,
					Employee.FirstName AS EmployeeName, Employee.LastName AS EmployeeLName, 
					Employee.SurName AS EmployeeSName, Payroll.TempEmployee,Payroll.FixedDeduction, 
					Payroll.FixedAllowance, Payroll.VarianceDeduction, Payroll.VarianceAllowance, 
					Payroll.BalanceBF, Payroll.BalanceCF,Payroll.SaturdayAllowence, 
					Payroll.WorkingDays, Payroll.NormalOt, Payroll.DoubleOt, Payroll.PayCutEvenin, 
					Payroll.BasicSalaryforEPF, Payroll.OTHours, Payroll.TotalDeduction,  
					Payroll.OrgBasicSalery, Employee.CategoryID ,Payroll.WeekNo,Payroll.SundayAllownce
					FROM Employee 
					INNER JOIN Payroll ON `employee`.`EmployeeCode`  = Payroll.EmployeeID 
					INNER JOIN Department ON Employee.DepartmentID = Department.DepartmentID 
					INNER JOIN EmployeeCategory ON Employee.CategoryID = EmployeeCategory.CategoryID 
					ORDER BY Payroll.EmployeeID ";
					  
		}else{
			$query="SELECT Department.Name, Payroll.BasicSalary,Payroll.PoyaDayWorking, Payroll.SundayWorkingDay,Payroll.DaySalary,
					Payroll.Nopay, Payroll.OTAmount,  Payroll.PieceAlowAmount, Payroll.SalaryArrears,
					Payroll.SunDayOtHours, Employee.Sex,Payroll.TreadUnion, Payroll.EPFEmployee, Payroll.PayCut, 
					Payroll.EPFCompany, Payroll.ETF, Payroll.NCashBenefits, Payroll.nopayAmountAllownse, 
					Payroll.LonePayment, Payroll.NetSalary, 
					Payroll.SalaryAdvance, Payroll.LoanBalance, Payroll.GrossSalary, Payroll.EmployeeID, Payroll.SunDayOT,  
					Employee.FirstName AS EmployeeName, Employee.LastName AS EmployeeLName, 
					Employee.SurName AS EmployeeSName, Payroll.TempEmployee,Payroll.FixedDeduction, 
					Payroll.FixedAllowance, Payroll.VarianceDeduction, Payroll.VarianceAllowance, Payroll.BalanceBF, Payroll.BalanceCF,
					Payroll.SaturdayAllowence, 
					Payroll.WorkingDays, Payroll.NormalOt, Payroll.DoubleOt, Payroll.PayCutEvenin, Payroll.BasicSalaryforEPF, Payroll.OTHours,Payroll.OrgBasicSalery, Employee.CategoryID ,Payroll.WeekNo, 
					Payroll.TotalDeduction,Payroll.SundayAllownce
					FROM Employee 
					INNER JOIN Payroll ON 
					`employee`.`EmployeeCode`  = Payroll.EmployeeID 
					INNER JOIN Department ON Employee.DepartmentID = Department.DepartmentID 
					INNER JOIN EmployeeCategory ON Employee.CategoryID = EmployeeCategory.CategoryID 
					where EmployeeCategory.CategoryID='$Category' 
					ORDER BY Payroll.EmployeeID ";
		}
		$result = $db_handle->runQuery($query);
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
				$Name=$rowDep1["Name"];
				$BasicSalary=$rowDep1["BasicSalary"];
				$DaySalary=$rowDep1["DaySalary"];
				$PoyaDayWorking=$rowDep1["PoyaDayWorking"];
				$SundayWorkingDay=$rowDep1["SundayWorkingDay"];      
				$Nopay=$rowDep1["Nopay"];
				$OTAmount=$rowDep1["OTAmount"];
				$PieceAlowAmount=$rowDep1["PieceAlowAmount"];
				$SalaryArrears=$rowDep1["SalaryArrears"];
				$SunDayOtHours=$rowDep1["SunDayOtHours"];
				$Sex=$rowDep1["Sex"];
				$TreadUnion=$rowDep1["TreadUnion"];
				$EPFEmployee=$rowDep1["EPFEmployee"];
				$PayCut=$rowDep1["PayCut"];
				$EPFCompany=$rowDep1["EPFCompany"];
				$ETF=$rowDep1["ETF"];
				$NCashBenefits=$rowDep1["NCashBenefits"];
				$nopayAmountAllownse=$rowDep1["nopayAmountAllownse"];
				$LonePayment=$rowDep1["LonePayment"];
				$NetSalary=$rowDep1["NetSalary"];
				$SalaryAdvance=$rowDep1["SalaryAdvance"];
				$LoanBalance=$rowDep1["LoanBalance"];
				$GrossSalary=$rowDep1["GrossSalary"];
				$EmployeeID=$rowDep1["EmployeeID"];
				$SunDayOT=$rowDep1["SunDayOT"];
				$EmployeeName=$rowDep1["EmployeeName"];
				$EmployeeLName=$rowDep1["EmployeeLName"];
				$EmployeeSName=$rowDep1["EmployeeSName"];
				$TempEmployee=$rowDep1["TempEmployee"];
				$FixedDeduction=$rowDep1["FixedDeduction"];
				$FixedAllowance=$rowDep1["FixedAllowance"];
				$VarianceDeduction=$rowDep1["VarianceDeduction"];
				$VarianceAllowance=$rowDep1["VarianceAllowance"];
				$BalanceBF=$rowDep1["BalanceBF"];
				$BalanceCF=$rowDep1["BalanceCF"];
				$SaturdayAllowence=$rowDep1["SaturdayAllowence"];
				$WorkingDays=$rowDep1["WorkingDays"];
				$NormalOt=$rowDep1["NormalOt"];
				$DoubleOt=$rowDep1["DoubleOt"];
				$PayCutEvenin=$rowDep1["PayCutEvenin"];
				$BasicSalaryforEPF=$rowDep1["BasicSalaryforEPF"];
				$OTHours=$rowDep1["OTHours"];
				$OrgBasicSalery=$rowDep1["OrgBasicSalery"];
				$OrgBasicSalery1=$rowDep1["OrgBasicSalery"];
				$CategoryID=$rowDep1["CategoryID"];
				$WeekNo=$rowDep1["WeekNo"];
				$LonePayment=$rowDep1["LonePayment"];
				$TotalDeduction=$rowDep1["TotalDeduction"]; 
				//$TotalDeduction = $EPFEmployee + $SalaryAdvance + $LonePayment + $TradeUni + $PayCut + $PayCutEvenin;
				$SundayAllownce=0;
				$SundayAllownce=$rowDep1["SundayAllownce"];
				$NonCashBenefits=$rowDep1["NCashBenefits"];
				
				$Allownswithouttable  = $SaturdayAllowence  + $SundayAllownce ;
				
				$fullName= $EmployeeName.' '.$EmployeeLName.' '.$EmployeeSName; 
				
				if($TempEmployee=='1'){
					$PayCut = 0;
					$PayCutEvenin = 0;
				}
				$TotalOTAmount=0;
				$TotalOTAmount =  $NormalOt + $DoubleOt + $SunDayOT;

				$TotalOAllowns =  $Allownswithouttable + $VarianceAllowance + $FixedAllowance;
				$AllTotalDeduction=0;
				//$AllTotalDeduction =  $FixedDeduction + $VarianceDeduction +$TotalDeduction ;
				$AllTotalDeduction =  $TotalDeduction ;
				
				//new added salary advace
		//		$GrossSalaryForTax = ($BasicSalary + $SalaryArrears + $TotalOTAmount) - ($Nopay + $NonCashBenefits );//+ $SalaryAdvance
				//new added VarianceAllowance
		//		$GrossSalary = $TotalOAllowns + $GrossSalaryForTax ;
		//		$NetSalary = $GrossSalary - ($AllTotalDeduction + $EPFEmployee + $ETF) ;//$FixedDeduction
				
				if($Category!=''){
					$tail = "WHERE Employee.CategoryID='$Category'";
				}else{
					$tail = "";
				}
				$Query_1 ="SELECT Department.Name,FixedAllowanceType.AllowancesDescription,
						PayFixedAllowance.workingDay,PayFixedAllowance.Amount,
						PayFixedAllowance.EmployeeID, 
						Employee.FirstName as EmployeeName,FixedAllowanceType.intOrder 
						FROM Department 
						INNER JOIN Employee ON Department.DepartmentID = Employee.DepartmentID
						INNER JOIN PayFixedAllowance ON `employee`.`EmployeeCode`  = PayFixedAllowance.EmployeeID 
						INNER JOIN FixedAllowanceType ON PayFixedAllowance.AllwanceTypeID = FixedAllowanceType.ID
						$tail ";
				$result_1 = $db_handle->runQuery($Query_1);
				if(!empty($result_1)) {
					foreach ($result_1 as $rowDep_1) {
						$AllowancesDescription=$rowDep_1["AllowancesDescription"];
						$workingDay=$rowDep_1["workingDay"];
						$Amount=$rowDep_1["Amount"];
						$intOrder=$rowDep_1["intOrder"];
						
						// if($ALLOWNCEPS=='1'){
							// if($AllowancesDescription=="Sunday Extra Allowance"){
								// $Ratex = $Amount / $workingDay;
							// }else{
								// if($workingDay!=0){
									// $Ratex = $Amount / $workingDay;
								// }else{
									// $Ratex = 0;
								// }
								
							// }
							
							
							// if($GROSSSALARYFORTAXPS == '1'){
								
							// }
						// }
						
					}
				}
				

				
				if($BasicSalary > 0 || $DaySalary > 0){
					$WithoutPoyaday = $WorkingDays - $PoyaDayWorking;
					
					?>
					<table width="650" height="27" border="1" align="center">
						<tr class="kf" >
							<td width="600" align="center" bgcolor="#DADADF"><b><?php echo $Header1;?></b></td>
						</tr>
					</table>
					<table width="650" height="27" border="1" align="center">
						<tr class="kf" >
							<td width="600" align="center" bgcolor="#DADADF"><?php echo $Header2;?></td>
						</tr>
					</table>
					<table width="650"  border="0" align="center">
						<tr class="kf" >
						  <td width="600" height="23" align="center"><?php echo $Header4;?></td>
						</tr>
					</table>				
					
					<table width="650" height="29" border="0" align="center">
						<tr class="kf" >
						  <td width="600" height="23" align="center">PAY SLIP</td>
						</tr>
					</table>
					
					<table width="650" align="center" border="0">
						<tr>
						  <td width="180"><font size="4px"> Employee Code&nbsp;&nbsp;&nbsp;&nbsp;:</font></td>
						  <td width="115"> <?php echo $EmployeeID; ?></td>
						  <td>&nbsp;</td>
						  <td width="114"><font size="4px">Printed Date&nbsp;&nbsp;&nbsp;:</font></td>
						  <td width="78"><?php echo date("d/m/Y",strtotime($today));?></td>
						</tr>
						<tr>
						  <td width="108"><font size="4px">Employee Name&nbsp;&nbsp;:</font></td>
						  <td width="115"><?php echo $EmployeeName; ?></td>
						  <td>&nbsp;</td>
						  <td><font size="4px">Printed Time&nbsp;&nbsp;&nbsp;:</font></td>
						  <td><?php echo $todayTime ;?></td>
						</tr>
					</table>
					</br>
					<!---Start--->
					<table width="654" border="0" align="center">
						<tr>
							<td width="273" align="left"><b><font><U>Description</U></font></b></td>
							<td width="158" align="right"><b><font><U>Amount</U></font></b></td>
								
						</tr>
						
							<tr class = 'gap'>
							<td width="273" align="left"></td>
							<td width="158" align="right"></td>	
							</tr>
						
						
						<!--Basic Salary-->
						<tr>
							<td width="273" align="left">BASIC SALARY</td>
							<td width="158" align="right"><font><?php echo number_format($OrgBasicSalery,2); ?></font></td>
								
						</tr>
						
						<!--OT-->
						<tr>
							<td width="273" align="left">TOTAL OT</td>
							<!--td width="158" align="right"><font>?php echo  number_format($OTAmount,2); ?></font></td-->
							<td width="158" align="right"><font><?php echo  number_format($TotalOTAmount,2); ?></font></td>
								
						</tr>
						
						<?php 
						//Salary Arrears
						if($SalaryArrears=='1'){
							?>
							<tr>
								<td width="273" align="left">SALARY ARREARS</td>
								<td width="158" align="right"><font><?php echo  number_format($SalaryArrears,2); ?></font></td>
								
							</tr>
							<?Php
						}
						
						//No pay
						if($NOPAYPS=='1'){
							?>
							<tr>
								<td width="273" align="left">NO PAY</td>
								<td width="158" align="right"><?php echo  number_format($Nopay,2); ?></td>
									
							</tr>
							<?php
						}
						
						//Additions
						/*if($ALLOWNCEPS=='1'){
							?>
							<tr>
								<td width="273" align="left">ADDITIONS</td>
								<td width="158" align="right"><?php 0; ?></td>
									
							</tr>
							<?php
						}*/
						
						//Allowance No Pay
						if($ALLOWNCEPS=='1'){
							?>
							<tr>
								<td width="273" align="left">ALLOWNCENOPAYPS</td>
								<td width="158" align="right"><?php echo  number_format($nopayAmountAllownse,2); ?></td>
									
							</tr>
							<?php
						}
						
						//Double OT
						if($OTPS=='1'){
							if($IsAttendance=='1'){
								/*if($DOUBLEOTPS=='1'){
									?>
									<tr>
										<td width="273" align="left">DOUBLE OT</td>
										<td width="158" align="right"><?php echo  number_format($DoubleOt,2); ?></td>
											
									</tr>
									<?php
								}*/
								// if($isMale=='1'){
										// $OTRate = $MaleOT;
								// else{
										// $OTRate = $FemaleOT;
									
								// }	
								/*if($SunDayOT =='1'){
									?>
									<tr>
										<td width="273" align="left">SUNDAY OT</td>
										<td width="158" align="right"><?php echo  number_format($SunDayOT,2); ?></td>
											
									</tr>
									<?php
								}*/	
							}
						}
						//Gross Salary
						if ($GROSSSALARYPS = 1){
							?>
							<tr>
							<td width="273" align="left">TOTAL ALLOWANCES</td>
							<td width="158" align="right"><?php echo number_format($TotalOAllowns,2);/*$AllOWANCES;*/ ?></b></td>	
							</tr>
							
							<tr>
							<td width="273" align="left"><b>GROSS SALARY</b></td>
							<td width="158" align="right"><b><?php echo number_format($GrossSalary,2); ?></b></td>	
							</tr>
							<?php	
						}
						?>
							<tr class = 'gap'>
							<td width="273" align="left"></td>
							<td width="158" align="right"></td>	
							</tr>
							
						<?php
						
						//'EPF Deduction from Employee
						if($EPFEMPLOYEEPS=='1'){
							?>
							<tr>
								<td width="273" align="left">EPF EMPLOYEE 8%</td>
								<td width="158" align="right"><?php echo number_format($EPFEmployee,2); ?></td>
									
							</tr>
							<?php
						}
						//Deduction
						if($EPFEMPLOYEEPS=='1'){
						?>
							
							<tr>
							<td width="273" align="left">SALARY ADVANCE</td>
							<td width="158" align="right"><?php echo  number_format($SalaryAdvance,2); ?></td>
							</tr>
							
							<tr>
							<td width="273" align="left">LOAN PAYMENT</td>
							<td width="158" align="right"><?php echo  number_format($LonePayment,2); ?></td>
							</tr>
							
							<?php	
							//Paycut
							if($PAYCUTPS=='1'){
								if($IsAttendance=='1'){
								?>	
								<tr>
								<td width="273" align="left">PAY CUT</td>
								<td width="158" align="right"><?php echo  number_format($PayCut + $PayCutEvenin,2); ?></td>
								</tr>
								<?php	
								}
							}
							?>
							<tr>
							<td width="273" align="left"><b>TOTAL DEDUCTION</b></td>
							<td width="158" align="right"><b><?php echo  number_format($AllTotalDeduction,2); ?></b></td>
							</tr>
						<?php
						}else{
							
							//Paycut
							if($PAYCUTPS=='1'){
								if($IsAttendance=='1'){
								?>
								<tr>
								<td width="273" align="left">PAY CUT</td>
								<td width="158" align="right"><?php echo  number_format($PayCut + $PayCutEvenin,2); ?></td>
								</tr>
								<?php	
								}
							}
							?>
						}
						
						//Coin B/F
						if($COINBFPS=='1'){
							
							?>	
							<tr>
							<td width="273" align="left">COIN B/F</td>
							<td width="158" align="right"><?php echo  number_format($BalanceBF,2); ?></td>
							</tr>
							<?php	
							
							
						}
						
						//Net Salary
						if($NETSALARYPS=='1'){
							
							?>	
							<tr>
							<td width="273" align="left"><b>NET SALARY</b></td>
							<td width="158" align="right"><b><?php echo  number_format($NetSalary,2); ?></b></td>
							</tr>
							<?php	
							
						}	
						
						
						?>
							<tr class = 'gap'>
							<td width="273" align="left"></td>
							<td width="158" align="right"></td>	
							</tr>
							
						<?php						
						
						//EPF Company
						if($EPFCOMPANYPS=='1'){
							
							?>	
							<tr>
							<td width="273" align="left">EMPLOYER EPF 12%</td>
							<td width="158" align="right"><?php echo  number_format($EPFCompany,2); //rate yawala ?></td>
							
							</tr>
							<?php	
							
							
						}
						
						
						if($ETFPS=='1'){
							
							?>	
							<tr>
							<td width="273" align="left">EMPLOYER ETF 3%</td>
							<td width="158" align="right"><?php echo  number_format($ETF,2);//rate yawala ?></td>
							</tr>
							<?php	
							
							
						}
						
						//Loan Balance
						if($LOANBALANCEPS=='1'){
							
							?>	
							<tr>
							<td width="273" align="left">LOAN BALANCE</td>
							<td width="158" align="right"><?php echo  number_format($LoanBalance,2); ?></td>
							</tr>
							<?php	
							
							
						}
						
						//Cash
						if($CASHPS=='1'){
							if($IsAttendance=='1'){
								?>	
								<tr>
								<td width="273" align="left">CASH</td>
								<td width="158" align="right"><?php echo 0; //cash yawala?></td>
								</tr>
								<?php	
							
							}
						}
						
						//Coin C/F
						if($COINSCFPS=='1'){
							
								?>	
								<tr>
								<td width="273" align="left">COINS C/F</td>
								<td width="158" align="right"><?php echo $BalanceCF;?></td>
								</tr>
								<?php	
							
						
						}
						
				}
			}
		}else{
			header("Location: ../../../../main.php?page=Forms/esPayroll/HR/PaySlip/payslip_UI.php&msg=Record not found");
		}

	
	}
	
	
	
	
	
?>
</body>
</html>







