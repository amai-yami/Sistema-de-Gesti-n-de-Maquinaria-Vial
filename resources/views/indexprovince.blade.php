<div>
        <p>consultar provincias</p>
   <form action="{{ route('province.index') }}" method="get">
      <p>provincia ID:</p>
      <input type="number" name="id" id="id" required>
      <input type="submit" value="Enviar">
   </form>

  <form action="{{ route('province.show') }}" method="get">
      <p>ver provincias:</p>
      <input type="submit" value="ver">
   </form>

     <form action="{{ route('province.create') }}" method="get">
      <p>agregar  provincia:</p>
      <input type="submit" value="Agregar">
   </form>
</div>
