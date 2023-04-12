<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <?php if (empty($this->session->userdata('id'))) : ?>
            <li>
                <a aria-expanded="false" href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span class="hide-menu"> PANEL PRINCIPAL</span></a>
            </li>
            <li class="nav-small-cap">T&Eacute;CNICO DE PROGRAMAS</li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">PROGRAMAS</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li>
                        <a href="<?php echo base_url('programa/listar_programas'); ?>"><i class="fa fa-edit"></i> Listado General </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('programa/generar_reporte'); ?>"><i class="fa fa-file-pdf-o"></i> Generar Reporte</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">INSCRIPCI&Oacute;NES</span></a>
                <ul aria-expanded="false" class="collapse in">
                    <li>
                        <a class="link-menu" href="<?php echo base_url('programa/listar_programas'); ?>"><i class="fa fa-file-pdf-o"></i> Programas</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">DATOS PERSONALES</span></a>
                <ul aria-expanded="false" class="collapse in">
                    <li>
                        <a class="link-menu" href="<?php echo base_url('persona/listar_personas'); ?>"><i class="mdi mdi-account"></i> Personas</a>
                    </li>
                </ul>
            </li>
            <li class="nav-devider"></li>
            <li class="nav-small-cap">DESARROLLO</li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-gears"></i><span class="hide-menu">PLANTILLA <span class="label label-rouded label-themecolor pull-right">HTML</span></span></a>
                <ul aria-expanded="false" class="collapse">
                    <li>
                        <a href="<?php echo base_url('main/index.html'); ?>"><i class="fa fa-newspaper-o"></i> Main</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('horizontal/index.html'); ?>"><i class="fa fa-newspaper-o"></i> Horizontal</a>
                    </li>
                </ul>
            </li>
            <li class="nav-small-cap">WEB SERVICES</li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-gears"></i><span class="hide-menu">API REST <span class="label label-rouded label-themecolor pull-right">BACKEND</span></span></a>
                <ul aria-expanded="false" class="collapse">
                    <li>
                        <a href="<?php echo base_url('api/programas/lista'); ?>"><i class="fa fa-server"></i> API Listado de Programas</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('api/programas/lista/id/1'); ?>"><i class="fa fa-server-o"></i> API Registro ID 1</a>
                    </li>
                </ul>
            </li>
        <?php else : ?>
            <li>
                <a aria-expanded="false" href="<?php echo base_url(); ?>"><i class="fa fa-bars"></i><span class="hide-menu"> TODOS LOS PROGRAMAS</span></a>
            </li>
        <?php endif; ?>
    </ul>
</nav>