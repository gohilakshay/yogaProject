<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;

//$batch_view = $batch->batch_view;
            if(isset($_POST['submit']))
            { 
                if(isset($_POST['batch']))
                {
                    $data =array('batch'=>$_POST['batch']);
                }
            }
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
    
    
</style>


<?php $page=2;include 'sidebar.php'; ?>

<?php include 'nav.php'; ?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaProject/view_client_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$client = json_decode($content);
$client_view = $client->client_view;
?>	   
       
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Client<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_client.php">
                                <i class="material-icons">plus_one</i> Add New Client
                            </a>
							 	
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Attendance</p>

                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="client_attendance.php">
                                <i class="material-icons">plus_one</i> Mark Attendance
                            </a>
				
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Payment</p>

                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">plus_one</i> Add Payment
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                
                        
                          <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                                     <i class="material-icons icon">search</i> 
                                     <h4 class="title">Client Details</h4>


                          
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>Client ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Batch Name</th>
                                <th>Status</th>
                                <th></th>
                                  <th></th>
                            </thead>

                            <tbody id="myTable"><?php $i=1;foreach($client_view as $value ):foreach($batch_view as $value1 ): if ($value->batch_id == $value1->batch_id){?>


                                <tr>
                                    <td><?php echo $i;$i++; ?></td>
                                    <td><?php echo $value->c_ID; ?></td>
                                 <td><a href="client_profile.php"><?php echo $value->c_name; ?></a></td> 
                                    <td><?php echo $value->contact; ?></td>
                                    <td><?php echo $value1->batch_name;  ?></td>
                                    <?php if($value->status_payment == 'unpaid'){ ?>
                                    <td><font style="color:red"><?php echo $value->status_payment;?></font></td>
                                    <?php }?>
                                    <?php if($value->status_payment == 'paid'){ ?>
                                    <td><font style="color:green"><?php echo $value->status_payment;?></font></td>
                                    <?php }?>
                                    

                                    <form action="edit_client.php" method="POST">
                                     <td style="width:20px!important;">
                                         <input value="<?php echo $value->c_ID;?>" type="hidden" name="c_id">
                                        <input  type="submit" class="btn btn-sm btn-warning"  value="Edit">
                                        </td>
                                       
                                    </form>
                                        <td style="width:20px!important;">
                                    <div class="dropdown">

                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Delete
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" name="Delete">Yes confirm</a></li>
                                            <li><a href="#">No</a></li>
                                        </ul>
                                        </div>
                                    </td>                              
                                  
                                </tr><?php } endforeach;?><?php endforeach;?>
                            </tbody>
                        </table>
	                </div>   
                </div>
            </div>
        </div>
    </div>
</div>

					
			<?php include 'footer.php'; ?>
<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>

<?php include 'script_include.php'; ?>
