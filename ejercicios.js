/* let i=0;



for(i=1; i<=50; i++){


    let x;
    for(x=3; x<=50; x+=10){

        console.log( `Queres Un Mate?`);
    }
    console.log(i);
}

function mate(){

} */


//EJERCICIO 2
/* let numero_secreto=  numeroAleatorioDecimales(30);

for(let x=1; x<=30; x++){
   

    if(numero_secreto == x){
        
          console.log("Este es tu numero: "+ numero_secreto);
      }else{  
        console.log(x);
     } 

}

function numeroAleatorioDecimales(max) {
    return Math.floor(Math.random() * max);
} */

//EJERCICIO 3

function multiplicar(Array){
    for (let i=0; i<5;i++){
     numero = Array[i]*5;
         Array2.push(numero);
     }
   return Array2;
 }
 
 function recorrido(Array){
    for (let i=0; i<5;i++){
     console.log(Array[i]);
    }
 }
 
 let Array1 = [100,5,123,15,22];
 let Array2 = [];
 
 multiplicar(Array1);
 recorrido(Array2);
 
