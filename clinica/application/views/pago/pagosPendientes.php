<div class="row">

    <div class="span12">            

        <div class="widget ">

            <?php
            echo $custom_message;
            echo $this->session->flashdata('custom_message');
            ?>

            <div class="widget-header">
                <i class="icon-money"></i>
                <h3>Pagos pendientes</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>Pagos por Realizar</h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th> Fecha Consulta </th>
                                    <th> Nombre Medico</th>
                                    <th> Nombre Paciente</th>
                                    <th class="td-actions" style="text-align: center;">Confirmar Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($listaPagosPendientes) {
                                    foreach ($listaPagosPendientes as $pago) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $pago['FECHA'] ?> </td>
                                            <td> <?php echo $pago['NOMBRE_MEDICO'] ?></td>
                                            <td> <?php echo $pago['NOMBRE_PACIENTE'] ?></td>
                                            <td class="td-actions" style="text-align: center;">
                                                <a href="<?php echo base_url('pago/nuevoPago/' . url_base64_encode($pago['ID_CONSULTA'])) ?>" class="btn btn-small btn-success">
                                                    <i class="btn-icon-only icon-ok"> </i>
                                                </a>
                                            </td>
                                        </tr>    
                                    <?php }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /widget-content --> 
                </div>





            </div> <!-- /widget-content -->

        </div> <!-- /widget -->

    </div> <!-- /span8 -->

</div> <!-- /row -->




