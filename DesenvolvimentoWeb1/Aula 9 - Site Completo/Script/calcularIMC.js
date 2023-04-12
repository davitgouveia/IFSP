function calculoIMC(){
    var formularioDadosIMC = document.getElementById("formularioDadosIMC");

    var peso = +formularioDadosIMC.peso.value;
    var altura = +formularioDadosIMC.altura.value;

    var imc = peso / (altura * altura)

    formularioDadosIMC.imc.value = imc.toFixed(2);

    if(imc < 18.5)
    {
        alert('Abaixo do peso.')
    }
    if(imc >= 18.5 && imc < 25)
    {
        alert('Peso ideal (Parabéns!)')
    }
    if(imc >= 25 && imc < 30)
    {
        alert('Levemente acima do peso')
    }
    if(imc >= 30 && imc < 35)
    {
        alert('Obesidade grau 1')
    }
    if(imc >= 35 && imc <= 40)
    {
        alert('Obesidade grau 2 (severa)')
    }
    if(imc > 40)
    {
        alert('Obesidade grau 3 (mórbida)')
    }

}