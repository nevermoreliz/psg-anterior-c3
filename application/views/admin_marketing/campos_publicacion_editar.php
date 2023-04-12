<!-- css para formulario wizard o de pasos -->
<link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />

<!-- <link href="<?= base_url() ?>/assets/plugins/wizard/steps.css" rel="stylesheet"> -->
<!-- fin css para formulario wizard o de pasos -->

<!-- class="container" por si volver atras -->
<div class="">

    <div class="row" id="validation">
        <div class="col-12">
            <div class="card">

                <div class="card-body wizard-content">
                    <h4 class="card-title"> <?= ($id_publicacion == "null") ? 'Ingrese Datos Para El Programa : ' : 'Actualize Los Datos Para El Programa : '  ?>
                        <?= $listar_planificacion_programa->nombre_programa ?>
                    </h4>
                    <h6 class="card-subtitle">
                        <!-- <a href="http://www.jquery-steps.com" target="_blank">offical website</a> -->
                    </h6>
                    <!-- <form action="#" class="tab-wizard wizard-circle"> -->
                    <?= form_open(
                        '',
                        array(
                            'id' => 'form_campos_datos_personales',
                            'enctype' => 'multipart/form-data',
                            //   'class' => 'tab-wizard wizard-circle' 
                            'class' => 'validation-wizard wizard-circle'
                        )
                    ); ?>

                    <!-- campos ocultos -->

                    <input type="hidden" id="id_planificacion_programa" name="id_planificacion_programa" value="<?= $id_planificacion_programa ?>">

                    <input type="hidden" id="id_publicacion" name="id_publicacion" value="<?= $id_publicacion ?>">

                    <!-- <input type="hidden" id="id_detalle_programa" name="id_detalle_programa" value="<?= $listar_detalle_programa[0]['id_detalle_programa'] ?>"> -->

                    <!-- fin campos ocultos -->

                    <!-- Paso 1 -->
                    <h6>Datos Encargado </h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="celular_ref">
                                        <h4 class="m-t-0">Celular de coordinador :</h4>
                                    </label>
                                    <input value="<?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->celular_ref ?>" type="text" class="form-control" id="celular_ref" name="celular_ref" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono_ref">
                                        <h4 class="m-t-0">Telefono : (opcional)</h4>
                                    </label>
                                    <input value="<?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->telefono_ref ?>" type="text" class="form-control" id="telefono_ref" name="telefono_ref" />
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Paso 2 -->
                    <h6>Descuento </h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descuento_individual">
                                        <h4 class="m-t-0">Descuento individual : </h4>
                                        <p>Escribe el monto en Bolivianos para aplicar el descuento.</p>
                                    </label>
                                    <input value="<?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->descuento_individual ?>" type="text" class="form-control" id="descuento_individual" name="descuento_individual" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descuento_grupal">
                                        <h4 class="m-t-0">Descuento grupal :</h4>
                                        <p>Escribe el monto en Bolivianos para aplicar el descuento.</p>
                                    </label>
                                    <input value="<?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->descuento_grupal ?>" type="text" class="form-control" id="descuento_grupal" name="descuento_grupal" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_fin_descuento">
                                        <h4 class="m-t-20">Fecha limite de descuento :</h4>
                                        <p>Por defecto esta la fecha fin de inscripciones.</p>
                                    </label>
                                    <input value="<?= empty($listar_publicacion) ? '' : $listar_publicacion->fecha_fin_descuento ?>" type="date" class="form-control" id="fecha_fin_descuento" name="fecha_fin_descuento" />
                                </div>
                            </div>

                        </div>
                    </section>

                    <!-- Paso 3 -->
                    <h6>Datos Generales</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duracion">
                                        <h4 class="m-t-0"> Duración (Meses):</h4>
                                    </label>
                                    <input type="text" class="form-control" required id="duracion" name="duracion" value="<?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->duracion ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="creditaje">
                                        <h4 class="m-t-0"> Carga horaria (horas):</h4>
                                    </label>
                                    <input type="text" class="form-control" required id="creditaje" name="creditaje" value="<?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->creditaje ?>" />
                                </div>
                            </div>

                            <!--  <div class="col-md-6">
                                <div class="form-group">
                                    <label for="videoUrl1">Horarios :</label>
                                    <input type="text" class="form-control" id="videoUrl1" />
                                </div>
                            </div> -->

                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="videoUrl1">Lugar :</label>
                                    <input type="text" class="form-control" id="videoUrl1" />
                                </div>
                            </div> -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="resumen">
                                        <h4 class="m-t-0">Introduccion :</h4>
                                    </label>
                                    <textarea name="resumen" id="resumen" required rows="6" class="form-control"><?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->resumen ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="objetivo_programa">
                                        <h4 class="m-t-0">Objetivo del programa :</h4>
                                    </label>
                                    <textarea name="objetivo_programa" required id="objetivo_programa" rows="6" class="form-control"><?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->objetivo_programa ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="titulacion_intermedia">
                                        <h4 class="m-t-0">Titulacion Intermedia :</h4>
                                    </label>
                                    <textarea name="titulacion_intermedia" id="titulacion_intermedia" rows="6" class="form-control"><?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->titulacion_intermedia ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="dirigido_a">
                                        <h4 class="m-t-0">Dirigido a :</h4>
                                    </label>
                                    <textarea name="dirigido_a" id="dirigido_a" rows="6" class="form-control"><?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->dirigido_a ?></textarea>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Paso 4 -->
                    <h6>Requisitos</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="requisitos">
                                        <h4 class="m-t-0">Requisitos :</h4>
                                    </label>
                                    <textarea name="requisitos" id="requisitos" rows="6" class="form-control"><?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->requisitos ?></textarea>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Paso 5 -->
                    <h6>Contenido</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contenido">
                                        <h4 class="m-t-0">Contenido :</h4>
                                    </label>
                                    <textarea name="contenido" id="contenido" rows="6" class="form-control"><?= empty($listar_planificacion_programa) ? '' : $listar_planificacion_programa->contenido ?></textarea>
                                </div>
                            </div>
                        </div>
                    </section>


                    <!-- Paso 6 -->
                    <h6>Grupos Red Social </h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url_facebook">
                                        <h4 class="m-t-0">URL facebook : </h4>
                                        <p>Copia la URL del grupo o pagina del programa, si no estara la URL de la pagina de Estudia en posgrado - UPEA</p>
                                    </label>
                                    <input type="text" class="form-control" id="url_facebook" name="url_facebook" placeholder="Por defecto =https://www.facebook.com/Estudia-En-Posgrado-UPEA-128794501288356" value="<?= empty($listar_publicacion) ? 'https://www.facebook.com/Estudia-En-Posgrado-UPEA-128794501288356' : $listar_publicacion->url_facebook ?>" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url_whatsapp">
                                        <h4 class="m-t-0">URL whatsapp : </h4>
                                        <p>Copia el link de unirse a un grupo de whatsapp del programa respectivo.</p>
                                    </label>
                                    <input type="text" class="form-control" id="url_whatsapp" name="url_whatsapp" value="<?= empty($listar_publicacion) ? '' : $listar_publicacion->url_whatsapp ?>" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url_youtube">
                                        <h4 class="m-t-0">URL youtube : </h4>
                                        <p>Copia la URL de youtube de promocion respectivo del programa </p>
                                    </label>
                                    <input type="text" class="form-control" id="url_youtube" name="url_youtube" placeholder="Por defecto = https://www.youtube.com/watch?v=Jj2SPtZtXNA" value="<?= empty($listar_publicacion) ? 'https://www.youtube.com/watch?v=Jj2SPtZtXNA' : $listar_publicacion->url_youtube ?>" />
                                </div>
                            </div>

                        </div>
                    </section>

                    <!-- Paso 7 -->
                    <h6>Publicaci&oacute;n</h6>
                    <section>
                        <!-- imagen principal -->

                        <div class="view_all_dt row">
                            <div class="col-md-6">
                                <div class="view_img_left">
                                    <div class="view__img">

                                        <img src="<?php echo base_url('img/img_publicaciones/' . (empty($listar_imagen_principal_publicacion) ? 'add_img.jpg' : $listar_imagen_principal_publicacion->nombre_archivo)); ?>" alt="" id="mostrar_img_principal" name="mostrar_img_principal" onclick="document.getElementById('img_principal').click()" style="cursor: pointer;">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="view_img_right">
                                    <h4>Imagen de portada</h4>
                                    <p>Sube la imagen de tu programa aquí. Debe cumplir con los estándares de calidad de imagen de nuestro programa para ser aceptado. Pautas importantes: 750x422 píxeles; .jpg, .jpeg ,. gif o .png. No hay texto en la imagen.</p>

                                    <label class="custom-file" id="customFile">

                                        <div class=" upload__input">
                                            <div class="form-group">

                                                <div class="custom-file" id="customFile">

                                                    <input type="file" class="custom-file-input " id="img_principal" name="img_principal" onchange="document.getElementById('mostrar_img_principal').src=window.URL.createObjectURL(this.files[0])">
                                                    <label id="img_name" class="custom-file-label" for="img_principal">
                                                        <?= empty($listar_imagen_principal_publicacion) ? 'Seleccione una Imagen' : substr($listar_imagen_principal_publicacion->nombre_archivo, 0, 25) ?>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                    </label>
                                </div>
                            </div>
                        </div>


                        <!-- fin imagen principal -->

                        <!-- imagenes adicionales -->

                        <label for="archivo">
                            <h4 class="m-t-20">Desea Subir Más Imagenes</h4>
                            <p>Sube la imagen de tu curso aquí. Debe cumplir con los estándares de calidad de imagen de nuestro curso para ser aceptado. Pautas importantes: 750x422 píxeles; .jpg, .jpeg ,. gif o .png. No hay texto en la imagen.</p>
                        </label>

                        <div class="row">

                            <div style="margin-top: 5px;" class="col-md-3" id="add-photo-container">

                                <div class="add-new-photo first " id="add-photo" onclick="document.getElementById('archivo').click()">
                                    <span><i class="icon-picture"></i></span>
                                </div>
                                <input type="file" multiple id="archivo" name="archivo[]" style="display: none;">
                            </div>

                        </div>

                        <!-- fin imagenes adicionales -->

                        <br>

                        <!-- imagenes cagadas o subidas -->
                        <!-- TODO: verificar despues como quitar el label mis imagenes si no hay imagenes adicionales -->
                        <?php if ($listar_imagenes_adicionales_publicacion != null) : ?>
                            <h4 class="m-t-0 m-b-20">Imagenes Adicionales Del Programa</h4>
                        <?php endif ?>

                        <div class="row" id="my-images">

                            <!-- <?= var_dump($listar_imagenes_adicionales_publicacion); ?> -->

                            <?php if ($listar_imagenes_adicionales_publicacion != null) { ?>

                                <?php if (is_array($listar_imagenes_adicionales_publicacion)) { ?>
                                    <?php foreach ($listar_imagenes_adicionales_publicacion as $imagen) : ?>
                                        <?php if ($imagen->img_principal == 0) { ?>
                                            <div class="col-md-3 col-sm-4 col-xs-12" data-id="<?= $imagen->id_multimedia ?>">
                                                <input type="hidden" name="photo-iohQc" value="test">
                                                <div class="image-container">
                                                    <figure>
                                                        <img src="<?= base_url('img/img_publicaciones/' . $imagen->nombre_archivo) ?>" alt="Foto del usuario">
                                                        <figcaption>
                                                            <i class="icon-picture"></i>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <div class="col-md-3 col-sm-4 col-xs-12" data-id="<?= $listar_imagenes_adicionales_publicacion->id_multimedia ?>">
                                        <input type="hidden" name="photo-iohQc" value="test">
                                        <div class="image-container">
                                            <figure>
                                                <img src="<?= base_url('img/img_publicaciones/' . $listar_imagenes_adicionales_publicacion->nombre_archivo) ?>" alt="Foto del usuario">
                                                <figcaption>
                                                    <i class="icon-picture"></i>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                <?php } ?>



                            <?php } ?>
                        </div>

                        <!-- fin imagenes cagadas o subidas -->

                        <!-- campo generar pdf programa -->

                        <div class="view_all_dt row m-t-20">
                            <div class="col-md-6" style="margin: auto;">
                                <div class="view_img_right">
                                    <h4>Pdf del programa </h4>
                                    <p>Sube el pdf de tu programa aquí. Debe cumplir con los estándares de calidad de archivo de nuestro curso para ser aceptado. Pautas importantes: .pdf No hay otra extension permitida</p>

                                    <label class="custom-file" id="customFile">
                                        <div class=" upload__input">
                                            <div class="form-group">
                                                <div class="custom-file" id="customFile">
                                                    <!-- <input type="file" class="custom-file-input " id="pdf_programa" name="pdf_programa" onchange="document.getElementById('mostrar_pdf_programa').src=window.URL.createObjectURL(this.files[0])"> -->

                                                    <input type="file" class="custom-file-input" id="pdf_programa" name="pdf_programa" onchange="return validarext() ">
                                                    <label id="pdf_name" class="custom-file-label" for="pdf_programa">
                                                        <?= empty($listar_pdf_programa) ? 'Seleccione una Imagen' : substr($listar_pdf_programa->nombre_archivo, 0, 25) ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="view_img_left">
                                    <div class="view__img" id="visor_archivo">
                                        <?php if (!empty($listar_pdf_programa)) { ?>
                                            <embed src="img/pdf_programa/<?= $listar_pdf_programa->nombre_archivo ?>" width="100%" height="420">
                                        <?php } else { ?>
                                            <img src="<?= base_url() ?>img/pdf_programa/pdf.png" alt="" id="mostrar_pdf_programa" name="mostrar_pdf_programa" onclick="document.getElementById('pdf_programa').click()" style="cursor: pointer; width: 100%; ">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- fin campo generar pdf programa -->

                        <!-- campos etiquetas de areas -->

                        <div class="row">

                            <div class="col-md-12 col-lg-12 col-xl-12">

                                <h4 class="m-t-10">Etiquetas</h4>
                                <p>Seleccione 5 etiquetas como maximo respectivo al programa</p>

                                <select id="etiqueta" name="etiqueta" class="select2 m-b-10 select2-multiple " style="width: 100%;" multiple="multiple" data-placeholder="Seleccione">

                                    <?php foreach ($listar_etiquetas as $etiquetas) :  ?>
                                        <option <?php
                                                foreach ($listar_etiquetas_programa as $etiqueta_programa) {
                                                    echo $etiqueta_programa->id_etiqueta === $etiquetas->id_etiqueta  ? 'selected="selected"' : '';
                                                }
                                                ?> value="<?= $etiquetas->id_etiqueta ?>"><?= $etiquetas->nombre_etiqueta ?>
                                        </option>
                                    <?php endforeach ?>

                                </select>



                            </div>

                        </div>

                        <!-- fin campos etiquetas de areas -->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_inicio_publicidad">
                                        <h4 class="m-t-20">Inicio de la Publicación :</h4>
                                    </label>
                                    <input value="<?= empty($listar_publicacion) ? '' : $listar_publicacion->fecha_inicio_publicidad ?>" type="date" class="form-control required" id="fecha_inicio_publicidad" name="fecha_inicio_publicidad" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_fin_publicidad">
                                        <h4 class="m-t-20">Fin de la Publicación :</h4>
                                    </label>
                                    <input value="<?= empty($listar_publicacion) ? '' : $listar_publicacion->fecha_fin_publicidad ?>" type="date" class="form-control" id="fecha_fin_publicidad" name="fecha_fin_publicidad" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_fin_inscripcion">
                                        <h4 class="m-t-20">Fecha de inscripci&oacute;n :</h4>
                                    </label>
                                    <input value="<?= empty($listar_publicacion) ? '' : $listar_publicacion->fecha_fin_inscripcion ?>" type="date" class="form-control" id="fecha_fin_inscripcion" name="fecha_fin_inscripcion" />
                                </div>
                            </div>

                        </div>



                        <div class="row">

                            <div class="col-md-8 col-lg-12">
                                <div class="form-group has-success">
                                    <h4 class="control-label">¿Que desea realizar con la Publicaci&oacute;n?</h4>
                                    <select class="form-control custom-select" name="estado_publicacion" id="estado_publicacion">

                                        <option value="REGISTRADO" <?php if (isset($listar_publicacion->estado_publicacion)) echo ($listar_publicacion->estado_publicacion == 'REGISTRADO' ? 'selected="selected"' : '') ?> title="Solo se habilitara el boton de (M&acute;s Informaci&oacute;n)">SOLO REGISTRAR</option>

                                        <option value="INFORMACIONES" <?php if (isset($listar_publicacion->estado_publicacion)) echo ($listar_publicacion->estado_publicacion == 'INFORMACIONES' ? 'selected="selected"' : '') ?> title="Solo se habilitara el boton de (M&acute;s Informaci&oacute;n)">PUBLICAR SOLO PARA INFORMACIONES</option>

                                        <option value="PUBLICADO" <?php if (isset($listar_publicacion->estado_publicacion)) echo ($listar_publicacion->estado_publicacion == 'PUBLICADO' ? 'selected="selected"' : '') ?> title="Se habilitaran los botones (M&acute;s Informaci&oacute;n y Inscripcion en linea)">PUBLICAR PARA HABILITAR INSCRIPCIONES</option>

                                        <option value="OBSERVADO" <?php if (isset($listar_publicacion->estado_publicacion)) echo ($listar_publicacion->estado_publicacion == 'OBSERVADO' ? 'selected="selected"' : '') ?> title="Observar la publicacion de algun Coordinador">OBSERVAR PUBLICACI&Oacute;N</option>

                                        <option value="FINALIZADO" <?php if (isset($listar_publicacion->estado_publicacion)) echo ($listar_publicacion->estado_publicacion == 'FINALIZADO' ? 'selected="selected"' : '') ?> title="no se mostrara El afiche en la pagina Web">FINALIZAR PUBLICACI&Oacute;N</option>
                                    </select>
                                    <!-- <small class="form-control-feedback"> Select your gender </small> -->
                                </div>
                            </div>
                        </div>

                    </section>



                    <?= form_close() ?>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- js para formulario wizard o de pasos -->
<script src="<?= base_url() ?>/assets/plugins/wizard/jquery.steps.min.js"></script>
<!-- <script src="<?= base_url() ?>/assets/plugins/wizard/steps.js"></script> -->
<!-- js sweetaler -->
<script src="<?= base_url() ?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/wizard/jquery.validate.min.js"></script>
<!-- fin js para formulario wizard o de pasos -->