<div class=" row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Programas</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active">Programas</li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive m-t-0">
                        <table id="tabla_listar_publicaciones" class="display nowrap table table-hover small table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <th>id_publicacion</th>

                                    <!-- <th>Estado publicación</th> -->
                                    <th>opciones</th>
                                    <th>Nombre programa</th>
                                    <th>Estado</th>
                                    <!-- <th>Promocion</th> -->
                                    <!-- <th>Gestión</th>
                                    <th>Sede</th>
                                    <th>Unidad</th>
                                    <th>Grado</th>
                                    <th>estado programa</th> -->
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <th>id_publicacion</th>

                                    <!-- <th>Estado publicación</th> -->
                                    <th>opciones</th>
                                    <th>Nombre programa</th>
                                    <th>Estado</th>
                                    <!-- <th>Promocion</th> -->
                                    <!-- <th>Gestión</th>
                                    <th>Sede</th>
                                    <th>Unidad</th>
                                    <th>Grado</th>
                                    <th>estado programa</th> -->

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- id = Modal_listar_publicacion -->

<!-- apartado de nombre del modal o id -->
<div class="modal" id="modal_listar_publicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <!-- end apartado de nombre del modal o id -->
    <!-- apartado del tamaño del modal -->
    <div id="modal_listar_publicacion-dialog" class="modal-dialog" role="document">
        <!-- end apartado del tamaño del modal -->
        <div class="modal-content">
            <div id="modal-header" class="modal-header bg-color-psg ">
                <!-- apartado titulo  -->
                <h5 id="modal_listar_publicacion-title" class="modal_listar_publicacion-title text-white"></h5>
                <!-- end apartado titulo -->
                <button type="button" id="modal_listar_publicacion-close" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>
            <!-- apartado del contenido -->
            <div id="modal-body-publicacion" class="modal-body-publicacion">

            </div>
            <!-- end apartado del contenido -->

        </div>
    </div>
</div>

<!--end id = Modal_listar_publicacion -->