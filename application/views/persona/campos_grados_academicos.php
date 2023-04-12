<!-- comentario de campos grados academicos persona -->
<?= form_open('', array('id' => 'form_campos_grados_academicos', 'enctype' => 'multipart/form-data')); ?>
<input name="id_persona" type="hidden" value="<?= $persona[0]['id_persona'] ?>">
<input name="id_grado_academico_persona" id="id_grado_academico_persona" type="hidden" value="<?= isset($grados_academicos_persona[0]['id_grado_academico_persona']) ? $grados_academicos_persona[0]['id_grado_academico_persona'] : '' ?>">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="id_unidad_academica" class="control-label text-warning text-bold"><i class="mdi mdi-school"></i> Unidad Academica</label>
            <select name="id_unidad_academica" class="form-control">
                <?php if (isset($grados_academicos_persona[0]['id_unidad_academica'])) : ?>
                    <?php foreach ($unidades_academicas as $key => $unidad_academica) : ?>
                        <option value="<?= $unidad_academica['id_unidad_academica'] ?>" <?= $grados_academicos_persona[0]['id_unidad_academica'] == $unidad_academica['id_unidad_academica'] ? 'selected' : ''; ?>><?= $unidad_academica['nombre_unidad_academica'] ?></option>
                    <?php endforeach ?>
                <?php else : ?>
                    <?php foreach ($unidades_academicas as $key => $unidad_academica) : ?>
                        <option value="<?= $unidad_academica['id_unidad_academica'] ?>"><?= $unidad_academica['nombre_unidad_academica'] ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="id_grado_academico" class="control-label text-warning text-bold"><i class="mdi mdi-school"></i> Grado Academico</label>
            <select name="id_grado_academico" class="form-control">
                <?php if (isset($grados_academicos_persona[0]['id_grado_academico'])) : ?>
                    <?php foreach ($grados_academicos as $key => $grado_academico) : ?>
                        <option value="<?= $grado_academico['id_grado_academico'] ?>" <?= $grados_academicos_persona[0]['id_grado_academico'] == $grado_academico['id_grado_academico'] ? 'selected' : ''; ?>><?= $grado_academico['abreviatura'] ?></option>
                    <?php endforeach ?>
                <?php else : ?>
                    <?php foreach ($grados_academicos as $key => $grado_academico) : ?>
                        <option value="<?= $grado_academico['id_grado_academico'] ?>"><?= $grado_academico['abreviatura'] ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="id_tipo_documento_academico" class="control-label text-warning text-bold"><i class="mdi mdi-school"></i> Tipo Documento</label>
            <select name="id_tipo_documento_academico" class="form-control">
                <?php if (isset($grados_academicos_persona[0]['id_tipo_documento_academico'])) : ?>
                    <?php foreach ($tipos_documentos_academicos as $key => $tipo_documento_academico) : ?>
                        <option value="<?= $tipo_documento_academico['id_tipo_documento_academico'] ?>" <?= $grados_academicos_persona[0]['id_tipo_documento_academico'] == $tipo_documento_academico['id_tipo_documento_academico'] ? 'selected' : ''; ?>><?= $tipo_documento_academico['tipo'] ?></option>
                    <?php endforeach ?>
                <?php else : ?>
                    <?php foreach ($tipos_documentos_academicos as $key => $tipo_documento_academico) : ?>
                        <option value="<?= $tipo_documento_academico['id_tipo_documento_academico'] ?>"><?= $tipo_documento_academico['tipo'] ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="numero_titulo" class="control-label text-warning text-bold"><i class="mdi mdi-school"></i> Numero del Titulo</label>
            <input name="numero_titulo" class="form-control" value="<?= isset($grados_academicos_persona[0]['numero_titulo']) ? $grados_academicos_persona[0]['numero_titulo'] : '' ?>" type="text">

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="id_modalidad_titulacion" class="control-label text-warning text-bold"><i class="mdi mdi-school"></i> Modalidad de Titulación</label>
            <select name="id_modalidad_titulacion" class="form-control">
                <?php if (isset($grados_academicos_persona[0]['id_modalidad_titulacion'])) : ?>
                    <?php foreach ($modalidades_titulacion as $key => $modalidad_titulacion) : ?>
                        <option value="<?= $modalidad_titulacion['id_modalidad_titulacion'] ?>" <?= $grados_academicos_persona[0]['id_modalidad_titulacion'] == $modalidad_titulacion['id_modalidad_titulacion'] ? 'select' : '' ?>><?= $modalidad_titulacion['nombre_modalidad_titulacion'] ?></option>
                    <?php endforeach ?>
                <?php else : ?>
                    <?php foreach ($modalidades_titulacion as $key => $modalidad_titulacion) : ?>
                        <option value="<?= $modalidad_titulacion['id_modalidad_titulacion'] ?>"><?= $modalidad_titulacion['nombre_modalidad_titulacion'] ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="fecha_emision" class="control-label text-warning text-bold"><i class="mdi mdi-school"></i> Fecha Emisión</label>
            <input name="fecha_emision" class="form-control" value="<?= isset($grados_academicos_persona[0]['fecha_emision']) ? $grados_academicos_persona[0]['fecha_emision'] : date('Y-m-d', time()); ?>" type="date">
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="descripcion_grado_academico_persona" class="control-label text-warning text-bold"><i class="mdi mdi-school"></i> Descripción</label>
            <!-- <pre>
                <?= var_dump($grados_academicos_persona) ?>
            </pre> -->
            <textarea name="descripcion_grado_academico_persona" class="form-control" cols="30" rows="5"><?= isset($grados_academicos_persona[0]['descripcion_grado_academico']) ? $grados_academicos_persona[0]['descripcion_grado_academico'] : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="id_respaldo_digital" class="control-label text-warning text-bold"><i class="mdi mdi-school"></i> Respaldo Digital</label>
            <div class="form-group">
                <!-- <pre>
                            <?= var_dump($respaldos_grado_academico_persona) ?>
                        </pre> -->
                <div class="controls">
                    <input type="file" id="respaldo" name="respaldo[]" multiple class="form-control">
                    <div class="help-block"></div>
                </div>
                <?php if (isset($grados_academicos_persona[0]['id_grado_academico_persona'])) { ?>
                    <div class="row m-t-20">
                        <!-- isset($grados_academicos_persona[0]['descripcion_grado_academico']) ? $grados_academicos_persona[0]['descripcion_grado_academico'] : '';  -->

                        <?php foreach ($respaldos_grado_academico_persona as $img_respaldos) { ?>
                            <?php if ($img_respaldos['estado_archivo'] != 'ELIMINADO') : ?>
                                <div class="col-md-12 col-lg-3 col-xl-3" style="padding-bottom: 5px;padding-top:5px;">
                                    <a href="<?= base_url($img_respaldos['ruta_archivo']) ?>" target="_blank" style="cursor: zoom-in;">
                                        <img src="<?= base_url($img_respaldos['ruta_archivo']) ?>" alt="" width="100%">
                                    </a>
                                </div>
                            <?php endif ?>
                        <?php } ?>

                    </div>
                <?php } ?>
            </div>

            <!-- <div class="row">
                <div class="col-md-6">
                    <button id="respaldo_digital" class="form-control">Elegir archivo</button>
                </div>
                <div class="col-md-6">
                    <h5 id="respaldo_digital_texto"><?= isset($grados_academicos_persona[0]['nombre_archivo']) ? $grados_academicos_persona[0]['nombre_archivo'] : 'No se ha seleccionado ningún archivo'; ?></h5>
                </div>
            </div> -->



            <!-- campo oculto donde recupera el id cuando abra el dropzone y escoge su archivo -->

            <!-- <input name="id_respaldo_digital" value="<?= isset($grados_academicos_persona[0]['id_multimedia_persona']) ? $grados_academicos_persona[0]['id_multimedia_persona'] : 0; ?>" type="hidden"> -->

            <input name="id_multimedia_persona" value="<?= isset($grados_academicos_persona[0]['id_multimedia_persona']) ? $grados_academicos_persona[0]['id_multimedia_persona'] : 0; ?>" type="hidden">

            <!-- fin campo oculto donde recupera el id cuando abra el dropzone y escoge su archivo -->





        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="observacion" class="control-label text-warning text-bold"><i class="mdi mdi-school"></i> Observacion</label>
            <input name="observacion" class="form-control form-control-success" value="<?= isset($grados_academicos_persona[0]['observacion']) ? $grados_academicos_persona[0]['observacion'] : ''; ?>" type="text">
        </div>
    </div>
</div>
<div id="modal-footer" class="modal-footer">
    <div class="form-actions float-right">

        <button id="<?= isset($grados_academicos_persona) ? 'actualizar_grado_academico' : 'insertar_grado_academico' ?>" type="submit" class="btn-sm btn waves-effect waves-light btn-rounded btn-info"> <i class="fa fa-plus"></i> <?= isset($grados_academicos_persona) ? 'Actualizar' : 'Insertar' ?></button>

        <button class="btn-sm btn waves-effect waves-light btn-rounded btn-warning" type="button" data-dismiss="modal">Cancelar</button>
    </div>
</div>
</form>