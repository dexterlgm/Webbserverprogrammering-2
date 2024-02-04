let roundsCounter = document.querySelector('.rounds'),
    game = document.querySelector('.game'),
    wait = document.querySelector('.wait'),
    formbox = document.querySelector('.formbox'),
    roundNr = 1,
    firstRound = true,
    orderArr = [],
    orderSelected,
    correctC = 0,
    playerArr = [];

formbox.style.display = 'none';
wait.style.display = 'none';
game.style.pointerEvents = 'none';
function newGame(){
    document.querySelector('.newgame').style.display = "none";
    function orderCreate(){
        //Slumpar fram nummer från 1-4, dessa nummer är ordningen som färgerna kommer i
        for(let i = 0; i < 50; i++){
            const rndSelect = Math.floor(Math.random() * 4) + 1;
            switch(rndSelect){
                case 1:
                    orderSelected = "r";
                    break;
                case 2:
                    orderSelected = "g";
                    break;
                case 3:
                    orderSelected = "b";
                    break;
                case 4:
                    orderSelected = "y";
                    break;
            }
            orderArr.push(orderSelected);
        }
    }
    orderCreate();

    roundNr = 1;
    correctC = 0;
    roundsCounter.innerHTML = "Runda: "+ roundNr;
    var simonClick = document.querySelectorAll('.game > div');
    for(let i = 0; i < 4; i++){
        simonClick[i].addEventListener('click', clicked);
    }
    game.style.pointerEvents = 'none';

    //Visar färgerna för första rundan
    setTimeout(() => {
        colorFlash();
    }, 1000);
}

function clicked(){
    userChoice = this.className;
    playerArr.push(userChoice);

    function pauseAudio(colorTarget){
        setTimeout(() => {
            audio.pause(colorTarget);
            audio.currentTime = 0;
            colorTarget.setAttribute('id','');//Tar bort ID:t, färgen går tillbaka till va den var tidigare
            colorTarget = '';
        }, 400);
    }
    if(orderArr[correctC] != playerArr[correctC]){//Fel input från användaren
        incorrect();
    }else{//Rätt input från användaren
        let colorTarget = document.querySelector('.'+ orderArr[correctC]);
        colorTarget.setAttribute('id',orderArr[correctC]);//Färgen på tryckta knappen blir stark
        correctC += 1; //Ökar antalet korrekta gissningar
        var audio = document.getElementById(userChoice+"Sound");
        audio.volume = 0.80;
        audio.play();
        pauseAudio(colorTarget);//Stänger av ljudet från knappen samt ändrar tillbaka till originalfärgen 
    }
    if(correctC == roundNr){//Alla rundans krävda inputs är korrekta
        correct();
    }
}

function incorrect(){
    var audio = document.getElementById("incorrectSound");
    audio.volume = 0.10;
    audio.play();
    formbox.style.display = 'initial';
    game.style.pointerEvents = 'none';
}

function correct(){
    game.style.pointerEvents = 'none';//Användaren kan inte klicka på sidan medans nästa runda förbereds
    setTimeout(() => {
        pcTurn();
    }, 1200);
}

function flashSound(x){
    var audio = document.getElementById(orderArr[x]+"Sound");
    audio.volume = 0.80;
    audio.play();
}

function colorFlash(i){
    if(firstRound != true){
        if(++i <= playerArr.length){
            let colorTarget = document.querySelector('.'+ orderArr[i]);
            colorTarget.setAttribute('id',orderArr[i]);//Färgen blinkar
            flashSound(i);//Ljudet som tillhör färgen spelas upp
            setTimeout(() => {//Delay innan färgen stängs av
                colorTarget.setAttribute('id','');
                colorTarget = '';
                setTimeout(() => {//Delay innan nästa färg blinkar
                    colorFlash(i);//Funktionen körs om och om tills else-satsen under körs
                }, 400);
            }, 800);
        }else{//Körs när alla färger har blinkat
            playerArr = [];
            game.style.pointerEvents = 'auto';//Användaren kan klicka på sidan igen
            wait.style.display = "none";
        }
    }else{//Visar färgen för första rundan
        wait.style.display = "initial";//Visar "Vänta..." rutan
        let colorTarget = document.querySelector('.'+ orderArr[0]);
        colorTarget.setAttribute('id',orderArr[0]);//Knappen "blinkar"
        flashSound(0);//Spelar ljudet i index.php som tillhör färgen som lyser upp
        setTimeout(() => {
            colorTarget.setAttribute('id','');//Ändrar tillabaka till originalfärgen
            colorTarget = '';
        }, 800);
        playerArr = [];
        firstRound = false;//Detta kodblock kommer ej köras kommande rundorna
        setTimeout(() => {//Tar bort "Vänta..." rutan och tillåter användaren att klicka på färgerna
            game.style.pointerEvents = 'auto';
            wait.style.display = "none";
        }, 800);
    }
}

function pcTurn(){
    roundNr += 1;
    wait.style.display = "initial";//Visar "Vänta..." rutan
    correctC = 0;
    colorFlash(-1);
    roundsCounter.innerHTML = "Runda: "+ roundNr;//Uppdaterar texten för vilken runda man är på
}
document.querySelector('.newgame').addEventListener('click',newGame);