window.addEventListener('DOMContentLoaded',function(){

    let elPopUp=document.querySelector('[data-js-pop-up]')
    this.setTimeout(function() {
        if(elPopUp) elPopUp.classList.remove('mpp-pop-up--hidden')
    }, 1000);
})