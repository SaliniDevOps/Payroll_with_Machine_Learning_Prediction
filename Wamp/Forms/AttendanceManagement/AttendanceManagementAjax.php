<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
	$(document).ready(function(){
		$("#cmbDepartment").change(function() {
			var Department = $("#cmbDepartment").val();
			
			var dataString = 'Load_Department='+ Department;
			
			if(Department=='')
			{
				// alert("Please select employee");
			}else{
				
				$.ajax({
					type: "POST",
					url: "AttendanceManagementProcess.php",
					data: dataString,
					cache: false,
					success: function(html){
		   
						$("#DepartmentWise_Loading").html(html);
						// var EmployeeCodeld = $("#EmployeeCodeld").val();
						// document.getElementById('txtEmployeeCode').value=EmployeeCodeld;
		
						// var Employeenumber = $("#Employeenumber").val();
						// document.getElementById('txtEPFNO').value=Employeenumber;
		
						// $("#flash").hide();
					}
				});
			}
			return false;
		});
	});
</script>

<script type="text/javascript">
    //==============Customer Name Load==========================
   	$(document).ready(function(){
		$("#employeeCode").keyup(function(){
			var Tradname = $(this).val();
			var cmbDepartment = $("#cmbDepartment").val();
			var dataString = 'Tradname_key='+ Tradname + '&cmbDepartment='+ cmbDepartment ;
			
			$.ajax({
				type: "POST",
				url: "EmployeeCodeSuggeProcess.php",
				data:dataString,
				beforeSend: function(){	
					$("#CustomerName").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
				},
				success: function(data){
					$("#suggesstions1").show();
					$("#suggesstions1").html(data);
					$("#CustomerName").css("background","#FFF");
					
				}
			});
		});
	});
	function selectname(selected_value,FirstName){
		$("#employeeCode").val(selected_value);
		$("#employeeName").val(FirstName);
		$("#suggesstions1").hide();
	}
</script>

<script type="text/javascript">
    //Update script (UI)
 	// $(document).ready(function(){
		// $('a[class="Update"]').click(function(){
			// var Row_ID = $(this).val();
			// var Row_ID = $(this).attr("id");
			
			// if(Row_ID){
				// $.ajax({
					// type:'POST',
					// url: "AttendanceManagementProcess.php",
					// data:'Row_ID_update='+Row_ID,
					// success:function(html){
						// $('#Row_ID_update').html(html);
						
						// var txtID_T = $("#txtID_T").val(); 
						// document.getElementById('txtID').value=txtID_T;
						
						// var EMPCode_T = $("#EMPCode_T").val(); 
						// document.getElementById('cmbEmployeeName').value=EMPCode_T;
						// document.getElementById('cmbEmployeeName').disabled=true;
						
						// var CategoryID_T = $("#CategoryID_T").val(); 
						// document.getElementById('cmbCategory').value=CategoryID_T;
						// document.getElementById('cmbCategory').disabled=true;
						
						// var EMPDate_T = $("#EMPDate_T").val(); 
						// document.getElementById('dtpDate').value=EMPDate_T;	
						// document.getElementById('dtpDate').disabled=true;
					
						// var EMPCode_T = $("#EMPCode_T").val(); 
						// document.getElementById('txtEmployeeCode').value=EMPCode_T;	
						
						// var EPFNumber_T = $("#EPFNumber_T").val(); 
						// document.getElementById('txtEPFNO').value=EPFNumber_T;
						// document.getElementById('txtEPFNO').disabled=true;
						
						// var InOut_T = $("#InOut_T").val(); 
						// if(InOut_T==1){
							// document.getElementById('InTime').checked=true;
							// document.getElementById('OutTime').checked=false;	
						// }else{
							// document.getElementById('InTime').checked=false;
							// document.getElementById('OutTime').checked=true;	
						// }
						
						// var EmpTimen_T = $("#EmpTimen_T").val(); 
						// document.getElementById('dtpTime').value=EmpTimen_T;
						// document.getElementById('dtpTime').focus();
						
						// $('#city').html('<option value="">Select state first</option>'); 
					// }
				// }); 
			// }else{
				// $('#link_ShowData').html('<input type="text" value="g" >');
				// $('#city').html('<input type="text" value="e" >'); 
			// }
		// });   
	// });	
 </script>
 
 
 <script type="text/javascript">
	
    //Update script
 	$(document).ready(function(){
		$('button.Update').click(function(){
			var Row_ID = $(this).val();
			var Row_ID = $(this).attr("id");
			
			if(Row_ID){
				$.ajax({
					type:'POST',
					url: "AttendanceManagementUpdate.php",
					data:'Row_ID_update='+Row_ID,
						success:function(html){
						$('#Row_ID_update').html(html);
						
						var T_DepartmentID = $("#T_DepartmentID").val();
						$("#cmbDepartment").val(T_DepartmentID);
						var T_EmployeeCode = $("#T_EmployeeCode").val();
						var T_FirstName = $("#T_FirstName").val();
						var T_EMPDate = $("#T_EMPDate").val();
						var T_InOut = $("#T_InOut").val();
						//alert(T_DepartmentID)
						if(T_InOut==1){
							document.getElementById('In').checked=false;
							document.getElementById('Out').checked=true;	
							document.getElementById('In').disabled=true;	
						}else{
							document.getElementById('In').checked=true;
							document.getElementById('Out').checked=false;
							document.getElementById('Out').disabled=true;	
						}
						//document.getElementById('StatusID').focus();	 
						   
						document.getElementById('employeeCode').value=T_EmployeeCode;
						document.getElementById('employeeName').value=T_FirstName;
						document.getElementById('HiddenEMPDate').value=T_EMPDate;
						
							
						// input.focus();
						// input.select();
						
					}
				}); 
			}else{
				$('#link_ShowData').html('<input type="text" value="g" >');
				$('#city').html('<input type="text" value="e" >'); 
			}
		});   
	});	
 
</script>

<script type="text/javascript">
//insert Data

    $(function() {
		$(".Add_Button").click(function() {
			
			
			var employeeCode = $("#employeeCode").val();
			var Time = $("#txtTime").val();
			var HiddenEMPDate = $("#HiddenEMPDate").val();
			var status = $('input:radio[name="status"]:checked').val();
			
			if(status=='In'){
				INOUTTYPE=1;
			}else{
				INOUTTYPE=0;
			}
			
			alert(Time)
			var dataString = 'Insert_NewRecord='+ employeeCode + '&Time='+ Time+ '&INOUTTYPE='+ INOUTTYPE+ '&HiddenEMPDate='+ HiddenEMPDate;
			
			
			if(Time==''){
				
				
			}else
			{
			
				// $("#flash").show();
				// $("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
				
				$.ajax({
						type: "POST",
						url: "AttendanceManagementProcess.php",
						data: dataString,
						cache: false,
						success: function(html){

							$("#Insert_NewOne").html(html);
							// document.getElementById('txtCode').focus();
							// doccument.getElementById('txtCode').disabled=false; 
							// doccument.getElementById('cmbEmployeeName').disabled=false; 
							// document.getElementById('cmbEmployeeName').value='';
							// document.getElementById('txtDays').value='';
							// document.getElementById('txtCode').value='';
							// document.getElementById('NoPayID').value='';

							//$("#flash").hide();
						}
					});
			}
			return false;
			
	    });
	});
	 </script>