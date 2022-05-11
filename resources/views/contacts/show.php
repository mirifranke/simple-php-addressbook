<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meine Kontakte</title>
</head>

<body>
  <?php
    $contact = unserialize($_SESSION['contact']);
  ?>

  <h1><?= $contact->getFullName() ?></h1>

  <form method="POST" action="/contacts/<?= $contact->id; ?>">
    <div class="section">
      <label for="id">Nachname:</label>
      <input type="text" name="lastName" id="lastName" required value="<?= $contact->lastName; ?>">
    </div>

    <div class="section">
      <label for="id">Vorname:</label>
      <input type="text" name="firstName" id="firstName" value="<?= $contact->firstName; ?>">
    </div>

    <div class="section">
      <label for="id">Straße:</label>
      <input type="text" name="street" id="street" value="<?= $contact->street; ?>">
    </div>

    <div class="section">
      <label for="id">PLZ:</label>
      <input type="text" name="zip" id="zip" value="<?= $contact->zip; ?>">
    </div>

    <div class="section">
      <label for="id">Stadt:</label>
      <input type="text" name="city" id="city" value="<?= $contact->city; ?>">
    </div>

    <div class="section">
      <label for="id">Telefon:</label>
      <input type="text" name="phoneNumber" id="phoneNumber" value="<?= $contact->phoneNumber; ?>">
    </div>

    <div class="section">
      <a class="cancel" href="/">Abbrechen</a>
      <button class="save" type="submit">Speichern</button>
    </div>
  </form>

</body>

</html>