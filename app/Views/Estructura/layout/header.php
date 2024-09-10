<header class="header-top" header-theme="dark">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu flex-column align-items-start">
                <small class="text-white d-block">Bienvenido: <?= session('usuNombre'); ?></small>
                <small class="text-white d-block">
                    <?php
                        switch (session('perfilId')) {
                            case '1':
                                echo "Administrador";
                                break;
                            case '2':
                                echo "Estudiante";
                                break;
                            default:
                                echo "Docente";
                                break;
                        }
                    ?>
                </small>
            </div>
            <div class="top-menu d-flex align-items-end">
                <button type="button" class="btn btn-icon btn-info" onclick="location.href='<?php echo base_url();?>/home/logout'"><i class="ik ik-log-out"></i></button>
            </div>
        </div>
    </div>
</header>