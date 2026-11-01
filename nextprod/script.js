const b=document.querySelector('.menu');
b.addEventListener('click',()=>{const o=document.querySelector('.navlinks').classList.toggle('open');b.setAttribute('aria-expanded',o);b.setAttribute('aria-label',o?b.dataset.close:b.dataset.open)});
