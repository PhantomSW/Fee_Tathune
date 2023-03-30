var image = 1;

function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-mode");
    const b1 = document.getElementById('button1');
    const b2 = document.getElementById('button2');
    const mid = document.getElementById('continue');
    const tab = document.getElementsByName('th');
    tab.classList.toggle('dark-mode');
    b1.classList.toggle('dark-mode');
    b2.classList.toggle('dark-mode');
    mid.classList.toggle('dark-mode');

    if(image==1) {
        document.getElementById('galerie').src = "images/continueAvecBlanc.png";
        image = 0;
    } else {
        document.getElementById('galerie').src = "images/continueAvecNoir.png";
        image = 1;
    }
}

function openNav() {
    document.getElementById("sidenav").style.width = "180px";
  }
  
  function closeNav() {
    document.getElementById("sidenav").style.width = "0";
  }
  