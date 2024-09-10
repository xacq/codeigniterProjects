
<div class="row">
    <div class="col-md-12">
    <div class="card">
 <!-- INICIO DE ESTADISTICAS -->
 <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Usuarios</h6>
                                                <h2><?php echo $cantidadusuarios; ?></h2>
                                            </div>
                                            <div class="icon">
                                            <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block"> <?php echo $porcentajeusuarios[0]['porcentaje_creacion']; ?>% mas alto que el mes pasado </small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Estudiantes</h6>
                                                <h2><?php echo $cantidadestudiantes; ?></h2>
                                            </div>
                                            <div class="icon">
                                            <i class="fa fa-graduation-cap"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block"> <?php echo $porcentajeestudiantes[0]['porcentaje_creacion']; ?>% mas alto que el mes pasado</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Docentes</h6>
                                                <h2><?php echo $cantidaddocentes; ?></h2>
                                            </div>
                                            <div class="icon">
                                            <i class="fa fa-chalkboard-teacher"></i>

                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Docentes</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Cursos</h6>
                                                <h2><?php echo $cantidadcursos; ?></h2>
                                            </div>
                                            <div class="icon">
                                            <i class="ik ik-book"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Cursos</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                 
<!-- FIN DE ESTADISTICAS -->
 
<!-- INICIO DE GRAFICA -->
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../public/js/reloj.js"></script><br><br>

<div class="row">
    <div class="col-md-7">
        <div class="card sale-card">
            <div class="card-header">
             <h3>Analisis de datos</h3>
            </div>
            <div class="card-block">
                <canvas id="graficaBarras" style="height: 200px;"></canvas>
            </div>
        </div>
    </div>
</div>    
</div>


 <script>

    // Datos de ejemplo (reemplaza con tus propios datos)
    var datos = {
        labels: ["Usuarios", "Estudiantes", "Docentes", "Cursos"],
        datasets: [{
            label: "Totales",
            data: [<?php echo $cantidadusuarios; ?>, <?php echo $cantidadestudiantes; ?>, <?php echo $cantidaddocentes; ?>, <?php echo $cantidadcursos; ?>], // Reemplaza estos valores con tus datos reales
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)', // Color para estudiantes
                'rgba(54, 162, 235, 0.5)', // Color para cursos
                'rgba(255, 206, 86, 0.5)', // Color para docentes
                'rgba(75, 192, 192, 0.5)'  // Color para usuarios
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    };

    var ctx = document.getElementById('graficaBarras').getContext('2d');

    var graficaBarras = new Chart(ctx, {
        type: 'bar',
        data: datos,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- FIN DE GRAFICA -->


<!-- RELOJ--><br><br>

<body onload="startTime()">

    <div class="clockdate">
        <span id="time"></span>
        <span id="date"></span>
    </div>

    <script>
        function startTime() {
            //declaramos las  variables que nos proporcionaran los datos como la hora, minutos etc.

            var today = new Date(),
                hours = today.getHours(),
                minutes = today.getMinutes(),
                date = today.getDate(),
                day = today.getDay(),
                month = today.getMonth();

            //utilizaremos operadores ternarios esto nos ayudara a mostrar la hora solo del 1 al 12
            hours = (hours == 0) ? 12 : hours;
            hours = (hours > 12) ? hours - 12 : hours;

            //pasaremos las horas y minutos a una funcion que crearemos mas adelante
            hours = checkTime(hours);
            minutes = checkTime(minutes);

            //primero para los dias y meses crearemos un arreglo esto por que la funcion que nos debuelve
            //los dias y meses nos los debuelbe en numero
            var dia = ["Domingo", " Lunes", "Martes", "Miercoles", "Jueves", "viernes", "Sabado"],
                mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            //haora solo imprimimos los datos
            var hr = document.getElementById('time').innerHTML = hours + ":" + minutes,
                dt = document.getElementById('date').innerHTML = dia[day] + ", " + date + " De " + mes[month];

            //esta funcion hara que nuestro escript se ejecute constantemente
            var time = setTimeout(function() {
                startTime();
            }, 500);




        }
        //solo falta crear la funcion que nos diga si tine uno o dos dijitos
        //esto para que si solo tiene uno le agrege u  cero a la izquierda
        function checkTime(e) {
            if (e < 10) {
                e = "0" + e;
            }
            return e;
        }
    </script>

</body>




        </div>
    </div>
</div>
