<?php
//optencion  de las fechas requeridas
    $fecha_Ini = $_POST['fecha_inicio'];
    $fecha_Fin = $_POST['fecha_final'];

    $arr = [];
//asignacio  de digitos  a las variables dia año mes

    $anio_ini=date("Y",strtotime($fecha_Ini));
    $mes_ini=date("m",strtotime($fecha_Ini));
    $dia_ini=date("d",strtotime($fecha_Ini));

    $anio_Fin=date("Y",strtotime($fecha_Fin));
    $mes_Fin=date("m",strtotime($fecha_Fin));
    $dia_Fin=date("d",strtotime($fecha_Fin));


//se quita el cero de los valores menores a 10
if($mes_ini<10){
    $mes=str_replace(array(0),"", $mes_ini);
}else{
    $mes=$mes_ini;
}

//se inicializan las variables de los ciclo 
    $i=$anio_ini;
    
    $j=$mes;
    
    $diaIni=01;

    
// se inicia el ciclo del año

    while($i<=$anio_Fin){
        
//validacion del ultimo mes        
        if($i==$anio_Fin){
            $meses=$mes_Fin + 1;
        }else{
            $meses=13;
        }
        // var_dump($array_anio);
// se inicia el ciclo de los meses
        for($j; $j<$meses; $j++){
            
            switch($j){
            
                case 1:
                    $mount="ENERO";
                    $diaFin=31;
                break;
                
                case 2:
                    $mount="FEBREO";
                    //validacion de año biciesto
                    if(($i%4 == 0 && $i%100 != 0) || $i%400 == 0){
                        $diaFin=29;
                    }else{
                        $diaFin=28;
                    };
                break;

                case 3:
                    $mount="MARZO";
                    $diaFin=31;
                break; 

                case 4:
                    $mount="ABRIL";
                    $diaFin=31;
                break; 

                case 5:
                    $mount="MAYO";
                    $diaFin=30;
                break;

                case 6:
                    $mount="JUNIO";
                    $diaFin=30;
                break;

                case 7:
                    $mount="JULIO";
                    $diaFin=31;
                break;

                case 8:
                    $mount="AGOSTO";
                    $diaFin=31;
                break;

                case 9:
                    $mount="SEPTIEMBRE";
                    $diaFin=30;
                break;

                case 10:
                    $mount="OCTUBRE";   
                    $diaFin=31;
                break;

                case 11:
                    $mount="NOVIEMBRE";
                    $diaFin=31;
                break;

                case 12:
                    $mount="DICIEMBRE";
                    $diaFin=31;
                break;
            }
                $fecha_F = fecha_inic($diaFin, $j, $i);
                $fecha_i = fecha_inic($diaIni, $j, $i);
                $fecha = fecha($mount, $i);
                array_push($arr,[$fecha_F, $fecha_i, $fecha]);
            //var_dump($fecha);
        }

      $j=1;
      $i++;
    }
     echo json_encode($arr);

     //funciones de formato
    function fecha_inic($dia, $j, $i){
        $year=strval($i);
        if($j<10){
            $mounts=strval($j);
            $m="0".$mounts;
        }else{
            $m=$mounts=strval($j);
        }
        

        if($dia==1){
            $d="01";
        }else{
            $d=strval($dia);
        }
        

        $fecha1 = $year."-".$m. "-". $d;
        return $fecha1;
    }

    function fecha($mount, $i){  
        $year=strval($i);
        $fecha1=$mount . " " . $year;
        return $fecha1;
    }

?>