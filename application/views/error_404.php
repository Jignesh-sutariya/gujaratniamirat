<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= APP_NAME ?> | 404 Page Not Found</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Chango" rel="stylesheet">
		<?= link_tag('assets/dist/css/error.css','stylesheet','text/css') ?>
	</head>
	<body>
		<div id="notfound">
			<div class="notfound">
				<div>
					<div class="notfound-404">
						<h1>!</h1>
					</div>
					<h2>Error<br>404</h2>
				</div>
				<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.
					<?= anchor('', 'Back to homepage') ?>
				</p>
			</div>
		</div>
	</body>
</html>