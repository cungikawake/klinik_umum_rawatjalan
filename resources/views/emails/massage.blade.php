<!DOCTYPE html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="http://klinikfisioterapimandiri.com/css/app.css" rel="stylesheet"> 
    <!-- Argon CSS -->
    <link href="http://klinikfisioterapimandiri.com/front/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body  style="background: #eae0c7;">
	<div class="container"> 
		<div class="row">
			<div class="col-md-12 text-center">
				<p>Dear, MANDIRI FISIOTERAPI</p>
				<br>
				<p>Nama : {{  $mail_data['name'] }}</p>
				<p>Email : {{  $mail_data['email'] }}</p>
				<p>Massage : </p>
				<p>{{  $mail_data['message'] }}</p>
			</div>
		</div>
	</div>
</body>
</html>
