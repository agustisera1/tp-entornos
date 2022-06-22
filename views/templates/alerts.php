<?php
if (isset($alert)) {
?>
    <div class="alert alert-<?= $alert['tipo'] ?> alert-dismissible fade show" role="alert">
        <?= $alert['mensaje'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($alert);
}
?>