<div id="mapi-help-inline"></div>
<script src="https://apis.malcolm.app/mapi.js?onload=mapiReady" async defer></script>
<script type="text/javascript">
  function mapiReady() {
    mapi.init('<?php echo form_val(malcolm_get_option_value('id')); ?>', {
      inline: [<?php echo json_encode($options); ?>],
      uri: '<?php echo form_val(malcolm_get_option_value('uri')); ?>'
    });
  }
</script>