function RefrescaProducto() {
    var ip = [];
    var i = 0;
    $('#guardar').attr('disabled', 'disabled'); //Deshabilito el Boton Guardar
    $('.iProduct').each(function(index, element) {
        i++;
        ip.push({
            id_pro: $(this).val()
        });
    });
    // Si la lista de Productos no es vacia Habilito el Boton Guardar
    if (i > 0) {
        $('#guardar').removeAttr('disabled', 'disabled');
    }
    var ipt = JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
    $('#ListaPro').val(encodeURIComponent(ipt));
}
d = 1;
// texto = "";
function agregarProducto() {

    var cantidad_inicial = Number(document.getElementById("monto").value);
    var obtenerC = Number(document.getElementById('obtenerC').value);
    if (cantidad_inicial > obtenerC) {
        console.log('No tienes Suficiente stock');
        bajoStock();
    }else{

    var nombre = document.getElementById("id").value;
    var precio = document.getElementById("precioP").value;
    var cantidad = document.getElementById("monto").value;
    // var idP = document.getElementById("idP").innerHTML;



    console.log("nombre: "+nombre);
    var idP = document.getElementById("idPP").value;
    console.log("idPP: "+idP);
    // var elementos = document.getElementsByName("duplicado[]");
    // alert("Hay " + elementos.length + " productos selecionados");

      

    // document.getElementById("asdasd").innerHTML = nombre;

    var elementos = document.getElementsByName("totalitem[]");
    var count = elementos.length;
    if (count == 0) {
        var count = 1;
        // console.log("igual a 0 - agregar");
        console.log(count);

        // var sptext = text.split();
        
        var newtr = '<tr class="item" id="nombreTr" data-id="' + nombre + '">';
        newtr = newtr + '<td name="nombreTd'+idP+'" id="asdasd" class="iProduct" >' + nombre + '</td>';
        // newtr = newtr + '<td><input class="form-control" type="text" id="cantidad[]" readonly name="lista[]" onload="Calcular(this);" value="'+ precio +'" /></td><td><input class="form-control" type="text" id="precunit[]" name="lista[]" readonly onChange="Calcular(this);" value="'+ precio +'"/></td><td><input class="form-control" type="text" id="totalitem[]" name="lista[]" readonly /></td>';
        // newtr = newtr + '<td><input class="form-control" type="text" id="cantidad'+idP+'" readonly name="cantidad'+idP+'" onload="Calcular(this);" value="'+ cantidad +'" /></td><td><input class="form-control" type="text" id="precunit[]" name="precio'+idP+'" readonly onChange="Calcular(this);" value="'+ precio +'"/></td><td><input class="form-control" type="text" id="totalitem'+idP+'" name="totalitem'+idP+'" readonly /></td>';
        newtr = newtr + '<td><input class="form-control text-center" type="text" id="cantidad'+count+'" readonly name="cantidad'+count+'" onload="Calcular(this);" value="'+ cantidad +'" /></td><td><input class="form-control text-center" type="text" id="precunit[]" name="precio'+count+'" readonly onChange="Calcular(this);" value="'+ precio +'"/></td><td><input class="form-control" type="text" id="totalitem'+count+'" name="totalitem[]" readonly /></td>';
        newtr = newtr + '<td><button type="button" onclick="myFunction('+d+')" name="contar[]" class="btn btn-danger btn-xs remove-item" ><i>Eliminar</i></button></td></tr>';
        newtr = newtr + '<input class="form-control" type="hidden" id="idprod'+d+'" readonly name="asd'+d+'" value="'+ idP +'"/>';
        newtr = newtr + '<input class="form-control" type="hidden" id="idprod'+d+'" readonly name="duplicado[]" value="'+ idP +'"/>';
        


        d = d + 1;
        

        $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

        RefrescaProducto(); //Refresco Productos

        // $('.remove-item').off().click(function(e) {
        //     var total = document.getElementById("total_1");
        //     total.innerHTML = parseFloat(total.innerHTML) - parseFloat(this.parentNode.parentNode.childNodes[3].childNodes[0].value);
        //     $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
        //     if ($('#ProSelected tr.item').length == 0)
        //         $('#ProSelected .no-item').slideDown(300);
        //     RefrescaProducto();
            
        //     Calcular(e.target);
        //     // document.getElementById('total_final').innerHTML = "";
        // });
        $('.iProduct').off().change(function(e) {
            RefrescaProducto();
        
        });
    }else{
        // console.log("Ya no es igual a 0 - agregar");
        
        var count1 = count + 1;
        console.log(count1);

    // texto = "";
    // console.log(texto);
    // i = 0;
    // for (x=0;x<elementos.length;x++){

        // while (i<elementos.length){
        //     // texto =  texto + elementos[x].value + "\n";
        //     texto = elementos[i].value;
        //     console.log("texto"+texto);
        //     console.log(idP);
        //     if (texto == idP) {
        //        console.log("duplicado");
        //     }else{
        //         console.log("pasa");
        //     }
        //     i = i + 1;
        // }
    // }


    // var precioV = document.getElementById("precio").value;
    // var cantidad = document.getElementById("precio").value;
    // console.log("asd" + precioV);

        // var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
    // var text = $('#pro_id').find(':selected').text(); //Capturo el Nombre del Producto- Texto dentro del Select


    // var sptext = text.split();
    
        var newtr = '<tr class="item" id="nombreTr" data-id="' + nombre + '">';
        newtr = newtr + '<td name="nombreTd'+idP+'" id="asdasd" class="iProduct" >' + nombre + '</td>';
        // newtr = newtr + '<td><input class="form-control" type="text" id="cantidad[]" readonly name="lista[]" onload="Calcular(this);" value="'+ precio +'" /></td><td><input class="form-control" type="text" id="precunit[]" name="lista[]" readonly onChange="Calcular(this);" value="'+ precio +'"/></td><td><input class="form-control" type="text" id="totalitem[]" name="lista[]" readonly /></td>';
        // newtr = newtr + '<td><input class="form-control" type="text" id="cantidad'+idP+'" readonly name="cantidad'+idP+'" onload="Calcular(this);" value="'+ cantidad +'" /></td><td><input class="form-control" type="text" id="precunit[]" name="precio'+idP+'" readonly onChange="Calcular(this);" value="'+ precio +'"/></td><td><input class="form-control" type="text" id="totalitem'+idP+'" name="totalitem'+idP+'" readonly /></td>';
        newtr = newtr + '<td><input class="form-control text-center" type="text" id="cantidad'+count1+'" readonly name="cantidad'+count1+'" onload="Calcular(this);" value="'+ cantidad +'" /></td><td><input class="form-control text-center" type="text" id="precunit[]" name="precio'+count1+'" readonly onChange="Calcular(this);" value="'+ precio +'"/></td><td><input class="form-control" type="text" id="totalitem'+count1+'" name="totalitem[]" readonly /></td>';
        newtr = newtr + '<td><button type="button" onclick="myFunction('+d+'),nombres()" name="contar[]" class="btn btn-danger btn-xs remove-item" ><i>Eliminar</i></button></td></tr>';
        newtr = newtr + '<input class="form-control" type="hidden" id="idprod'+d+'" readonly name="asd'+d+'" value="'+ idP +'"/>';
        newtr = newtr + '<input class="form-control" type="hidden" id="idprod'+d+'" readonly name="duplicado[]" value="'+ idP +'"/>';
        


        d = d + 1;


        

        $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

        RefrescaProducto(); //Refresco Productos

        $('.remove-item').off().click(function(e) {
            var total = document.getElementById("total_1");
            total.innerHTML = parseFloat(total.innerHTML) - parseFloat(this.parentNode.parentNode.childNodes[3].childNodes[0].value);
            $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
            if ($('#ProSelected tr.item').length == 0)
                $('#ProSelected .no-item').slideDown(300);
            RefrescaProducto();
            
            Calcular(e.target);
            // document.getElementById('total_final').innerHTML = "";
        });
        $('.iProduct').off().change(function(e) {
            RefrescaProducto();
        
        });
    }
    }
}

