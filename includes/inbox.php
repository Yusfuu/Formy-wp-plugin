<?php

global $wpdb;
$myforms = $wpdb->get_results("SELECT * FROM wp_formy_values");


if (isset($_POST['delete'])) {
  global $wpdb;
  $id = $_POST['delete'];
  $wpdb->delete('wp_formy_values', array('id' => $id), ['%d']);
}
?>

<head>
  <link href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css" rel="stylesheet">
</head>

<style>
  .formy {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(16rem, 1fr));
    grid-gap: 5rem;
    padding: 5rem;
    background: #F5F7FA;
  }

  body .card {
    background: #5D9CEC;
    border-radius: 10px;
    position: relative;
    min-width: 330px;
    color: white;
    height: 12rem;
    box-shadow: 0 0 2rem -1rem rgba(0, 0, 0, 0.05);
  }

  body .card .multi-button {

    z-index: 0;
    position: absolute;
    top: 1.25rem;
    left: 1.25rem;
    border-radius: 100%;
    width: 0rem;
    height: 0rem;
    transform: translate(-50%, -50%);
    transition: 0.25s cubic-bezier(0.25, 0, 0, 1);
  }

  body .card .multi-button button {

    display: grid;
    place-items: center;
    position: absolute;
    width: 2rem;
    height: 2rem;
    border: none;
    border-radius: 100%;
    background: var(--background);
    color: var(--text);
    transform: translate(-50%, -50%);
    cursor: pointer;
    transition: 0.25s cubic-bezier(0.25, 0, 0, 1);
    box-shadow: 0 0 0rem -0.25rem var(--background);
  }

  body .card .multi-button button {
    border: 2px white solid;
  }

  body .card .multi-button button:hover {
    background: var(--text);
    color: var(--background);
    box-shadow: 0 0 1rem -0.25rem var(--background);
  }

  body .card .multi-button button:first-child:nth-last-child(1):nth-child(1),
  body .card .multi-button button:first-child:nth-last-child(1)~*:nth-child(1) {

    left: 25%;
    top: 25%;
  }

  body .card .multi-button button:first-child:nth-last-child(2):nth-child(1),
  body .card .multi-button button:first-child:nth-last-child(2)~*:nth-child(1) {
    left: 37.5%;
    top: 18.75%;
  }

  body .card .multi-button button:first-child:nth-last-child(2):nth-child(2),
  body .card .multi-button button:first-child:nth-last-child(2)~*:nth-child(2) {
    left: 18.75%;
    top: 37.5%;
  }

  body .card .multi-button button:first-child:nth-last-child(3):nth-child(1),
  body .card .multi-button button:first-child:nth-last-child(3)~*:nth-child(1) {
    left: 50%;
    top: 15.625%;
  }

  body .card .multi-button button:first-child:nth-last-child(3):nth-child(2),
  body .card .multi-button button:first-child:nth-last-child(3)~*:nth-child(2) {
    left: 25%;
    top: 25%;
  }

  body .card .multi-button button:first-child:nth-last-child(3):nth-child(3),
  body .card .multi-button button:first-child:nth-last-child(3)~*:nth-child(3) {
    left: 15.625%;
    top: 50%;
  }

  body .card .multi-button button:first-child:nth-last-child(4):nth-child(1),
  body .card .multi-button button:first-child:nth-last-child(4)~*:nth-child(1) {
    left: 62.5%;
    top: 18.75%;
  }

  body .card .multi-button button:first-child:nth-last-child(4):nth-child(2),
  body .card .multi-button button:first-child:nth-last-child(4)~*:nth-child(2) {
    left: 37.5%;
    top: 18.75%;
  }

  body .card .multi-button button:first-child:nth-last-child(4):nth-child(3),
  body .card .multi-button button:first-child:nth-last-child(4)~*:nth-child(3) {
    left: 18.75%;
    top: 37.5%;
  }

  body .card .multi-button button:first-child:nth-last-child(4):nth-child(4),
  body .card .multi-button button:first-child:nth-last-child(4)~*:nth-child(4) {
    left: 18.75%;
    top: 62.5%;
  }

  body .card:hover .multi-button,
  body .card .multi-button:focus-within {
    width: 10rem;
    height: 10rem;
  }

  .container__card {
    /* margin-top: -72px; */
    margin-left: 17px;
  }

  .container__card p {
    margin-bottom: -5px;
  }
</style>

<div class="formy">
  <?php foreach ($myforms as $key) : ?>
    <div class='card' style='--background:#5D9CEC; --text:white;'>
      <div class='multi-button'>
        <button class='fas fa-clipboard'></button>
        <form action="" method="post">
          <button type="submit" name="delete" value="<?= $key->id ?>" class='fas fa-trash'></button>
        </form>
        <button class='fas fa-bars'></button>
      </div>
      <div class='container__card'>
        <?= $key->firstName !== null ? ('<p>First Name:  ' . $key->firstName . '</p>') : NULL; ?>
        <?= $key->lastName !== null ? ('<p>Last Name:  ' . $key->lastName . '</p>') : NULL; ?>
        <?= $key->email !== null ? ('<p>Email:  ' . $key->email . '</p>') : NULL; ?>
        <?= $key->subject !== null ? ('<p>Subject:  ' . $key->subject . '</p>') : NULL; ?>
        <?= $key->message !== null ? ('<p>Message:  ' . $key->message . '</p>') : NULL; ?>
      </div>
    </div>
  <?php endforeach; ?>



</div>