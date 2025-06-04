<!DOCTYPE html>
<html>
<head>
    <title>Menú Principal</title>
</head>
<body>

    <h1>Menú Principal</h1>

    <div style="display: flex; flex-direction: column; gap: 10px; width: 250px;">

        <!-- Ir a Provincias 
        <a href="{{ route('indexsee.province') }}">
            <button style="width: 100%;">Ir a Provincias</button>
        </a>  
-->
           <!-- Ir a Tipos de Máquinas -->
        <a href="{{ route('indexsee.machinetype') }}">
            <button style="width: 100%;">Ir a Tipos de Máquinas</button>
        </a>

             <!-- Ir a Máquinas -->
        <a href="{{ route('indexsee.machine') }}">
            <button style="width: 100%;">Ir a Máquinas</button>
        </a>

        <!-- Ir a Trabajos -->
        <a href="{{ route('indexsee.work') }}">
            <button style="width: 100%;">Ir a Trabajos</button>
        </a>


        <!-- Ir a Máquinas-obras -->
        <a href="{{ route('indexsee.machinework') }}">
            <button style="width: 100%;">Ir a Máquinas-obras</button>
        </a>


   
    </div>

</body>
</html>