function myFunction(x) {
    document.getElementById("myTable").deleteRow(x);
}
// i = 0;
function operar(x){


    var elementos = document.getElementsByName("totalitem[]");
    var count = elementos.length;
    console.log(count+" operar");
    // if (count == 0) {
    //     var count = 1;
    //     console.log("igual a 0 - operar");
    //     console.log(count);
        
    //     // var totalt =  eval(document.getElementById("total_1").value);
    //     // console.log(totalt + 10); 

    //     var idP = document.getElementById("idP").innerHTML;
    //     var valor_01 = document.getElementById("precio").innerHTML;
    //     var valor_02 = eval(document.getElementById('monto').value);
    //     // console.log(valor_01);
    //     // console.log(valor_02);
    //     switch(x){
    //         case('sumar'):
    //             var resultado = valor_01 + valor_02;
    //             break;
    //         case('restar'):
    //             var resultado = valor_01 - valor_02;
    //             break;
    //         case('multiplicar'):
    //             var resultado = valor_01 * valor_02;
    //             break;
    //         case('dividir'):
    //             var resultado = valor_01 / valor_02;
    //             break;
    //     }
        
    //     document.getElementById('totalitem'+count).value = resultado.toFixed(2);
    //     // console.log(i);
    //     // document.getElementById('totalitem'+i).value = resultado.toFixed(2);
    //     console.log(resultado);

    // }else{
    //     console.log("Ya no es igual a 0 - operar");
    //     console.log(count);
        
        // var totalt =  eval(document.getElementById("total_1").value);
        // console.log(totalt + 10); 

        var idP = document.getElementById("idPP").innerHTML;
        var valor_01 = document.getElementById("precioP").value;
        var valor_02 = eval(document.getElementById('monto').value);
        // console.log(valor_01);
        // console.log(valor_02);
        switch(x){
            case('sumar'):
                var resultado = valor_01 + valor_02;
                break;
            case('restar'):
                var resultado = valor_01 - valor_02;
                break;
            case('multiplicar'):
                var resultado = valor_01 * valor_02;
                break;
            case('dividir'):
                var resultado = valor_01 / valor_02;
                break;
        }
        
        document.getElementById('totalitem'+count).value = resultado.toFixed(2);
        // document.getElementById('demo').innerHTML = resultado.toFixed(2);
        var coen = document.getElementById('totalitem'+count).value = resultado.toFixed(2);
        console.log("coen "+coen);
        // document.getElementById('totalitem'+i).value = resultado.toFixed(2);
        console.log("Resultado "+resultado);
        // i = i + 1;
        // var sum = eval(document.getElementById('totalitem'+idP).value);
        
        // console.log(sum + 2);
        // document.getElementById('total_1').value = sum;
        // document.getElementById('total_1').value = sum + totalt;
        
        // totalF = sum + totalt;
        // document.getElementById('total_final').innerHTML = totalF.toFixed(2);
        
        // console.log(0 + totalt + resultado);
        // var qwe = document.getElementById('totalitem'+idP).innerText;
        // console.log("qwe " + resultado);
        
        // if (totalt === 0) {
        //     console.log("No hay nada");
        // }else{
        //     var totalt = document.getElementById("total_final").innerHTML;
        //     console.log("totalt "+totalt);
        
        
        // }
        
    // }
}

