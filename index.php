<!DOCTYPE html>
<html lang="">
<head>
	<!-- META -->
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript"/>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<meta name="copyright" content=""/>
	<meta name="generator" content=""/>
	<meta name="distribution" content=""/>
	<meta name="date" content=""/>
	<!-- SCRIPTS -->
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<!-- STYLE -->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<title>ODIFT</title>
	<!-- LINK -->
	<link rel="shortcut icon" type="image/png" href="img/ico/favicon.png"/>
	<!-- PLUGINS -->
	<script src="plugins/smooth-page-scroll-to-top/smooth_scroll.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="plugins/smooth-page-scroll-to-top/smooth_scroll.css"/>
	<link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="plugins/animate/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="plugins/hover/hover.css"/>
	<script src="plugins/pace/pace.js" type="text/javascript"></script>
	<script src="plugins/smooth-mouse-scrolling-scrollspeed/jQuery.scrollSpeed.js" type="text/javascript"></script>
	<script src="plugins/dropzone/dropzone.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="plugins/dropzone/dropzone.css"/>
	<!-- GOOGLE -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<div class="container-fluid" id="header">
		<div class="container">
			<div class="col-sm-12">
				<h1 class="text-center">ODIFT</h1>
				<img src="img/tpl/detective.png" class="img-responsive center-block" alt="Online Digital Image Forensic Tool"/>
				<h3 class="text-center">Online Digital Image Forensic Tool</h3>
			</div>
		</div>
	</div>
	<!-- / header -->
	<!-- main -->
	<div class="container-fluid" id="main">
		<div class="container">
			<div class="col-sm-12">
				<h4>VIEW AND REMOVE EXIF</h4>
				<p>
					Pictures taken by digital cameras can contain a lot of information, like data, time and camera used. But last generation cameras and phones can add the GPS coordinates of the place where it was taken, making it a privacy hazard. You can be showing your home's location to the world. Using this tool you can view and remove exif (exchangeable image file format) data online of your pictures without downloading any program.
				</p>
				<form action="ajax/upload.php" class="dropzone"></form>
				<form class="form-horizontal" name="form_exif" id="form_exif" method="get" action="" onsubmit="" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off" role="form">
					<input type="hidden" name="file_path" id="file_path" value=""/>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<div class="radio">
									<label>
										<input type="radio" name="exif" value="0"> VIEW EXIF
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<div class="radio">
									<label>
										<input type="radio" name="exif" value="1"> REMOVE EXIF
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-offset-4 col-sm-4">
						<div class="form-group">
							<div class="col-sm-12">
								<input class="btn btn-default btn-block" type="submit" value="Submit">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Exchangeable image file format</h3>
					</div>
					<div class="panel-body">
						<img src="" id="img_exif" class="img-responsive center-block" alt="Online Digital Image Forensic Tool"/>
						<div class="table-responsive">
							<table class="table" id="table_exif">
								
							</table>
						</div>
					</div>
					<div class="panel-footer">
						EXIF
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- / main -->
	<!-- footer -->
	<div class="container-fluid" id="footer">
		<div class="container">
			<div class="col-sm-12">
				<p class="text-center">ODIFT &copy; 2017</p>
				<p class="text-center">Made with love in Banja Luka, Republic of Serbska</p>
			</div>
		</div>
	</div>
	<!-- / footer -->
	<a href="#" class="scrollup">Scroll</a>
	<!-- SCRIPTS -->
	<script language="javascript" src="js/app.js"></script>
	<script language="javascript">
		$(document).ready(function(){

		});
	</script>
</body>
</html>
