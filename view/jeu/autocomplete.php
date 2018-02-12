<ul id="jeu-list">
<?php
foreach($res as $jeu) {
?>
  <li onClick="selectJeu('<?php echo $jeu->get('nomJeu'); ?>');"><?php echo $jeu->get('nomJeu'); ?></li>
<?php } ?>
</ul>
