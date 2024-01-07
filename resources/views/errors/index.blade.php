<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>HRIS-ALMAS</title>
	<!-- Favicon-->
	<link rel="icon" href="/assets/images/almaz.ico" type="image/x-icon">
	<!-- Plugins Core Css -->
	<link href="/assets/css/common.min.css" rel="stylesheet">
	<!-- Custom Css -->
	<link href="/assets/css/style.css" rel="stylesheet" />
	<link href="/assets/css/pages/extra_pages.css" rel="stylesheet" />
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form">
					<span class="error-header p-b-45">
						{{$code}}
					</span>
					<span class="error-subheader p-b-5">
						{{ $exception}}
					</span>
					<div class="container-login100-form-btn p-t-30	">
						<a href="/dashboard" class="login100-form-btn">
							Go To Home Page
						</a>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('/assets/images/pages/bg-03.png');">
				</div>
			</div>
		</div>
	</div>
	<!-- Plugins Js -->
	<script src="/assets/js/common.min.js"></script>
	<!-- Extra page Js -->
	<script src="/assets/js/pages/examples/pages.js"></script>
</body>

</html>