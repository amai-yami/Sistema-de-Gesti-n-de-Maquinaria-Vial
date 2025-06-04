<div>
   <p>consultar Maquina-obra</p>
<form method="GET" action="{{ route('machineswork.index') }}">
    <label for="search">Buscar por ID:</label>
    <input type="text" name="search" id="search" placeholder="ID de relación" value="{{ request('search') }}">
    <button type="submit">Buscar</button>
</form>


  <form action="{{ route('machineswork.showall') }}" method="get">
      <p>ver datos:</p>
      <input type="submit" value="ver">
   </form>

     <form action="{{ route('machineswork.create') }}" method="get">
      <p>agregar maquina-obra:</p>
      <input type="submit" value="Agregar">
   </form>


</div>
