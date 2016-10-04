<h2 class="page-title">

		<?php if (is_day()) : ?>
		<?php printf(__('Archives: %s', 'pubspring'), __(get_the_date())); ?>
		<?php elseif (is_month()) : ?>
		<?php printf(__('Archives: %s', 'pubspring'), __(get_the_date('F Y'))); ?>
		<?php elseif (is_year()) : ?>
		<?php printf(__('Archives: %s', 'pubspring'), __(get_the_date('Y'))); ?>
		<?php else : ?>
		<?php //single_cat_title(); ?>
		<?php echo 'Category: '; the_category(' '); ?>
		<?php endif; ?>
	</h2>

			

			