<?php
$array_menu = array(
    'SUPERADMIN,TECNICO_MATRICULADOR' => [
        [
            ['menu' => 'Matriculación', 'url' => '', 'icono' => 'fa fa-id-card'],
            ['sub_menu' => 'posgraduantes', 'url' => 'matriculacion/matriculacion_listar', 'icono' => 'fa fa-edit'],
            ['sub_menu' => 'programas', 'url' => 'programa/programa_programa_listar', 'icono' => 'fa fa-edit']
        ],
        [
            ['menu' => 'Datos personales', 'url' => '', 'icono' => 'fa fa-id-card'],
            ['sub_menu' => 'personas', 'url' => 'persona/listar_personas', 'icono' => 'fa fa-edit']
        ],
        [
            ['menu' => 'Docentes', 'url' => '', 'icono' => 'ti-user'],
            ['sub_menu' => 'Kardex Docente', 'url' => 'psg_docente/listar_docentes', 'icono' => 'ti-user']
        ]
    ],
    'TECNICO_CEFORPI,TECNICO_FINANCIERO,TECNICO_PROGRAMAS' => [
        [
            ['menu' => 'programas', 'url' => '', 'icono' => 'fa fa-edit'],
            ['sub_menu' => 'programas', 'url' => 'programa/programa_programa_listar', 'icono' => 'fa fa-edit']
        ],
    ],
    'SUPERADMIN,DOCENTE_POSGRADO,POSGRADUANTE' => [
        [
            ['menu' => 'tramites', 'url' => '', 'icono' => 'fa fa-id-card'],
            ['sub_menu' => 'solicitar un nuevo tramite', 'url' => 'admin_tramite/listar_tramites', 'icono' => 'fa fa-edit'],
            ['sub_menu' => 'mis tramites solicitados', 'url' => 'admin_tramite/listar_mis_solicitudes', 'icono' => 'fa fa-edit']
        ],
        [
            // ['menu' => 'mis programas', 'url' => 'admin_marketing/campos_mis_programas', 'icono' => 'fa fa-id-card'],
            ['menu' => 'mis programas', 'url' => 'admin_posgraduante/campos_mis_programas', 'icono' => 'fa fa-id-card'],
        ]
    ],
    'SUPERADMIN,PUBLICADOR,TECNICO_MATRICULADOR' => [
        [
            ['menu' => 'administrar página', 'url' => '', 'icono' => 'fa fa-id-card'],
            ['sub_menu' => 'publicar programa', 'url' => 'admin_marketing/listar_publicacion', 'icono' => 'fa fa-edit'],
        ]
    ],
    'SUPERADMIN,KARDEX_POSGRADO' => [
        [
            ['menu' => 'Notas Posgraduante', 'url' => sha1('notas_posgraduante/index'), 'icono' => 'fa fa-user'],
        ],
    ],
    'SUPERADMIN,COORDINADOR_PROGRAMA' => [
        [
            ['menu' => 'Coordinador', 'url' => '', 'icono' => 'fa fa-id-card'],
            ['sub_menu' => 'Ver Programas', 'url' => 'coordinador/index', 'icono' => 'fa fa-edit'],
        ],
    ],
    'SUPERADMIN,ADMINISTRADOR' => [
        [
            ['menu' => 'tramites', 'url' => '', 'icono' => 'fa fa-id-card'],
            ['sub_menu' => 'Requisitos de Tramite', 'url' => 'requisito_tramite', 'icono' => 'fa fa-edit'],
            ['sub_menu' => 'Tramites Solicitados', 'url' => 'admin_tramite/listar_solicitudes', 'icono' => 'ti-user']
        ]
    ],
    // 'SUPERADMIN,TECNICO_MATRICULADOR' => [
    //     [
    //         ['menu' => 'Inscripcion Directa', 'url' => 'inscripcion/inscripcion_publicaciones_listar', 'icono' => 'ti-check-box'],
    //     ]
    // ]
); ?>
<nav class="sidebar-nav active">
    <ul id="sidebarnav" class="in">
        <li><a class="link-menu" aria-expanded="false" href="<?php echo base_url('/principal'); ?>"><i class="fa fa-dashboard"></i><span class="hide-menu"> INICIO</span></a></li>
        <?php
        foreach ($array_menu as $rol => $menu_rol) {
            foreach ($menu_rol as $rols => $menu_rols) {
                if (es(explode(",", strtoupper($rol)))) {
                    $uls = 0;
                    echo '<li>';
                    foreach ($menu_rols as $menu_key => $menu_sub_menu) {
                        if (isset($menu_sub_menu['menu'])) {
                            $href = (!empty($menu_sub_menu['url'])) ? 'href="' . base_url() . $menu_sub_menu['url'] . '"' : '';
                            $link_menu = (!empty($menu_sub_menu['url'])) ? 'link-menu' : '';
                            echo '<a class="has-arrow waves-effect waves-dark ' . $link_menu . '" ' . $href . ' aria-expanded="false">
						<i class="' . $menu_sub_menu['icono'] . '"></i>
						<span class="hide-menu">' . strtoupper($menu_sub_menu['menu']) . '</span></a>
						';
                        }
                        if (isset($menu_sub_menu['sub_menu'])) {
                            if ($uls == 0) {
                                echo '<ul aria-expanded="false" class="collapse">';
                                $uls++;
                            }
                            echo '<li>
								<a class="link-menu" href="' . base_url() . $menu_sub_menu['url'] . '">
									<i class="' . $menu_sub_menu['icono'] . '"></i> ' . strtoupper($menu_sub_menu['sub_menu']) . '</a></li>';
                        }
                    }
                    if ($uls > 0) {
                        echo '</ul>';
                    }
                    echo '</li>';
                }
            }
        }
        ?>
        <?php if ($this->input->cookie('id_publicacion', TRUE)) : ?>
            <li>
                <a class="link-menu text-danger " aria-expanded="false" href="<?php echo base_url('/principal'); ?>">
                    <div class="swinf animated infinite">
                        <i class="ti-pencil-alt text-danger"></i>
                        <span class="hide-menu">Inscripci&oacute;n Pendiente</span>
                    </div>
                </a>
            </li>

        <?php endif; ?>
    </ul>
