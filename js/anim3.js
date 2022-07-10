let animado = document.querySelectorAll(".animado");
function mostrarScroll() {
    let scrollTop = document.documentElement.scrollTop;
    for (i=0; i<animado.length;++i){
        let alturaAnimado = animado[i].offsetTop;
        if (alturaAnimado -500 < scrollTop) {
            animado[i].style.opacity =1;
            animado[i].classList.add("mostrarArriba")
        }
    }
}
window.addEventListener('scroll',mostrarScroll)

let animado1 = document.querySelectorAll(".animado1");
    for (i=0; i<animado1.length;++i){
            animado1[i].style.opacity =1;
            animado1[i].classList.add("mostrarArriba")
        }
window.addEventListener('scroll',mostrarScroll)