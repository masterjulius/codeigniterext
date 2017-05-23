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

			<ul id="slide-out" class="side-nav fixed dashboard-sidebar">

		    	<li class="dashboard-sidebar-header">
		    		<div class="userView">
			      		<div class="background">
			       			<img src="<?php echo $matBase; ?>/images/directads-algorythm_1x.jpg" />
			      		</div>
			      		<a href="https://github.com/masterjulius/codeigniterlibrary"><img class="circle" src="<?php echo $matBase; ?>/images/dude.jpg"></a>
			      		<a href="#!name"><span class="white-text name">John Doe</span></a>
			      		<a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
		    		</div>
		    	</li>
		    	
		    	<li><a class="subheader center">Actions</a></li>
		    	<li><a class="waves-effect" href="<?php echo site_url( 'Home_controller' ); ?>"><i class="material-icons">note_add</i> Add</a></li>
		    	<li><a class="waves-effect" href="<?php echo site_url( 'Home_controller/user_roles' ) ?>"><i class="material-icons">supervisor_account</i> User</a></li>
		    	<li><a class="waves-effect" href="<?php echo site_url( 'Home_controller/sign_out' ); ?>"><i class="material-icons">vpn_key</i> Sign Out</a></li>

		  	</ul>

		  	<a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>


			<div class="row">

				<div class="col m9 l9 offset-m3 offset-l3">
				
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
							<?php echo "<h1>".$_ci_view."</h1>"; ?>
					</div>
					<!-- End of action button rows -->

				</div>
				
			</div>		


		</div>

	</div>

</body>
</html>