function Calcular(ele) {
    var cantidad = 0, precunit = 0, totalitem = 0 ;
    var tr = ele.parentNode.parentNode;
    var nodes = tr.childNodes;

    for (var x = 0; x<nodes.length;x++) {
        
        if (nodes[x].firstChild.id == 'cantidad[]') {
            cantidad = parseFloat(nodes[x].firstChild.value,10);
        }
        if (nodes[x].firstChild.id == 'precunit[]') {
            precunit = parseFloat(nodes[x].firstChild.value,10);
        }
        if (nodes[x].firstChild.id == 'totalitem[]') {
            anterior = nodes[x].firstChild.value;
            totalitem = parseFloat((precunit*cantidad),10);
            nodes[x].firstChild.value = totalitem;
        }
    }
    // Resultado final de cada fila ERROR, al editar o eliminar una fila
    var total = document.getElementById("total_1");
    if (total.innerHTML == 'NaN') {
        total.innerHTML = 0;
        // 
    }
    // total.innerHTML = parseFloat(total.innerHTML)+totalitem -anterior ;    
}


function clean() {
    $('#id').val('');
    // $('#monto').val('');
    $('#id').focus();
  }


// el=document.getElementById('myul'); 
// els=el.getElementsByTagName('li');
// els=el.getElementById('totalitem[*]'); 
// vec=[] 
// for(i=0;i<els.length;i++){ 
//     if(els[i].parentNode==el) 
//         vec.push(els[i]); 
// } 
// alert(vec.length); 


var i = 0;
 
function contador(){
    i = i + 1;
    document.getElementById('items').value = i;

    // console.log(i);
}


