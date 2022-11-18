const Clickbutton = document.querySelectorAll('.button')
//queryselectoall permite  obtener alguna clase  o id , en este caso usamos ALL por que existen varios tipos button
const tbody = document.querySelector('.tbody')
//variable que sera renderizada
let carrito = []
//recorre la matriz 
Clickbutton.forEach(btn => {
  btn.addEventListener('click', addToCarritoItem)
})
//capturamos el evento clip 

//creamos una funcion para cada vez que hagamos click se agregue al carrito 
function addToCarritoItem(e){
  const button = e.target
  //obtiene el contenedor de la clase padre del producto(button) "card"
  const item = button.closest('.card')
  //obtenemos el contenido del queryselector 
  const itemTitle = item.querySelector('.card-title').textContent;
  const itemPrice = item.querySelector('.precio').textContent;
  const itemImg = item.querySelector('.card-img-top').src;
  //creamos constante para el new carrito y se crean los objteos 
  const newItem = {
    title: itemTitle,
    precio: itemPrice,
    img: itemImg,
    cantidad: 1
  }
//la nueva constante recientemente creada la pasamos a la funcion
  addItemCarrito(newItem)
}


function addItemCarrito(newItem){

  
  const alert = document.querySelector('.alert')
//alerta al agregar  un producto por 2 segundos
  setTimeout( function(){
    alert.classList.add('hide')
  }, 2000)
    alert.classList.remove('hide')

  const InputElemnto = tbody.getElementsByClassName('input__elemento')
  //acumulador de cantidad del mismo producto (tbody)
  //en caso de se recorre el carrito 
  for(let i =0; i < carrito.length ; i++){
    if(carrito[i].title.trim() === newItem.title.trim()){
      // al ser click varias veces en el mismo producto  se va sumando 
      carrito[i].cantidad ++;
      const inputValue = InputElemnto[i]
      inputValue.value++;
      CarritoTotal()
      //return null para que solo se ejecute la funcion y no los demas renderizados 
      return null;
    }
  }

  carrito.push(newItem)

  renderCarrito()
} 

//renderizamos las variables del carrito 
function renderCarrito(){
//cada vez que se ejecute este vacio
  tbody.innerHTML = ''
  //.map por que no se hara ningun cambio
  carrito.map(item => {
  //creamos un elemento (parte de la tabla)
    const tr = document.createElement('tr')
  //creamos una clase 
    tr.classList.add('ItemCarrito')
  //creamos el contenido tr
    const Content = `

    <th scope="row">1</th>
            <td class="table__productos">
              <img src=${item.img}  alt="">
              <h6 class="title">${item.title}</h6>
            </td>
            <td class="table__price"><p>${item.precio}</p></td>
            <td class="table__cantidad">
              <input type="number" min="1" value=${item.cantidad} class="input__elemento">
              <button class="delete btn btn-danger">x</button>
            </td>
    
    `
    //anteriormente al contenido  en los parametros se le incluyo las varibles del  carrito ($item.img,$item.title,$item.precio,$item.cantidad)

    
    //dentro del tr creado se agregue el contenido
    tr.innerHTML = Content;
    //en tbody se inserta el tr
    tbody.append(tr)

   //llama alas funciones
    tr.querySelector(".delete").addEventListener('click', removeItemCarrito)
    tr.querySelector(".input__elemento").addEventListener('change', sumaCantidad)
  })
  CarritoTotal()
}

function CarritoTotal(){
  let Total = 0;
  //creamos constante para la variable total
  const itemCartTotal = document.querySelector('.itemCartTotal')//segun la clase total
  //carrito se encuentra en item asi recorra la matriz ( foreach)
  carrito.forEach((item) => {
    //creamos constante precio para la variable total
    const precio = Number(item.precio.replace("$", ''))
    Total = Total + precio*item.cantidad
  })
//se inserta 
  itemCartTotal.innerHTML = `Total $${Total}`
  //guarda
  addLocalStorage()
}

function removeItemCarrito(e){
  //crea constante buttondelete
  const buttonDelete = e.target
  //obtiene la clase padre para el buttondelete
  const tr = buttonDelete.closest(".ItemCarrito")
  const title = tr.querySelector('.title').textContent;
  //recorre la matriz
  for(let i=0; i<carrito.length ; i++){
//.trim ya que no sabemos los valores que se encuentra 
    if(carrito[i].title.trim() === title.trim()){
      carrito.splice(i, 1)
    }
  }

  const alert = document.querySelector('.remove')

  //alerta al remover un producto por 2 segundos 
  setTimeout( function(){
    alert.classList.add('remove')
  }, 2000)
    alert.classList.remove('remove')

  tr.remove()
  CarritoTotal()
}
//creamos funcion
function sumaCantidad(e){
  const sumaInput  = e.target
  const tr = sumaInput.closest(".ItemCarrito")
  const title = tr.querySelector('.title').textContent;
  carrito.forEach(item => {

//recorremos matriz
    if(item.title.trim() === title){
  ////si es menor a -1 no se ejecuta la suma  y  si no se ejecuta normal
      sumaInput.value < 1 ?  (sumaInput.value = 1) : sumaInput.value;
      item.cantidad = sumaInput.value;
      CarritoTotal()
    }
  })
}
//guardar los valores en el navegador
function addLocalStorage(){
  localStorage.setItem('carrito', JSON.stringify(carrito))
}

window.onload = function(){
  const storage = JSON.parse(localStorage.getItem('carrito'));
  if(storage){
    carrito = storage;
    renderCarrito()
  }
}