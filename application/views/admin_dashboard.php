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
		    	<li><a class="waves-effect" href="<?php echo site_url( 'Home_controller' ); ?>"> Add</a></li>
		    	<li><a class="waves-effect" href="<?php echo site_url( 'Home_controller/user_roles' ) ?>"> Roles</a></li>
		    	<li><a class="waves-effect" href="<?php echo site_url( 'Home_controller/user_roles' ) ?>"> User</a></li>
		    	<li><a class="waves-effect" href="<?php echo site_url( 'Home_controller/sign_out' ); ?>"> Sign Out</a></li>

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
						<div class="col m12 l12">

							<a href="<?php echo site_url( 'Export/excel/' ); ?>" class="btn">Export Excel</a>
							<?php echo "<h5>".$_ci_view."</h5>"; ?>

							<?php
								
								echo "<pre>";
									print_r($https);
								echo "</pre>";
							?>

							<hr/>

							<h6>
							<?php
								$str = '{"username" : "admin", "password" : "$6$rounds=5000$@eVrY49(`a sMV6|$yVP8.1jAIUswya9cCVmenu3f80YM8crxXM3M4in7hCvCrMW52crho8J1Vnt6DVSC3NUyrN2BW54viz9lUnlLE0", "by" : "0", "arr" : {"1" : "one", "2" : "two"} }';
								echo 'Encrypted json: ' . $enc = $this->encryption->encrypt( $str );
								echo "<h6>Char count: " . strlen($enc) . "</h6>";
								echo '<hr/>';
								echo $decrypted = 'Decrypted: ' . $this->encryption->decrypt( $enc );
								$json = json_decode( $decrypted );
								echo '<pre>';
									print_r( $json );
								echo '</pre>';
							?></h6>



							<?php
								// ---------------------------------------------------------------
								$caps = '{
									"role_name" : "Rock and Rollo",
									"pages" : {
										"page_one" : {
											"create" : "1",
											"edit" : "1",
											"delete" : "1",
											"save" : "1",
											"read" : "1",
											"edit_others" : "1", 
											"delete_others" : "1" 
										}
									},
									"description" : "This is a sample description of this role."
								}';
								$llmm = json_decode( $caps );
								echo '<pre>';
									print_r( $llmm );
								echo '</pre>';
							?>


						</div>

					</div>
					<!-- End of action button rows -->

				</div>
				
			</div>		


		</div>

	</div>

</body>
</html>