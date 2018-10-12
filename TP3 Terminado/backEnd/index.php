<?php
        session_start();
        include_once "./validarSesion.php";
        include_once "./empleado.php";
        include_once "./fabrica.php";

        $hayDni=false;

        if(isset($_POST["DNIEmpleado"]))
        {
                
                $hayDni=true;
                $objFabrica = new Fabrica();
                $empleado="";
                $objFabrica->TraerDeArchivo("../archivos/empleados.txt");
                foreach($objFabrica->GetEmpleados() as $empl)
                {
                        if($empl->GetDni() == $_POST["DNIEmpleado"])
                        {
                                $empleado=$empl;
                        }
                }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../javascript/funciones.js"></script>
    <title>
        <?php
        if($hayDni)
        {
                echo "HTML5 Formulario Modificar Empleado"; 
        }
        else
        {
                echo "HTML5 Formulario Alta Empleado"; 
        }
        ?>
    </title>
</head>
<body>
    <form action="./administracion.php" method="POST" enctype="multipart/form-data" id="formIngreso">
    <h2>
        <?php
        if($hayDni)
        {
                echo "Modificar Empleado"; 
        }
        else
        {
                echo "Alta de Empleados"; 
        }
        ?>
    </h2>
    <table border="0" align="center">
        <tr>
            <td>&nbsp;</td>
            <td colspan=2><h4>Datos Personales</h4></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td colspan=2><hr></td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>DNI:</td>
                <td><input type="number" id="txtDni" name="txtDni" size="8" min="1000000" max="55000000" value=<?php echo ($hayDni) ? $empleado->GetDni() : "" ?>
                <?php echo ($hayDni) ? "readonly=readonly" : "" ?>><span style="display:none" id="spanDni">*</span></td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>Apellido:</td>
                <td><input type="text" id="txtApellido" name="txtApellido" value=<?php echo ($hayDni) ? $empleado->GetApellido() : "" ?>><span style="display:none" id="spanApellido">*</span></td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>Nombre:</td>
                <td><input type="text" id="txtNombre" name="txtNombre" value=<?php echo ($hayDni) ? $empleado->GetNombre() : "" ?>><span style="display:none" id="spanNombre">*</span></td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>Sexo:</td>
                <td><select id="cboSexo" name="cboSexo">
                <option
                        value="M" 
                        <?php if($hayDni && $empleado->getSexo() == "M")
                        {
                            echo "selected";
                        }?>>Masculino
                     </option>
                      <option
                        value="F" 
                        <?php if($hayDni && $empleado->getSexo() == "F")
                        {
                            echo "selected";
                        }?>>Femenino
                     </option>
                     <option
                        value="---" 
                        <?php if(!$hayDni)
                        {
                            echo "selected";
                        }?>>Seleccione
                     </option>
                    </select><span style="display:none" id="spanSexo">*</span>
                </td>   
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td colspan=2><h4>Datos Laborales</h4></td>
                <td>&nbsp;</td>
            </tr>
        <tr>
                <td>&nbsp;</td>
                <td colspan=2><hr></td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>Legajo:</td>
                <td><input type="number" id="txtLegajo" name="txtLegajo" size="3" min="100" max="550" value=<?php echo ($hayDni) ? $empleado->GetLegajo() : "" ?>
                <?php echo ($hayDni) ? "readonly=readonly" : "" ?>><span style="display:none" id="spanLegajo">*</span></td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>Sueldo:</td>
                <td><input type="number" id="txtSueldo" name="txtSueldo" min="8000" step="500" max="25000" value=<?php echo ($hayDni) ? $empleado->GetSueldo() : "" ?>><span style="display:none" id="spanSueldo">*</span></td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>Turno:</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="radio"  name="rdoTurno" value="mañana" 
                        <?php if($hayDni && $empleado->GetTurno() == "mañana" || (!$hayDni))
                        {
                                echo "checked";
                        }?>>Mañana <br>
                    <input type="radio"  name="rdoTurno" value="tarde"
                        <?php if($hayDni && $empleado->GetTurno() == "tarde")
                        {
                                echo "checked";
                        }?>>Tarde <br>
                    <input type="radio"  name="rdoTurno" value="noche"
                        <?php if($hayDni && $empleado->GetTurno() == "noche")
                        {
                                echo "checked";
                        }?>>Noche <br>
                </td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>Foto:</td>
                <td><input type="file" name="archivo" id="txtArchivo"></td>
                <td><span style="display:none" id="spanArchivo">*</span></td>
        </tr>        
        <?php
        if($hayDni)
        {
                echo '<input type="hidden" name="hdnModificar" id="hdnModificar" value='.$empleado->GetDni().'>';
        }
        ?>
        <tr>
                <td>&nbsp;</td>
                <td colspan=2><hr></td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input type="reset" value="Limpiar"></td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input type="button" onclick="AdministrarValidaciones()" value="<?php echo ($hayDni) ? 'Modificar' : 'Enviar' ?>"></td>
                <td>&nbsp;</td>
        </tr>
        
       <!--onclick="AdministrarValidaciones()"-->
    </table>
    <a href='./cerrarSesion.php'>Desloguiarme</a>
        
    </form>
</body>
</html>