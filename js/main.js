(function() {
    "use strict";

    var regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function() {


        //Campos Datos usuario

        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        // Campos pases

        var pase_dia = document.getElementById('pase_dia');
        var pase_dosdias = document.getElementById('pase_dosdias');
        var pase_completo = document.getElementById('pase_completo');

        //botones y Divs

        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var botonRegistro = document.getElementById('btnRegistro');
        var lista_prodcutos = document.getElementById('lista-productos');
        var suma = document.getElementById('suma-total');

        //Extras 

        var camisas = document.getElementById('camisa_evento');
        var etiquetas = document.getElementById('etiquetas');

        botonRegistro.disabled = true;


        if (document.getElementById('calcular')) {



            calcular.addEventListener('click', calcularMontos);

            pase_dia.addEventListener('blur', mostrarDias);
            pase_dosdias.addEventListener('blur', mostrarDias);
            pase_completo.addEventListener('blur', mostrarDias);

            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarMail);


            function validarCampos() {
                if (this.value == '') {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = 'Este Campo es Obligatorio';
                    this.style.border = '2px solid #FF0000';
                    errorDiv.style.border = '1px solid #ff0000';
                } else {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid #cccccc';
                }
            }

            function validarMail() {
                if (this.value.indexOf('@') > -1) {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid #cccccc';
                } else {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = 'Correo Electronio no Valido';
                    this.style.border = '2px solid #FF0000';
                    errorDiv.style.border = '1px solid #ff0000';
                }
            }

            function calcularMontos(event) {
                event.preventDefault();
                if (regalo.value === '') {
                    alert('Debes elegir un Regalo');
                    regalo.focus();
                } else {
                    var boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                        boletoCompleto = parseInt(pase_completo.value, 10) || 0,
                        cantCamisas = parseInt(camisas.value, 10) || 0,
                        cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

                    var totalPagar = Number((boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) +
                        ((cantCamisas * 10) * .93) + (cantEtiquetas * 2));

                    var listadoProductos = [];

                    if (boletosDia >= 1) {
                        listadoProductos.push(boletosDia + ' Pases por Día');
                    }
                    if (boletos2Dias >= 1) {
                        listadoProductos.push(boletos2Dias + ' Pases por 2 Días');
                    }
                    if (boletoCompleto >= 1) {
                        listadoProductos.push(boletoCompleto + ' Pases Completos');
                    }
                    if (cantCamisas >= 1) {
                        listadoProductos.push(cantCamisas + ' Camisas');
                    }
                    if (cantEtiquetas >= 1) {
                        listadoProductos.push(cantEtiquetas + ' Etiquetas');
                    }
                    lista_prodcutos.style.display = 'block';
                    lista_prodcutos.innerHTML = '';
                    for (var i = 0; i < listadoProductos.length; i++) {
                        lista_prodcutos.innerHTML += listadoProductos[i] + '<br>';
                    }

                    suma.innerHTML = '$' + totalPagar.toFixed(2);

                    botonRegistro.disabled = false;
                    document.getElementById('total_pedido').value = totalPagar;
                }

            }

            function mostrarDias() {
                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                    boletoCompleto = parseInt(pase_completo.value, 10) || 0;

                var diasElegidos = [];

                if (boletosDia > 0) {
                    diasElegidos.push('viernes');
                }
                if (boletos2Dias > 0) {
                    diasElegidos.push('viernes', 'sabado');
                }
                if (boletoCompleto > 0) {
                    diasElegidos.push('viernes', 'sabado', 'domingo');
                }
                for (var i = 0; i < diasElegidos.length; i++) {
                    document.getElementById(diasElegidos[i]).style.display = 'block';
                }
            }
        }


    }); // DOM CONTENT LOAD
})();

// Lettering

$('.nombre-sitio').lettering();


// agregar clase a menu
$('body.conferencias .navegacion-principal a:contains("Conferencia")').addClass('activo');
$('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
$('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
//Menu Fijo

var windowHeight = $(window).height();
var barraAltura = $('.barra').innerHeight();


$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll > windowHeight) {
        $('.barra').addClass('fixed');
        $('body').css({ 'margin-top': barraAltura + 'px' });
    } else {
        $('.barra').removeClass('fixed');
        $('body').css({ 'margin-top': '0px' });
    }
});
//Menu responsive


$('.menu-mobile').on('click', function() {
    $('.navegacion-principal').slideToggle();
})

// Programa de conferencias
$(function() {

    $('.ocultar').hide();
    // Programa de Conferencias
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');
    $('.menu-programa a').on('click', function() {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();

        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);

        return false;
    });

    //Animaciones para los números

    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1500);
    $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1500);

    // Contador final - cuenta regresiva

    $('.cuenta-regresiva').countdown('2021/3/24 00:00:00', function(event) {
        $('#dias').html(event.strftime('%-D'));
        $('#horas').html(event.strftime('%-H'));
        $('#minutos').html(event.strftime('%-M'));
        $('#segundos').html(event.strftime('%-S'));
    });

    // ColoBox

    $('.invitado-info').colorbox({ inline: true, width: "50 %" });

    var map = L.map('mapa').setView([-0.220515, -78.508092], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-0.220515, -78.508092]).addTo(map)
        .bindPopup('GDLWebCam 2020 <br> Boletos Disponibles.')
        .openPopup()
        .bindTooltip('Te esperamos')
        .openTooltip();
});