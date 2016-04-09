function Widget() {
    
    function buildDiv(){
    var div = document.createElement('div'); // Создали элемент.
    
    this.div = div;    
    
    div.style.width = '960px';
    div.style.height = '320px';
//    div.style.background = 'red';
    div.style.backgroundImage = 'url(1.jpg)'; // Первый элемент нашего пула картинок.
    div.style.backgroundRepeat = 'no-repeat';
    div.style.transition = 'all .4s ease-in-out';
    div.style.backgroundSize = '960px 320px'
        
    
    document.body.appendChild(div); // Разместили его в нашем документе
    
    };
    
    function buildCopyWright(){
        
    this.aElem = document.createElement('a');
        aElem.innerHTML = "Хотите быть самой красивой<br> в свой выпуской ?<br>Записаться и узнать стоимость, <br> вы можете по телефону ниже: <br>+7 (926) 511-11-01 (Анна)<br>";
        aElem.setAttribute('href', '#');
        aElem.className = 'linkUp';
    
    aElem.style.width = '360px'; // Тут требуется задать размеры 
    aElem.style.height = '70x'; // Тут требуется задать размеры 
    aElem.style.background = 'rgba(240, 15, 15, 0.69)';
    aElem.style.position = 'absolute';
    aElem.style.margin = '0px 10px 10px 580px';
    aElem.style.padding = '10px 10px 10px 10px';
    aElem.style.textAlign = 'center';
    aElem.style.fontSize = '16px';
//    aElem.style.borderRadius = '30px';
    aElem.style.borderBottomLeftRadius = '9px';
    aElem.style.textDecoration= 'none';
    aElem.style.color = "rgb(255, 255, 255)";
    aElem.style.fontFamily = "Georgia, 'Times New Roman', Times, serif";
    aElem.style.transition= 'all .4s ease-in-out';
    
        
        div.appendChild(aElem);
    };
    
    buildDiv(); // Раньше запускалась с аргументом makeArray()
    buildCopyWright(); // Вызвали копирайт
    
    div.onmouseover = function(event) {
        
        var target = event.target;
            console.log(target);
        if (target.className == 'linkUp') {
            aElem.style.background = 'rgba(233, 189, 190, 1)';
//            aElem.style.border = '15px dashed black';
//            outlineOffset = '4px dashed black';
//            aElem.style.borderBottom ='30px solid black';
//            aElem.style.borderLeft ='30px solid black';
//            aElem.style.rightWidth = '300px'
            aElem.style.fontSize = '20px';
        };
    }

    div.onmouseout = function(event) {
        
        var target = event.target;
        if (target.className == 'linkUp') {
            aElem.style.background = 'rgba(240, 15, 15, 0.69)';
            aElem.style.fontSize = '16px';
        };
    }
    function interval1(value, i) {
        div.style.backgroundImage = "url(" + i + ".jpg)";
        return int1 = setInterval(function(){
            i++;
            if (i === 6){ //
                i = 1;
            };
            
            div.style.backgroundImage = "url(" + i + ".jpg)";
        }, value);
    };
    
    interval1(4000, 1); //Параметры запуска слайдера;
};

var widget = new Widget();