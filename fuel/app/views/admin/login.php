<div class="row" style="background-image:url('../assets/img/bgimage.jpg')">
	<h1>Welcome!</h1>
	<div class="col-md-3">
		<?php echo Form::open(array()); ?>

			<?php if (isset($_GET['destination'])): ?>
				<?php echo Form::hidden('destination', $_GET['destination']); ?>
			<?php endif; ?>

			<?php if (isset($login_error)): ?>
				<div class="error"><?php echo $login_error; ?></div>
			<?php endif; ?>

			<div class="form-group <?php echo ! $val->error('email') ?: 'has-error' ?>">
				<label for="email">Email or Username:</label>
				<?php echo Form::input('email', Input::post('email'), array('class' => 'form-control', 'placeholder' => 'Email or Username', 'autofocus')); ?>

				<?php if ($val->error('email')): ?>
					<span class="control-label"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></span>
				<?php endif; ?>
			</div>

			<div class="form-group <?php echo ! $val->error('password') ?: 'has-error' ?>">
				<label for="password">Password:</label>
				<?php echo Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'Password')); ?>

				<?php if ($val->error('password')): ?>
					<span class="control-label"><?php echo $val->error('password')->get_message(':label cannot be blank'); ?></span>
				<?php endif; ?>
			</div>

			<div class="actions">
				<?php echo Form::submit(array('value'=>'Login', 'name'=>'submit', 'class' => 'btn btn-lg btn-primary btn-block')); ?>
			</div>

			<div class="form-group" style="padding-left: 50px;">
				<a href="">Create new account</a>
			</div>

		<?php echo Form::close(); ?>
	</div>
</div>
