<div class="row">
	<div class="col-xs-5" style="">
		<div id="title-page" style="margin-bottom: 30px">
			<h3 style="margin:0">Manage Your Client</h3>
		</div>
		
	</div>
	<div class="col-xs-7">
		<a href="" class="btn btn-primary pull-right">Add User</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Client Name</th>
					<th>Company Admin</th>
					<th>URL</th>
					<th>Email</th>
					<th>Registration Date</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
			<?php foreach($clients as $client): ?>
				<tr>
					<td><?php echo $client->name ?></td>
					<td><?php echo $client->company_admin ?></td>
					<td><?php echo $client->url ?></td>
					<td><?php echo $client->email ?></td>
					<td><?php echo $client->registration_date ?></td>
					<td><?php if($client->status == 0){
								echo 'Expired';
							  }else if($client->status == 1){
							  	echo 'Active';
							  } ?>
									
					</td>
					<td>EDIT | DELETE</td>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>



