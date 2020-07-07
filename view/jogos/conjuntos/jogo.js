function terminar() {
    // começo A = A.left 
    // fim A = B.left
    // comeco B = A.left+A.width
    // fim B = B.left + B.width
    // comeco juncao = B.left
    // fim juncao = A.left + A.width

    let gate = document.getElementById("gate");
    let gate2 = document.getElementById("gate2");
    let ball = document.getElementById("ball");
    let ball2 = document.getElementById("ball2");
    let ball3 = document.getElementById("ball3");
    let ball4 = document.getElementById("ball4");

    //placa mae = sem numero
    // mouse = 2
    // teclado = 3
    //disco rigido = 4

    if((ball.getBoundingClientRect().left > gate.getBoundingClientRect().left && ball.getBoundingClientRect().left < gate2.getBoundingClientRect().left) && (ball.getBoundingClientRect().top > gate.getBoundingClientRect().top) && (ball.getBoundingClientRect().top < (gate.getBoundingClientRect().top + gate.offsetHeight))
    && (ball4.getBoundingClientRect().left > gate.getBoundingClientRect().left && ball4.getBoundingClientRect().left < gate2.getBoundingClientRect().left) && (ball4.getBoundingClientRect().top > gate.getBoundingClientRect().top) && (ball4.getBoundingClientRect().top < (gate.getBoundingClientRect().top + gate.offsetHeight))
    && ((ball2.getBoundingClientRect().left && ball2.getBoundingClientRect().left < (gate.getBoundingClientRect().left + gate.offsetWidth)) && (ball2.getBoundingClientRect().top > gate.getBoundingClientRect().top) && (ball2.getBoundingClientRect().top < (gate.getBoundingClientRect().top + gate.offsetHeight)))
    && ((ball3.getBoundingClientRect().left > (gate.getBoundingClientRect().left + gate.offsetWidth) && ball3.getBoundingClientRect().left < (gate2.getBoundingClientRect().left + gate2.offsetWidth)) && (ball3.getBoundingClientRect().top > gate2.getBoundingClientRect().top) && (ball3.getBoundingClientRect().top < (gate2.getBoundingClientRect().top +gate2.offsetHeight)))){
        $(".jogo").css("display","none");
        $(".gate").css("display","none");
        $(".ball").css("display","none");
        $("#play").css("display","none");
        $("#ganhou").css("display","block");
        $("#perdeu").css("display","none");
        $(".avisos").css("display","block");
        $(".listas").css("display","none");
        $(".game").css("margin-top","5vh");
    }else{
        $(".jogo").css("display","none");
        $(".gate").css("display","none");
        $(".ball").css("display","none");
        $("#play").css("display","none");
        $("#perdeu").css("display","block");    
        $("#ganhou").css("display","none");
        //$("#perdeu").css("margin-left","38%");
        $(".avisos").css("display","block");
        $(".listas").css("display","none");
        $(".game").css("margin-top","5vh");
  
    }
    

    /*console.log("Placa mãe no A: " + ((ball.getBoundingClientRect().left > gate.getBoundingClientRect().left && ball.getBoundingClientRect().left < gate2.getBoundingClientRect().left) && (ball.getBoundingClientRect().top > gate.getBoundingClientRect().top) && (ball.getBoundingClientRect().top < (gate.getBoundingClientRect().top + gate.offsetHeight))));
    console.log("Placa mãe no B: " + ((ball.getBoundingClientRect().left > (gate.getBoundingClientRect().left + gate.offsetWidth) && ball.getBoundingClientRect().left < (gate2.getBoundingClientRect().left + gate2.offsetWidth)) && (ball.getBoundingClientRect().top > gate2.getBoundingClientRect().top) && (ball.getBoundingClientRect().top < (gate2.getBoundingClientRect().top + gate2.offsetHeight))));
    console.log("Placa mãe na junção: " + ((ball.getBoundingClientRect().left > gate2.getBoundingClientRect().left && ball.getBoundingClientRect().left < (gate.getBoundingClientRect().left + gate.offsetWidth)) && (ball.getBoundingClientRect().top > gate.getBoundingClientRect().top) && (ball.getBoundingClientRect().top < (gate.getBoundingClientRect().top + gate.offsetHeight))));
*/
}

function jogar(){
    $(".gate").css("display","block");
    $(".ball").css("display","block");
    $(".jogo").css("display","block");
    $(".avisos").css("display","none");
    $("#ganhou").css("display","none");
    $("#perdeu").css("display","none");
    $(".listas").css("display","block");
    $(".game").css("margin-top","-20vh");
}


document.querySelectorAll(".ball").forEach(function (ball) {

    ball.ondragstart = function () {
        return false;
    };

    ball.onmousedown = function (event) {

        let shiftX = event.clientX - ball.getBoundingClientRect().left;
        let shiftY = event.clientY - ball.getBoundingClientRect().top;

        ball.style.position = 'absolute';
        ball.style.zIndex = 1000;
        document.body.append(ball);

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            ball.style.left = pageX - shiftX + 'px';
            ball.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);

            ball.hidden = true;
            let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
            ball.hidden = false;

            if (!elemBelow) return;
        }

        document.addEventListener('mousemove', onMouseMove);

        ball.onmouseup = function () {
            document.removeEventListener('mousemove', onMouseMove);
            ball.onmouseup = null;
        };

    };

    ball.onmousedown = function (event) {

        let shiftX = event.clientX - ball.getBoundingClientRect().left;
        let shiftY = event.clientY - ball.getBoundingClientRect().top;

        ball.style.position = 'absolute';
        ball.style.zIndex = 1000;
        document.body.append(ball);

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            ball.style.left = pageX - shiftX + 'px';
            ball.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);

            ball.hidden = true;
            let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
            ball.hidden = false;

            if (!elemBelow) return;
        }

        document.addEventListener('mousemove', onMouseMove);

        ball.onmouseup = function () {
            document.removeEventListener('mousemove', onMouseMove);
            ball.onmouseup = null;
        };

    };
});