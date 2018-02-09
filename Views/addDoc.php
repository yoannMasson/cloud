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
      <button class="btn waves-effect waves-light" type="submit" >Send
       <i class="material-icons right">send</i>
      </button>
    </form>
  </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
