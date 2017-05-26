<?php
	// $admin_pages = (object) $admin_pages;
	echo '<pre>';
		print_r( $admin_pages );
	echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_ci_view; ?></title>
</head>
<body>
	<table border="1" cellpadding="5" style="border-collapse: collapse;">
		
		<thead>
			<tr>
				<th>Page Name</th>
				<th>Create</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Read</th>
				<th>Save</th>
				<th>Edit Other</th>
				<th>Delete Other</th>
			</tr>
		</thead>

		<tbody>
			
		<?php
			foreach ($admin_pages as $key => $value) {
				
		?>
				
				<tr>
					<td><?php echo $admin_pages[$key]->name; ?></td>
		<?php
				$index = 0;
				foreach ($admin_pages[0]->capabilities as $subkey => $val) {
					$key_name = $subkey . '_' . $admin_pages[$key]->name;
		?>
					<td>
		<?php
					if ( $val === true ) {
						echo "<label for='{$key_name}'>{$subkey}</label>";
			?>
							<br/>
							<input type="checkbox" name="<?= $key_name ?>" id="<?= $key_name ?>" />
						</td>
		<?php
					}
					$index++;		
				}
		?>
				</tr>

		<?php		

			}
		?>

		</tbody>

	</table>
	

</body>
</html>