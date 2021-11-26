function mostrarSenha(){

    var tipo = document.getElementById("senha");
    var icon = document.getElementById("botao")

    if(tipo.type == "password"){
        tipo.type = "text";
        icon.classList.remove('fa-eye-slash')
        icon.classList.add('fa-eye')

    }else{
        tipo.type = "password";
        icon.classList.remove('fa-eye')
        icon.classList.add('fa-eye-slash')
    }

}


  
document.getElementById("senha").onkeyup = function(e){
        let senha = document.getElementById("senha")
        let progress = document.getElementById("progressbar")

        // numeros = 25
        let numero = /([0-9])/ 
        // letras maiusculas = 25
        let maiusculas = /([A-Z])/
        // letras minusculas = 25
        let minusculas = /([a-z])/
        // mais de oito digitos = 25

        console.log(caracter)

        let caracter = senha.value.length
        let calcular = 0
        let resultado = ''

        // menos de seis digitos = 0
        if(caracter < 6){

            calcular = 0

        }else{

            if(caracter >= 8){

                calcular = calcular + 25;

            }
            if(senha.value.match(numero) != null){

                calcular = calcular + 25;

            }
            if(senha.value.match(maiusculas) != null){

                calcular = calcular + 25;

            }
            if(senha.value.match(minusculas) != null){

                calcular = calcular + 25;

            }
            
        }

        resultado = `width: ${calcular}%`;
        progress.style.cssText = resultado

    }