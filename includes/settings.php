<?php
global $wpdb;
$formy = $wpdb->get_row("SELECT * FROM wp_formy_fields WHERE id = 1;");

if (isset($_POST['formy_save'])) {
  $wpdb->update(
    'wp_formy_fields',
    [
      'firstName' => $_POST['firstName'] ? true : false,
      'lastName' => $_POST['lastName'] ? true : false,
      'email' => $_POST['email'] ? true : false,
      'password' => $_POST['password'] ? true : false,
      'confirmPassword' => $_POST['confirmPassword'] ? true : false,
      'subject' => $_POST['subject'] ? true : false,
      'message' => $_POST['message'] ? true : false,
    ],
    ['id' => 1]
  );
}

?>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<style>
  .collection-item {
    font-size: 16px;
  }
</style>

<div class="wrap">
  <form method="post" action="">
    <ul class="collection with-header">
      <li class="collection-header">
        <h4>Formy Plugin</h4>
      </li>
      <li class="collection-item">
        <div>First name
          <label class="secondary-content">
            <div class="switch">
              <label>
                <input type="checkbox" name="firstName" class="filled-in" <?= $formy->firstName ? 'checked' : ''; ?> />
                <span class="lever"></span>
              </label>
            </div>
          </label>
        </div>
      </li>

      <li class="collection-item">
        <div>Last name
          <label class="secondary-content">
            <div class="switch">
              <label>
                <input type="checkbox" name="lastName" class="filled-in" <?= $formy->lastName ? 'checked' : ''; ?> />
                <span class="lever"></span>
              </label>
            </div>
          </label>
        </div>
      </li>

      <li class="collection-item">
        <div>Email address
          <label class="secondary-content">
            <div class="switch">
              <label>
                <input type="checkbox" name="email" class="filled-in" <?= $formy->email ? 'checked' : ''; ?> />
                <span class="lever"></span>
              </label>
            </div>
          </label>
        </div>
      </li>


      <li class="collection-item">
        <div>Password
          <label class="secondary-content">
            <div class="switch">
              <label>
                <input type="checkbox" name="password" class="filled-in" <?= $formy->password ? 'checked' : ''; ?> />
                <span class="lever"></span>
              </label>
            </div>
          </label>
        </div>
      </li>


      <li class="collection-item">
        <div>Confirm Password
          <label class="secondary-content">
            <div class="switch">
              <label>
                <input type="checkbox" name="confirmPassword" class="filled-in" <?= $formy->confirmPassword ? 'checked' : ''; ?> />
                <span class="lever"></span>
              </label>
            </div>
          </label>
        </div>
      </li>


      <li class="collection-item">
        <div>Subject
          <label class="secondary-content">
            <div class="switch">
              <label>
                <input type="checkbox" name="subject" class="filled-in" <?= $formy->subject ? 'checked' : ''; ?> />
                <span class="lever"></span>
              </label>
            </div>
          </label>
        </div>
      </li>


      <li class="collection-item">
        <div>Message
          <label class="secondary-content">
            <div class="switch">
              <label>
                <input type="checkbox" name="message" class="filled-in" <?= $formy->message ? 'checked' : ''; ?> />
                <span class="lever"></span>
              </label>
            </div>
          </label>
        </div>
      </li>

    </ul>

    <input id="formySubmit" class="btn" type="submit" name="formy_save" value="Save changes" />
    <a id="formyCopy" class="btn modal-trigger" href="#modal1"><i class="material-icons left">content_copy</i>Copy</a>

  </form>
</div>


<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Formy Plugin</h4>
    <p>Shortcode is Copied !</p>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {

    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {
      opacity: 0.5
    });

    //?Hola
    document.querySelector('#formyCopy').addEventListener('click', async () => {
      await navigator.clipboard.writeText('[formy]');
    });

    const chicky = document.querySelectorAll('input[type=checkbox]');
    const formySubmit = document.querySelector('#formySubmit');

    function ischecked() {
      return [...chicky].some(e => e.checked);
    }

    chicky.forEach(element => {
      element.addEventListener('change', () => {
        ischecked() ? (formySubmit.removeAttribute('disabled'), formySubmit.classList.remove('disabled')) : formySubmit.setAttribute('disabled', true)
      });
    });

    if (!ischecked()) {
      formySubmit.setAttribute('disabled', true);
      formySubmit.classList.add('disabled');
    }

  });
</script>