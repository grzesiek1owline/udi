"use strict";

function CopyAddressFields() {
  var radio = document.getElementById('other-address');

  if (radio && !radio.checked) {
    var street = document.getElementById('street').value;
    var home_number = document.getElementById('home-number').value;
    var flat_number = document.getElementById('flat-number').value;
    var zip = document.getElementById('zip').value;
    var town = document.getElementById('town').value;
    var area = document.getElementById('area').value;
    var before = document.getElementById('before_street').value;
    document.getElementById('street2').value = street;
    document.getElementById('home-number2').value = home_number;
    document.getElementById('flat-number2').value = flat_number;
    document.getElementById('zip2').value = zip;
    document.getElementById('town2').value = town;
    document.getElementById('area2').value = area;
    document.getElementById('before_street2').value = before;
  }
}

function clearOtherAdressFields() {
  var radio = document.getElementById('other-address');

  if (radio && radio.checked) {
    document.getElementById('street2').value = '';
    document.getElementById('home-number2').value = '';
    document.getElementById('flat-number2').value = '';
    document.getElementById('zip2').value = '';
    document.getElementById('town2').value = '';
    document.getElementById('area2').value = '';
    document.getElementById('before_street2').value = '';
  }
}

function validateForm(form) {
  // walidatory
  var constraints = {
    'name': {
      presence: {
        message: '^To pole jest wymagane.'
      },
      length: {
        minimum: 2,
        message: "^Ta wartość wydaje się być zbyt krótka"
      }
    },
    'surname': {
      presence: {
        message: '^To pole jest wymagane.'
      },
      length: {
        minimum: 2,
        message: "^Ta wartość wydaje się być zbyt krótka"
      }
    },
    // end 'name'
    'user-code': {
      presence: {
        message: '^To pole jest wymagane.'
      },
      numericality: {
        message: "^Numer PESEL składa się tylko z cyfr."
      },
      length: {
        is: 11,
        message: "^Numer PESEL powinien mieć 11 znaków."
      }
    },
    // end 'pesel'
    'street': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'street'
    'street2': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'street2'
    'home-number': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'home-number'
    'home-number2': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'home-number2'
    'flat-number': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'flat-number'
    'flat-number2': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'flat-number2'
    'zip': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'zip'
    'zip2': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'zip2'
    'town': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'town'
    'town2': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'town2'
    'start-date': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'start-date'
    'guarante-summary': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    },
    // end 'guarante-summary'
    'rodo': {
      presence: {
        message: '^To pole jest wymagane.'
      },
      inclusion: {
        within: [true],
        message: "^Musisz wyrazić zgodę, aby przejść dalej."
      }
    },
    // end 'rodo'
    'email': {
      presence: {
        message: '^To pole jest wymagane.'
      },
      email: {
        message: '^To nie jest prawidłowy adres email.'
      }
    },
    // end 'email'
    'tele': {
      presence: {
        message: '^To pole jest wymagane.'
      }
    } // end 'email'

  };
  var is_valid = handleFormSubmit(form, constraints);

  if (is_valid) {
    return true;
  } else {
    return false;
  }
}

function handleFormSubmit(form, constraints) {
  // Pobieram wartości z formularza funkcją z biblioteki validatejs
  var values = validate.collectFormValues(form); // console.log(values);
  // Usuwam alerty jeśli takowe już są

  removeAlerts(form); // Sprawdzam walidacje i zbieram błędy

  var errors = validate(values, constraints);
  console.log(errors); // Wyświetlam błędy

  showErrors(form, errors || {}); // Brak błędów? Zwraca TRUE

  if (!errors) {
    return true;
  } else {
    return false;
  }
}

function showErrors(form, errors) {
  var inputs = form.querySelectorAll('input'); // Dla każdego inputa z error-em wykonuję funkcję showErrorsForInput

  inputs.forEach(function (element) {
    showErrorsForInput(element, errors && errors[element.name]);
  });
}

function showErrorsForInput(input, errors) {
  var formInput = input; // Pobieram rodzica input-a

  var formGroup = formInput.parentElement; // Jeśli są błędy to zrób to:

  if (errors) {
    // Dodaje klase z błędem (czerwona ramka)
    formInput.classList.add('has-error'); // Tworzę powiadomienie

    var alert = document.createElement('div');
    alert.classList.add('form-error'); // Przypisuje tekst powiadomienia

    alert.innerText = errors; // Dodaje div z powiadomieniem na koniec rodzica inputa

    formGroup.append(alert);
  }
}

function removeAlerts(form) {
  // Usuwam powiadomienia
  // alert(form);
  var nots = form.querySelectorAll('.form-error');

  if (nots) {
    nots.forEach(function (item) {
      item.remove();
    });
  } // Usuwam klasy dla error-a z inputów, równie dobrze można wskazywać parent input-a


  form.querySelectorAll('input').forEach(function (item) {
    item.classList.remove('has-error');
  });
}

function submitForm(form) {
  var is_valid = validateForm(form);
  var btn = jQuery('#btn-submit');
  btn.attr('disabled', true);
  btn.addClass('is-loading');

  if (is_valid) {
    sendForm(form, btn);
  } else {
    btn.removeClass('is-loading');
    btn.removeAttr('disabled');
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
    return false;
  }
} // HELPERS


Date.prototype.toDateInputValue = function () {
  // var local = new Date(this);
  // local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
  // return local.toJSON().slice(0,10);
  var today = new Date();
  var tomorrow = new Date(today);
  tomorrow.setDate(tomorrow.getDate() + 1);
  return tomorrow;
};

document.getElementById('start-date').value = new Date().toDateInputValue();
var form = document.querySelector('[data-user-form]');
var inputs = form.querySelectorAll('input');

for (var index = 0; index < inputs.length; index++) {
  var element = inputs[index];
  element.addEventListener('change', function () {
    CopyAddressFields();
  });
}

form.addEventListener('submit', function (e) {
  e.preventDefault();
  CopyAddressFields();
  submitForm(this);
});

function otherAddress() {
  var other_address_radio = document.querySelectorAll('[data-show-other-address]');
  var other_address = document.querySelector('[data-other-address]');

  for (var _index = 0; _index < other_address_radio.length; _index++) {
    var _element = other_address_radio[_index];

    _element.addEventListener('click', function () {
      var type = this.dataset.showOtherAddress;

      if (type == 'default') {
        other_address.style.display = 'none';
      } else {
        other_address.style.display = 'block';
        clearOtherAdressFields();
      }
    });
  }
}

otherAddress(); // AJAX

function sendForm(form, btn) {
  var data = jQuery(form).serialize();
  console.log(window);
  jQuery.ajax({
    type: 'POST',
    url: window.my_ajax_object.ajax_url,
    data: {
      action: 'send_form',
      form: data
    },
    success: function success(output) {
      console.log(output);
      btn.removeClass('is-loading');
      btn.text('Formularz wysłany');
      btn.addClass('is-success');
    },
    error: function error(xhr, status, errorThrown) {
      console.log(errorThrown);
      btn.removeClass('is-loading');
      btn.text('Wystąpił błąd, spróbuj ponownie');
      btn.addClass('is-danger');
      btn.removeAttr('disabled');
    }
  });
}