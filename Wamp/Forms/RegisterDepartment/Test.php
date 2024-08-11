<?php 
require_once("../../Connection/dbconnecting.php");  ?>
<html class="no-js" lang="en">

	<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	 
	
	     
	  
	  
	  
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>

<body>
	<div class="datatable-dashv1-list custom-datatable-overright">
											<div id="Insert_Department" >
												<table id="table" data-toggle="table" >
												
													<thead>
														<tr>
															<th data-field="Departments" data-editable="true">Departments</th>
															<th data-field="Action">Action</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$queryA = "SELECT * FROM `departments` ORDER BY `departments`.`Departments` ASC";
														$resultA = $db_handle->runQuery($queryA);
														if (!empty($resultA)) {
															foreach ($resultA as $r) {
																$ID = $r['ID'];
														?>
																<tr id="row-<?php echo $ID; ?>">
																	<td id="Departments-<?php echo $ID; ?>"><?php echo $r['Departments']; ?></td>
																	<td>
																		<div class="btn-group project-list-action">
																			<button class="btn btn-white btn-xs Update" id="<?php echo $ID; ?>"><i class="fa fa-pencil"></i> Edit</button>
																		</div>
																	</td>
																</tr>
														<?php
															}
														}
														?>
													</tbody>
												</table>
											</div>
										</div>
</body>

</html>

