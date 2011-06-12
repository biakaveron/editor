<?php defined('SYSPATH') OR die('No direct access allowed.');
unset($options['name'], $options['value']);
?>
<script type="text/javascript">
	CKEDITOR.replace( '[name="<?php echo $name ?>"]',
		<?php echo json_encode($options) ?>
	);
</script>
