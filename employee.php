<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_employee_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employe = json_decode($content);
$employee_view = $employe->employee_view;

?>
<?php include 'header.php'; ?>
<style>
    #myInput{
        width:20%;
        float:right;
        color:white;
    }
    .form-group{
        padding-bottom: 0px!important;
        margin: 0 0 0 0!important;
    }
    .icon{
    
        float:right;
    }
    #inlist{
        overflow: hidden;
        word-wrap:normal |break-word;
    }
    
    .dropdown-menu_1 {
  position: relative;
}
    
    #drop_style{
      min-width: 50px!important; 
    }
  
    .dropdown-toggle_1 {
       float:left;
       margin-top:20px;
}
 </style>
<?php $page=3;include 'sidebar.php'; ?>
<?php $nav=3;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
<!--card for add employee,attendance,payment-->            
              <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Employee<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_employee.php">
                                <i class="material-icons">plus_one</i> Add New Employee
                            </a>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Trainer<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_trainer.php">
                                <i class="material-icons">plus_one</i>Add Trainer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">touch_app</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Attendance</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="employee_attendance.php">
                                <i class="material-icons">plus_one</i> Mark Attendance
                            </a>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">payment</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Payment</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="employee_payment.php"><i class="material-icons">plus_one</i> Add Payment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
<!--view all employee information-->            
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Employee Details</h4>
                    </div>
                </div>
               
                <div class="card-content table-responsive">
                    <table id="inlist" class="table table-hover table-striped">
                        <thead class="text-primary">
                            <th>Sr no.</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody id="myTable"><?php $i=1;foreach($employee_view as $value): ?>
                            <tr>
                                <td><?php echo $i;$i++; ?></td>
                                <td><?php echo $id = $value->e_ID;?></td>
                                <td><a href='view_employee_profile.php?e_id=<?php echo $id;?>'><?php echo $value->e_name; ?></a></td>
                                <td><a href='view_employee_profile.php?e_id=<?php echo $id;?>'><?php echo $value->e_surname; ?></a></td>
                                <td><?php echo $value->contact;?></td>
                                <?php if($value->status == 'unpaid'){ ?>
                                <td><font style="color:red"><?php echo $value->status;?></font></td>
                                <?php }?>
                                <?php if($value->status == 'paid'){ ?>
                                <td><font style="color:green"><?php echo $value->status;?></font></td>
                                <?php }?>
<!-- user access control for edit button-->                                  
                                   <?php if((($_SESSION['permission']== 'admin' ||'superadmin') || ($_SESSION['permission']== 'operator'))&&($_SESSION['permission'] != 'user' )){?> 
                                <form action="edit_employee.php" method="POST">
                                    <input value="<?php echo $value->e_ID;?>" type="hidden" name="e_ID">
                                    <td style="width:20px!important;"> <input style="width:50px; height:28px;" src="assets/img/edit.png" class="btn btn-xs btn-warning" type="image" alt="submit" value="">
                                    </td>
                                </form>
                                <?php }?>
<!-- user access control for delete button-->                                
                                 <?php  if(($_SESSION['permission'] == 'admin' || 'superadmin' )&&(($_SESSION['permission']!='operator')&&($_SESSION['permission']!= 'user'))){?> 
                                <td> 
                                    <div class="dropdown">
                                        <button  class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle_1" type="button" data-toggle="dropdown">
                                            <i class="material-icons">delete</i>
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu_1" id="drop_style">
                                            <li><a tabindex="-1" href='delete_employee_api.php/?e_ID=<?= $id;?>'>Yes</a></li>
                                            <li><a tabindex="-1" href="#">No</a></li>
                                        </ul>
                                    </div>
                                </td>  <?php }?>                
                            </tr><?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('.dropdown-toggle_1').click(function() {
  dropDownFixPosition($('button'), $('.dropdown-menu_1'));
});

function dropDownFixPosition(button, dropdown) {
  var dropDownTop = button.offset().top + button.outerHeight();
  dropdown.css('top', dropDownTop + "px");
  dropdown.css('right', button.offset().right + "px");
}

</script>

<!--include validation script session end-->
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else {header('Location: index.php');}//echo "<h1>No User Logged In</h1>";
?>
