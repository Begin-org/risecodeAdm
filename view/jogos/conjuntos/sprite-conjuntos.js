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
var spriteChao = new Sprite(8, 393, 853, 96);
var spriteJogar = new Sprite(869, 23, 324, 208);
var spritePerdeu = new Sprite(42, 518, 367, 394);
var spriteBola = new Sprite(869,275,390,420);
var spritePlacaMae = new Sprite(860,700,70,43);
var spriteMouse = new Sprite(970,700,50,45);
var spriteTeclado = new Sprite(1078,700,60,50);
var spriteHd = new Sprite(1188,700,50,70);