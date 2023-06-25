function menuMovel() {
    const topoMenu = document.querySelector('.topo-cabecalho');
    const menu = document.querySelector('#menu');
    const imgMenu = document.querySelector('#menu .icon-menu');
    const menuUl = document.querySelector('#menu ul');

    let widthTela = window.innerWidth;

    if(widthTela > 767) {
        if(window.pageYOffset >= 8) {
            menu.classList.remove('menu');
            menu.classList.add('menu-movel');
            menu.classList.remove('menu-mobile');
            imgMenu.classList.add('d-none');
            menuUl.classList.remove('d-none');
        }else {
            menu.classList.remove('menu-movel');
            menu.classList.add('menu');
            menu.classList.remove('menu-mobile');
            imgMenu.classList.add('d-none')
            menuUl.classList.remove('d-none')
        }
    }

}

window.addEventListener('scroll', function() {
    menuMovel();
});


function menuMobile() {
    const menu = document.querySelector('#menu');
    const img = document.querySelector('.logo');
    const menuUl = document.querySelector('#menu ul');
    const btn = document.querySelector('.icon-menu');
    let widthTela = window.innerWidth;

    btn.addEventListener('click', function() {
        menuUl.classList.toggle('d-none');
    });

    if(widthTela < 767) {
        menuUl.classList.add('d-none');
        menu.classList.remove('menu');
        menu.classList.add('menu-mobile');

    }else {
        // menuUl.classList.add('d-none');
        menu.classList.remove('menu-mobile');
        menu.classList.add('menu');
    }


}

menuMobile();


// numbers

function numberSorteio(){
    const number = document.querySelectorAll('.number-cotas .number');
    const description = document.querySelectorAll('.number-cotas .description');

    number.forEach(function(item, index1) {
        item.addEventListener('mousemove', function() {
            description.forEach(function(element, index2) {
                if(index1 == index2) {
                    element.style.display = "block";
                }else {
                    element.style.display = "none";
                }
            });
        });
    });

}
numberSorteio();

