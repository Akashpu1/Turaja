<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


<div class="container bg-dark text-white ">
	<div class="row">
		<div class="col-sm-8">
			<h2>Click on this button to add details</h2>
		</div>
		<div class="col-sm-4"><button type="button" class="btn btn-primary btn-block" data-toggle="modal"
				data-target="#myModal1">ADD ITEM<i class="material-icons"
					style="font-size:30px;color:red; float:right">add_circle_outline</i>
				</i></button></div>
	</div>

</div>

<!-- The Modal -->
<div class="modal" id="myModal1">
	<div class="modal-dialog">
		<div class="modal-content container bg-dark text-white">
			<!-- //main form -->
			<div class=" modal-header">

				<h3 class="modal-title">Enter details</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class=" modal-body">
				<?php include('form_add.php');?>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
			<!-- //main form end -->
		</div>
	</div>
</div><!-- //modal  end -->
<div class="modal" id="myModal2">
	<div class="modal-dialog">
		<div class="modal-content container bg-dark text-white">
			<!-- //main form -->
			<div class=" modal-header">

				<h3 class="modal-title">Update Details</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class=" modal-body">
				<?php include('form_update.php');?>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
			<!-- //main form end -->
		</div>
	</div>
</div><!-- //modal  end -->
<br>
<div class="container bg-dark text-white ">
	<h2>User Details</h2>
	<?php  if(count($contact)>0){
		
echo "<table class='table bg-dark text-white'><tr><th>id</th><th>name</th><th>email</th><th>edit</th><th>delete</th></tr>";
 foreach ($contact as $row ) {
echo "<tr><td>".$row['id']." </td><td>".$row['name']."</td><td>".$row['email']."</td>
<td><button type='button' class='btn btn-warning btn-block edit' data-toggle='modal' data-target='#myModal2' id=".$row['id'].">edit</button>
</td>
<td><button type='button' class='btn btn-danger btn-block delete' id=".$row['id'].">delete</button>
</td></tr>";
}
echo"</table>";

}
else
echo "<h4>No record found</h4>";
?>
</div>
<script>
	$(document).ready(function () {
		$('.delete').click(function () {
			var id = $(this).attr('id');
		
			if (confirm("are you sure you want to delete this")) {
				window.location = "<?php echo base_url();?>Welcome/delete/" + id;
			} else
				return false;
		});
        $('.edit').click(function () {
            
            var $row = $(this).closest("tr");       // Finds the closest row <tr> 
            
            var id=$row.find("td:eq(0)").text();
            var name=$row.find("td:eq(1)").text();
            var email=$row.find("td:eq(2)").text();
            $("#nameUpdate").val(name);
            $("#emailUpdate").val(email);
            $("#idUpdate").val(id);
		});
	});
</script>
