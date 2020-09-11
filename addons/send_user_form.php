<?php
include get_theme_file_path( '/addons/simple_xlxs_gen.php' );

// HELPERS

/******* configure SMTP ***************************/
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
/***************************** */

/********* REMOVE TEMP FILE */
function removeFile($path) {
	unlink($path);
}
/***************************** */

/********* GENERATE RANDOM STRING */

function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
/***************************** */

/*********** SEND USER MAIL */
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
/***************************** */

/*********** USER MAIL TEMPLATE */
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
												<div style="font-family:Arial, sans-serif;font-size:14px;line-height:28px;text-align:center;color:#55575d;">Właśnie przyjęliśmy od Ciebie formularz zawierający {{WNIOSEK}}. Skontaktujemy się z Tobą najszybciej jak to możliwe. W razie pytań prosimy o kontakt <a href="tel:730 470 949">730 470 949</a>.</div>
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
/***************************** */

/*********** SEND ADMIN MAIL */
function send_admin_mail($form) {
	unset($form['title']);

	$form_sorted = sortFormData($form);

	$file = createXLXS($form_sorted);

	$file_path = get_stylesheet_directory() . '/temp/' . $file;
	echo 'Dodaje jako załącznik ' . $file_path;
	$attach = array($file_path);

	$mailResult = false;
	$mailResult = wp_mail( $form['email'], 'Nowe zgłoszenie formularzem', 'Formularz uzytkownika '.$form['name'].' w załączniku.', '', $attach);
	removeFile($file_path);
	if($mailResult){
		return 'result is true';
	} else {
		onMailError( $wp_error );
		return false;
	}
}
/***************************** */

/**************** CREATE DATA FOR EXCEL */
function sortFormData($form) {
	echo 'before sort: ';
	print_r($form);
	$temp_data = array();
	$included_columns = [1,2,3,18,19,20,21,22,23,24,25,26,27,28,29,44,45,46,47,48,49,50,51,52,55,61];
	$keys = ['name','surname','user-code','zip','town','area','before_street', 'street', 'home-number', 'flat-number', 'email', 'tele', 'name', 'surname','user-code','zip2','town2','area2','before_street2', 'street2', 'home-number2','flat-number2', 'email', 'tele', 'start-date', 'guarante-summary'];
	$j = 0;
	for ($i=0; $i < 100; $i++) {
		if(in_array($i, $included_columns)) {
			$temp_data[$i] = $form[$keys[$j]];
			$j++;
		} else {
			$temp_data[$i] = '';
		}
	}
	echo 'sort: ';
	print_r($temp_data);
	return $temp_data;
}

/******************************/

/************** CREATE XLXS **/
function createXLXS($form) {

	$data = array (
		array('NUMER UG','IMIĘ','NAZWISKO','PESEL {11 cyfr}','DATA URODZENIA {RRRR-MM-DD}','PŁEĆ','NAZWA','FORMA DZIAŁALNOŚCI','NIP {10 cyfr}','REGON {9/14 cyfr}','PKD','IMIĘ','NAZWISKO','DATA URODZENIA {RRRR-MM-DD}','TYP DOKUMENTU','NUMER DOKUMENTU','KRAJ','OBYWATELSTWO','KOD POCZTOWY','MIEJSCOWOŚĆ','WOJEWÓDZTWO','PRZEDR. ULICY','ULICA','NUMER DOMU','NUMER LOKALU','EMAIL','TELEFON','IMIĘ','NAZWISKO','PESEL {11 cyfr}','DATA URODZENIA {RRRR-MM-DD}','PŁEĆ','NAZWA','FORMA DZIAŁALNOŚCI','NIP {10 cyfr}','REGON {9/14 cyfr}','PKD','IMIĘ','NAZWISKO','DATA URODZENIA {RRRR-MM-DD}','TYP DOKUMENTU','NUMER DOKUMENTU','KRAJ','OBYWATELSTWO','KOD POCZTOWY','MIEJSCOWOŚĆ','WOJEWÓDZTWO','PRZEDR. ULICY','ULICA','NUMER DOMU','NUMER LOKALU','EMAIL','TELEFON','LICZBA UBEZPIECZONYCH','DATA ZAWARCIA {RRRR-MM-DD}','DATA ROZPOCZĘCIA {RRRR-MM-DD}','DATA WYGAŚNIĘCIA {RRRR-MM-DD}','LICZBA RAT','KODY ROZSZERZEŃ','GRUPA ZAWODOWA','KOD','SUMA GWARANCYJNA','FRANSZYZA REDUKCYJNA','FRANSZYZA INTEGRALNA','KOD','SUMA GWARANCYJNA','FRANSZYZA REDUKCYJNA','FRANSZYZA INTEGRALNA','KOD','SUMA GWARANCYJNA','FRANSZYZA REDUKCYJNA','FRANSZYZA INTEGRALNA','KOD','SUMA GWARANCYJNA','FRANSZYZA REDUKCYJNA','FRANSZYZA INTEGRALNA','KOD','SUMA GWARANCYJNA','FRANSZYZA REDUKCYJNA','FRANSZYZA INTEGRALNA','KOD','SUMA GWARANCYJNA','FRANSZYZA REDUKCYJNA','FRANSZYZA INTEGRALNA','KOD','SUMA GWARANCYJNA','FRANSZYZA REDUKCYJNA','FRANSZYZA INTEGRALNA','KOD','SUMA GWARANCYJNA','FRANSZYZA REDUKCYJNA','FRANSZYZA INTEGRALNA'),
	);

	array_push($data, $form);


	$writer = new XLSXWriter();
	$writer->writeSheet($data);
	$random_file_name = generateRandomString(5) . '-form.xlsx';
	$file_path = get_stylesheet_directory() . '/temp/' . $random_file_name;
	$writer->writeToFile($file_path);

	return $random_file_name;
}
/******************************/

// MAIN FUNCTIONS
function send_user_form() {
	parse_str($_POST[form], $form);
	$sanitize_data = [];

	foreach ($form as $key => $value) {
		$sanitize = sanitize_text_field($value);
		$sanitize_data[$key] = $sanitize;
	}

	send_admin_mail($sanitize_data);
	send_user_mail($sanitize_data['email'], 'Twoje zgłoszenie zostało przyjęte.',$sanitize_data['name'], $sanitize_data['title']);
	wp_die();
}


// ********** Formularz wypluwa mi takie coś: ************************************ //
// [title] => WNIOSEK O ZAWARCIE UMOWY DODATKOWEJ W RAMACH OFERTY DLA PIIB ZWIĄZANEJ Z UMOWĄ GENERALNĄ
// [name] => Naomi Gibson
// [pesel] => Vel quo est ea dolor
// [member-number] => 443
// [pkd] => Rerum molestiae volu
// [street] => Ratione dolore provi
// [home-number] => 936
// [flat-number] => 244
// [zip] => 90752
// [town] => 11
// [start-date] => 1972-08-21
// [guarante-summary] => on
// [address-2] => 1
// [street2] => Explicabo Ab quidem
// [home-number2] => 281
// [flat-number2] => 695
// [zip2] => 52896
// [town2] => 74
// [rodo] => on
// [email] => qydaci@mailinator.com
// [tele] => qydaci@mailinator.com
// ****************************************************************************************
