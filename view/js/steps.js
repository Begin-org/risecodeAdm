$(document).ready(function () {

    var current_fs; //fieldsets
    var current = 1;
    var opacity;
    var steps = $("fieldset .campos").length;

    setProgressBar(current);

    $("#previous").css("display", "none");

    $(".next").click(function () {

        var form = document.querySelector('#form'+current);

        if (form.checkValidity()) {

        if (current < steps) {

            if(current == steps -1){
                $("#next").html("Concluir");
            }

            $("#previous").css("display", "inline");


            let aaaa = $(".todosForms .campos").filter(function () {
                if ($(this).css('display') == 'block') {
                    return true;
                }
            }).attr('id');

            current_fs = "#" + aaaa;

            $(current_fs).css("display", "none");
            $(current_fs).next().css("display", "block");

            let nomePasso = "#passo" + (current + 1);
            $(nomePasso).addClass("active");

            setProgressBar(++current);

        }else{
            //aqui vai para o control
            $('#conteudoModal').html("Cadastro efetuado com sucesso!");
            $('#feedback').modal('show');
            $( "#error" ).hide();
            $( "#successful" ).show( "fast" );
        }
    }else{
        $('#conteudoModal').html("Preencha os campos obrigatórios!!!");
        $('#feedback').modal('show');
        $( "#successful" ).hide();
        $( "#error" ).show( "fast" );
    }
    });

    $(".previous").click(function () {

        if(current == steps ){
            $("#next").html("Próximo ►►");
        }


        if (current == 2) {
            $("#previous").css("display", "none");
        }

        let aaaa = $('.campos').not(':hidden').last().attr('id');

        current_fs = "#" + aaaa;

        $(current_fs).css("display", "none");
        $(current_fs).prev().css("display", "block");

        let nomePasso = "#passo" + (current);
        $(nomePasso).removeClass("active");

        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    $(".submit").click(function () {
        return false;
    })

});