</nav>

































<!-- 
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <?php if (empty($this->session->userdata('id'))) : ?>


            <?php if (es(array('SUPERADMIN', 'ADMINISTRADOR'))) : ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Asistencia</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fa fa-circle-o"></i>
                                Administrar
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a class="link-menu" href="<?= base_url('/asistencia/horarios') ?>">
                                        <i class="fa fa-arrow-circle-right"></i>
                                        Horarios
                                    </a>
                                </li>
                                <li>
                                    <a class="link-menu" href="<?= base_url('/asistencia/asignacion_horario') ?>">
                                        <i class="fa fa-arrow-circle-right"></i>
                                        Asignar horarios
                                    </a>
                                </li>
                                <li>
                                    <a class="link-menu" href="<?= base_url('/asistencia/dias_festivos') ?>">
                                        <i class="fa fa-arrow-circle-right"></i>
                                        Días festivos
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a class="link-menu" href="<?= base_url('/asistencia/marcado') ?>">
                                <i class="fa fa-circle-o"></i>
                                Marcar
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fa fa-circle-o"></i>
                                Reportes
                            </a>
                            <ul aria-expanded="true" class="collapse in">
                                <li>
                                    <a class="link-menu" href="<?= base_url('/asistencia/generar_tarjeta') ?>">
                                        <i class="fa fa-arrow-circle-right"></i>
                                        Generar Tarjeta
                                    </a>
                                </li>
                                <li>
                                    <a class="link-menu" href="<?= base_url("/asistencia/reporte_asistencia") ?>">
                                        <i class="fa fa-arrow-circle-right"></i>
                                        Reporte Asistencia
                                    </a>
                                </li>
                                <li>
                                    <a class="link-menu" href="<?= base_url("/asistencia/permiso") ?>">
                                        <i class="fa fa-arrow-circle-right"></i>
                                        Permiso
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        <?php else : ?>
            <li><a aria-expanded="false" href="<?php echo base_url(); ?>"><i class="fa fa-bars"></i><span class="hide-menu"> TODOS LOS PROGRAMAS</span></a></li>
        <?php endif; ?>
    </ul>
</nav> -->