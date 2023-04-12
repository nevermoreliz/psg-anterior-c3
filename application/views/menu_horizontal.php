<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <?php if (empty($this->session->userdata('id'))) : ?>
            <li><a aria-expanded="false" href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span class="hide-menu"> INICIO</span></a></li>
            <li class="nav-small-cap">T&Eacute;CNICO DE PROGRAMAS</li>

            <li><a aria-expanded="false" href="<?php echo base_url('/sobre_nosotros/index'); ?>"><i class=" ti-medall"></i><span class="hide-menu">SOBRE NOSOTROS</span></a></li>

            <li><a aria-expanded="false" href="<?php echo base_url('tramite'); ?>"><i class="ti-pencil-alt"></i><span class="hide-menu">TRAMITES</span></a></li>

            <li><a aria-expanded="false" href="<?php echo base_url('/documentos/HOJA-DE-VIDA-ESTUDIANTES-UPEA.doc'); ?>"><i class="fa fa-file-word-o"></i><span class="hide-menu">HOJA DE VIDA DOCENTE</span></a></li>

            <li class="nav-devider"></li>

        <?php else : ?>
            <li><a aria-expanded="false" href="<?php echo base_url(); ?>"><i class="fa fa-bars"></i><span class="hide-menu"> TODOS LOS PROGRAMAS</span></a></li>
        <?php endif; ?>
    </ul>
</nav>