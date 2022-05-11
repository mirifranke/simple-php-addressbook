<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meine Kontakte</title>
</head>

<body>
  <?php $contacts = unserialize($_SESSION['contacts']); ?>

  <h1>Kontakte</h1>

  <a class="save" href="/contacts/create">Neuer Eintrag</a>

  <table>
    <tr>
      <th><a href="/?orderBy=last_name">Nachname</a></th>
      <th><a href="/?orderBy=first_name">Vorname</a></th>
      <th><a href="/?orderBy=street">Straße</a></th>
      <th><a href="/?orderBy=city">Adresse</a></th>
      <th><a href="/?orderBy=phone_number">Telefon</a></th>
      <th></th>

      <?php foreach ($contacts as $contact) : ?>
    <tr>
      <td>
        <a href="/contacts/<?= $contact->id; ?>">
          <?= $contact->getLastName(); ?>
        </a>
      </td>
      <td><?= $contact->getFirstName(); ?></td>
      <td><?= $contact->getStreet(); ?></td>
      <td><?= $contact->getCity(); ?></td>
      <td><?= $contact->getPhoneNumber(); ?></td>
      <td>
        <form method="POST" action="/contacts/<?= $contact->id; ?>/delete">
          <button type="submit" class="delete">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>

  </table>
</body>

</html>