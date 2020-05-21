<html>
	<head>
		<title>ShopCoffeeMenuManagement</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/adminLoginStyle.css">

		<!--Duy-->

		
		<!--Duy-->
		<style>
			body
			{	
				margin:0;
				padding:0;
				background: #131419;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
				box-shadow: -5px -5px 20px rgba(255,255,255,0.5),
	 			10px 10px 30px rgba(0,0,0,0.01);
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<div><h1><img src="TDTlogo.png" style=" margin-bottom: 10px; width:100px; height:60px; "></h1></div>


			<!-- Duy -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-lg-auto">
							<?php
								if( !isset($_COOKIE['user']))
								{
									?>
											<a style="color: red;">Admin</a>
									<?php
								}
								else{
									?>
									<li class="nav-item">
										<a class="nav-link" href="guestInfo.php">Welcome, <?php echo $_COOKIE['user'];?>
										!</a>
									</li>
									<?php
								}
							?>
						</ul>
					</div>
			<!-- Duy -->


			<h1 align="center">Menu Management</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#drinkModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="drink_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Image</th>
							<th width="35%">Name</th>
							<th width="35%">Price</th>
							<th width="10%">Edit</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>
			</div>
			<!-- Duy -->
		
			<!-- Duy -->
	</body>

	<p style="text-align: center" class="cpryt">Copyright © 2020 Coffee Project. All rights reserved. Built by <a href="https://www.facebook.com/caotran.tuanduy">CTTD</a> & <a href="https://www.facebook.com/profile.php?id=100009451589729">TTK</a>.</p>
					
</html>

<div id="drinkModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="drink_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Drink</h4>
				</div>
				<div class="modal-body">
					<label>Enter Name</label>
					<input type="text" name="name" id="name" class="form-control" />
					<br />
					<label>Enter Price</label>
					<input type="text" name="price" id="price" class="form-control" />
					<br />
					<label>Select Drink Image</label>
					<input type="file" name="drink_image" id="drink_image" />
					<span id="drink_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="drink_id" id="drink_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#drink_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#drink_uploaded_image').html('');
	});
	
	var dataTable = $('#drink_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#drink_form', function(event){
		event.preventDefault();
		var drinkName = $('#name').val();
		var Price = $('#price').val();
		var extension = $('#drink_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#drink_image').val('');
				return false;
			}
		}	
		if(drinkName != '' && Price != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#drink_form')[0].reset();
					$('#drinkModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var drink_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{drink_id:drink_id},
			dataType:"json",
			success:function(data)
			{
				$('#drinkModal').modal('show');
				$('#name').val(data.name);
				$('#price').val(data.price);
				$('.modal-title').text("Edit User");
				$('#drink_id').val(drink_id);
				$('#drink_uploaded_image').html(data.drink_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var drink_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{drink_id:drink_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>