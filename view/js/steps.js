$(document).ready(function () {

    var current_fs; //formulario atual
    var current = 1; //o passo atual comeca como 1
    var steps = $("fieldset .campos").length; //pega a quantidade total de formularios contado quantos fieldsets tem

    setProgressBar(current);

    $("#previous").css("display", "none"); //nao mostra o botao anterior quando carrega a pagina

    $(".next").click(function () { // se clicar no botao para ir pro proximo 

        var form = document.querySelector('#form'+current); //pega o formulario atual. por isso para dar certo, todos os fieldsets tem que ter como id form + numero dele. ex: form1

        if (form.checkValidity()) { //se todos os campos desse form marcados como required estao preenchidos

        if (current < steps) { //se o form atual nao for o ultimo

            if(current == steps -1){ //se o formulario atual for o penultimo, ja muda o nome do botao de proximo para conluir
                $("#next").html("Concluir");
            }

            $("#previous").css("display", "inline"); //ja que nao eh mais o primeiro formulario, aparece o botao anterior para poder voltar

            //pega o id do formulario atual que esta visivel
            let aaaa = $(".todosForms .campos").filter(function () {
                if ($(this).css('display') == 'block') {
                    return true;
                }
            }).attr('id');

            current_fs = "#" + aaaa;

            //esconde o formulario atual
            $(current_fs).css("display", "none");

            //faz o proximo formulario aparecer
            $(current_fs).next().css("display", "block");

            //pega o id do proximo passo
            let nomePasso = "#passo" + (current + 1);
            //acende o numero desse passo
            $(nomePasso).addClass("active");

            //incrementa a barra de progresso
            setProgressBar(++current);

        }else{ //se for, eh porque o botao proximo mudou para concluir, entao ta na hora de cadastrar/editar
            mostrarModalSucesso("Cadastro efetuado com sucesso!");
            //aqui vai para o control
        }
    }else{
        mostrarModalErro("Preencha os campos obrigatórios!!!");
    }
    });

    $(".previous").click(function () { //clicou no botao de voltar para o formulario anterior

        if(current == steps ){ //se o passo atual for igual ao nome de passos totais, significa que o botao de proximo ta com o texto concluir
            $("#next").html("Próximo ►►"); //muda para proximo, ja que ele vai voltar para o penultimo formulario
        }

        if (current == 2) { //se o passo atual for o segundo formulario, significa que ele vai voltar para o primeiro formulario agora
            $("#previous").css("display", "none"); //entao o botao de anterior tem que sumir, porque nao tem formulario antes do primeiro
        }

        let aaaa = $('.campos').not(':hidden').last().attr('id'); //pega o id do ultimo fieldset que nao esta escondido, ou seja, o formulario atual

        current_fs = "#" + aaaa;

        $(current_fs).css("display", "none"); //esconde o formulario atual
        $(current_fs).prev().css("display", "block"); //mostra o formulario anterior

        let nomePasso = "#passo" + (current); //pega o id do passo atual
        $(nomePasso).removeClass("active"); //deixa o passo atual cinza, ja que ta voltando pro anterior

        //decrementa a barra de progresso
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep; //converte em float (100 / pelo num total de passos), apos isso multiplica pelo passo da atualizacao
        percent = percent.toFixed(); //converte o numero em uma string, arredondando com duas casas decimais
        $(".progress-bar").css("width", percent + "%"); //aumenta o tamanho do progresso da barra no css
    }

});