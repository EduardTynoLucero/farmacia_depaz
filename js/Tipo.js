$(document).ready(function(){
    var funcion;
    
   buscar_tipo();
   var edit = false;

   $('#form-crear-tipo').submit(e=>{
       let nombre_tipo = $('#nombre-tipo').val();
       let id_editado = $('#id_editar_tip').val();

       if(edit==false){
           funcion = 'crear';
       }else{
           funcion = 'editar';
       }
       

      //console.log("EL ID A EDITAR ES: "+id_editado);
       $.post('../controlador/TipoController.php',{nombre_tipo,id_editado, funcion},(response)=>{
           //console.log(response);
           if(response=='add'){
               $('#add-tipo').hide('slow');
               $('#add-tipo').show(1000);
               $('#add-tipo').hide(2000);
               $('#form-crear-tipo').trigger('reset');
               buscar_tipo();
           }
           if(response=='noadd'){
               $('#noadd-tipo').hide('slow');
               $('#noadd-tipo').show(1000);
               $('#noadd-tipo').hide(2000);
               $('#form-crear-tipo').trigger('reset');
           }

           if(response =='edit'){
               $('#edit-tip').hide('slow');
               $('#edit-tip').show(1000);
               $('#edit-tip').hide(2000);
               $('#form-crear-tipo').trigger('reset');
               buscar_tipo();
           }
           edit=false;
       });
       e.preventDefault();
   });

   function buscar_tipo(consulta){
       funcion ='buscar';

       $.post('../controlador/TipoController.php',{consulta, funcion},(response)=>{
           const tipos = JSON.parse(response);
           let template ='';
           tipos.forEach(tipo=>{
               template +=`
                    <tr tipId="${tipo.id}" tipNombre="${tipo.nombre}" >
                        <td>
                            
                            <button class="editar-tip btn btn-succes" title="Editar Tipo"  type="button" data-toggle="modal" data-target="#creartipo">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="borrar-tip btn btn-danger" title="Borrar Tipo">
                            <i class="far fa-trash-alt"></i>
                            </button>
                        </td>
                 
                         <td>${tipo.nombre}</td>
                  
                  
                    </tr>
               `;
           });
           $('#tipos').html(template);
           //console.log(response);
       });
   }

   $(document).on('keyup','#buscar-tipo', function() {
       let valor = $(this).val();
       if(valor !=""){
           // console.log("VALOR: "+valor);
            buscar_tipo(valor);
        }else{
            //console.log("VALOR VACIO: "+valor);
            buscar_tipo();
        }
   })

  

   

   $(document).on('click','.borrar-tip',(e)=>{
       funcion= "borrar";
       const elemento = $(this)[0].activeElement.parentElement.parentElement;
       console.log(elemento);

       const id = $(elemento).attr("tipId");
       const nombre = $(elemento).attr("tipNombre");
    

      // console.log("EL ID + NOMBRE Y AVATAR SON: "+ id + nombre+avatar);
       const swalWithBootstrapButtons = Swal.mixin({
           customClass: {
             confirmButton: 'btn btn-success',
             cancelButton: 'btn btn-danger mr-1'
           },
           buttonsStyling: false
         })
         
         swalWithBootstrapButtons.fire({
           title: 'Desea eliminar el laboratorio: '+nombre+'?',
           text: "No podras revertir esto",
           icon : 'warning',
           showCancelButton: true,
           confirmButtonText: 'Si, Eliminar!',
           cancelButtonText: 'No, Cancelar!',
           reverseButtons: true
         }).then((result) => {
           if (result.isConfirmed) {
               $.post('../controlador/TipoController.php',{id,funcion},(response)=>{
                 if(response =='BORRADO'){
                     edit =false;
                   swalWithBootstrapButtons.fire(
                       'Borrado!',
                       'El tipo: '+nombre+' fue borrado',
                       'success'
                     )
                     buscar_tipo();
                 }else{
                   swalWithBootstrapButtons.fire(
                       'No se puedo borrar!',
                       'El tipo: '+nombre+' no se pudo borrar',
                       'error'
                     )
                  
                 }
               })

           
           } else if (result.dismiss === Swal.DismissReason.cancel) {
             swalWithBootstrapButtons.fire(
               'Cancelado',
               'El tipo: '+nombre+' no fue borrado',
               'error'
             )
           
           }
         })

   });


   $(document).on('click','.editar-tip',(e)=>{
       
       const elemento = $(this)[0].activeElement.parentElement.parentElement;
       const id = $(elemento).attr("tipId");
       const nombre = $(elemento).attr("tipNombre");
       $('#id_editar_tip').val(id);
       $('#nombre-tipo').val(nombre);
       edit = true;


   });
});