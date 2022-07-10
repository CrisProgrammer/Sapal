const numero_deptos=document.getElementById('numero_deptos')
let cantidad_deptos=0
let tiempo1=setInterval(()=>{
 cantidad_deptos+=1
 numero_deptos.textContent=cantidad_deptos
 if (cantidad_deptos===4){
    clearInterval(tiempo1)
 }
},980)

const numero_prod=document.getElementById('numero_prod')
let cantidad_prod=0
let tiempo2=setInterval(()=>{
 cantidad_prod+=1
 numero_prod.textContent=cantidad_prod
 if (cantidad_prod===150){
    clearInterval(tiempo2)
 }
},30)

const numero_prov=document.getElementById('numero_prov')
let cantidad_prov=0
let tiempo3=setInterval(()=>{
 cantidad_prov+=1
 numero_prov.textContent=cantidad_prov
 if (cantidad_prov===8){
    clearInterval(tiempo3)
 }
},830)

const numero_farma=document.getElementById('numero_farma')
let cantidad_farma=0
let tiempo4=setInterval(()=>{
 cantidad_farma+=1
 numero_farma.textContent=cantidad_farma
 if (cantidad_farma===180){
    clearInterval(tiempo4)
 }
},25)