<input id="id_planificacion_programa" type="hidden" value="<?= $id_planificacion_programa ?>">
<div class="row text-center">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Agrege su requisito</th>
                    <th></th>
                    <th></th>
                    <th>Activar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input name="id_requisito" type="hidden">
                        <textarea id="descripcion_requisito_textarea" class="small" id="" cols="50" rows="2" placeholder="Escriba nuevo requisito del programa"></textarea>
                        <div class="autocomplete-suggestion autocomplete-selected">Seleccionado: Ninguno</div>
                    </td>
                    <td>
                        <select id="estado_requisito_select">
                            <option value="" selected>Seleccione</option>
                            <option value="GENERICO">Generico</option>
                            <option value="ESPECIFICO">Especifico</option>
                        </select>
                    </td>
                    <td>
                        <select id="categoria_select">
                            <option value="" selected>Seleccione</option>
                            <option value="OBLIGATORIO">Obligatorio</option>
                            <option value="OPCIONAL">Opcional</option>
                        </select>
                    </td>
                    <td>
                        <div class="form-group form-check">
                            <input id="agregar_requisito" class="form-check-input" type="checkbox">
                            <label for="agregar_requisito" class="form-check-label text-dark">
                            </label>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Requisitos</th>
                    <th></th>
                    <th></th>
                    <th>Activar</th>
                </tr>
            </thead>
            <tbody id="requisitos_activos_programa">
                <?php foreach ($requisitos_programa as $key => $requisito_programa) : ?>
                    <?php if ($requisito_programa['estado_requisito_programa'] == 'ACTIVO') : ?>
                        <tr>
                            <td><?= $requisito_programa['id_requisito_programa'] ?></td>
                            <td>

                                <textarea class="small" name="descripcion_requisito" cols="50" rows="2"><?= $requisito_programa['descripcion_requisito'] ?></textarea>
                            </td>
                            <td>
                                <select name="estado_requisito" id="">
                                    <?php
                                    if ($requisito_programa['estado_requisito'] == 'GENERICO') :
                                    ?>
                                        <option value="GENERICO" selected>Generico</option>
                                        <option value="ESPECIFICO">Especifico</option>
                                    <?php
                                    elseif ($requisito_programa['estado_requisito'] == 'ESPECIFICO') :
                                    ?>
                                        <option value="GENERICO">Generico</option>
                                        <option value="ESPECIFICO" selected>Especifico</option>
                                    <?php
                                    endif;
                                    ?>

                                </select>
                            </td>
                            <td>
                                <select name="categoria" id="">
                                    <?php
                                    if ($requisito_programa['categoria'] == 'OBLIGATORIO') :
                                    ?>
                                        <option value="OBLIGATORIO" selected>Obligatorio</option>
                                        <option value="OPCIONAL">Opcional</option>

                                    <?php
                                    else :
                                    ?>
                                        <option value="OBLIGATORIO">Obligatorio</option>
                                        <option value="OPCIONAL" selected>Opcional</option>
                                    <?php
                                    endif;
                                    ?>
                                </select>
                            </td>
                            <td>
                                <div class="form-group form-check">
                                    <input name="estado_requisito_programa" data-value="<?= $requisito_programa['id_requisito_programa'] ?>" id="activo-<?= $key ?>" class="form-check-input" type="checkbox" checked>
                                    <label for="activo-<?= $key ?>" class="form-check-label text-dark"></label>

                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</div>