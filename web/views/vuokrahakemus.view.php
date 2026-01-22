<?php require "partials/head.php"; ?>
<button onclick="window.history.back();">← Takaisin</button>

<div class="">
<form action="/vuokrahakemus_submit" method="POST" enctype="multipart/form-data" style="max-width: 600px; margin: auto;">
  <h2>Vuokraushakemus</h2>

  <label for="fname">Nimi *</label><br>
  <input type="text" id="fname" name="fname" value="<?= $user["fname"] ?>" required></input><br><br>

  <label for="email">Sähköposti *</label><br>
  <input type="email" id="email" name="email" required><br><br>

  <label for="phone">Puhelinnumero *</label><br>
  <input type="text" id="phone" name="phone" required><br><br>

  <label for="move_in">Toivottu aloituspäivä *</label><br>
  <input type="date" id="move_in" name="move_in" required><br><br>

  <label for="duration">Vuokrauksen kesto *</label><br>
  <select id="duration" name="duration" required><br><br>
    <option value="">Valitse...</option>
    <option value="6kk">6 kuukautta</option>
    <option value="12kk">12 kuukautta</option>
    <option value="toistaiseksi">Toistaiseksi</option>
  </select><br><br>

  <label for="occupants">Asukkaiden määrä *</label><br>
  <input type="number" id="occupants" name="occupants" min="1" required><br><br>

  <label>Lemmikit</label><br>
  <input type="radio" id="pets_yes" name="pets" value="1">
  <label for="pets_yes">Kyllä</label>
  <input type="radio" id="pets_no" name="pets" value="0" checked>
  <label for="pets_no">Ei</label><br><br>

  <label for="message">Lisätiedot</label><br>
  <textarea id="message" name="message" rows="4"></textarea><br><br>

  <label for="attachment">Liitetiedosto (esim. työtodistus, tulotiedot)</label><br>
  <input type="file" id="attachment" name="attachment"><br><br>

  <label>
    Hyväksyn, että tietoni tallennetaan tätä vuokraushakemusta varten.
    <input type="checkbox" name="consent" required>
  </label><br><br>

  <button type="submit">Lähetä hakemus</button>
</form>