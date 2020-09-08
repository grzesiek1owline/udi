<?php
add_action( 'phpmailer_init', 'my_phpmailer_init' );
function my_phpmailer_init( PHPMailer $phpmailer ) {
    $phpmailer->Host = 'smtp.dpoczta.pl';
    $phpmailer->Port = 587; // could be different
    $phpmailer->Username = 'formularze@ubezpieczeniadlainzynierow.pl'; // if required
		$phpmailer->Password = 'XQkciBUuzGj43YC'; // if required
		$phpmailer->From = "formularze@ubezpieczeniadlainzynierow.pl";
		$phpmailer->FromName   = 'UDI';
		$phpmailer->isHTML(true);
    $phpmailer->SMTPAuth = true; // if required
    $phpmailer->SMTPSecure = 'tls'; // enable if required, 'tls' is another possible value
    $phpmailer->IsSMTP();
}
add_action( 'wp_mail_failed', 'onMailError', 10, 1 );
function onMailError( $wp_error ) {
	echo "<pre>";
	print_r($wp_error);
	echo "</pre>";
}


function send_user_form() {
	parse_str($_POST[form], $form);
	$sanitize_data = [];

	foreach ($form as $key => $value) {
		$sanitize = sanitize_text_field($value);
		$sanitize_data[$key] = $sanitize;
	}

	print_r($sanitize_data);
	$user_message = send_user_mail($sanitize_data['email'], 'Dziękujemy!',$sanitize_data['name'], $sanitize_data['title']);
	echo $user_message;
	wp_die();
}


function send_user_mail($mail, $subject, $user_name, $form_title) {
	$msg = user_mail_template();
	$msg = str_replace('{{NAME}}', $user_name, $msg);
	$msg = str_replace('{{WNIOSEK}}', $form_title, $msg);
	$mailResult = false;
	$mailResult = wp_mail( $mail, $subject, $msg, '', '');

	if($mailResult){
		return 'result is true';
	} else {
		onMailError( $wp_error );
	}
}


function user_mail_template() {
	return '<!doctype html>
	<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

	<head>
		<title>
		</title>
		<!--[if !mso]><!-- -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<![endif]-->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style type="text/css">
			#outlook a {
				padding: 0;
			}

			body {
				margin: 0;
				padding: 0;
				-webkit-text-size-adjust: 100%;
				-ms-text-size-adjust: 100%;
			}

			table,
			td {
				border-collapse: collapse;
				mso-table-lspace: 0pt;
				mso-table-rspace: 0pt;
			}

			img {
				border: 0;
				height: auto;
				line-height: 100%;
				outline: none;
				text-decoration: none;
				-ms-interpolation-mode: bicubic;
			}

			p {
				display: block;
				margin: 13px 0;
			}
		</style>
		<!--[if mso]>
					<xml>
					<o:OfficeDocumentSettings>
						<o:AllowPNG/>
						<o:PixelsPerInch>96</o:PixelsPerInch>
					</o:OfficeDocumentSettings>
					</xml>
					<![endif]-->
		<!--[if lte mso 11]>
					<style type="text/css">
						.mj-outlook-group-fix { width:100% !important; }
					</style>
					<![endif]-->
		<style type="text/css">
			@media only screen and (min-width:480px) {
				.mj-column-per-100 {
					width: 100% !important;
					max-width: 100%;
				}
			}
		</style>
		<style type="text/css">
			@media only screen and (max-width:480px) {
				table.mj-full-width-mobile {
					width: 100% !important;
				}

				td.mj-full-width-mobile {
					width: auto !important;
				}
			}
		</style>
	</head>

	<body style="background-color:#FFFFFF;">
		<div style="background-color:#FFFFFF;">
			<!--[if mso | IE]>
				<table
					 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
				>
					<tr>
						<td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
				<![endif]-->
			<div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;">
					<tbody>
						<tr>
							<td style="direction:ltr;font-size:0px;padding:20px 0 0;text-align:center;">
								<!--[if mso | IE]>
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">

					<tr>

							<td
								 class="" style="vertical-align:top;width:600px;"
							>
						<![endif]-->
								<div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
									<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
										<tr>
											<td align="center" style="font-size:0px;padding:10px 0px;word-break:break-word;">
												<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
													<tbody>
														<tr>
															<td style="width:200px;">
																<img height="auto" src="https://ubezpieczeniadlainzynierow.pl/mail/udi-logo.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="200" />
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</table>
								</div>
								<!--[if mso | IE]>
							</td>

					</tr>

										</table>
									<![endif]-->
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--[if mso | IE]>
						</td>
					</tr>
				</table>

				<table
					 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
				>
					<tr>
						<td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
				<![endif]-->
			<div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;">
					<tbody>
						<tr>
							<td style="direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;">
								<!--[if mso | IE]>
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">

					<tr>

							<td
								 class="" style="vertical-align:top;width:600px;"
							>
						<![endif]-->
								<div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
									<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
										<tr>
											<td align="center" style="font-size:0px;padding:0px 25px 0px 25px;word-break:break-word;">
												<div style="font-family:Arial, sans-serif;font-size:24px;font-weight:bold;line-height:28px;text-align:center;color:#55575d;">Dzień dobry {{NAME}}!</div>
											</td>
										</tr>
									</table>
								</div>
								<!--[if mso | IE]>
							</td>

					</tr>

										</table>
									<![endif]-->
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--[if mso | IE]>
						</td>
					</tr>
				</table>

				<table
					 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
				>
					<tr>
						<td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
				<![endif]-->
			<div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;">
					<tbody>
						<tr>
							<td style="direction:ltr;font-size:0px;padding:10px 0px 40px 20px;text-align:center;">
								<!--[if mso | IE]>
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">

					<tr>

							<td
								 class="" style="vertical-align:top;width:580px;"
							>
						<![endif]-->
								<div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
									<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
										<tr>
											<td align="center" style="font-size:0px;padding:0px 25px 0px 25px;word-break:break-word;">
												<div style="font-family:Arial, sans-serif;font-size:14px;line-height:28px;text-align:center;color:#55575d;">Właśnie przyjęliśmy od Ciebie formularz zawierający {{WNIOSEK}}. Skontaktujemy się z Tobą najszybciej jak to możliwe.</div>
											</td>
										</tr>
									</table>
								</div>
								<!--[if mso | IE]>
							</td>

					</tr>

										</table>
									<![endif]-->
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--[if mso | IE]>
						</td>
					</tr>
				</table>

				<table
					 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
				>
					<tr>
						<td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
				<![endif]-->
			<div style="background:#ea7900;background-color:#ea7900;margin:0px auto;max-width:600px;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ea7900;background-color:#ea7900;width:100%;">
					<tbody>
						<tr>
							<td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
								<!--[if mso | IE]>
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">

					<tr>

							<td
								 class="" style="vertical-align:top;width:600px;"
							>
						<![endif]-->
								<div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
									<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
										<tr>
											<td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
												<div style="font-family:Arial, sans-serif;font-size:13px;line-height:22px;text-align:center;color:#ffffff;">Wiadomość wygenerowana automatycznie z <a style="color:#ffffff" href="https://ubezpieczeniadlainzynierow.pl/"><b>Ubezpieczenia dla inżynierów</b></a></div>
											</td>
										</tr>
									</table>
								</div>
								<!--[if mso | IE]>
							</td>

					</tr>

										</table>
									<![endif]-->
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--[if mso | IE]>
						</td>
					</tr>
				</table>
				<![endif]-->
		</div>
	</body>

	</html>';
}
