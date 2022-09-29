
<?php if (count($success) > 0) : ?>
  <div class="error">
  	<?php foreach ($success as $successes) : ?>
  	  <p><?php echo $successes ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
