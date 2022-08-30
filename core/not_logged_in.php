<?php
$isRegisered = false;
$isLoginFail = false;

if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            $errorMessage = $error;
			$error = 'login error';
			$isLoginFail = true;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>efoita | home</title>
	<link rel="icon" href="images/logoOne.png" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="keywords" content="efoita Ethiopia, ethiopian online payment, top ethiopian online payment"/>
	<script type="application/x-javascript">
		addEventListener( "load", function () {
			setTimeout( hideURLbar, 0 );
		}, false );

		function hideURLbar() {
			window.scrollTo( 0, 1 );
		}
	</script>
	<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Oxygen:300,400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="assets/css/custom.css" rel="stylesheet">
	<?php
	if ( $isRegisered || $isLoginFail ) {
		?>
	<script type="text/javascript">
		$( window ).on( 'load', function () {
			$( '#SussModal' ).modal( 'show' );
		} );
	</script>
	<?php
	}
	?>
</head>
<body>
<input type="hidden" name="allEmpID" id="allEmpID" value="<?php echo($allEmpID); ?>" />
<input type="hidden" name="allPhones" id="allPhones" value="<?php echo($allPhones); ?>" />
<input type="hidden" name="allAccounts" id="allAccounts" value="<?php echo($allAccount); ?>" />
<header>
		<div class="container">
		  <div class="logo">
				<a href="index.php"><img src="images/logoOne.png" class="logo visible-md visible-lg" style="width: 23%" /><h1 class="logo">efoita</a></h1>
		  </div>
		  <?php
			if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
				?>
			<div class="w3layouts-login">
			  <a href="index.php?logout" style="float: right;"><i class="glyphicon glyphicon-log-out"> </i><b>Logout</b></a>
		  </div>
			<div class="w3layouts-login">
				<a href="#"><i class="glyphicon glyphicon-user"> </i><?php echo($_SESSION['name']); ?>&nbsp;&nbsp; </a>
			</div> 
			<?php
			} else {
				?>
			<div class="w3layouts-login">
				<a data-toggle="modal" data-target="#myModal" href="#"><i class="glyphicon glyphicon-user"> </i>Login/Register</a>
			</div>
			<?php
			}
			?>

		  <div class="clearfix"></div>
		  <div class="modal fade" id="SussModal" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog modal-lg" style=" margin: auto; position: absolute;top: 27%; left: 0; bottom: 0; right: 0; color: green;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
							<h4 class="modal-title"> efoita</h4>
						</div>
						<div class="modal-body">
							<?php
							if ( $error == '' ) {
								?>
							<div class="alert alert-success alert-dismissable">
								<i class="glyphicon glyphicon-ok-sign"></i>
								<?php echo($successMessage); ?>.
							</div>
							<?php
							} else {
								?>
							<div class="alert alert-danger alert-dismissable">
								<i class="glyphicon glyphicon-ban-circle"></i> Error!
								<?php echo($errorMessage); ?>.
							</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
		  </div>

		  <div class="clearfix"></div>
		  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
							<h4 class="modal-title" id="myModalLabel"> efoita</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8 extra-w3layouts" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
								  <ul class="nav nav-tabs">
										<li class="active"><a href="#Login" data-toggle="tab">Login</a>
									</li>
										<li><a href="#Registration" data-toggle="tab">Register</a>
										</li>
								  </ul>
								  <div class="tab-content">
										<div class="tab-pane active" id="Login">
										  <form method="POST" enctype="multipart/form-data" class="form-horizontal" action="index.php">
												<div class="form-group">
													<div class="col-sm-10">
														<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
															<input name="user_name" type="text" class="form-control" id="user_name" placeholder="Employee ID ..." required="required"/>
														</div>
													</div>
													<div class="col-sm-10">
														<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock" ></i></span>
															<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="password" required="required"/>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-2"> </div>
													<div class="col-sm-10">
														<button name="login" type="submit" class="submit btn btn-primary btn-sm"> Submit</button>
														<!--<a href="javascript:;" class="agileits-forgot">Forgot your password?</a>-->
													</div>
												</div>
											</form>
									</div>
										<div class="tab-pane" id="Registration">
										  <form name="registrationForm" action="" method="post" enctype="multipart/form-data" id="msform" class="form-horizontal" onsubmit="return validateTerm('termConfirm', 'termConfirm_er');" ;>
										    <ul id="progressbar">
													<li class="active">
														<center>Personal</center>
											  </li>
													<li>
														<center>Work</center>
													</li>
													<li>
														<center>Security</center>
													</li>
													<li>
														<center>Terms</center>
													</li>
											</ul>
										    <fieldset>
													<div class="col-sm-12">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-user" ></i></span>
															<input name="firstName" id="firstName" type="text" class="form-control" placeholder="First Name" onKeyUp="return validateName('firstName', 'firstName_er');" required="required"/>

															<span class="input-group-addon"><i class="glyphicon glyphicon-user" ></i></span>
															<input name="lastName" id="lastName" type="text" class="form-control" placeholder="Last Name" onKeyUp="return validateName('lastName', 'lastName_er');" required="required"/>
														</div>
													  <div style="padding: 0%; margin: -4% 0% 0% 11%; position: absolute">
															<span id="firstName_er" class="custom_message custom_error">Invalid fist name form. </span>
														</div>
													  <div style="padding: 0%; margin: -4% 0% 0% 62%; position: absolute">
															<span id="lastName_er" class="custom_message custom_error">Invalid last name form. </span>
														</div>
											  </div>

													<style type="text/css">
														.bootstrap-select> .dropdown-toggle {
															height: 34px;
															padding: 6px 12px;
															color: #a2a2a2;
														}
													</style>
													<div class="col-sm-12">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-globe" ></i></span>
															<select name="ketema" id="ketema" class="selectpicker form-control" data-live-search="true" onChange="return isItSetSelect('ketema', 'ketema_er');" required>
																<option value="">please select Birth place</option>
																<option data-tokens="Abiy Addi" value="Abiy Addi">Abiy Addi</option>
																<option data-tokens="Adama (Nazareth/Nazret)" value="Adama (Nazareth/Nazret)">Adama (Nazareth/Nazret)</li>
															  <option data-tokens="Addis Ababa" value="Addis Ababa">Addis Ababa</option>
																	<option data-tokens="Addis Alem (Ejersa)" value="Addis Alem (Ejersa)">Addis Alem (Ejersa)</option>
																	<option data-tokens="Addis Zemen" value="Addis Zemen">Addis Zemen</option>
																	<option data-tokens="Adet" value="Adet">Adet</option>
																	<option data-tokens="Adigrat " value="Adigrat ">Adigrat</option>
																	<option data-tokens="Adwa " value="Adwa ">Adwa</option>
																	<option data-tokens="Agaro " value="Agaro ">Agaro</option>
																	<option data-tokens="Akaki " value="Akaki ">Akaki</option>
																	<option data-tokens="Alaba " value="Alaba ">Alaba (Kulito, Quliito)</li>
															  <option data-tokens="Alitena " value="Alitena ">Alitena</option>
																		<option data-tokens="Amaro " value="Amaro ">Amaro</option>
																		<option data-tokens="Amba Mariam " value="Amba Mariam ">Amba Mariam</option>
																		<option data-tokens="Ambo " value="Ambo ">Ambo</option>
																		<option data-tokens="Ankober " value="Ankober ">Ankober</option>
																		<option data-tokens="Arba Minch " value="Arba Minch ">Arba Minch</option>
																		<option data-tokens="Arboye " value="Arboye ">Arboye</option>
																		<option data-tokens="Asaita " value="Asaita ">Asaita</option>
																		<option data-tokens="Asella " value="Asella ">Asella</option>
																		<option data-tokens="Asosa " value="Asosa ">Asosa</option>
																		<option data-tokens="Awasa " value="Awasa ">Awasa</option>
																		<option data-tokens="Awash " value="Awash ">Awash</option>
																		<option data-tokens="Axum " value="Axum ">Axum</option>
																		<option data-tokens="Axum " value="Axum ">Alamata</option>
																		<option data-tokens="Alem Ketema " value="Alem Ketema ">Alem Ketema</option>
															</select>
														</div>
													  <div style="padding: 0%; margin: -4% 0% 0% 10%; position: absolute">
															<span id="ketema_er" class="custom_message custom_error">Please select ketema. </span>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="input-group">
															<span class="input-group-addon"><i class=" 	glyphicon glyphicon-tent" ></i></span>
															<input name="kifleketema" id="kifleketema" type="text" class="form-control" placeholder="Kefleketema" onKeyUp="return validateName('kifleketema', 'kifleketema_er')" required="required"/>
														</div>
													  <div style="padding: 0%; margin: -4% 0% 0% 11%; position: absolute">
															<span id="kifleketema_er" class="custom_message custom_error">Invalid kifleketema format use characters. </span>
														</div>
													</div>

													<div class="col-sm-12">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-home" ></i></span>
															<input name="houseNo" id="houseNo" type="text" class="form-control" placeholder="House Number" onKeyUp="return validateAny('houseNo', 'houseNo_er');" required="required"/>

															<span class="input-group-addon"><i class="glyphicon glyphicon-home" ></i></span>
															<input name="woreda" id="woreda" type="text" class="form-control" placeholder="Woreda" onKeyUp="return validateAny('woreda', 'woreda_er');" required="required"/>

															<span class="input-group-addon"><i class="glyphicon glyphicon-home" ></i></span>
															<input name="kebele" id="kebele" type="text" class="form-control" placeholder="Kebele" onKeyUp="return validateAny('kebele', 'kebele_er');" required="required"/>

														</div>

													  <div style="padding: 0%; margin: -4% 0% 0% 10%; position: absolute">
															<span id="houseNo_er" class="custom_message custom_error">Invalid house No . </span>
														</div>

													  <div style="padding: 0%; margin: -4% 0% 0% 42%; position: absolute">
															<span id="woreda_er" class="custom_message custom_error">Invalid woreda . </span>
														</div>

													  <div style="padding: 0%; margin: -4% 0% 0% 73%; position: absolute">
															<span id="kebele_er" class="custom_message custom_error">Invalid kebele . </span>
														</div>
													</div>
													<div class="col-sm-12 form-group">
														<center>
															<label class="radio-inline">
																<input type="radio" name="x_Gender" id="genderM" value="M" class="required" title="Male" onChange="return isItSetGender('genderM', 'genderF', 'gender_er');">
																Male
															</label>
														

															<label class="radio-inline">
																<input type="radio" name="x_Gender" id="genderF" value="F" class="required" title="Fimale" onChange="return isItSetGender('genderM', 'genderF', 'gender_er');">
															  Female
															</label>
														
															<br>
														  <div style="padding: 0%; margin: -1% 0% 0% 35%; position: absolute">
																<span id="gender_er" class="custom_message custom_error">Please select gender . </span>
															</div>
														</center>
													</div>

													<div class="clearfix"></div>
													<input type="button" name="next" class="next action-button submit btn btn-primary" value="Next"/>
											</fieldset>
												<fieldset>
													<div class="col-sm-12">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-building" ></i></span>
															<select name="workPlace" id="workPlace" class="selectpicker form-control" data-live-search="true" onChange="return isItSetSelect('workPlace', 'workPlace_er');" required>
																<option value="">Please select work place</option>
																<option data-tokens="ethiopian Electic power" value="EEP">Ethiopian Electric Power</option>
																<option data-tokens="Ethiopian Electric Utility" value="EEU">Ethiopian Electric Utility</li>
															  <option data-tokens="Ethio Telecom" value="Ethio Telecom">Ethio Telecom</option>
															</select>
														</div>
													  <div style="padding: 0%; margin: -4% 0% 0% 10%; position: absolute">
															<span id="workPlace_er" class="custom_message custom_error">Please select work place. </span>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-id-card" ></i></span>
															<input name="employeeID" id="employeeID" type="text" class="form-control" placeholder="Employee ID (000000)" onKeyUp="return validateEmpID('employeeID', 'employeeID_er', 'employeeID_er_exist');" required="required"/>
														</div>
													  <div style="padding: 0%; margin: -4% 0% 0% 10%; position: absolute">
															<span id="employeeID_er" class="custom_message custom_error">Invalid employee ID format.  </span>
															<span id="employeeID_er_exist" class="custom_message custom_error">ID alredy exists . </span>
														</div>
													</div>

													<div class="col-sm-12">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-piggy-bank" ></i></span>
															<input name="account" id="account" type="text" class="form-control" placeholder="Paymetnt account number" onKeyUp="return validateAccount('account', 'account_er', 'account_er_exist');" required="required"/>
														</div>
													  <div style="padding: 0%; margin: -4% 0% 0% 10%; position: absolute">
															<span id="account_er" class="custom_message custom_error">Invalid account format. </span>
															<span id="account_er_exist" class="custom_message custom_error">Account already exists . </span>
														</div>
													</div>
													<div class="clearfix"></div>

													<input type="button" name="previous" class="previous action-button submit btn btn-primary" value="Previous" class="form-control"/>
													<input type="button" name="next" class="next action-button submit btn btn-primary" value="Next"/>
												</fieldset>
												<fieldset>
													<div class="col-sm-6">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-lock" ></i></span>
															<input name="password" id="password" type="password" class="form-control" placeholder="Password" onKeyUp="return validatePassword('password', 'password_notification');" required="required"/>
														</div>
													</div>
													<div class="col-sm-6" style="padding: 1% 1% 1%; margin: 1% 0% 0% 27%; position: fixed;">
														<span id="password_notification" class="custom_message custom_warning">
															<ul>
																<li><i class="fa fa-warning"></i> Length should be 6-16 long.</li>
																<li><i class="fa fa-warning"></i> must contain at least 1 numeric.</li>
																<li><i class="fa fa-warning"></i> must contain at least 1 uppercase .</li>
																<li><i class="fa fa-warning"></i> must contain at least 1 lowercase.</li>
																<li><i class="fa fa-warning"></i> must contain at least one special character(except ").</li>
															</ul>
														</span>
													</div>
													<div class="clearfix"></div>
													<div class="col-sm-6">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-lock" ></i></span>
															<input name="passwordConfirm" id="passwordConfirm" type="password" class="form-control" placeholder="Confirm password" onKeyUp="return validatePasswordConfirm('password', 'passwordConfirm', 'passwordConfirm_er');" required="required"/>
														</div>
													  <div style="padding: 0%; margin: -8% 0% 0% 21%; position: absolute">
															<span id="passwordConfirm_er" class="custom_message custom_error">Password don't match. </span>
														</div>
													</div>
													<!--<div class="clearfix"></div>-->
													<div class="col-sm-12">
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-phone" ></i></span><span class="input-group-addon">+251</span>
															<input name="phone" id="phone" type="text" class="form-control" placeholder="PhoneNo(913209238)" onKeyUp="return validatePhone('phone', 'phone_er', 'phone_er_exist');" required="required"/>
														</div>
													  <div style="padding: 0%; margin: -4% 0% 0% 11%; position: absolute">
															<span id="phone_er" class="custom_message custom_error">Invalid phone format '913209238' . </span>
															<span id="phone_er_exist" class="custom_message custom_error">Phone no already exists . </span>
														</div>
													</div>
													<div class="clearfix"></div>
													<input type="button" name="previous" class="previous action-button submit btn btn-primary" value="Previous" class="form-control"/>
													<input type="button" name="next" class="next action-button submit btn btn-primary" value="Next"/>
												</fieldset>
												<fieldset>
													<div class="col-sm-12">
													  <div class="input-group">
														<textarea rows="10" cols="100" class="form-control disabled" placeholder="Please write here" id="message" maxlength="999" style="resize:none" aria-invalid="false" readonly></textarea>
													  </div>
													</div>
													<div class="col-sm-12">
														<div class="input-group">
															<label class="checkbox-inline">
																<input name="termConfirm" id="termConfirm" type="checkbox" onChange="return validateTerm('termConfirm', 'termConfirm_er');" class="check-mark" required />
																 I agree to the terms and condition stated above.
															</label>
														

														</div>
														<div style="padding: 0%; margin: -4% 0% 0% 10%; display: none;">
															<span id="termConfirm_er" class="custom_message custom_error">You need to accept the terms and condition. </span>
														</div>
													</div>
													<div class="clearfix">

													</div>

													<input type="button" name="previous" class="previous action-button submit btn btn-primary" value="Previous" class="form-control"/>
													<input type="submit" name="register" class="submit action-button submit btn btn-primary" value="Submit"/>
												</fieldset>
										  </form>
                                          <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
                                          <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
                                          <script src="assets/js/customValidation.js"></script>
										  <script type="text/javascript">
												//jQuery time
												var current_fs, next_fs, previous_fs;
												var left, opacity, scale;
												var animating; 
												var nextPass = 0;

												$( ".next" ).click( function () {

													if ( nextPass == 3 ) {
														if ( !validateTerm( 'termConfirm', 'termConfirm_er' ) ) {
															return false;
														} else {
															nextPass = 4;
														}
													}
													if ( nextPass == 2 ) {
														if ( !validatePassword( 'password', 'password_notification' ) ||
															!validatePasswordConfirm( 'password', 'passwordConfirm', 'passwordConfirm_er' ) ||
															!validatePhone('phone', 'phone_er', 'phone_er_exist') ) {
															return false;
														} else {
															nextPass = 3;
														}
													}
													if ( nextPass == 1 ) {
														if ( !isItSetSelect( 'workPlace', 'workPlace_er' ) ||
															!validateEmpID( 'employeeID', 'employeeID_er', 'employeeID_er_exist' ) ||
															!validateAccount('account', 'account_er', 'account_er_exist') ) {
															return false;
														} else {
															nextPass = 2;
														}
													}
													if ( nextPass === 0 ) {
														if ( !validateName( 'firstName', 'firstName_er' ) ||
															!validateName( 'lastName', 'lastName_er' ) ||
															!isItSetSelect( 'ketema', 'ketema_er' ) ||
															!validateName( 'kifleketema', 'kifleketema_er' ) ||
															!validateAny( 'houseNo', 'houseNo_er' ) ||
															!validateAny( 'woreda', 'woreda_er' ) ||
															!validateAny( 'kebele', 'kebele_er' ) ||
															!isItSetGender( 'genderM', 'genderF', 'gender_er' ) ) {

															return false;
														} else {
															nextPass = 1;
														}

													}


													if ( animating ) return false;
													animating = true;

													current_fs = $( this ).parent();
													next_fs = $( this ).parent().next();

													$( "#progressbar li" ).eq( $( "fieldset" ).index( next_fs ) ).addClass( "active" );

													next_fs.show();
													current_fs.animate( {
														opacity: 0
													}, {
														step: function ( now, mx ) {
															scale = 1 - ( 1 - now ) * 0.2;
															left = ( now * 50 ) + "%";
															opacity = 1 - now;
															current_fs.css( {
																'transform': 'scale(' + scale + ')'
															} );
															next_fs.css( {
																'left': left,
																'opacity': opacity
															} );
														},
														duration: 400,
														complete: function () {
															current_fs.hide();
															animating = false;
														},
														easing: 'easeInOutBack'
													} );
												} );

												$( ".previous" ).click( function () {
													if ( animating ) return false;
													animating = true;

													nextPass = nextPass - 1;
													current_fs = $( this ).parent();
													previous_fs = $( this ).parent().prev();

													$( "#progressbar li" ).eq( $( "fieldset" ).index( current_fs ) ).removeClass( "active" );

													previous_fs.show();
													current_fs.animate( {
														opacity: 0
													}, {
														step: function ( now, mx ) {
															scale = 0.8 + ( 1 - now ) * 0.2;
															left = ( ( 1 - now ) * 50 ) + "%";
															opacity = 1 - now;
															current_fs.css( {
																'left': left
															} );
															previous_fs.css( {
																'transform': 'scale(' + scale + ')',
																'opacity': opacity
															} );
														},
														duration: 200,
														complete: function () {
															current_fs.hide();
															animating = false;
														},
														easing: 'easeInOutBack'
													} );
												} );
											</script>
									</div>
								  </div>
									<div id="OR"> OR</div>
							  </div>
								<div class="col-md-4 extra-agileits">
									<div class="row text-center sign-with">
										<div class="col-md-12">
											<h3 class="other-nw"> follow us on</h3>
										</div>
										<div class="col-md-12">
											<div class="btn-group btn-group-justified" > <a href="#" class="btn btn-primary">Face-book</a> <a href="#" class="btn btn-danger"> Google +</a> </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			  </div>
		  </div>
  </div>
</header>
<div class=" header-right">
		<div class="banner">
			<div class="slider">
				<div class="callbacks_container">
					<ul class="rslides" id="slider">
						<li>
							<div class="banner1">
								<div class="caption">
									<h3>Efoi! <br>Mobile Card Credit<br> 
									is available ...</h3>
									<p><a data-toggle="modal" data-target="#myModal" href="#" class="scroll">login / Register</a>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="banner2">
								<div class="caption">
									<h3><span>0.50% off</span> on train Tickets</h3>
									<p><a data-toggle="modal" data-target="#myModal" href="#" class="scroll">login / Register</a>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="banner3">
								<div class="caption">
									<h3><span>Pay your movie tickets </span> with efoita</h3>
									<p><a data-toggle="modal" data-target="#myModal" href="#" class="scroll">login / Register</a>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="banner4">
								<div class="caption">
									<h3><span>Transportation tickets </span> can be handled by efoita.</h3>
									<p><a data-toggle="modal" data-target="#myModal" href="#" class="scroll">login / Register</a>
									</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
  </div>
</div>

	<?php
	if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
		?>
	<style type="text/css">
		.myLink {
			color: black;
			text-decoration: none;
		}
		.myLink:hover {
			color: white;
			text-decoration: none;
		}
		.myLink.active {
			color: white;
		}
	</style>
<div class="w3layouts-breadcrumbs text-center ">
		<div class="container">
			<b>
				<div class=" agileinfo-dwld-app">
					<a href="home.php" class="myLink active"><i class="fa fa-home home_1"></i>  </a>&nbsp;&nbsp;
					<a href="index.php" class="myLink"><i class="glyphicon glyphicon-stats home_1"></i> Status</a>&nbsp;&nbsp;
					<a href="service.php" class="myLink"><i class="fa fa-cogs home_1" ></i> Services</a>
				</div>
			</b>

		</div>

	</div>
<?php
	}
	?>
<div class="w3layouts-content">
  <section class="typography">
    <div class="shortcodes">
      <div class="container">
        <div class="typrography">
          <div class="list_1">
            <div class="columns">
              <div class="row">
                <div class="col-sm-4 column_grid">
                  <center>
                    <img class="img-responsive img-rounded img-thumbnail" alt="Debit and Credit" src="images/serviceCreditDebit.jpg"/>
                    <h3 class="sc-title normal">Debit / Credit</h3>
                  </center>
                </div>
                <div class="col-sm-4 column_grid">
                  <center>
                    <img class="img-responsive img-rounded img-thumbnail" alt="Make Paymet" src="images/serviceMakePayment.png"/>
                    <h3>Make Payment</h3>
                  </center>
                </div>
                <div class="col-sm-4 column_grid">
                  <center>
                    <img class="img-responsive img-rounded img-thumbnail" alt="onlineShoping" src="images/servicePay.jpg"/>
                    <h3>Online Shopping</h3>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="phone" id="mobileappagileits">
		<div class="container">
			<div class="col-md-6"> <img src="images/phoneone.png" class="img-responsive" alt=""/> </div>
			<div class="col-md-6 phone-text">
				<h4>Online Payment mobile app on your smart-phone!</h4>
				<p class="subtitle">Simple and Fast Payments</p>
				<div class="text-1">
					<h5>Recharge</h5>
					<p>Recharge your Mobile, DTH, Datacard etc...</p>
				</div>
				<div class="text-1">
					<h5>Paybills</h5>
					<p>Pay your Bills(Electricity, Water, Gas, Broadband, Landline etc...)</p>
				</div>
				<div class="text-1">
					<h5>Book Online</h5>
					<p>Book Online Tickets(Movies, Bus, Train etc...)</p>
				</div>
				<div class="agileinfo-dwld-app">
					<h6>Download The App : <a href="#"><i class="fa fa-apple"></i></a> <a href="#"><i class="fa fa-windows"></i></a> <a href="#"><i class="fa fa-android"></i></a> </h6>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="wthree-mobile-app">
				<form action="#" method="get">
					<input class="text" type="tel" name="tel" placeholder="Enter Your Mobile Number" required="">
					<input type="submit" value="Send Download Link">
				</form>
			</div>
	  </div>
</div>
<div class="w3l-support">
		<div class="container">
			<div class="col-md-5 w3_agile_support_left"> <img src="images/cus.jpg" alt=" " class="img-responsive"/> </div>
			<div class="col-md-7 w3_agile_support_right">
				<h5>efoita</h5>
				<h3>24/7 Customer Service Support</h3>
				<p>We advise you to use the support .</p>
				<div class="agile_more"> <a href="commingSoon.html" class="type-4"> <span> Support </span>
		

			<span> Support </span> <span> Support </span> <span> Support </span> <span> Support </span> <span> Support </span> </a>
		</div>
	</div>
	<div class="clearfix"> </div>
	</div>
</div>
<div class="w3-offers">
		<div class="container">
			<div class="w3-agile-offers">
				<h3>the best offers</h3>
				<p>you can take 25% off Your monthly payment as credit with no interest.</p>
			</div>
	  </div>
</div>
<div class="w3layouts-partners">
		<h3>partners</h3>
		<div class="container">
			<ul>
				<li><a href="#"><img class="img-responsive" src="images/lg.png" alt="" style="width: 60%"></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg1.png" alt=""></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg2.png" alt="" style="min-width: 60%"></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg3.png" alt=""></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg4.png" alt=""></a>
				</li>
			</ul>
			<ul>
				<li><a href="#"><img class="img-responsive" src="images/lg5.png" alt="" style="width: 60%"></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg6.png" alt=""></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg8.jpg" alt="" style="width: 60%"></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg9.png" alt=""></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg.jpg" alt=""></a>
				</li>
			</ul>
			<ul>
				<li><a href="#"><img class="img-responsive" src="images/lg10.jpg" alt="" style="width: 60%; padding-bottom: 55px"></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg11.png" alt="" style="padding-bottom: 55px"></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg12.png" alt=""></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg13.png" alt="" style="padding-bottom: 55px"></a>
				</li>
				<li><a href="#"><img class="img-responsive" src="images/lg14.jpg" alt="" style="padding-bottom: 55px"></a>
				</li>
			</ul>
		</div>
</div>
<div class="w3-subscribe agileits-w3layouts">
		<div class="container">
			<div class="col-md-6 social-icons w3-agile-icons">
				<h4>Join Us</h4>
				<ul>
					<li><a href="#" class="fa fa-facebook sicon facebook"> </a>
					</li>
					<li><a href="#" class="fa fa-twitter sicon twitter"> </a>
					</li>
					<li><a href="#" class="fa fa-google-plus sicon googleplus"> </a>
					</li>
					<li><a href="#" class="fa fa-dribbble sicon dribbble"> </a>
					</li>
					<li><a href="#" class="fa fa-rss sicon rss"> </a>
					</li>
				</ul>
			</div>
			<div class="col-md-6 w3-agile-subscribe-right">
				<h3 class="w3ls-title">Subscribe to Our <br>
        <span>Newsletter</span></h3>
				<form action="#" method="post">
					<input type="email" name="email" placeholder="Enter your Email..." required="">
					<input type="submit" value="Subscribe">
					<div class="clearfix"> </div>
				</form>
			</div>
			<div class="clearfix"> </div>
	  </div>
</div>
<footer>
		<div class="container-fluid">
			<div class="w3-agile-footer-top-at">
				<div class="col-md-2 agileits-amet-sed">
					<h4>efoita</h4>
					<ul class="w3ls-nav-bottom">
						<li><a href="commingSoon.html">About Us</a>
						</li>
						<li><a href="commingSoon.html">Support</a>
						</li>

						<li><a href="commingSoon.html">Terms & Conditions</a>
						</li>
						<li><a href="commingSoon.html">FAQ</a>
						</li>
						<li><a href="commingSoon.html" class="scroll">Mobile</a>
						</li>
						<li><a href="commingSoon.html">Feedback</a>
						</li>
						<li><a href="commingSoon.html">Contact</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 agileits-amet-sed ">
					<h4>Mobile Recharges</h4>
					<ul class="w3ls-nav-bottom">
						<li><a href="#" class="scroll">Ethio Telecom</a>
						</li>
						<li><a href="#" class="scroll">Charge Mobile Cards</a>
						</li>
						<li><a href="#" class="scroll">Charge For Other</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 agileits-amet-sed ">
					<h4>DSTV Charges</h4>
					<ul class="w3ls-nav-bottom">
						<li><a href="#" class="scroll">Monthly Charges</a>
						</li>
						<li><a href="#" class="scroll">Yearly Charges</a>
						</li>
						<li><a href="#" class="scroll">Different Charges</a>
						</li>
					</ul>
				</div>
				<div class="col-md-2 agileits-amet-sed">
					<h4>School Payments</h4>
					<ul class="w3ls-nav-bottom">
						<li><a href="#" class="scroll"> Ethio-parents School</a>
						</li>
						<li><a href="#" class="scroll"> Addis Ababa University</a>
						</li>
						<li><a href="#" class="scroll"> School Of Tomorrow</a>
						</li>
						<li><a href="#" class="scroll"> Adama University</a>
						</li>
						<li><a href="#" class="scroll"> Unity University</a>
						</li>
					</ul>
				</div>
				<div class="col-md-2 agileits-amet-sed ">
					<h4>Payment Options</h4>
					<ul class="w3ls-nav-bottom">
						<li>Credit</li>
						<li>Debit</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
	  </div>
		<div class="w3l-footer-bottom">
			<div class="container-fluid">
				<div class="col-md-4 w3-footer-logo">
					<h2><a href="index.php">efoita</a></h2>
				</div>
				<div class="col-md-8 agileits-footer-class">
					<p>© 2017 efoita. All Rights Reserved | Design by <a href="commingSoon.html">ETech</a> </p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
</footer>
<script src="js/bootstrap.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script>
		$( function () {
			$( "#slider" ).responsiveSlides( {
				auto: true,
				speed: 500,
				namespace: "callbacks",
				pager: true,
			} );
		} );
	</script>
<script src="js/bootstrap-select.js"></script>
<script>
		$( document ).ready( function () {
			var mySelect = $( '#first-disabled2' );

			$( '#special' ).on( 'click', function () {
				mySelect.find( 'option:selected' ).prop( 'disabled', true );
				mySelect.selectpicker( 'refresh' );
			} );

			$( '#special2' ).on( 'click', function () {
				mySelect.find( 'option:disabled' ).prop( 'disabled', false );
				mySelect.selectpicker( 'refresh' );
			} );

			$( '#basic2' ).selectpicker( {
				liveSearch: true,
				maxOptions: 1
			} );
		} );
	</script>
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css "/>
<script src="js/easyResponsiveTabs.js"></script>
<script type="text/javascript">
		$( document ).ready( function () {
			$().UItoTop( {
				easingType: 'easeOutQuart'
			} );

		} );
	</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
		jQuery( document ).ready( function ( $ ) {
			$( ".scroll" ).click( function ( event ) {
				event.preventDefault();
				$( 'html,body' ).animate( {
					scrollTop: $( this.hash ).offset().top
				}, 1000 );
			} );
		} );
	</script>
</body>
</html>
<?php
//cleran up 

$vars = array_keys(get_defined_vars());
//print_r($vars);
for ($i = 0; $i < sizeOf($vars); $i++) {
    unset($vars[$i]);
}
unset($vars,$i);
?>
