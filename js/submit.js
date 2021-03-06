$(document).ready(function() {
  validate();
  $('input').on('keyup', validate);
});

function validate() {
  var inputsWithValues = 0;

  // get all input fields except for type='submit'
  var myInputs = $("input:not([type='submit'])");

  myInputs.each(function(e) {
    // if it has a value, increment the counter
    if ($(this).val()) {
      inputsWithValues += 1;
  }
});

  if (inputsWithValues == myInputs.length) {
    $("input[type=submit]").prop("disabled", false);
} else {
    $("input[type=submit]").prop("disabled", true);
}
}