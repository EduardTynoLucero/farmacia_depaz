$(document).ready(function(){
    var funcion;
    
   buscar_presentacion();
   var edit = false;

   $('#form-crear-presentacion').submit(e=>{
       let nombre_presentacion = $('#nombre-presentacion').val();
       let id_editado = $('#id_editar_pre').val();

       if(edit==false){
           funcion = 'crear';
       }else{
           funcion = 'editar';
       }
       

      //console.log("EL ID A EDITAR ES: "+id_editado);
       $.post('../controlador/PresentacionController.php',{nombre_presentacion,id_editado, funcion},(response)=>{
           //console.log(response);
           if(response=='add'){
               $('#add-pre').hide('slow');
               $('#add-pre').show(1000);
               $('#add-pre').hide(2000);
               $('#form-crear-presentacion').trigger('reset');
               buscar_presentacion();
           }
           if(response=='noadd'){
               $('#noadd-pre').hide('slow');
               $('#noadd-pre').show(1000);
               $('#noadd-pre').hide(2000);
               $('#form-crear-presnetacion').trigger('reset');
           }

           if(response =='edit'){
               $('#edit-pre').hide('slow');
               $('#edit-pre').show(1000);
               $('#edit-pre').hide(2000);
               $('#form-crear-presentacion').trigger('reset');
               buscar_presentacion();
           }
           edit=false;
       });
       e.preventDefault();
   });

   function buscar_presentacion(consulta){
       funcion ='buscar';

       $.post('../controlador/PresentacionController.php',{consulta, funcion},(response)=>{
           const presentaciones = JSON.parse(response);
           let template ='';
           presentaciones.forEach(presentacion=>{
               template +=`
                    <tr preId="${presentacion.id}" preNombre="${presentacion.nombre}" >
                        <td>
                            
                            <button class="editar-pre btn btn-succes" title="Editar presentacion"  type="button" data-toggle="modal" data-target="#crearpresentacion">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="borrar-pre btn btn-danger" title="Borrar presentacion">
                            <i class="far fa-trash-alt"></i>
                            </button>
                        </td>
                 
                         <td>${presentacion.nombre}</td>
                  
                  
                    </tr>
               `;
           });
           $('#presentaciones').html(template);
           //console.log(response);
       });
   }

   $(document).on('keyup','#buscar-presentacion', function() {
       let valor = $(this).val();
       if(valor !=""){
           // console.log("VALOR: "+valor);
            buscar_presentacion(valor);
        }else{
            //console.log("VALOR VACIO: "+valor);
            buscar_presentacion();
        }
   })

  

   

   $(document).on('click','.borrar-pre',(e)=>{
       funcion= "borrar";
       const elemento = $(this)[0].activeElement.parentElement.parentElement;
       console.log(elemento);

       const id = $(elemento).attr("preId");
       const nombre = $(elemento).attr("preNombre");
    

      // console.log("EL ID + NOMBRE Y AVATAR SON: "+ id + nombre+avatar);
       const swalWithBootstrapButtons = Swal.mixin({
           customClass: {
             confirmButton: 'btn btn-success',
             cancelButton: 'btn btn-danger mr-1'
           },
           buttonsStyling: false
         })
         
         swalWithBootstrapButtons.fire({
           title: 'Desea eliminar la Presentacion: '+nombre+'?',
           text: "No podras revertir esto",
           icon : 'warning',
           showCancelButton: true,
           confirmButtonText: 'Si, Eliminar!',
           cancelButtonText: 'No, Cancelar!',
           reverseButtons: true
         }).then((result) => {
           if (result.isConfirmed) {
               $.post('../controlador/PresentacionController.php',{id,funcion},(response)=>{
                 if(response =='BORRADO'){
                     edit =false;
                   swalWithBootstrapButtons.fire(
                       'Borrado!',
                       'La presentacion: '+nombre+' fue borrada',
                       'success'
                     )
                     buscar_presentacion();
                 }else{
                   swalWithBootstrapButtons.fire(
                       'No se puedo borrar!',
                       'La presentacion: '+nombre+' no se pudo borrar',
                       'error'
                     )
                  
                 }
               })

           
           } else if (result.dismiss === Swal.DismissReason.cancel) {
             swalWithBootstrapButtons.fire(
               'Cancelado',
               'La presentacion: '+nombre+' no fue borrado',
               'error'
             )
           
           }
         })

   });


   $(document).on('click','.editar-pre',(e)=>{
       
       const elemento = $(this)[0].activeElement.parentElement.parentElement;
       const id = $(elemento).attr("preId");
       const nombre = $(elemento).attr("preNombre");
       $('#id_editar_pre').val(id);
       $('#nombre-presentacion').val(nombre);
       edit = true;


   });
});