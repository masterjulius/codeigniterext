<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$matBase = base_url('materializecss');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php
	echo meta('viewport', 'width=device-width, initial-scale=1.0', 'viewport');
?>
	<title>&mdash; Dashboard</title>
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $matBase; ?>/css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $matBase; ?>/css/style.min.css" media="screen,projection" />
</head>
<body>
	
	<div class="container-fluid admin-dashboard">
		
		<div class="row">

			<div class="col m3 l3 admin-sidebar">
				
				<nav class="nav-sidebar-profile">
					
					<div class="nav-wrapper">
						
					</div>

				</nav>

				<nav class="nav-sidebar-menu">
					
					<div class="nav-wrapper">
						
						<ul class="">
							<li><a href="<?php echo site_url( 'Home_controller' ); ?>">Add</a></li>
							<li><a href="">Users</a></li>
							<li><a href="<?php echo site_url( 'Home_controller/user_roles' ) ?>">User Roles</a></li>
							<li><a href="<?php echo site_url( 'Home_controller/sign_out' ); ?>">Sign Out</a></li>
						</ul>

					</div>

				</nav>

			</div>

			<div class="col m8 l8">
				
				<div class="row">
					
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>CODE</th>
								<th>NAME</th>
								<th>DESCRIPTION</th>
								<th>DATE</th>
							</tr>
						</thead>
						<tbody>
	
					<?php
						foreach ($item_datas as $row) {
					?>
							<tr>
								<td><?php echo $row->id ?></td>
								<td><?php echo $row->code ?></td>
								<td><?php echo $row->name ?></td>
								<td><?php echo $row->description ?></td>
								<td><?php echo $row->date ?></td>
							</tr>
					<?php		
						}							
					?>

						</tbody>
					</table>

				</div> <!-- End Row -->

				<!-- Row Actions Buttons -->
				<div class="row">
					<a href="<?php echo site_url( 'Export/excel/' ); ?>" class="btn">Export Excel</a>
				</div>
				<!-- End of action button rows -->

			</div>

		</div>

	</div>

</body>
</html>