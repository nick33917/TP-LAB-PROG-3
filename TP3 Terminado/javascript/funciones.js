//tsc --outfile ./javascript/funciones.js ./javascript/validacion
function AdministrarValidacionesLogin() {
    AdministrarSpanError("spanDni", false);
    AdministrarSpanError("spanApellido", false);
    var rtn = true;
    if (!ValidarCamposVacios("txtApellido")) {
        //alert("El campo apellido esta vacio");
        AdministrarSpanError("spanApellido", true);
        rtn = false;
    }
    if (!ValidarCamposVacios("txtDni")) {
        //alert("El campo dni esta vacio");
        AdministrarSpanError("spanDni", true);
        rtn = false;
    }
    if (!ValidarRangoNumerico(parseInt(document.getElementById("txtDni").value), 55000000, 1000000)) {
        //alert("El campo dni no esta entre los rangos");
        AdministrarSpanError("spanDni", true);
        rtn = false;
    }
    if (rtn) {
        {
            document.getElementById("formLogin").submit();
        }
    }
}
function AdministrarModificar(dni) {
    //alert("entrooo");
    document.getElementById('idHidden').value = dni;
    document.getElementById('formMostrar').submit();
}
function AdministrarValidaciones() {
    AdministrarSpanError("spanArchivo", false);
    AdministrarSpanError("spanNombre", false);
    AdministrarSpanError("spanApellido", false);
    AdministrarSpanError("spanDni", false);
    AdministrarSpanError("spanLegajo", false);
    AdministrarSpanError("spanSexo", false);
    AdministrarSpanError("spanSueldo", false);
    AdministrarSpanError("spanArchivo", false);
    var rtn = true;
    if (ValidarCamposVacios("txtNombre") == false) {
        //alert("El campo nombre esta vacio");
        AdministrarSpanError("spanNombre", true);
        rtn = false;
    }
    if (!ValidarCamposVacios("txtApellido")) {
        //alert("El campo apellido esta vacio");
        AdministrarSpanError("spanApellido", true);
        rtn = false;
    }
    if (!ValidarCamposVacios("txtDni")) {
        //alert("El campo dni esta vacio");
        AdministrarSpanError("spanDni", true);
        rtn = false;
    }
    if (!ValidarRangoNumerico(parseInt(document.getElementById("txtDni").value), 55000000, 1000000)) {
        //alert("El campo dni no esta entre los rangos");
        AdministrarSpanError("spanDni", true);
        rtn = false;
    }
    if (!ValidarCamposVacios("txtLegajo")) {
        //alert("El campo legajo esta vacio");
        AdministrarSpanError("spanLegajo", true);
        rtn = false;
    }
    if (!ValidarRangoNumerico(parseInt(document.getElementById("txtLegajo").value), 550, 100)) {
        // alert("El campo legajo no esta entre los rangos");
        AdministrarSpanError("spanLegajo", true);
        rtn = false;
    }
    if (!ValidarCombo("cboSexo", "---")) {
        //alert("El campo Sexo no esta bien seleccionado");
        AdministrarSpanError("spanSexo", true);
        rtn = false;
    }
    if (!ValidarCamposVacios("txtSueldo")) {
        //alert("El campo sueldo esta vacio");
        AdministrarSpanError("spanSueldo", true);
        rtn = false;
    }
    if (ValidarRangoNumerico(parseInt(document.getElementById("txtSueldo").value), ObtenerSueldoMaximo(ObtenerTurnoSeleccionado()), 8000) == false) {
        //alert("El campo Sueldo no esta entre los rangos");
        AdministrarSpanError("spanSueldo", true);
        rtn = false;
    }
    if (!ValidarCamposVacios("txtArchivo")) {
        //alert("El campo nombre esta vacio");
        AdministrarSpanError("spanArchivo", true);
        rtn = false;
    }
    if (rtn) {
        document.getElementById("formIngreso").submit();
    }
}
function AdministrarSpanError(span, flag) {
    if (flag) {
        //(<HTMLSpanElement> document.getElementById(span)).style.color = "red";
        document.getElementById(span).style.display = "block";
    }
    else {
        document.getElementById(span).style.display = "none";
    }
}
function ValidarCamposVacios(id) {
    var comprobar = document.getElementById(id).value;
    var rtn = false;
    if (comprobar != "") {
        rtn = true;
    }
    return rtn;
}
function ValidarRangoNumerico(valor, max, min) {
    var rtn = false;
    if (valor >= min && valor <= max) {
        rtn = true;
    }
    return rtn;
}
function ValidarCombo(id, valorErroneo) {
    var sexo = document.getElementById(id).value;
    var rtn = false;
    if (sexo != valorErroneo) {
        rtn = true;
    }
    return rtn;
}
function ObtenerTurnoSeleccionado() {
    var radios = document.getElementsByName("rdoTurno");
    var rtn = "";
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            rtn = radios[i].value;
            break;
        }
    }
    return rtn;
}
function ObtenerSueldoMaximo(turno) {
    var rtn = 0;
    switch (turno) {
        case "mañana":
            rtn = 20000;
            break;
        case "tarde":
            rtn = 18500;
            break;
        case "noche":
            rtn = 25000;
            break;
    }
    return rtn;
}
//tsc --outfile ./javascript/funciones.js ./javascript/validacion
