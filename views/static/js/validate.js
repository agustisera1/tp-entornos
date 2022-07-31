// let fechaHoraInicio = document.getElementById("inputFechaHoraInicio")
// let fechaHoraFin = document.getElementById("inputFechaHoraFin")
// let materia = document.getElementById("materia")
// let profesor = document.getElementById("profesor")
// let enviar = document.getElementById("inputEnviar")
// let agregar = document.getElementById("agregar")

// let nombre = document.getElementById("inputNombre")
// let apellido = document.getElementById("inputApellido")
// let email = document.getElementById("inputEmail")
// let legajo = document.getElementById("inputLegajo")
// let asunto = document.getElementById("inputAsunto")
// let consulta = document.getElementById("inputConsulta")
// let password = document.getElementById("inputPassword")
// let iniciarSesion = document.getElementById("iniciarSesion")
// let register = document.getElementById("register")


// if(register != null){
//   register.addEventListener("click", ($event) => {
//     if(nombre.value.length == 0 || email.value.length == 0 || apellido.value.length == 0 || legajo.value.length == 0 || password.value.length == 0){
//       $event.preventDefault()
//       alert("Faltan rellenar campos")
//     }
//   })
// }

// if(iniciarSesion != null){
//   iniciarSesion.addEventListener("click", ($event) => {
//     if(legajo.value.length == 0 || password.value.length == 0){
//       $event.preventDefault()
//       alert("Faltan rellenar campos")
//     }
//   })
// }

// if (agregar != null) {
//   agregar.addEventListener("click", ($event) => {
//     console.log(profesor.value == "Seleccione un profesor")
//     if (fechaHoraInicio.value == "" || fechaHoraFin.value == "" || materia.value == "Seleccione una materia" || profesor.value == "Seleccione un profesor") {
//       $event.preventDefault()
//       alert("Faltan rellenar campos")
//     }
//   })
// }

const removeError = (inputFields) => {
  for (const inputField of inputFields) {
    const formField = inputField.field.parentElement;
    const smallTag = formField.querySelector("small");
    const inputTag = formField.querySelector("input");
    if (inputTag) {
      inputTag.style.border = null;
    }
    if (smallTag) {
      smallTag.textContent = '';
    }
  }
}

const showError = (inputField, message) => {
  const formField = inputField.parentElement;
  const smallTag = formField.querySelector("small");
  const inputTag = formField.querySelector("input");
  if (inputTag) {
    inputTag.style.border = "2px solid red";
  }
  if (smallTag) {
    smallTag.textContent = message;
  }
}

const validateRequiredFields = (inputFields) => {
  let valid = true;
  for (const inputField of inputFields) {
    if (inputField.field.value === '') {
      showError(inputField.field, inputField.message);
      valid = false;
    }
  }
  return valid;

}

const validatePassword = (password) => {
  let regex = new RegExp('(?=.*[A-Za-z0-9])(?!.*[!@#$%^&*])(?=.{6,})');
  return regex.test(password);
}

const validateConfirmPassword = (password, confirmPassword) => {
  if (password === confirmPassword) {
    return true;
  }
  return false;
}

const validateLegajo = (legajo) => {
  let regex = new RegExp('(?=.*[0-9])(?!.*[!@#$%^&*])(?=.{4,5})');
  return regex.test(legajo);
}