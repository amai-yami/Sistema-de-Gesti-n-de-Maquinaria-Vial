uso del sistema 

pantalla inicio que redirige a cada modificacion de las tablas

boton para crear, editar, ver, eliminar, buscar por registro especifico  

el orden de uso seria creear tipos de maquinas primero 
luego las maquinas que dependen del tipo de maquina 
luegos las obras donde van a relacionarse a futuro con las maquinas

y por ultimo la relacion maquina-obra 
en ese orden de acceder a los botones  seria el correcto para ir creando 

la mayoria de la logica de negocio o validaciones se encuenta en la relacion maquina-obra donde el usuario (capacitado) debera asignar relaciones de maquinas y obras a conciencia y con unas simples instrucciones y muestra de errores por pantalla  

Nota
no estan los requerimientos opcionales/extras y no esta pulido los requerimientos visuales o de enviar un email o notificacion 
si esta el archivo de eventos de email conigurado
el proyecto es simple y posiblemente poco intuitivo al uso 

tambien estan los seeders configurados para hacer un php artisan migrate:fresh --seed
pero esos no siguen la logica de negocio 
 

y por ultimo en el archivo indexview.blade.php  esta comentado el crud de provincias por si quiere probar agregar ver el boton de provincias con sus crud (opcional)

o puede hacer un php artisan migrate:fresh --seed para traer las que cargue manualmente

no hice un login ni uso de roles por lo que es un sistema simple pero funcional




