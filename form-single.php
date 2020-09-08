<?php
//  Template Name: OC/WN030/1405
get_header();
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>

		<div class="container">
			<div class="row text-left">
				<div class="col-xs-12">
					<article class="online-form">
						<header class="online-form__header">
							<h1 class="online-form__title">WNIOSEK O ZAWARCIE UMOWY DODATKOWEJ W RAMACH OFERTY DLA PIIB ZWIĄZANEJ Z UMOWĄ GENERALNĄ</h1>
							<p class="online-form__subtitle">NUMER UMP-114-0390/PiiB/14 DOTYCZĄCY DOBROWOLNEGO NADWYŻKOWEGO UBEZPIECZENIA ODPOWIEDZIALNOŚCI CYWILNEJ INŻYNIERÓW BUDOWNICTWA</p>

							<div class="notification">
								<i class="gg-info is-in-notification"></i>
								Ubezpieczenie nadwyżkowe stanowi dodatkowy limit ubezpieczenia odpowiedzialności cywilnej inżyniera budownictwa, przy zachowaniu identycznego zakresu jak w
ubezpieczeniu obowiązkowym. Podstawą zawarcia umowy jest Rozporządzenie Ministra Finansów w sprawie obowiązkowego ubezpieczenia OC architektów i
inżynierów budownictwa oraz odpowiednie postanowienia Umowy Generalnej. Właściwe dokumenty dostępne są na stronie Polskiej Izby Inżynierów Budownictwa
www.piib.org.pl w zakładce ubezpieczenia
							</div>
						</header>

						<form action="post" data-user-form="OC/WN030/1405">
							<div class="form-section">
								<p class="form-section__title">
									I. UBEZPIECZAJĄCY/UBEZPIECZONY
								</p>
								<div class="field" style="display: none">
									<div class="control">
										<input class="input" type="hidden" name="title" value="WNIOSEK O ZAWARCIE UMOWY DODATKOWEJ W RAMACH OFERTY DLA PIIB ZWIĄZANEJ Z UMOWĄ GENERALNĄ">
									</div>
								</div>
								<div class="field-body">
								<div class="field">
									<label for="name" class="label">Imię i nazwisko</label>
									<div class="control">
										<input class="input" type="text" name="name">
									</div>
								</div>
								<div class="field">
									<label for="surname" class="label">Imię i nazwisko</label>
									<div class="control">
										<input class="input" type="text" name="surname">
									</div>
								</div>
								</div>
								<div class="field-body">
									<div class="field">
										<label for="pesel" class="label">PESEL</label>
										<div class="control">
											<input class="input" type="text" name="pesel">
										</div>
									</div>
									<div class="field">
										<label for="member-number" class="label">Numer członkowski</label>
										<div class="control">
											<input class="input" type="text" name="member-number">
										</div>
									</div>
									<div class="field">
										<label for="pkd" class="label">PKD głównej działalności<sup>1</sup></label>
										<div class="control">
											<input class="input" type="text" name="pkd">
										</div>
									</div>
								</div>
								<div class="notification">
									<i class="gg-info is-in-notification"></i>
									1. Wpis wyłącznie w celach statystycznych, dla osób nie prowadzących działalności gospodarczej zostanie przydzielony nr 71.12.Z
								</div>
							</div>
							<!-- Koniec sekcji I. -->

							<div class="form-section">
								<p class="form-section__title">
									II. ADRES UBEZPIECZAJĄCEGO/UBEZPIECZONEGO
								</p>
								<div class="field-body">
									<div class="field">
										<label for="street" class="label">Ulica</label>
										<div class="control">
											<input class="input" type="text" name="street" id="street">
										</div>
									</div>
									<div class="field">
										<label for="home-number" class="label">Numer domu</label>
										<div class="control">
											<input class="input" type="number" name="home-number" id="home-number">
										</div>
									</div>
									<div class="field">
										<label for="flat-number" class="label">Numer lokalu</label>
										<div class="control">
											<input class="input" type="number" name="flat-number" id="flat-number">
										</div>
									</div>
									<div class="field">
										<label for="zip" class="label">Kod pocztowy</label>
										<div class="control">
											<input class="input" name="zip" id="zip" type="text">
										</div>
									</div>
									<div class="field">
										<label for="town" class="label">Miejscowość</label>
										<div class="control">
											<input class="input" type="text" name="town" id="town">
										</div>
									</div>

								</div>
							</div>
							<!-- Koniec Sekcji II. -->

							<div class="form-section">
								<p class="form-section__title">
									III. UMOWA UBEZPIECZENIA
								</p>
								<div class="field">
									<p class="form-section__subtitle">1. Proponowana data początku 12 miesięcznego okresu ubezpieczenia od:<sup>1</sup> </p>
									<div class="field">
										<div class="control">
												<input class="input" type="date" id="start-date" name="start-date">
										</div>
									</div>
									<div class="notification">
										<i class="gg-info is-in-notification"></i>
										1. Okres ubezpieczenia może rozpocząć się najwcześniej od następnego dnia po przesłaniu wniosku
									</div>
								</div>

								<div class="field">
									<p class="form-section__subtitle">2. Suma Gwarancyjna i składka za 12 miesięczny okres ubezpieczenia</p>
									<div class="field">
										<div class="control">
											<label class="bulma-radio">
												<input type="radio" name="guarante-summary" checked value="100000">
												<div class="radio-info">
													wariant I / Suma Gwarancyjna: 100.000 EURO <sup>2</sup> / składka 195 PLN <sup>3</sup>
												</div>
											</label>
										</div>
									</div>
									<div class="field">
										<div class="control">
											<label class="bulma-radio">
												<input type="radio" name="guarante-summary" value="200000">
												<div class="radio-info">
													wariant II / Suma Gwarancyjna: 200.000 EURO <sup>2</sup> / składka 395 PLN <sup>3</sup>
												</div>
											</label>
										</div>
									</div>
									<div class="field">
										<div class="control">
											<label class="bulma-radio">
												<input type="radio" name="guarante-summary" value="250000">
												<div class="radio-info">
													wariant III / Suma Gwarancyjna: 250.000 EURO <sup>2</sup> / składka 475 PLN <sup>3</sup>
												</div>
											</label>
										</div>
									</div>
									<div class="field">
										<div class="control">
											<label class="bulma-radio">
												<input type="radio" name="guarante-summary" value="300000">
												<div class="radio-info">
													wariant IV / Suma Gwarancyjna: 300.000 EURO <sup>2</sup> / składka 720 PLN <sup>3</sup>
												</div>
											</label>
										</div>
									</div>
									<div class="field">
										<div class="control">
											<label class="bulma-radio">
												<input type="radio" name="guarante-summary" value="400000">
												<div class="radio-info">
													wariant V / Suma Gwarancyjna: 400.000 EURO <sup>2</sup> / składka 1150 PLN <sup>3</sup>
												</div>
											</label>
										</div>
									</div>

									<div class="notification">
										<i class="gg-info is-in-notification"></i>
										2. Suma ubezpieczenia obowiązkowego kumuluje się z wybraną sumą gwarancyjną ubezpieczenia nadwyżkowego. <br/>
										3. Składka na ubezpieczenie nadwyżkowe jest składką dodatkową, niezależną od składki na ubezpieczenie obowiązkowe.
									</div>

								</div>

								<div class="field">
									<p class="form-section__subtitle">3. Polisę potwierdzającą zawarcie umowy ubezpieczenia odpowiedzialności cywilnej inżyniera budownictwa na dodatkową sumę gwarancyjną, proszę przesłać na adres</p>
									<div class="control">
										<label class="bulma-radio" data-show-other-address="default">
											<input type="radio" name="address-2" id="other-address-default" value="0" checked>
											jak podany powyżej
										</label>
										<label class="bulma-radio" data-show-other-address="other">
											<input type="radio" name="address-2" id="other-address" value="1">
											inny, jak podany poniżej
										</label>
									</div>
								</div>

								<div class="field-body" data-other-address style="display: none">
									<div class="field">
										<label for="street2" class="label">Ulica</label>
										<div class="control">
											<input class="input" type="text" name="street2" id="street2">
										</div>
									</div>
									<div class="field">
										<label for="home-number2" class="label">Numer domu</label>
										<div class="control">
											<input class="input" type="number" name="home-number2" id="home-number2">
										</div>
									</div>
									<div class="field">
										<label for="flat-number2" class="label">Numer lokalu</label>
										<div class="control">
											<input class="input" type="number" name="flat-number2" id="flat-number2">
										</div>
									</div>
									<div class="field">
										<label for="zip2" class="label">Kod pocztowy</label>
										<div class="control">
											<input class="input" name="zip2" id="zip2" type="text">
										</div>
									</div>
									<div class="field">
										<label for="town2" class="label">Miejscowość</label>
										<div class="control">
											<input class="input" type="text" name="town2" id="town2">
										</div>
									</div>
								</div>
							</div>
							<!-- Koniec Sekcji 3 -->

							<div class="form-section">
								<p class="form-section__title">
									IV. OŚWIADCZENIA UBEZPIECZYCIELA
								</p>
								<p>Na podstawie Ustawy z dnia 29.08.1997 roku o ochronie danych osobowych Dz. U. z 1997 roku, Nr 133, poz. 883), informujemy, że Sopockie Towarzystwo Ubezpieczeniowe Ergo Hestia SA
									z siedzibą w Sopocie przy ul. Hestii 1 jest administratorem Pana/i danych osobowych, pobranych zgodnie z treścią art. 815 kc., które będą przez nas przetwarzane w celu wywiązania się
									z umowy ubezpieczenia.<br />
									Jednocześnie informujemy, iż służy Panu/i prawo wglądu do swoich danych osobowych i ich poprawiania</p>
							</div>
							<!-- Koniec Sekcji 4 -->

							<div class="form-section">
								<p class="form-section__title">
									V. OŚWIADCZENIA UBEZPIECZAJĄCEGO
								</p>
								<div class="field field--checkbox">
									<div class="control">
									<label class="checkbox">
										<input type="checkbox" name="rodo">
										Wyrażam zgodę na przetwarzanie moich danych osobowych
									</label>
									</div>
								</div>
								<p>
									Wyrażam zgodę na przetwarzanie moich danych osobowych przez Sopockie Towarzystwo Ubezpieczeniowe Ergo Hestia SA oraz Sopockie Towarzystwo Ubezpieczeń na Życie
									Ergo Hestia SA, obydwa z siedzibą w Sopocie przy ul. Hestii 1, dla celów promocji (marketingu) ich produktów (usług) oraz produktów (usług) podmiotów powiązanych
									z nimi kapitałowo.
								</p>
							</div>
							<!-- Koniec Sekcji 5 -->

							<div class="form-section">
								<p class="form-section__title">
									DANE KONTAKTOWE
								</p>
								<div class="field">
										<label for="email" class="label">Adres email</label>
										<div class="control">
											<input class="input" type="email" name="email">
										</div>
									</div>
									<div class="field">
										<label for="tele" class="label">Telefon</label>
										<div class="control">
											<input class="input" type="tel" name="tele">
										</div>
									</div>
							</div>
							<!-- Koniec Sekcji 6 -->

							<div class="form-section">
								<div class="field">
									<div class="control">
										<button class="button button--submit">
											Wyślij formularz
										</button>
									</div>
								</div>
							</div>
							<!-- Koniec Sekcji 4 -->
						</form>
					</article>
				</div>
			</div>
		</div>

<?php get_footer(); ?>
