<input type="hidden" id="elemento_dropzone" value="<?= $elemento_dropzone ?>">

<?php if ($elemento == 1) : ?>
    <form id="<?= $elemento_dropzone ?>" action="#" class="dropzone needsclick dz-clickable">
        <div class="dz-message needsclick">
            <i class="dz-icon fa fa-cloud-upload h2"></i><br>
            <span class="note needsclick">(Arrastra los archivos aquí o <strong>haz clic para subirlos</strong>.)</span>
        </div>
    </form>
<?php elseif ($elemento == 2) : ?>
    <li id="<?= $elemento_dropzone ?>" class="list-group-item d-flex justify-content-between align-items-center bounce animated dropzone needsclick dz-clickable" style="height: 60px; min-height: 40px; border: 3px dotted; border-radius: 8px" data-url="<?= $url ?>" data-paramName="<?= isset($paramName) ? $paramName : 'archivo' ?>" data-maxFilesize="<?= isset($maxFilesize) ? $maxFilesize : 10 ?>" data-addRemoveLinks="<?= isset($addRemoveLinks) ? $addRemoveLinks : 'true' ?>" data-dictDefaultMessage="<?= isset($dictDefaultMessage) ? $dictDefaultMessage : '' ?>" data-dictResponseError="<?= isset($dictResponseError) ? $dictResponseError : 'Error al cargar el archivo!' ?>" data-dictRemoveFile="<?= isset($dictRemoveFile) ? $dictRemoveFile : 'Eliminar' ?>" data-autoProcessQueue="<?= isset($autoProcessQueue) ? $autoProcessQueue : 'true' ?>" data-uploadMultiple="<?= isset($uploadMultiple) ? $uploadMultiple : 'false' ?>" data-disablePreview="<?= isset($disablePreview) ? $disablePreview : 'false' ?>" data-parallelUploads="<?= isset($parallelUploads) ? $parallelUploads : 1 ?>" data-maxFiles="<?= isset($maxFiles) ? $maxFiles : 1 ?>" data-acceptedFiles="<?= isset($acceptedFiles) ? $acceptedFiles : '*' ?>" data-etiqueta="<?= $etiqueta ?>">

        <div class="dz-message needsclick">
            <i class="dz-icon fa fa-cloud-upload h2"></i><br>
            <span class="note needsclick">(Arrastra los archivos aquí o <strong>haz clic para subirlos</strong>.)</span>
        </div>
    </li>
<?php endif; ?>