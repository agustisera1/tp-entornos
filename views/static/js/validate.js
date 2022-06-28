let fechaHoraInicio = document.getElementById("inputFechaHoraInicio") 
let fechaHoraFin = document.getElementById("inputFechaHoraFin") 
let materia = document.getElementById("materia") 
let profesor = document.getElementById("profesor")
let enviar = document.getElementById("inputEnviar")
let agregar = document.getElementById("agregar")

let nombre = document.getElementById("inputNombre")
let apellido = document.getElementById("inputApellido")
let email = document.getElementById("inputEmail")
let legajo = document.getElementById("inputLegajo")
let asunto = document.getElementById("inputAsunto")
let consulta = document.getElementById("inputConsulta")
let password = document.getElementById("inputPassword")
let iniciarSesion = document.getElementById("iniciarSesion")
let register = document.getElementById("register")


if(register != null){
  register.addEventListener("click", ($event) => {
    if(nombre.value.length == 0 || email.value.length == 0 || apellido.value.length == 0 || legajo.value.length == 0 || password.value.length == 0){
      $event.preventDefault()
      alert("Faltan rellenar campos")
    }
  })
}

if(iniciarSesion != null){
  iniciarSesion.addEventListener("click", ($event) => {
    if(legajo.value.length == 0 || password.value.length == 0){
      $event.preventDefault()
      alert("Faltan rellenar campos")
    }
  })
}

if(agregar != null){  
  agregar.addEventListener("click", ($event) => {
  console.log(profesor.value == "Seleccione un profesor")
  if(fechaHoraInicio.value == "" || fechaHoraFin.value == "" || materia.value == "Seleccione una materia" || profesor.value == "Seleccione un profesor") {
      $event.preventDefault()
      alert("Faltan rellenar campos")
  }
  })
}