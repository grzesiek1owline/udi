function CopyAddressFields() {
	let radio = document.getElementById('other-address');

	if(radio && !(radio.checked)) {
		let street = document.getElementById('street').value;
		let home_number = document.getElementById('home-number').value;
		let flat_number = document.getElementById('flat-number').value;
		let zip = document.getElementById('zip').value;
		let town = document.getElementById('town').value;

		document.getElementById('street2').value = street;
		document.getElementById('home-number2').value = home_number;
		document.getElementById('flat-number2').value = flat_number;
		document.getElementById('zip2').value = zip;
		document.getElementById('town2').value = town;
	}
}

function clearOtherAdressFields() {
	let radio = document.getElementById('other-address');
	if(radio && radio.checked) {
		document.getElementById('street2').value = '';
		document.getElementById('home-number2').value = '';
		document.getElementById('flat-number2').value = '';
		document.getElementById('zip2').value = '';
		document.getElementById('town2').value = '';
	}
}

function validateForm(form) {
	// walidatory
	const constraints = {
		'name' : {
			presence: {
				message: '^To pole jest wymagane.',
			},
			length: {
				minimum: 6,
				message: "^Ta wartość wydaje się być zbyt krótka",
			}
		},
		// end 'name'
		'pesel' : {
			length: {
				minimum: 9,
				message: "^Ta wartość wydaje się być zbyt krótka",
			}
		},
		// end 'pesel'
		'street' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'street'
		'street2' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'street2'
		'home-number' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'home-number'
		'home-number2' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'home-number2'
		// 'flat-number' : {
		// 	presence: {
		// 		message: '^To pole jest wymagane.',
		// 	}
		// },
		// end 'flat-number'
		// 'flat-number2' : {
		// 	presence: {
		// 		message: '^To pole jest wymagane.',
		// 	}
		// },
		// end 'flat-number2'
		'zip' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'zip'
		'zip2' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'zip2'
		'town' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'town'
		'town2' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'town2'
		'start-date' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'start-date'
		'guarante-summary' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'guarante-summary'
		'rodo' : {
			presence: {
				message: '^To pole jest wymagane.',
			},
			inclusion: {
				within: [true],
				message: "^Musisz wyrazić zgodę, aby przejść dalej."
			}
		},
		// end 'rodo'
		'email' : {
			presence: {
				message: '^To pole jest wymagane.',
			},
			email: {
				message: '^To nie jest prawidłowy adres email.',
			},
		},
		// end 'email'
		'tel' : {
			presence: {
				message: '^To pole jest wymagane.',
			}
		},
		// end 'email'

	}

	const is_valid = handleFormSubmit(form, constraints);

	if(is_valid) {
		return true;
	} else {
		return false;
	}
}

function handleFormSubmit(form, constraints) {
  // Pobieram wartości z formularza funkcją z biblioteki validatejs
  var values = validate.collectFormValues(form);
	// Usuwam alerty jeśli takowe już są
  removeAlerts(form);
	// Sprawdzam walidacje i zbieram błędy
  var errors = validate(values, constraints);
	// Wyświetlam błędy
  showErrors(form, errors || {});
	// Brak błędów? Zwraca TRUE
  if (!errors) {
    return true;
  } else {
		return false;
	}
}

function showErrors(form, errors) {
  let inputs = form.querySelectorAll('input');
	// Dla każdego inputa z error-em wykonuję funkcję showErrorsForInput
  inputs.forEach(element => {
    showErrorsForInput(element, errors && errors[element.name]);
  });
}

function showErrorsForInput(input, errors) {
  let formInput = input;
	// Pobieram rodzica input-a
	let formGroup = formInput.parentElement;
  // Jeśli są błędy to zrób to:
  if (errors) {
		// Dodaje klase z błędem (czerwona ramka)
    formInput.classList.add('has-error');
		// Tworzę powiadomienie
    const alert = document.createElement('div');
    alert.classList.add('form-error');
		// Przypisuje tekst powiadomienia
    alert.innerText = errors;
		// Dodaje div z powiadomieniem na koniec rodzica inputa
    formGroup.append(alert);
  }
}

function removeAlerts(form) {
	// Usuwam powiadomienia
	// alert(form);
	let nots = form.querySelectorAll('.form-error');
	if(nots) {
		nots.forEach(item => {
				item.remove();
		})
	}
	// Usuwam klasy dla error-a z inputów, równie dobrze można wskazywać parent input-a
	form.querySelectorAll('input').forEach(item => {
    item.classList.remove('has-error');
  })
}

function submitForm(form) {
	// alert(form);
	const is_valid = validateForm(form);
	if(is_valid) {
		sendForm(form);
	} else {
		window.scrollTo({top: 0, behavior: 'smooth'});
		return false;
	}
}

// HELPERS

Date.prototype.toDateInputValue = (function() {
	// var local = new Date(this);
	// local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
	// return local.toJSON().slice(0,10);
	const today = new Date()
	const tomorrow = new Date(today)
	tomorrow.setDate(tomorrow.getDate() + 1)
	return tomorrow;
});

document.getElementById('start-date').value = new Date().toDateInputValue();


let form = document.querySelector('[data-user-form]');
let inputs = form.querySelectorAll('input');

for (let index = 0; index < inputs.length; index++) {
	const element = inputs[index];
	element.addEventListener('change', () => {
		CopyAddressFields();
	})
}

form.addEventListener('submit', function(e){
	e.preventDefault();
	CopyAddressFields();
	submitForm(this);
})


function otherAddress() {
	let other_address_radio = document.querySelectorAll('[data-show-other-address]');
	let other_address = document.querySelector('[data-other-address]');

	for (let index = 0; index < other_address_radio.length; index++) {
		const element = other_address_radio[index];

		element.addEventListener('click', function() {
			let type = this.dataset.showOtherAddress;
			if(type == 'default') {
				other_address.style.display = 'none';
			}
			else {
				other_address.style.display = 'flex';
				clearOtherAdressFields();
			}
		})
	}
}

otherAddress();

// AJAX

function sendForm(form) {
	let data = jQuery(form).serialize();
	console.log(window);
	jQuery.ajax({
    type: 'POST',
    url: window.my_ajax_object.ajax_url,
    data: {
      action: 'send_form',
      form: data,
    },
    success: function (output) {
      console.log(output)
    },
    error: function (xhr, status, errorThrown) {
      console.log(errorThrown);
    },
  });
}
