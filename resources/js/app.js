import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,



    init: function () {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234; // Tamaño ficticio del archivo
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;
    
            // Llama a los métodos internos de Dropzone para agregar el archivo
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
    
            // Agrega clases para marcarlo como subido
            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }      // Esto funciona para mandar una alerta cuando el campo de imagen se llena con el valor de la imagen subida.
}); 

// Eventos en Js

dropzone.on("success", function (file, response){
    document.querySelector('[name="imagen"]').value = response.imagen;
}); 


dropzone.on("removedfile", function (){
    console.log("Archivo Eliminado");  // Esto funiona para poder asignar el valor de la imagen al html en el campo requerido al momento que suba la imagen
});


dropzone.on("removedfile", function (){
    document.querySelector('[name="imagen"]').value = " ";  // Esto funiona para poder eliminar el valor que se carga en el html al momento de elimar la imagen desde la app
});