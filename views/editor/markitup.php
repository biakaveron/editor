<?php defined('SYSPATH') OR die('No direct access allowed.');
unset($options['name'], $options['set'], $options['skin']);
?>
<script language="javascript">
$(document).ready(function() {
	$('[name="<?php echo $name ?>"]').markItUp(mySettings, <?php echo json_encode($options) ?>);
});
</script>
