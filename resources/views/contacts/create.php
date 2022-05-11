<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meine Kontakte</title>
</head>

<body>
  <h1>Neuen Kontakt erstellen</h1>

  <form method="POST" action="/contacts">
    <div class="section">
      <label for="id">Nachname:</label>
      <input type="text" name="lastName" id="lastName" required>
    </div>

    <div class="section">
      <label for="id">Vorname:</label>
      <input type="text" name="firstName" id="firstName">
    </div>

    <div class="section">
      <label for="id">Straße:</label>
      <input type="text" name="street" id="street">
    </div>

    <div class="section">
      <label for="id">PLZ:</label>
      <input type="text" name="zip" id="zip">
    </div>

    <div class="section">
      <label for="id">Stadt:</label>
      <input type="text" name="city" id="city">
    </div>

    <div class="section">
      <label for="id">Telefon:</label>
      <input type="text" name="phoneNumber" id="phoneNumber">
    </div>

    <div class="section">
      <a class="cancel" href="/">Abbrechen</a>
      <button class="save" type="submit">Speichern</button>
    </div>
  </form>

</body>

</html>