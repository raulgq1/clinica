<div class="subnavbar">

    <div class="subnavbar-inner">

        <div class="container">

            <ul class="mainnav">    


                <?php
                $roles = $this->session->userdata('roles');
                foreach ($roles as $rol) {
                    if ($rol['ROL'] == 'Secretaria') {
                        ?>
                        <li class="<?php echo ($seccion == 'panel') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('panel') ?>">
                                <i class="icon-dashboard"></i>
                                <span>Panel</span>
                            </a>                        
                        </li>


                        <li class="dropdown <?php echo ($seccion == 'paciente') ? 'active' : ''; ?>">                 
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i>
                                <span>Pacientes</span>
                            </a>                         

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('paciente/nuevoPaciente'); ?>">Nuevo Paciente</a></li>
                                <li><a href="<?php echo base_url('paciente/buscarPaciente'); ?>">Buscar Paciente</a></li>
                            </ul>  
                        </li>

                        <li class="dropdown <?php echo ($seccion == 'cita') ? 'active' : ''; ?>">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-calendar"></i>
                                <span>Citas</span>
                                <b class="caret"></b>
                            </a>    

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('cita/nuevaCita') ?>">Nueva Cita</a></li>
                                <li><a href="<?php echo base_url('cita/verAgenda') ?>">Ver Agenda</a></li>
                            </ul>                   
                        </li>



                        <li class="dropdown <?php echo ($seccion == 'pago') ? 'active' : ''; ?>">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-money"></i>
                                <span>Pagos</span>
                                <b class="caret"></b>
                            </a>    

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('pago/pagosPendientes') ?>">Pagos Pendientes</a></li>
                                <li><a href="<?php echo base_url('pago/verPagos') ?>">Ver Pagos</a></li>
                            </ul>                   
                        </li>                 


                        <li class="dropdown <?php echo ($seccion == 'medicamento') ? 'active' : ''; ?>">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-briefcase"></i>
                                <span>Medicamentos</span>
                                <b class="caret"></b>
                            </a>    

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('medicamento/recetasPendientes') ?>">Recetas Pendientes</a></li>
                                <li><a href="<?php echo base_url('medicamento/verMedicamentos') ?>">Ver Medicamentos</a></li>
                                <li><a href="<?php echo base_url('medicamento/nuevoMedicamento') ?>">Nuevo Medicamento</a></li>
                            </ul>                   
                        </li>  
                    <?php
                    }


                    if ($rol['ROL'] == 'Medico') {
                        ?>
                        <li class="<?php echo ($seccion == 'panel') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('panel') ?>">
                                <i class="icon-dashboard"></i>
                                <span>Panel</span>
                            </a>                        
                        </li>


                        <li class="dropdown <?php echo ($seccion == 'paciente') ? 'active' : ''; ?>">                 
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i>
                                <span>Pacientes</span>
                            </a>                         

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('paciente/nuevoPaciente'); ?>">Nuevo Paciente</a></li>
                                <li><a href="<?php echo base_url('paciente/buscarPaciente'); ?>">Buscar Paciente</a></li>
                            </ul>  
                        </li>

                        <li class="dropdown <?php echo ($seccion == 'cita') ? 'active' : ''; ?>">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-calendar"></i>
                                <span>Citas</span>
                                <b class="caret"></b>
                            </a>    

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('cita/nuevaCita') ?>">Nueva Cita</a></li>
                                <li><a href="<?php echo base_url('cita/verAgenda') ?>">Ver Agenda</a></li>
                            </ul>                   
                        </li>

                    <?php
                    }


                    if ($rol['ROL'] == 'Administrador') {
                        ?>
                        <li class="<?php echo ($seccion == 'panel') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('panel') ?>">
                                <i class="icon-dashboard"></i>
                                <span>Panel</span>
                            </a>                        
                        </li>


                        <li class="dropdown <?php echo ($seccion == 'paciente') ? 'active' : ''; ?>">                 
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i>
                                <span>Pacientes</span>
                            </a>                         

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('paciente/nuevoPaciente'); ?>">Nuevo Paciente</a></li>
                                <li><a href="<?php echo base_url('paciente/buscarPaciente'); ?>">Buscar Paciente</a></li>
                            </ul>  
                        </li>

                        <li class="dropdown <?php echo ($seccion == 'cita') ? 'active' : ''; ?>">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-calendar"></i>
                                <span>Citas</span>
                                <b class="caret"></b>
                            </a>    

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('cita/nuevaCita') ?>">Nueva Cita</a></li>
                                <li><a href="<?php echo base_url('cita/verAgenda') ?>">Ver Agenda</a></li>
                            </ul>                   
                        </li>



                        <li class="dropdown <?php echo ($seccion == 'pago') ? 'active' : ''; ?>">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-money"></i>
                                <span>Pagos</span>
                                <b class="caret"></b>
                            </a>    

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('pago/pagosPendientes') ?>">Pagos Pendientes</a></li>
                                <li><a href="<?php echo base_url('pago/verPagos') ?>">Ver Pagos</a></li>
                            </ul>                   
                        </li>                 


                        <li class="dropdown <?php echo ($seccion == 'medicamento') ? 'active' : ''; ?>">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-briefcase"></i>
                                <span>Medicamentos</span>
                                <b class="caret"></b>
                            </a>    

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('medicamento/recetasPendientes') ?>">Recetas Pendientes</a></li>
                                <li><a href="<?php echo base_url('medicamento/verMedicamentos') ?>">Ver Medicamentos</a></li>
                                <li><a href="<?php echo base_url('medicamento/nuevoMedicamento') ?>">Nuevo Medicamento</a></li>
                            </ul>                   
                        </li>



                        <li class="dropdown <?php echo ($seccion == 'reporte') ? 'active' : ''; ?>">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-bar-chart"></i>
                                <span>Reportes</span>
                                <b class="caret"></b>
                            </a>    

                            <ul class="dropdown-menu">
                                <li><a href="#">Estadisticas</a></li>
                            </ul>                   
                        </li>                

                        <?php
                    }
                }
                ?>





            </ul>

        </div> <!-- /container -->

    </div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->