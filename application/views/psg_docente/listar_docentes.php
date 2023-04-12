<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h3 class="text-themecolor">Listado de docentes <b>Posgrado</b></h3>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">Exporte los datos, Copiar, CSV, Excel, PDF & Imprimir</h6>
                <a id="btn_insertar_nuevo_docente" class="text-white btn waves-effect waves-light btn-rounded btn-sm btn-info"><i class="fa fa-plus"></i> Ingresar Nuevo Docente</a>
                <div class="table-responsive m-t-40">
                    <table id="tabla_listar_personas" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>C.I</th>
                                <th>Opciones</th>
                                <th>Nombres</th>
                                <th>Paterno</th>
                                <th>Materno</th>
                                <th>Fecha nacimiento</th>
                                <th>Celular</th>
                                <th>Base Upea</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>C.I</th>
                                <th>Opciones</th>
                                <th>Nombres</th>
                                <th>Paterno</th>
                                <th>Materno</th>
                                <th>Fecha nacimiento</th>
                                <th>Celular</th>
                                <th>Base Upea</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal-header" class="modal-header bg-color-psg">
                <h5 id="modal-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body" class="modal-body">

            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>
</div>


<div class="modal" id="modal_docente_kardex" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_docente_kardex-dialog" class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_docente_kardex-header" class="modal-header bg-color-psg">
                <h5 id="modal_docente_kardex-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_docente_kardex-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<div class="modal" id="modal_grados_academicos_persona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_grados_academicos_persona-dialog" class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_grados_academicos_persona-header" class="modal-header bg-color-psg">
                <h5 id="modal_grados_academicos_persona-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_grados_academicos_persona-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<div class="modal" id="grado-academico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="grado-academico-dialog" class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
            <div id="grado-academico-header" class="modal-header bg-color-psg">
                <h5 id="grado-academico-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="grado-academico-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<div class="modal" id="modal_nuevo_docente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_nuevo_docente-dialog" class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_nuevo_docente-header" class="modal-header bg-color-psg">
                <h5 id="modal_nuevo_docente-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_nuevo_docente-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<!-- modal_docente_kardex -->
<!-- <div class="modal" id="modal_docente_kardex" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_docente_kardex-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_docente_kardex-header" class="modal-header bg-color-psg">
                <h5 id="modal_docente_kardex-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_docente_kardex-body" class="">

            </div>

        </div>
    </div>
</div>
</div> -->


<!-- modal_docente_externo_pre_grado -->
<div class="modal" id="modal_docente_externo_pre_grado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_docente_externo_pre_grado-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_docente_externo_pre_grado-header" class="modal-header bg-color-psg">
                <h5 id="modal_docente_externo_pre_grado-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_docente_externo_pre_grado-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<!-- modal_ejercicio_docencia_posgrado -->
<div class="modal" id="modal_ejercicio_docencia_posgrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_ejercicio_docencia_posgrado-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_ejercicio_docencia_posgrado-header" class="modal-header bg-color-psg">
                <h5 id="modal_ejercicio_docencia_posgrado-title" class="modal-title text-white"></h5>
                <button id="modal_ejercicio_docencia_posgrado-close" type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_ejercicio_docencia_posgrado-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<!-- modal_ejercicio_coordinacion_posgrado -->
<div class="modal" id="modal_ejercicio_coordinacion_posgrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_ejercicio_coordinacion_posgrado-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_ejercicio_coordinacion_posgrado-header" class="modal-header bg-color-psg">
                <h5 id="modal_ejercicio_coordinacion_posgrado-title" class="modal-title text-white"></h5>
                <button id="modal_ejercicio_coordinacion_posgrado-close" type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_ejercicio_coordinacion_posgrado-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<!-- modal_nuevo_docente -->
<div class="modal" id="modal_nuevo_docente_actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_nuevo_docente_actualizar-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_nuevo_docente_actualizar-header" class="modal-header bg-color-psg">
                <h5 id="modal_nuevo_docente_actualizar-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_nuevo_docente_actualizar-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<!-- modal_campos_capacitacion_persona -->
<div class="modal" id="modal_campos_capacitacion_persona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_campos_capacitacion_persona-dialog" class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_campos_capacitacion_persona-header" class="modal-header bg-color-psg">
                <h5 id="modal_campos_capacitacion_persona-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_campos_capacitacion_persona-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<!-- modal_campos_idioma_persona -->
<div class="modal" id="modal_campos_idioma_persona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_campos_idioma_persona-dialog" class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_campos_idioma_persona-header" class="modal-header bg-color-psg">
                <h5 id="modal_campos_idioma_persona-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_campos_idioma_persona-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<!-- modal_campos_produccion_intelectual_persona -->
<div class="modal" id="modal_campos_produccion_intelectual_persona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_campos_produccion_intelectual_persona-dialog" class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_campos_produccion_intelectual_persona-header" class="modal-header bg-color-psg">
                <h5 id="modal_campos_produccion_intelectual_persona-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_campos_produccion_intelectual_persona-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>