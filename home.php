<?php include 'header.php'; ?>
  <?php $page=1;include 'sidebar.php'; ?>
   <?php $nav=1;include 'nav.php'; ?>
	   
           <div class="content">
				<div class="container-fluid">
                    
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
								  <i class="material-icons">person</i>
								</div>
								<div class="card-content">
									<p class="category">Client</p>
								</div>
								<div class="card-footer">
									<div class="stats">
										<a href="add_client.php"><i class="material-icons">plus_one</i> Add New Client</a> 
								
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
                                      <i class="material-icons">people</i>
								</div>
								<div class="card-content">
									<p class="category">Employees</p>
<!--									<h3 class="title">50</h3>-->
								</div>
								<div class="card-footer">
									<div class="stats">
										<a href="add_employee.php"><i class="material-icons">plus_one</i> Add New Employee</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    
                    <div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
									<i class="material-icons">group_add</i>
								</div>
								<div class="card-content">
									<p class="category">Set of Batches</p>
<!--									<h3 class="title">75</h3>-->
								</div>
								<div class="card-footer">
									<div class="stats">
										<a href="add_batch.php"><i class="material-icons">plus_one</i> Add New Batches</a>									
                                    </div>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">touch_app</i>
								</div>
								<div class="card-content">
									<p class="category">Attendance</p>
				
								</div>
								<div class="card-footer">
									<div class="stats">
								                 <a href="client_attendance.php"><i class="material-icons">plus_one</i> Mark client Attendance</a>									
                                    
									</div>
								</div>
							</div>
						</div>
                        </div>
                    
                        <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">touch_app</i>
								</div>
								<div class="card-content">
									<p class="category">Attendance</p>
				
								</div>
								<div class="card-footer">
									<div class="stats">
								                 <a href="employee_attendance.php"><i class="material-icons">plus_one</i> Mark employee Attendance</a>									
                                    
									</div>
								</div>
							</div>
						</div>
                        
                        
                        </div>
                        
                        
					
                    
                    
               </div>
            </div>
			                    
					
			<?php include 'footer.php'; ?>

<?php include 'script_include.php'; ?>
