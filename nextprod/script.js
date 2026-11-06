const b=document.querySelector('.menu');
b.addEventListener('click',()=>{const o=document.querySelector('.navlinks').classList.toggle('open');b.setAttribute('aria-expanded',o);b.setAttribute('aria-label',o?b.dataset.close:b.dataset.open)});
const pj=document.querySelector('.projects');
if(pj){const ls=[...pj.querySelectorAll('a.lightbox')];let cur=0;
const box=document.createElement('div');box.className='lb';box.hidden=true;
box.innerHTML='<button class="lb-x" aria-label="'+pj.dataset.close+'">×</button><button class="lb-p" aria-label="'+pj.dataset.prev+'">‹</button><figure><img alt=""><figcaption></figcaption></figure><button class="lb-n" aria-label="'+pj.dataset.next+'">›</button>';
document.body.appendChild(box);const im=box.querySelector('img'),cap=box.querySelector('figcaption');
const show=i=>{cur=(i+ls.length)%ls.length;const a=ls[cur];im.src=a.href;im.alt=a.querySelector('img').alt;cap.textContent=a.parentNode.querySelector('figcaption').textContent;box.hidden=false;document.body.style.overflow='hidden'};
const close=()=>{box.hidden=true;document.body.style.overflow=''};
ls.forEach((a,i)=>a.addEventListener('click',e=>{e.preventDefault();show(i)}));
box.addEventListener('click',e=>{if(e.target===box||e.target.classList.contains('lb-x'))close();else if(e.target.classList.contains('lb-p'))show(cur-1);else if(e.target.classList.contains('lb-n'))show(cur+1)});
document.addEventListener('keydown',e=>{if(box.hidden)return;if(e.key==='Escape')close();if(e.key==='ArrowLeft')show(cur-1);if(e.key==='ArrowRight')show(cur+1)});}
