<?php if (empty($this->session->userdata('id'))) : ?>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell"></i>
        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
    </a>
    <div class="dropdown-menu mailbox animated scale-up">
        <ul>
            <li>
                <div class="drop-title">Notificaciones</div>
            </li>
            <li>
                <div class="message-center">
                    <a href="#">
                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                        <div class="mail-contnet">
                            <h5>Registro de Eventos</h5> <span class="mail-desc">Ha iniciado sesion correctamente.</span> <span class="time">9:10 AM</span>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Ver Todas las Notificaciones</strong> <i class="fa fa-angle-right"></i> </a>
            </li>
        </ul>
    </div>
</li>
<?php endif; ?>