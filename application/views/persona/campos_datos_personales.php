<?= form_open('', ['id' => 'form_campos_datos_personales', 'enctype' => 'multipart/form-data']); ?>
<input name="ci" value="<?= isset($persona) ? $persona[0]['ci'] : $ci_persona ?>" type="hidden" />
<input id="id_persona" value="<?= isset($persona) ? $persona[0]['id_persona'] : '' ?>" type="hidden" />
<div class="row text-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <h6 class="card-subtitle">Procesa a cambiar los datos con cuidado</h6>
                        <h3><?= isset($persona) ? $persona[0]['ci'] : $ci_persona ?></h3>
                    </div>
                    <div class="col-md-2">
                        <img id="imagen" alt="fotografia" src="<?= base_url('assets/images/personas/persona.jpg') ?>" style="cursor: pointer; min-width: 80px; max-width: 120px; height: 100px; background-position: center center; background-size: cover; border-radius: 50%;" />
                        <input type="file" id="imagen_persona" style="display: none;" />
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="card w-100 text-center">

    <ul class="nav nav-tabs customtab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active show" data-toggle="tab" href="#home2" role="tab" aria-selected="false">
                <span class="hidden-sm-up"><i class="mdi mdi-account-edit"></i></span>
                <span class="hidden-xs-down">Datos Personales</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile2" role="tab" aria-selected="false">
                <span class="hidden-sm-up"><i class="mdi mdi-directions"></i></span>
                <span class="hidden-xs-down">Datos Academicos</span>
            </a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active show p-20" id="home2" role="tabpanel">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="expedido" class="control-label text-warning text-bold"><i class="fa fa-list-ol"></i> EXPEDIDO</label>
                        <select name="expedido" class="form-control expedido" style="width:100%">
                            <?php if (isset($persona[0]['expedido'])) { ?>
                                <?php foreach (['LP' => 'LA PAZ', 'OR' => 'ORURO', 'PT' => 'POTOSI', 'CBBA' => 'COCHABAMBA', 'CH' => 'CHUQUISACA', 'TJ' => 'TARIJA', 'PND' => 'PANDO', 'BN' => 'BENI', 'SCZ' => 'SANTA CRUZ'] as $key => $departamento) : ?>
                                    <option value="<?= $key ?>" <?= $persona[0]['expedido'] == $key ? 'selected' : ''; ?>><?= $departamento ?></option>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <?php foreach (['LP' => 'LA PAZ', 'OR' => 'ORURO', 'PT' => 'POTOSI', 'CBBA' => 'COCHABAMBA', 'CH' => 'CHUQUISACA', 'TJ' => 'TARIJA', 'PND' => 'PANDO', 'BN' => 'BENI', 'SCZ' => 'SANTA CRUZ'] as $key => $departamento) : ?>
                                    <option value="<?= $key ?>"><?= $departamento ?></option>
                                <?php endforeach ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo_documento" class="control-label text-warning text-bold"><i class="fa fa-list-ol"></i> TIPO DOCUMENTO</label>
                        <select id="tipo_documento" name="tipo_documento" class="form-control tipo_documento" style="width:100%">
                            <?php if (isset($persona[0]['tipo_documento'])) { ?>
                                <?php foreach (['CI' => 'CÉDULA DE IDENTIDAD', 'CIE' => 'CI EXTRANJERO', 'DNI' => 'D.N.I.', 'PASAPORTE' => 'PASAPORTE'] as $key => $tipo_documento) : ?>
                                    <option value="<?= $key ?>" <?= $persona[0]['tipo_documento'] == $key ? 'selected' : ''; ?>><?= $tipo_documento ?></option>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <?php foreach (['CI' => 'CÉDULA DE IDENTIDAD', 'CIE' => 'CI EXTRANJERO', 'DNI' => 'D.N.I.', 'PASAPORTE' => 'PASAPORTE'] as $key => $tipo_documento) : ?>
                                    <option value="<?= $key ?>"><?= $tipo_documento ?></option>
                                <?php endforeach ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_pais_nacionalidad" class="control-label text-warning text-bold"><i class="fa fa-list-ol"></i> PAIS</label>
                        <select name="id_pais_nacionalidad" class="form-control id_pais_nacionalidad" style="width:100%">
                            <?php if (isset($persona[0]['id_pais_nacionalidad'])) { ?>
                                <?php foreach ($paises as $key => $pais) : ?>
                                    <option value="<?= $pais['id_pais'] ?>" <?= $persona[0]['id_pais_nacionalidad'] == $pais['id_pais'] ? 'selected' : ''; ?>><?= $pais['nombre_pais'] ?></option>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <?php foreach ($paises as $key => $pais) : ?>
                                    <option value="<?= $pais['id_pais'] ?>"><?= $pais['nombre_pais'] ?></option>
                                <?php endforeach ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> NOMBRE</label>
                        <input name="nombre" value="<?= isset($persona) ? $persona[0]['nombre'] : '' ?>" type="text" class="form-control text-uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" required maxlength='50'>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="paterno" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> PATERNO</label>
                        <input name="paterno" value="<?= isset($persona) ? $persona[0]['paterno'] : '' ?>" type="text" class="form-control text-uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" required maxlength='50'>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="materno" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> MATERNO</label>
                        <input name="materno" value="<?= isset($persona) ? $persona[0]['materno'] : '' ?>" type="text" class="form-control text-uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" required maxlength='50'>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fecha_nacimiento" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> FECHA NACIMIENTO</label>
                        <input name="fecha_nacimiento" value="<?= isset($persona) ? $persona[0]['fecha_nacimiento'] : '' ?>" type="date" class="form-control text-uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="genero" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> GENERO</label>
                        <select name="genero" class="form-control" required>
                            <?php if (isset($persona[0]['genero'])) { ?>
                                <?php foreach (['M' => 'MASCULINO', 'F' => 'FEMENINO'] as $key => $genero) : ?>
                                    <option value="<?= $key ?>" <?= $persona[0]['genero'] == $key ? 'selected' : ''; ?>><?= $genero ?></option>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <?php foreach (['M' => 'MASCULINO', 'F' => 'FEMENINO'] as $key => $genero) : ?>
                                    <option value="<?= $key ?>"><?= $genero ?></option>
                                <?php endforeach ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="celular" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> CELULAR</label>
                        <input name="celular" value="<?= isset($persona) ? $persona[0]['celular'] : '' ?>" type="number" class="form-control" autocomplete="off" required maxlength='12'>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> TELEFONO FIJO</label>
                        <input name="telefono" value="<?= isset($persona) ? $persona[0]['telefono'] : '' ?>" type="number" class="form-control" autocomplete="off" required maxlength='12'>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="oficio_trabajo" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> PROFESIÓN</label>
                        <input name="oficio_trabajo" value="<?= isset($persona) ? $persona[0]['oficio_trabajo'] : '' ?>" type="text" class="form-control text-uppercase" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required maxlength='50'>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado_civil" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> ESTADO CIVIL</label>
                        <select name="estado_civil" class="form-control" required>
                            <?php if (isset($persona[0]['estado_civil'])) { ?>
                                <?php foreach (['SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONVIVIENTE' => 'CONVIVIENTE'] as $key => $estado_civil) : ?>
                                    <option value="<?= $key ?>" <?= $persona[0]['estado_civil'] == $key ? 'selected' : ''; ?>><?= $estado_civil ?></option>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <?php foreach (['SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONVIVIENTE' => 'CONVIVIENTE'] as $key => $estado_civil) : ?>
                                    <option value="<?= $key ?>"><?= $estado_civil ?></option>
                                <?php endforeach ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr class="col-xs-12">
            <div class="row bg-light mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="domicilio" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> DOMICILIO</label>
                        <input name="domicilio" value="<?= isset($persona) ? $persona[0]['domicilio'] : '' ?>" type="text" class="form-control text-uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" required maxlength='200'>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lugar_nacimiento" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> LUGAR NACIMIENTO</label>
                        <input name="lugar_nacimiento" value="<?= isset($persona) ? $persona[0]['lugar_nacimiento'] : '' ?>" type="text" class="form-control text-uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" required maxlength='100'>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email" class="control-label text-warning text-bold"><i class="fa fa-pencil-square-o"></i> EMAIL</label>
                        <input name="email" value="<?= isset($persona) ? $persona[0]['email'] : '' ?>" type="email" class="form-control" required maxlength='50'>
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_caja_salud" class="control-label text-bold"><i class="mdi mdi-heart-pulse"></i> ID CAJA SALUD</label>
                        <input name="id_caja_salud" value="<?= isset($persona) ? $persona[0]['id_caja_salud'] : '' ?>" type="number" class="form-control" required maxlength='19'>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="caja_salud_fecha_afiliacion" class="control-label text-bold"><i class="mdi mdi-heart-pulse"></i> FECHA AFILIACIÓN</label>
                        <input name="caja_salud_fecha_afiliacion" value="<?= isset($persona) ? $persona[0]['caja_salud_fecha_afiliacion'] : '' ?>" type="date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="caja_salud_numero_asegurado" class="control-label text-bold"><i class="mdi mdi-heart-pulse"></i> NUMERO ASEGURADO</label>
                        <input name="caja_salud_numero_asegurado" value="<?= isset($persona) ? $persona[0]['caja_salud_numero_asegurado'] : '' ?>" type="number" class="form-control" require maxlength='19'>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row bg-light mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_afp" class="control-label text-bold"><i class="mdi mdi-square-inc-cash"></i> ID AFP</label>
                        <input name="id_afp" value="<?= isset($persona) ? $persona[0]['id_afp'] : '' ?>" type="number" class="form-control" required maxlength='19'>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="afp_numero_nua" class="control-label text-bold"><i class="mdi mdi-square-inc-cash"></i> AFP NUMERO NUA</label>
                        <input name="afp_numero_nua" value="<?= isset($persona) ? $persona[0]['afp_numero_nua'] : '' ?>" type="number" class="form-control" required maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_banco" class="control-label text-bold"><i class="mdi mdi-bank"></i> ID BANCO</label>
                        <input name="id_banco" value="<?= isset($persona) ? $persona[0]['id_banco'] : '' ?>" type="number" class="form-control" required maxlength='19'>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="numero_cuenta_bancaria" class="control-label text-bold"><i class="mdi mdi-bank"></i> CUENTA BANCARIA</label>
                        <input name="numero_cuenta_bancaria" value="<?= isset($persona) ? $persona[0]['numero_cuenta_bancaria'] : '' ?>" type="number" class="form-control" required maxlength='19'>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane p-20" id="profile2" role="tabpanel">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="text-bold text-dark text-center">FORMACIÓN ACADÉMICA</h5>
                </div>
                <div class="col-md-4">
                    <button id="insertar_grado_academico_persona" data-value="<?= $persona[0]['id_persona'] ?>" class="btn btn-danger btn-sm"> <i class="fa fa-check"></i> Agregar</button>
                </div>


                <div class=" table-responsive">
                    <table id="tabla_listar_grados_academicos" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                        <thead>
                            <th>#</th>
                            <th>Acciones</th>
                            <th>Descripci&oacute;n Grado Acad&eacute;mico</th>
                            <th>Institución</th>
                            <th>Año de Expedición</th>
                            <th>Nº Registro</th>

                        </thead>
                        <tfoot>
                            <th>#</th>
                            <th>Acciones</th>
                            <th>Descripci&oacute;n Grado Acad&eacute;mico</th>
                            <th>Institución</th>
                            <th>Año de Expedición</th>
                            <th>Nº Registro</th>

                        </tfoot>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
</form>