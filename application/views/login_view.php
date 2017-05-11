<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$matBase = base_url('materializecss');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign In</title>
<?php
	echo meta('viewport', 'width=device-width, initial-scale=1.0', 'viewport');
?>	
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $matBase; ?>/css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $matBase; ?>/css/style.css" media="screen,projection" />
	<!--Let browser know website is optimized for mobile-->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"/> -->
</head>
<body>
	<div class="container">
		<div class="row">

		<?php echo form_open( 'Form_controller/sign_in', array('class' => 'col s12 m6 offset-m3') ); ?>

			<div class="row">
				
				<?php echo validation_errors(); ?>

				<div class="input-field col s12">
		<?php
					echo form_input(
						array(
							'name'          => 'username',
						    'id'            => 'username',
						    'autofocus'     => 'autofocus',
						    'class'			=> 'validate'
						)	
					);
		?>		
					<label for="username">Username:</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
		<?php
					echo form_input(
						array(
							'name'          => 'password',
						    'id'            => 'password',
						    'type'          => 'password',
						    'class'			=> 'validate'
						)
					);
		?>			
					<label for="password">Password:</label>
				</div>
			</div>

			<div class="row">
				
				<p>
					
		<?php
					echo form_input(
						array(
							'name'			=> 'signinoption',
							'id'			=> 'keepmeloggedin',
							'type'			=> 'checkbox',
							'class'			=> 'filled-in'
						)
					);
		?>
					<label for="keepmeloggedin">Keep me logged in</label>
				</p>

			</div>


			<div class="row">
				<input-field class="col s12">
		<?php
					echo form_submit('submit','Sign In', array('class' => 'btn'));
		?>			
				</input-field>
			</div>


		</div>
	</div>

	<script src="<?php echo $matBase; ?>/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo $matBase; ?>/js/materialize.min.js"></script>
		
</body>
</html>