
<?php
global $wpdb;
$myform = $wpdb->get_row("SELECT * FROM wp_formy_fields WHERE id = 1;");


?>

<?php
if (isset($_POST['submit'])) {
  global $wpdb;
  $wpdb->update(
    'wp_formy_fields',
    [
      'firstName' => $_POST['firstName'] ?? 'off',
      'lastName' => $_POST['lastName'] ?? 'off',
      'email' => $_POST['email'] ?? 'off',
      'password' => $_POST['password'] ?? 'off'
    ],
    ['id' => 1]
  );
}


?>
<div class="wrap">

  <h1>Formy Plugin</h1>
  <form method="post" action="">
    <div>
      <input type="checkbox" <?php echo $myform->firstName=="on" ?  'checked' :  '';  ?>  name="firstName">
      <input type="text" placeholder="First Name" />
    </div>
    <div>
      <input type="checkbox" <?php echo $myform->lastName=="on" ?  'checked' :  '';  ?> name="lastName">
      <input type="text" placeholder="Last Name" />
    </div>
    <div>
      <input type="checkbox" <?php echo $myform->email=="on" ?  'checked' :  '';  ?> name="email">
      <input type="email" placeholder="email" />
    </div>

    <div>
      <input type="checkbox" <?php echo $myform->password=="on" ?  'checked' :  '';  ?> name="password">
      <input type="password" placeholder="password" />
    </div>
    <!-- <input type="email" name="email" /> -->
    <input type="submit" name="submit" />
  </form>
</div>

<script>

let chicky = document.querySelectorAll('input[type=checkbox]');


chicky.forEach(element => {
  element.addEventListener('change',()=>{
  if (ischecked()) {
  document.querySelector('input[type=submit]').removeAttribute('disabled');
}else{
  document.querySelector('input[type=submit]').setAttribute('disabled',true);

}
});
});


function ischecked() {
  return [...chicky].some(e=>e.checked);
}

if (!ischecked()) {
  document.querySelector('input[type=submit]').setAttribute('disabled',true);
}



</script>


