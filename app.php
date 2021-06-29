
<?php
global $wpdb;
$myform = $wpdb->get_row("SELECT * FROM wp_formy_fields WHERE id = 1;");
?>
<?php 


if (isset($_POST)) {
  global $wpdb;
  $arr = $_POST;
unset($arr['submit']);
  $wpdb->insert(
    'wp_formy_values',
    $arr
  );
}


?>
<style>
  <?php include_once('public/formy.css'); ?>
</style>


<form method="POST" action="">
<?php if ($myform->email == 'on') {?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input style="outline: none;border-radius: 5px;" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <?php } ?>


  <?php if ($myform->password == 'on') {?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">password</label>
    <input style="outline: none;border-radius: 5px;" type="email" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <?php } ?>

  <?php if ($myform->firstName == 'on') {?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">firstName</label>
    <input style="outline: none;border-radius: 5px;" type="email" name="firstName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <?php } ?>

  <?php if ($myform->lastName == 'on') {?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">lastName</label>
    <input style="outline: none;border-radius: 5px;" type="email" name="lastName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <?php } ?>

  
  
  <button type="submit" name="submit" class="btn btn-primary">falcon</button>
</form>

<script>

</script>