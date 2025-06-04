<div>
   <p>consultar proyectos</p>
   <form action="{{ route('work.index') }}" method="get">
      <p>proyecto ID:</p>
      <input type="number" name="id" id="id" required>
      <input type="submit" value="Enviar">
   </form>

  <form action="{{ route('work.show') }}" method="get">
      <p>ver proyectos:</p>
      <input type="submit" value="ver">
   </form>

     <form action="{{ route('work.create') }}" method="get">
      <p>agregar  proyecto:</p>
      <input type="submit" value="Agregar">
   </form>
</div>
