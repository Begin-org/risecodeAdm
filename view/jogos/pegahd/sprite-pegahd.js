function Sprite(x, y, largura, altura){
    this.x = x;
    this.y = y;
    this.largura = largura;
    this.altura = altura;

    this.desenha = function(xCanvas, yCanvas){
        ctx.drawImage(img, this.x, this.y, largura, altura, xCanvas, yCanvas, this.largura, this.altura);
    }
}

var bg = new Sprite(8,9, 859, 393);
var cesta = new Sprite(895, 342, 138, 78);
var spriteChao = new Sprite(8, 393, 853, 96);
var spriteJogar = new Sprite(869, 23, 324, 208);
var spritePerdeu = new Sprite(42, 518, 367, 394);


var spritePendrive = new sprite(894, 490, 964, 560);