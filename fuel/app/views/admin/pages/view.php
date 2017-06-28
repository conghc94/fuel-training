<h2>Viewing #<?php echo $page->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $page->title; ?></p>
<p>
	<strong>Slug:</strong>
	<?php echo $page->slug; ?></p>
<p>
	<strong>Summary:</strong>
	<?php echo $page->summary; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $page->body; ?></p>
<p>
	<strong>Publisher:</strong>
	<?php echo $page->publisher; ?></p>

<?php echo Html::anchor('admin/pages/edit/'.$page->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/pages', 'Back'); ?>