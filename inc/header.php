<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-3.1.1.js">
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
</head>
<body>
	<?php 
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	ini_set("html_errors", 1);
	ini_set("log_errors", 1);
	ini_set('display_startup_errors', 1);
	?>
	<header class="header">
			<div class="container">
            	<div class="row header-row">
                	<div class="branding-title col-xs-8">
						<h1><a href="/blood_bank/index.php">Blood Bank App</a></h1>
					</div>
			
					<?php 
					if (($pageTitle == 'Login Page') or ($pageTitle == 'Signup Page')) {
						$showDivFlag = false;
					}
					else {
						$showDivFlag = true;
					}
					?>
				
					<a href="<?php echo $state.".php"; ?>">
						<div class="login-logout-button col-xs-4" <?php if ($showDivFlag==false){?>style="display:none"<?php }?> >
						<?php echo $state; ?>	
						</div>
					</a>
				</div>
			</div>
	</header>
	<main>
		<div class="container">
			<div class="row">
