<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User View</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<td>User ID</td>
				<td>Username</td>
				<td>Password</td>
				<td>Actions</td>
			</tr>
		</thead>

		<tbody>
		<?php
			foreach ($resultArray as $key => $row) {
				$data_id = $row->user_id;
				echo "
				<tr>
					<td>{$data_id}</td>
					<td>{$row->user_name}</td>
					<td>{$row->user_password}</td>
					<td></td>
				</tr>
				";
			}
		?>	
		</tbody>
	</table>
</body>
</html>