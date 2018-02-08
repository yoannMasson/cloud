<?php $title = "Document list";  ?>
<?php ob_start(); ?>
    <div class="card panel deep-orange lighten-1">
      <h2>Document List</h2>
    </div>
    <?php if (count($doc)>0 || count($teacher) > 0 || count ($group) < 0 ){?>
      <table class="highlight">
      <thead>
        <tr>
            <th>Name</th>
            <th>deposit date</th>
            <th>last modification</th>
            <th>Whose is it ?
        </tr>
      </thead>
      <tbody>
        <?php for($j = 1;$j<=count($doc);$j++){ ?>
        <tr>
          <td><?= $doc[$j]['name']?></td>
          <td><?= $doc[$j]['dateDeposit']?></td>
          <td><?= $doc[$j]['lastModification']?></td>
          <td><span class="green-text text-darken-2">You</span>
        </tr>
      <?php } ?>
      <?php for($j = 1;$j<=count($teacher);$j++){ ?>
      <tr>
        <td><?= $teacher[$j]['name']?></td>
        <td><?= $teacher[$j]['dateDeposit']?></td>
        <td><?= $teacher[$j]['lastModification']?></td>
        <td><span class="blue-text text-blue-2">Teacher - <?= $teacher[$j]['firstName']?> <?= $teacher[$j]['lastName']?></span>
      </tr>
    <?php } ?>
    <?php for($j = 1;$j<=count($group);$j++){ ?>
    <tr>
      <td><?= $group[$j]['name']?></td>
      <td><?= $group[$j]['dateDeposit']?></td>
      <td><?= $group[$j]['lastModification']?></td>
      <td><span class="yellow-text text-yellow-2">Group</span>
    </tr>
    <?php } ?>
  <?php } ?>




<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
