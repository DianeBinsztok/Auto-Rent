function check() {

    if (document.getElementById('password').value ==
      document.getElementById('confirm_password').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Bienvenue !';
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Vos deux versions du mot de passe ne sont pas identiques';
    }
  }
