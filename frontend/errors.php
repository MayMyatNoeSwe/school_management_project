<?php
if (!isset($errors)) $errors = [];
if (count($errors) == 0) return;
foreach ($errors as $key => $err) { ?>
<div class="text-red-500 alert-dismissible fade show" role="alert">
    <strong><?= $err ?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>