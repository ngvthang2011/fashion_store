<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forms</title>

	<link href="public/backend/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/backend/css/datepicker3.css" rel="stylesheet">
	<link href="public/backend/css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
<script src="public/backend/js/html5shiv.js"></script>
<script src="public/backend/js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">FASHION STORE LOGIN</div>
				<div class="panel-body">
					<form method="POST" role="form">
						@csrf
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" value="{{ old('email') }}" autofocus="">
								@if ($errors->has('email'))
								<div class="alert alert-danger">{{$errors->first('email')}}</div>
								@endif
							</div>
							
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								@if ($errors->has('password'))
								<div class="alert alert-danger">{{$errors->first('password')}}</div>
								@endif
							</div>
							
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->



	<script src="public/backend/js/jquery-1.11.1.min.js"></script>
	<script src="public/backend/js/bootstrap.min.js"></script>
	<script src="public/backend/js/chart.min.js"></script>
	<script src="public/backend/js/chart-data.js"></script>
	<script src="public/backend/js/easypiechart.js"></script>
	<script src="public/backend/js/easypiechart-data.js"></script>
	<script src="public/backend/js/bootstrap-datepicker.js"></script>
	<script>
		! function ($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function () {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>