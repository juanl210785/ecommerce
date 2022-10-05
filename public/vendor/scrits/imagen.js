$(document).ready(function(){
  $(document).on('change', '#file', function(e){
    var input =document.getElementById('file');
    var cantidad = input.files.length;

    for (var i = 0; i < cantidad; i++) {
      var nombre = input.files[i].name;
      var ext = nombre.substring(nombre.lastIndexOf("."));
      if (ext != ".jpeg" && ext != ".jpg" && ".png") {
        var valida = false;
        break;
      } else {
        var valida = true;
      }
    }

    if (valida) {
      for (var i = 0; i < cantidad; i++) {
        previsualizarImg(e, i);        
      }
    } else {
      alert('este archivo no es valido o no se ha seleccionado archvio');
      $('#file').val('');
    }
  });
});

function previsualizarImg(e,i)
{
  const $seleccionArchivos = document.querySelector("#file"),
  $imagenPrevisualizacion = document.querySelector("#picture"+i);

  const archivos = $seleccionArchivos.files;
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[i];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
      /* var file = e.target.files[i];
    
      var reader = new FileReader();

      reader.onload = function(e){
		    var result = e.target.result;
        $('#picture'+i).setAtribute('src', result); //Asignamos el src dinámicamente a un img dinámico también
      }
      reader.readAsDataURL(file); */     
}


/* const $seleccionArchivos = document.querySelector("#file1"),
  $imagenPrevisualizacion = document.querySelector("#picture1");

  // Escuchar cuando cambie
  $seleccionArchivos.addEventListener("change", () => {
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = $seleccionArchivos.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
      $imagenPrevisualizacion.src = "https://cdn.pixabay.com/photo/2017/01/25/17/33/camera-2008479_960_720.png";
      return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    $imagenPrevisualizacion.src = objectURL;
  }); */

/* document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAtribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        } */