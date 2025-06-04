<div>
   <p>consultar Maquina</p>
   <form action="{{ route('machine.index') }}" method="get">
      <p>Maquina ID:</p>
      <input type="number" name="id" id="id" required>
      <input type="submit" value="Enviar">
   </form>

  <form action="{{ route('machine.showall') }}" method="get">
      <p>ver datos:</p>
      <input type="submit" value="ver">
   </form>

     <form action="{{ route('machine.create') }}" method="get">
      <p>agregar maquina:</p>
      <input type="submit" value="Agregar">
   </form>


</div>