function enter1(){
    if (event.keyCode == 13)
    {
      $('#monto').focus();
      $('#monto').val('');
      // event.returnValue=false;
    }
}

function imprimir(){
    if (event.keyCode == 120)
    {
      $('#imprimir').focus();
      console.log("preciono f9");
      // $('#monto').val('');
      // console.log("imprimir");
      // event.returnValue=false;
    }
}

function enter2(){
    if (event.keyCode == 13)
    {
      $('#btn').focus();
    }
}

function enter5(){

    $('#monto').val('');
    $('#monto').focus();
}

function agotado(){
    // console.log("agotado");
    // alert('agotado');
    // swal("Producto Agotado");
    swal({
        title: "Producto Agotado..!",
        type: "warning",
    });
}

function bajoStock(){
    $('#monto').val('');
    $('#iddd').val('');
    $('#id').val('');
    document.getElementById("cajajs").innerHTML = "";

    console.log('Limpio la  Cantiad por intentar comprar mas de lo que se tenia en stock');
    // console.log("agotado");
    // alert('agotado');
    // swal("Producto Agotado");

    // swal({
    //
    //   showCancelButton: true,
    //
    // }).then((result) => {
    //   if (result.value) {
    //     swal(
    //       'No hay Stock Suficiente!',
    //     )
    //   }
    // })
    
    // $('#monto').val('');    
}



function enter6(){

    $('#id').val('');
    $('#monto').val('');
    document.getElementById("cajajs").innerHTML = "";
    $('#id').focus();
    console.log("entro6");

    
}


// function titulo(){
//     // document.getElementById('total_final').innerHTML = Cambio;
//     var titulo = document.getElementById('nombreP').innerHTML;
//     console.log(titulo);
// }

// function nombres(){
//     el=document.getElementById('nombreTr'); 
//     els=el.getElementsByTagName('nombreTd');
//     // els=el.getElementById('totalitem[*]'); 
//     console.log(els);
//     vec=[] 
//     for(i=0;i<els.length;i++){ 
//         if(els[i].parentNode==el) 
//             vec.push(els[i]); 
//     } 
//     alert(vec.length); 
// }

// var ids = [];
// $('.right').each(function(key, element){
//   ids.push($(element).parent().attr('id'));
// });
// r = 0;

function nombres(){
    var elementos = document.getElementsByName("totalitem[]");
    console.log("Hay " + elementos.length + " productos selecionados");
        var i = 0;
        texto = Number(0);
        while (i<elementos.length){
                // var texto = elementos[i].value + texto;
                var texto = Number(elementos[i].value) + Number(texto);
                // console.log(texto);
                
                console.log(texto);
                i = i + 1;

                // var nun1 = eval(elementos[0]).value;
                // console.log(nun1);
                // var nun2 = elementos[1].value;
                // console.log(nun2);
                // var nun3 = elementos[2].value;
                // console.log(nun3);
                // var nun4 = nun1 + nun2 + nun3;
                // console.log(nun4);

            }
 
    // console.log(texto.toFixed(2));
    document.getElementById('total_final').innerHTML = texto.toFixed(2);
    console.log("fin item");
    // alert("Se han encontrado los siguientes valores en elementos 'totalitem'\n" + texto);
    // console.log("Se han encontrado los siguientes valores en elementos 'totalitem'\n" + texto);

 
}

function agregarNombre(x){    
    var obteneri = document.getElementById('idP'+x).innerHTML;
    console.log("ID: "+obteneri);
    var obtenerp = document.getElementById('precio'+x).innerHTML;
    var obtener = document.getElementById('nombre'+x).innerHTML;
    var obtenerC = document.getElementById('cantidad'+x).innerHTML;    
    document.getElementById('id').value = obtener;
    document.getElementById('precioP').value = obtenerp;
    document.getElementById('idPP').value = obteneri;
    document.getElementById('iddd').value = obteneri;
    document.getElementById('obtenerC').value = obtenerC;
    console.log('Cantidad en stock: '+obtenerC);
    console.log("Producto: "+obtener);


}

function validar(){
    var cantidad_inicial = Number(document.getElementById("monto").value);
    var obtenerC = Number(document.getElementById('obtenerC').value);
    if (cantidad_inicial > obtenerC) {
        console.log('No tienes Suficiente stock - onChange');
        bajoStock();
    }else{
        console.log('Sufficiente Stock - onChange');
    }
}