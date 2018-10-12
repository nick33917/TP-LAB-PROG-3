
//tsc --outfile ./javascript/funciones.js ./javascript/validacion
function AdministrarValidacionesLogin()
{
    AdministrarSpanError("spanDni",false);
    AdministrarSpanError("spanApellido",false);
    let rtn:boolean=true;
    if(!ValidarCamposVacios("txtApellido"))
    {
        //alert("El campo apellido esta vacio");
        AdministrarSpanError("spanApellido",true);
        rtn=false;
    }
    if(!ValidarCamposVacios("txtDni"))
    {
        //alert("El campo dni esta vacio");
        AdministrarSpanError("spanDni",true);
        rtn=false;
    }
    if(!ValidarRangoNumerico(parseInt((<HTMLInputElement> document.getElementById("txtDni")).value), 55000000, 1000000))
    {
        //alert("El campo dni no esta entre los rangos");
        AdministrarSpanError("spanDni",true);
        rtn=false;
    }
    if(rtn)
    {
        {
            (<HTMLFormElement>document.getElementById("formLogin")).submit();
            
        }

    }
   
}
function AdministrarModificar(dni:string)
{
    //alert("entrooo");
    (<HTMLInputElement> document.getElementById('idHidden')).value = dni;
    (<HTMLFormElement> document.getElementById('formMostrar')).submit();

}
function AdministrarValidaciones()
{
    AdministrarSpanError("spanArchivo",false);
    AdministrarSpanError("spanNombre",false);
    AdministrarSpanError("spanApellido",false);
    AdministrarSpanError("spanDni",false);
    AdministrarSpanError("spanLegajo",false);
    AdministrarSpanError("spanSexo",false);
    AdministrarSpanError("spanSueldo",false);
    AdministrarSpanError("spanArchivo",false);
    let rtn:boolean=true;
    if(ValidarCamposVacios("txtNombre") == false)
    {
        //alert("El campo nombre esta vacio");
        AdministrarSpanError("spanNombre",true);
        rtn=false;
        
    }

    if(!ValidarCamposVacios("txtApellido"))
    {
        //alert("El campo apellido esta vacio");
        AdministrarSpanError("spanApellido",true);
        rtn=false;
    }
    if(!ValidarCamposVacios("txtDni"))
    {
        //alert("El campo dni esta vacio");
        AdministrarSpanError("spanDni",true);
        rtn=false;
    }
    
    if(!ValidarRangoNumerico(parseInt((<HTMLInputElement> document.getElementById("txtDni")).value), 55000000, 1000000))
    {
        //alert("El campo dni no esta entre los rangos");
        AdministrarSpanError("spanDni",true);
        rtn=false;
    }

    if(!ValidarCamposVacios("txtLegajo"))
    {
        //alert("El campo legajo esta vacio");
        AdministrarSpanError("spanLegajo",true);
        rtn=false;
    }
    
    if(!ValidarRangoNumerico(parseInt((<HTMLInputElement> document.getElementById("txtLegajo")).value), 550, 100))
    {
        // alert("El campo legajo no esta entre los rangos");
        AdministrarSpanError("spanLegajo",true);
         rtn=false;
    }

    if(!ValidarCombo("cboSexo","---"))
    {
        //alert("El campo Sexo no esta bien seleccionado");
        AdministrarSpanError("spanSexo",true);
        rtn=false;
        
    }
    if(!ValidarCamposVacios("txtSueldo"))
    {
        //alert("El campo sueldo esta vacio");
        AdministrarSpanError("spanSueldo",true);
        rtn=false;
    }

    if(ValidarRangoNumerico(parseInt((<HTMLInputElement> document.getElementById("txtSueldo")).value),ObtenerSueldoMaximo(ObtenerTurnoSeleccionado()),8000) == false)
    {
        //alert("El campo Sueldo no esta entre los rangos");
        AdministrarSpanError("spanSueldo",true);
        rtn=false;
    }
    if(!ValidarCamposVacios("txtArchivo"))
    {
        //alert("El campo nombre esta vacio");
        AdministrarSpanError("spanArchivo",true);
        rtn=false;
        
    }
    if(rtn)
    {
        (<HTMLFormElement>document.getElementById("formIngreso")).submit();
        
    }
}
function AdministrarSpanError(span:string,flag:boolean):void
{
    if(flag)
    {
        //(<HTMLSpanElement> document.getElementById(span)).style.color = "red";
        (<HTMLSpanElement> document.getElementById(span)).style.display = "block";
    }
    else
    {
        (<HTMLSpanElement> document.getElementById(span)).style.display = "none";

    }

}
function ValidarCamposVacios(id:string):boolean
{
    let comprobar:string = (<HTMLInputElement>document.getElementById(id)).value;
    let rtn:boolean = false;
    if(comprobar != "")
    {
        rtn=true;
        
    }
    return rtn;
}

function ValidarRangoNumerico(valor:number, max:number, min:number):boolean
{
    let rtn:boolean = false;
    if(valor>=min && valor<=max)
    {
        rtn=true;
    }
    return rtn;
}
function ValidarCombo(id:string,valorErroneo:string):boolean
{
    let sexo:string = (<HTMLInputElement> document.getElementById(id)).value;
    let rtn:boolean = false;
    if(sexo != valorErroneo)
    {
        rtn=true;
    } 
    return rtn;
}
function ObtenerTurnoSeleccionado(): string
{
    let radios : any = document.getElementsByName("rdoTurno");
    let rtn:string="";
    for (var i = 0, length = radios.length; i < length; i++)
    {
        if (radios[i].checked)
        {
            rtn = radios[i].value;
            break;
        }
    }
    
    return rtn;
}

function ObtenerSueldoMaximo(turno:string): number
{
    let rtn = 0;
    switch (turno)
    {
        case "mañana":
            rtn=20000;
            break;
        case "tarde":
            rtn=18500;
            break;
        case "noche":
            rtn=25000;
            break;
    }
    return rtn;
}
//tsc --outfile ./javascript/funciones.js ./javascript/validacion

