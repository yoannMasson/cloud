<?php $title = "Add Document" ?>
<?php ob_start(); ?>

    <h1>Add a document</h1>
    <div class="row">
      <form class="col s12" method="post" action="index.php?action=listDocFromAdd" enctype="multipart/form-data">
       <div class="row">
         <div class="file-field input-field">
           <div class="btn">
            <span>File</span>
            <input type="file" name="file" id="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" name="path" id="path">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="switch">
          <label>
            keep to myself
            <input type="checkbox" name="share">
            <span class="lever"></span>
            Share to group
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12" name="group">
          <select name="group">
            <?php for ($i=1;$i<=count($group);$i++){ ?>
              <option value="<?= $group[$i]["idGroup"]?>"><?= $group[$i]["name"]?></option>
            <?php } ?>
          </select>
          <label>Group name</label>
        </div>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light" type="submit" >Send
         <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
