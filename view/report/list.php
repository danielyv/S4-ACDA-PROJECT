<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Identifiant de l'anecdote</th>
      <th scope="col">Titre de l'anecdote</th>
      <th scope="col">Nombre de signalements</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tab_report as $key): ?>
    <tr>
      <td class="text-primary"><a class="btn btn-outline-primary" href='?controller=anecdote&action=readAll&idAnecdote=<?php echo $key['idAnecSignal'] ?>' role="button"><?php echo $key['idAnecSignal'] ?></a></td>
      <td><?php echo $key['title']; ?></td>
      <td><?php echo $key['Nombre_Signalements'] ?></td>
      <td><a class="btn btn-primary text-light" href='?controller=anecdote&action=readOneReport&idAnecdote=<?php echo $key["idAnecSignal"]; ?>'>Détail</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a class="btn btn-primary" href="index.php?controller=admin">Retour au panneau d'administration</a>
