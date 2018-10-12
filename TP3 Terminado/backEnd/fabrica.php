<?php
include_once "./empleado.php";
include_once "./interfaces.php";
class Fabrica implements IArchivo
{
    private $_cantidadMaxima;
    private $_empleados;
    private $_razonSocial;

    public function __construct($razonSocial="",$cantidadMaxima=5,$empleados=array())
    {
        $this->_razonSocial = $razonSocial;
        $this->_empleados = $empleados;
        $this->_cantidadMaxima = $cantidadMaxima;
    }

    public function AgregarEmpleado($emp)
    {
        $rtn = false;
        if(count($this->_empleados) < $this->_cantidadMaxima)
        {
            array_push($this->_empleados,$emp);
            $rtn=true;
        }
        $this->_empleados = $this->EliminarEmpleadoRepetido();
        return $rtn;
    }

    public function CalcularSueldos()
    {
        $sueldos=0;
        foreach($this->_empleados as $emp)
        {
            $sueldos .= $emp->GetSueldo();
        }
        return $sueldos;
    }
    public function EliminarEmpleado($emp)
    {
        $rtn = false;
        for($i=0;$i<count($this->_empleados);$i++)
        {
            if($this->_empleados[$i]->GetDni() === $emp->GetDni())
            {
                unlink($this->_empleados[$i]->GetPathFoto());
                unset($this->_empleados[$i]);
                $rtn = true;
                break;
            }
        }
        return $rtn;
    }
    private function EliminarEmpleadoRepetido()
    {
        return array_unique($this->_empleados,SORT_REGULAR);
    }

    public function ToString()
    {
        $cadena = $this->_razonSocial."-".$this->_cantidadMaxima."-";
        foreach($this->_empleados as $empl)
        {
            $cadena.=$empl->ToString();
        }
        return $cadena;
    }
    public function GetEmpleados()
    {
        return $this->_empleados;
    }
    public function TraerDeArchivo($nombreArchivo)
    {
        $archivo = fopen($nombreArchivo,"r");
        while(!feof($archivo))
        {
            $archAux = fgets($archivo);
            $archAux = trim($archAux);
            $cadena = explode("-",$archAux);
            if(count($cadena)>1)
            {
                $empl = new Empleado($cadena[0],$cadena[1],$cadena[2],$cadena[3],$cadena[4],$cadena[5],$cadena[6]);
                $empl->SetPathFoto($cadena[7]);
                $this->AgregarEmpleado($empl);
                
            }

        }
        fclose($archivo);
    }

    public function GuardarEnArchivo($nombreArchivo)
    {
        $archivo = fopen($nombreArchivo,"w");
        $cadena="";
        foreach($this->_empleados as $empl)
        {
            $cadena.=$empl->ToString()."\r\n";
        }
        fwrite($archivo,$cadena);
        fclose($archivo);

    }
}

