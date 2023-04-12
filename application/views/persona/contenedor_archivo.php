<?php if ($contentedor == 1) : ?>
    <p><?= $nombre ?></p>
    <div class="form-group m-b-40">
        <ul class="list-group">
            <div id="subir-archivo"><?= $subir_archivo ?></div>
            <div id="seleccionar-archivo"><?= $seleccionar_archivo ?></div>
        </ul>
    </div>
<?php elseif ($contentedor == 2) : ?>
<?php endif; ?>