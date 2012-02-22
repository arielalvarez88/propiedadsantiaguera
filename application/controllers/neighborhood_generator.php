<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Neighborhood_generator extends CI_Controller {

    public function index() {
        
phpinfo();
die;
        
        
        
        $replace_string = <<<EOD
24 De Abril
27 De Febrero
Agua Dulce
Aguedita, Reparto
Alameda
Altagracia Morales
Altos de Arroyo Hondo II
Altos de Arroyo Hondo III
Altos De La Pradera, Urbanización
Antillas
Arroyo Hondo
Arroyo Hondo Viejo
Atala
Atarazana
Bella Vista
Borojo
Buenos Aires
Capotillo
Caridad
Carmelita
Centro de los Heroes
Cerros Arroyo Hondo III
Cerros de Arroyo Hondo
Ciudad Moderna
Ciudad Nueva
Ciudad Universitaria
Costa Brava
Cuesta Hermosa I
Cuesta Hermosa II
Cuesta Hermosa III
Domingo Savio
Dominicanos Ausentes
Don Bosco (San Juan Bosco)
Duarte, Barrio
El Algibe
El Bolsillo
El Cacique
El Caliche
El Callao
El Ensanchito
El Limoncillo
El Manguito
El Millon
El Millon II
El Milloncito
El Portal
El Timbeque
El Vergel
Encarnación
Enriquillo
Ens. Carmelita
Ens. Espaillat
Ens. Independencia
Ens. Julieta
Ens. La Fé
Ens. La Paz
Ens. Luperón
Ens. Lugo
Ens. Margara
Ens. Miraflores
Ens. Naco
Ens. Paraiso
Ens. Quisqueya
Ens. Veloz
Esperilla
Estancia Nueva, Urbanización
Estela Marina
Evaristo Morales
Fernandez, Urbanización
Ferrúa
Gacela
Gazcue
Geraldino
Guachupita
Gualey
Helios del Oeste
Herrera
Honduras
Honduras del Norte
Honduras del Oeste
Jardines del Caribe
Jardines del Embajador
Jarro Sucio
Jobo Bonito
Julieta Morales
La Agustina
La Arboleda
La Castellana
La Cienaga
La Cuaba
La Esperilla
La Feria
La Fuente
La Julia
La Primavera
La Sierra
La Yuca
La Zurza
Laderas de Arroyo Hondo
Las Cañitas
Las Caobas
Las Colinas de los Rios
Las Fincas
Las Praderas, Urbanización
Lomas de Arroyo Hondo
Lopez De Vega
Los Cacicazgos
Los Cedros
Los Guandules
Los Hidalgos
Los Jardines del Norte
Los Maestros
Los Millones
Los Praditos
Los Prados
Los Restauradores
Los Rios
Los Robles
Loteria
Manganagua
Mar Azul
Maria Auxiliadora
Marranzini
Mata Hambre
Mejoramiento Social
Milloncito
Mirador Norte
Mirador Sur
Miraflores
Miramar
Naco
Nuevo Arroyo Hondo
Padre Las Casas
Paraiso
Piantini
Plaza De La Cultura
Renacimiento
Res. Jose Contreras
Res. Rosmil
Samana, Reparto
San Anton
San Carlos
San Geronimo
San Geronimo
San Lazaro
San Martín De Porres
San Migue
San Rafae
Santa Ana
Santa Barbara
Serralles
Simon Bolivar
Tropical
Urb. Atlantida
Urb. Fernandez
Urbanización Marien
Urbanización Real
Villa Claudia
Villa Consuelo
Villa Fontana
Villa Francisca
Villa Juana
Villa Linda
Villa Maria
Villa Marina
Villas Agricolas
Yolanda Morales
Zona Colonial
Zona Industrial de Herrera
Zona No Disponible
Zona Universitaria

EOD;

//foreach(Environment_vars::$maps['texts_to_id']['property_neighborhoods']['Santo Domingo'] as $name => $id)
//{
//    echo utf8_decode($name) , '<br/>';
//    
//}
//    
//    
//    die;
        
        
        $regex = '/(\w+[ \wáéíúóA-ZÁÉÍÓÚñÑ(),\.\/\-\(\)]*)/';

        $replace_regex = "\$this->execute(\"INSERT INTO neighborhoods (name,province_id) VALUES ('$1', 33)\"); <br/> \$this->execute(\"INSERT INTO neighborhoods_provinces (province_id,neighborhood_id) VALUES (33, \$i)\");";
        
        
        

        $count = 0;


        $strings = explode("\n", $replace_string);
        
        $i = 0;
        foreach ($strings as $string) {
            $i++;

                $replace = str_replace("\$i", $i, $replace_regex);
              
             echo utf8_decode(preg_replace($regex, $replace, $string)) ;
             echo '<br/>';
             
        }
        
        
        
    }

}

?>
