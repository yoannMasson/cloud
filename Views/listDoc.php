<?php $title = "Document list";  ?>
<?php ob_start(); ?>
  <div class="card panel deep-orange lighten-1">
    <div class="row">
      <div class="valign-wrapper">
        <div class="col s10">
          <h2>Document List</h2>
        </div>
        <div class="col s2">
          <a class="btn modal-trigger btn-floating btn-large waves-effect waves-light green"  href="index.php?action=addDoc"><i class="material-icons">add</i></a>
        </div>
      </div>
    </div>
  </div>
  <?php if(isset($error)){ var_dump($error); }?>
  <?php if(isset($success)){ var_dump($success); }?>
  <div class="row">
    <div class="col s12">
      <ul class="tabs tabs-fixed-width">
        <li class="tab col s3"><a href="#you">Your Document</a></li>
        <li class="tab col s3"><a href="#teacher">Teacher</a></li>
        <li class="tab col s3"><a href="#group">Group document</a></li>
      </ul>
    </div>
    <div id="you" class="col s12">
      <?php if (count($doc)>0){?>
        <table class="highlight">
          <thead>
            <tr>
              <th>Name</th>
              <th>deposit date</th>
              <th>last modification</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php for($j = 1;$j<=count($doc);$j++){ ?>
              <tr>
                <td><?= $doc[$j]['name']?></td>
                <td><?= $doc[$j]['dateDeposit']?></td>
                <td><?= $doc[$j]['lastModification']?></td>
                <td>
                  <a class="btn-floating btn-large waves-effect waves-light indigo accent-4" href="./files/<?= $doc[$j]['username']."_".$doc[$j]['name']?>" download><i class="material-icons">cloud download</i></a>
                  <a class="btn-floating btn-large waves-effect waves-light red" href="index.php?action=delete&file=<?= $doc[$j]['name']?>"><i class="material-icons">delete</i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php }else{ echo "<h2>You do not have posted document yet</h2>";} ?>
    </div>
    <div id="teacher" class="col s12">
      <?php if (count($teacher)>0){?>
        <table class="highlight">
          <thead>
            <tr>
              <th>Name</th>
              <th>deposit date</th>
              <th>last modification</th>
              <th>Whose is it ?</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php for($j = 1;$j<=count($teacher);$j++){ ?>
              <tr>
                <td><?= $teacher[$j]['name']?></td>
                <td><?= $teacher[$j]['dateDeposit']?></td>
                <td><?= $teacher[$j]['lastModification']?></td>
                <td><span class="blue-text text-blue-2"><?= $teacher[$j]['firstName']?> <?= $teacher[$j]['lastName']?></span>
                <td>
                  <a class="btn-floating btn-large waves-effect waves-light indigo accent-4" href="./files/<?= $teacher[$j]['username']."_".$teacher[$j]['name']?>" download><i class="material-icons">cloud download</i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php }else{ echo "<h2>Your teacher do not have posted document yet</h2>";} ?>
    </div>
    <div id="group" class="col s12">
      <?php if (count($group)>0){?>
        <table class="highlight">
          <thead>
            <tr>
              <th>Name</th>
              <th>deposit date</th>
              <th>last modification</th>
              <th>Whose is it ?</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php for($j = 1;$j<=count($group);$j++){ ?>
              <tr>
                <td><?= $group[$j]['name']?></td>
                <td><?= $group[$j]['dateDeposit']?></td>
                <td><?= $group[$j]['lastModification']?></td>
                <td><span class="blue-text text-blue-2"><?=$group[$j]['groupName']." from ".$group[$j]['username1']?></span>
                <td>
                  <a class="btn-floating btn-large waves-effect waves-light indigo accent-4" href="./files/<?= $group[$j]['username']."_".$group[$j]['name']?>" download><i class="material-icons">cloud download</i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php }else{ echo "<h2>You are no part with any group that has documents</h2>";} ?>
    </div>
  </div>

  <!-- Modal Structure -->
<div id="modalDoc" class="modal">
  <div class="modal-content">
    <h4>Modal Header</h4>
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
