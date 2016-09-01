<div class="row">
	<div class="col-xs-5" style="">
		<div id="title-page" style="margin-bottom: 30px ;">
			<h3 style="margin:0">Manage Your Client</h3>
		</div>
		
	</div>
	<div class="col-xs-7">
		<a href="<?php echo base_url('main/add_client') ?>" class="btn btn-primary pull-right">Add User</a>
	</div>
</div>

<div class="row">
<?php if($this->session->flashdata('success')): ?>
     <div class="col-xs-12 alert alert-success">
          <?php echo $this->session->flashdata('success'); ?>
     </div>
<?php endif; ?>
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

		<input type="checkbox" value="10" id="test_1" onclick="calc(this)">
		<input type="checkbox" value="20" id="test_2" onclick="calc(this)">

		<strong id="total">10</strong>
	</div>
</div>


	 <script>
        function calc(el){


                var price = $(el).val();
                price = price.replace(/,/g,'');
               
                before_total = $('#total').html();
				before_total = before_total.replace(/,/g,'');

				if($(el).is(':checked')){
					subtotal_val = Number(before_total) + Number(price);
				}else{
					subtotal_val = Number(before_total) - Number(price);
				}
				subtotal = Number(subtotal_val).toLocaleString('en');
				$('#total').empty();
				

                 $.ajax({

                    type: 'POST', //method
                    url : '<?php echo site_url('main/calc_total/'); ?>', //action
                    data : { price: price, subtotal : subtotal }, //name
                    success: function(response){ //response
                        $('#total').html(response);
                    }

                });    
        }
    </script>





