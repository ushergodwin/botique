<?php if(count($errors) > 0) : ?>
     <div class="errors">
     	<?php foreach($errors as $error): ?>
     		<h6 style="color: red;"> <?php echo $error ?> </h6>
     		<?php endforeach ?>
     	</div>
     	<?php endif ?>