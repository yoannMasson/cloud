<?php $title = "Login" ?>
<?php ob_start(); ?>

    <h1>Welcome - Please Login</h1>
    <div class="row">
     <form class="col s12" method="post" action="index.php?action=listDocFromLog">
       <div class="row">
         <div class="input-field col s12">
           <input id="username" type="text" name="username" class="validate">
           <label for="username">Username</label>
         </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
           <input id="password" type="password" name="password" class="validate">
           <label for="password">Password</label>
         </div>
       </div>
       <button class="btn waves-effect waves-light" type="submit" >Log in
         <i class="material-icons right">arrow_upward</i>
       </button>
     </form>
   </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
