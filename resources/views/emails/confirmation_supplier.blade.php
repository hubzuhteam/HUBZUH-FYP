<html>
	<head>
		<title>Verify Your account (HUBZUH)</title>
	</head>
	<body>
		<table>
			<tr><td>Dear {{ $name }}!</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Please click on below link to activate your account:</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><a href="{{ url('/supplier/confirm/'.$code) }}">Confirm Account</a></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Thanks & Regards,</td></tr>
			<tr><td>HUBZUH Team</td></tr>
	</body>
</html>
