<div>

     <p>consultar tipo Maquina</p>
   <form action="{{ route('machinetype.index') }}" method="get">
      <p>tipo Maquina ID:</p>
      <input type="number" name="id" id="id" required>
      <input type="submit" value="Enviar">
   </form>

  <form action="{{ route('machinetype.show') }}" method="get">
      <p>ver tipos de maquinas:</p>
      <input type="submit" value="ver">
   </form>

     <form action="{{ route('machinetype.create') }}" method="get">
      <p>agregar tipo maquina:</p>
      <input type="submit" value="Agregar">
   </form>

</div>
