<?php
global $wpdb;
$myform = $wpdb->get_row("SELECT * FROM wp_formy_fields WHERE id = 1;");

if (isset($_POST['submit'])) {
  unset($_POST['submit']);
  unset($_POST['confirmPassword']);
  $wpdb->insert(
    'wp_formy_values',
    $_POST
  );
}

?>

<style>
  .formy_border {
    outline: none;
    border-radius: 5px !important;
  }

  .formy_font {
    color: #212529;
    font-weight: 400;
    font-family: sans-serif;
    margin-top: 10px;
  }
</style>
<form method="POST" action="">

  <?php if ($myform->firstName) { ?>
    <div>
      <label class="formy_font">First name</label>
      <input class="formy_border" type="text" name="firstName">
    </div>
  <?php } ?>

  <?php if ($myform->lastName) { ?>
    <div>
      <label class="formy_font">Last name</label>
      <input class="formy_border" type="text" name="lastName">
    </div>
  <?php } ?>

  <?php if ($myform->email) { ?>
    <div>
      <label class="formy_font">Email address</label>
      <input class="formy_border" type="email" name="email">
    </div>
  <?php } ?>

  <?php if ($myform->password) { ?>
    <div>
      <label class="formy_font">password</label>
      <input class="formy_border" type="password" name="password">
    </div>
  <?php } ?>

  <?php if ($myform->confirmPassword) { ?>
    <div>
      <label class="formy_font">Confirm password</label>
      <input class="formy_border" type="password" name="confirmPassword">
    </div>
  <?php } ?>

  <?php if ($myform->subject) { ?>
    <div>
      <label class="formy_font">subject</label>
      <input class="formy_border" type="text" name="subject">
    </div>
  <?php } ?>

  <?php if ($myform->message) { ?>
    <div>
      <label class="formy_font">message</label>
      <textarea class="formy_border" name="message" cols="30" rows="10">

      </textarea>
    </div>
  <?php } ?>

  <button style="margin-top: 12px;" type="submit" name="submit">submit</button>
</form>