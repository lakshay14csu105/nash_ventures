<?php
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {?>
				<div class="panel panel-primary" style="width: 80%;margin-left: 10%">
					<div class="panel-heading"><b>User Id: </b><?php echo $row['user_id'];?></div>
					<div class="panel-body">
						<?php if(isset($row['profile_picture'])) {
							echo "<img src='images/".$row['profile_picture']."' class='img-circle pull-right' width='150' height='150'>";
						}
						else {
							echo "<img src='images/temp.png' class='img-circle pull-right' width='150' height='150'>";
						}
						?>
						<p><b>Username:</b> <?php echo $row['username'];?></p>
						<p><b>First name:</b> <?php echo $row['firstname'];?></p>
						<p><b>Last name:</b> <?php echo $row['lastname'];?></p>
						<p><b>Email:</b> <?php echo $row['email'];?></p>
						<p><b>Phone:</b> <?php echo $row['phone'];?></p>
						<p>
							<a href="edit.php?id=<?php echo $row['user_id']?>" class="btn btn-primary btn-lg"><i class="fa fa-pencil"></i>  Edit</a>
						
							 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i>  Deactivate</button>
						</p>
						<br>
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">

							<!-- Modal content-->
								<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Deactivate User</h4>
										</div>
									<div class="modal-body">
										<p>Are you sure you want to deactivate user?</p>
									</div>
									<div class="modal-footer">
										<div class="row">
											<a href="deactivate.php?id=<?php echo $row['user_id'];?>"" class="btn btn-default" style="margin-bottom: 5px">Yes</a>
											<button type="button" class="btn btn-default" data-dismiss="modal" style="margin-bottom: 5px;margin-right: 5px">No</button>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			<?php
				}
		} else {
			echo "0 results";
		}
		$conn->close();
?>		