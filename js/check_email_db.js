document.getElementById("email").addEventListener('focusout', checkEmail);

function checkEmail() {
  var xhttp = new XMLHttpRequest();
  var mail = document.getElementById("email").value;
  var sendReq = "email="+mail;
  console.log(sendReq);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("email_err").innerHTML =
      this.responseText;
    }
  };
  xhttp.open('POST', '/~S4668271/private/check_email_db.php', true);
  xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhttp.send(sendReq);
}