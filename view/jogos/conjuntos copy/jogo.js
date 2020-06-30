function terminar() {
    // começo A = A.left 
    // fim A = B.left
    // comeco B = A.left+A.width
    // fim B = B.left + B.width
    // comeco juncao = B.left
    // fim juncao = A.left + A.width

    //placa mae = sem numero
    // mouse = 2
    // teclado = 3
    //disco rigido = 4

    if((document.getElementById("ball").offsetLeft > document.getElementById("gate").offsetLeft && document.getElementById("ball").offsetLeft < document.getElementById("gate2").offsetLeft) && (document.getElementById("ball").offsetTop > document.getElementById("gate").offsetTop) && (document.getElementById("ball").offsetTop < (document.getElementById("gate").offsetTop + document.getElementById("gate").offsetHeight))
    && (document.getElementById("ball4").offsetLeft > document.getElementById("gate").offsetLeft && document.getElementById("ball4").offsetLeft < document.getElementById("gate2").offsetLeft) && (document.getElementById("ball4").offsetTop > document.getElementById("gate").offsetTop) && (document.getElementById("ball4").offsetTop < (document.getElementById("gate").offsetTop + document.getElementById("gate").offsetHeight))
    && ((document.getElementById("ball2").offsetLeft > document.getElementById("gate2").offsetLeft && document.getElementById("ball2").offsetLeft < (document.getElementById("gate").offsetLeft + document.getElementById("gate").offsetWidth)) && (document.getElementById("ball2").offsetTop > document.getElementById("gate").offsetTop) && (document.getElementById("ball2").offsetTop < (document.getElementById("gate").offsetTop + document.getElementById("gate").offsetHeight)))
    && ((document.getElementById("ball3").offsetLeft > (document.getElementById("gate").offsetLeft + document.getElementById("gate").offsetWidth) && document.getElementById("ball3").offsetLeft < (document.getElementById("gate2").offsetLeft + document.getElementById("gate2").offsetWidth)) && (document.getElementById("ball3").offsetTop > document.getElementById("gate2").offsetTop) && (document.getElementById("ball3").offsetTop < (document.getElementById("gate2").offsetTop + document.getElementById("gate2").offsetHeight)))){
        alert("acertou");
    }else{
        $(".jogo").css("display","none");
        $(".gate").css("display","none");
        $(".ball").css("display","none");
        $("#play").css("display","none");
        $("#perdeu").css("display","block");
        $("#perdeu").css("margin-left","38%");
        $(".avisos").css("display","block");
    }

    /*console.log("Placa mãe no A: " + ((document.getElementById("ball").offsetLeft > document.getElementById("gate").offsetLeft && document.getElementById("ball").offsetLeft < document.getElementById("gate2").offsetLeft) && (document.getElementById("ball").offsetTop > document.getElementById("gate").offsetTop) && (document.getElementById("ball").offsetTop < (document.getElementById("gate").offsetTop + document.getElementById("gate").offsetHeight))));
    console.log("Placa mãe no B: " + ((document.getElementById("ball").offsetLeft > (document.getElementById("gate").offsetLeft + document.getElementById("gate").offsetWidth) && document.getElementById("ball").offsetLeft < (document.getElementById("gate2").offsetLeft + document.getElementById("gate2").offsetWidth)) && (document.getElementById("ball").offsetTop > document.getElementById("gate2").offsetTop) && (document.getElementById("ball").offsetTop < (document.getElementById("gate2").offsetTop + document.getElementById("gate2").offsetHeight))));
    console.log("Placa mãe na junção: " + ((document.getElementById("ball").offsetLeft > document.getElementById("gate2").offsetLeft && document.getElementById("ball").offsetLeft < (document.getElementById("gate").offsetLeft + document.getElementById("gate").offsetWidth)) && (document.getElementById("ball").offsetTop > document.getElementById("gate").offsetTop) && (document.getElementById("ball").offsetTop < (document.getElementById("gate").offsetTop + document.getElementById("gate").offsetHeight))));
*/
}

function jogar(){
    $(".gate").css("display","block");
    $(".ball").css("display","block");
    $(".jogo").css("display","block");
    $(".avisos").css("display","none");
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