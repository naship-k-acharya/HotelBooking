<?php
session_start(); 
require_once('connectiondb.php');
include("dashboard.php");
?>

<section id="content">
    <main>
    <div class="table-data">
<div class="order">
	<?php 
	if(isset($_SESSION['success'])){
		echo '<div class="alert">'.$_SESSION['success'].'</div>';
		unset($_SESSION['success']);
	}
	?>
					<table>
						<thead>
							<tr>
								<th>S.N.</th>
								<th>User Name</th>
								<th>Email</th>
								<th>Full Name</th>
								<th>Role</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
                              $sql = mysqli_query($conn,"SELECT * FROM users");
							  if(mysqli_num_rows($sql)>0 ){
								foreach($sql as $row){
							?>
							  <tr>
								<td><?= $row['id'];?></td>
								<td><?= $row['username'];?></td>
								<td><?= $row['email'];?></td>
								<td><?= $row['full_name'];?></td>
								<td><?php if($row['role'] == 1) echo "Admin"; else echo "user";?></td>
                                <td>
                                    <a href="update.php?change=<?= $row['id'];?>">
                                    <i class='bx bx-edit' title="change role"></i>
                                    </a>
                                </td>
								<td>
									<a href="delete.php?delete=<?= $row['id']; ?>" >
										<i class='bx bx-trash' title="delete user"></i>
									</a>
								</td>
								<!-- <td><img src="image/<?= $book['image'];?>" width="50" height="50"></td> -->
							  </tr>
							<?php }}?>
						</tbody>
					</table>
				</div>
    </div>
    </main>
</section>