<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Neighborhood_generator extends CI_Controller {

    public function index() {
        

        
        
        
        $replace_string = <<<EOD
	24 De Abril
	Abadesa (Seccion)
	Abreu (Villa Rivas)
	Abreu Ii, Urb.
	Abreu, Ens. (Sfm)
	Abreu, Urb. (Sfm)
	Acapulco
	Acicate
	Acicate (Rural)
	Acicate Dentro
	Acicate, Seccion
	Agua Santa Del Yuna, Seccion
	Agua Sarca
	Aguacate
	Aguas Vivas
	Aguas Vivas (Rural)
	Aguila, Ens.
	Aguirre (Guirre)
	Almanzar, Urb.
	Alto De Bululo (Loma)
	Alto De Caballo
	Alto De La Casa
	Alto De La Javiela
	Alto De Lopez
	Alto Del Caimito
	Alto Del Pilon
	Alto Del Pino
	Alto Del Rayo
	Alto O Hato De Cuevas
	Altos De Los Naranjos
	Alvarez, Urb.
	Amor Y Paz,Bo.
	Ana Salime, Urb.
	Andujar, Urb.
	Angelina (Seccion)
	Arbolines
	Arbolines (Rural)
	Arenoso
	Arenoso (Centro Del Pueblo)
	Arenoso, Municipio
	Arevano
	Arevano (Rural)
	Arroyazo
	Arroyo Bonito
	Arroyo Bonito (Rural)
	Arroyo El Toro
	Arroyo Grande
	Arroyo Laja
	Arroyo Vuelta (Las Lagunas)
	Arroyo Vuelta (Zambrana Abajo)
	Atabalero Abajo (Loma)
	Atabalero Arriba
	Atabaleros
	Atalaya Abajo
	Atalaya Arriba
	Atoro (Loma)
	Atoro (Llano)
	Avenida Los Rieles
	Azlor
	Azlor (Rural)
	Azul
	Babario
	Bacumi
	Baelin, Res.
	Baiguate (Llano)
	Balbi, Res.
	Bandera
	Bandera (Rural)
	Barico
	Barraquito
	Barraquito (Loma)
	Barraquito (Llano)
	Barraquito (Llano) (Rural)
	Barrio A
	Batero (Seccion)
	Batero Arriba
	Batey Doña Maria
	Batey Jabonico
	Batey Las Arenas
	Batey Piedra
	Baton-Caliente
	Benito
	Berrinche-Los Corozos
	Bijao (Sec. Colon)
	Bijao (Sec. Colon, Rural)
	Bijao (Sec. La Joya)
	Bijao (Sec. La Joya, Rural)
	Blanco
	Boba
	Boca De Camu
	Boca De Cevicos (Loma)
	Boca De Cevicos (Llano)
	Boca De Jibe
	Boca De Payabo
	Boca De Yuca
	Boma
	Bomba Del Yaiba
	Bomba Del Yaiba (Rural)
	Bombillo Abajo
	Bombillo Abajo (Rural)
	Borojol (Llano)
	Brazo Grande
	Brisas De Las Praderas, Urb.
	Brugal Iii, Urb.
	Brugal, Urb. 1ra. Etapa
	Brugal, Urb. 2da. Etapa
	Buena Vista
	Buena Vista, Seccion
	Buenos Aires
	Buenos Aires (El Asilo)
	Buenos Aires A (Villa Rivas)
	Buenos Aires B (Villa Rivas)
	Caamaño Deño, Bo.
	Caballero Abajo (Urbano)
	Caballeros Abajo (Rural)
	Cabeza De Toro
	Cabirma (Loma)
	Cabirma (Loma) (Rural)
	Caceres, Urb.
	Cadillar
	Callejon
	Callejon Castillo
	Callejon De Los Majias
	Callejon De Los Majias (Rural)
	Callejon De Tilo
	Camino Al Medio
	Camino Real
	Camino Vecinal
	Campeche Abajo
	Campeche Arriba
	Campos Fernandez Ii, Urb.
	Campos Fernandez, Urb.
	Camu
	Camu-Proyecto Canaan
	Canete
	Canta La Rana
	Caño Azul (Loma)
	Caño Azul (Llano)
	Caño De Naranjo
	Caño Hondo
	Caño Seco
	Caño Seco (Rural)
	Caobete
	Caobete Arriba
	Caobete(Seccion Monte Negro)
	Caobete, Seccion
	Caonabo, Urb. 1ra. Etapa
	Caonabo, Urb. 2da. Etapa
	Capacho
	Caperuza, Urb.
	Caperuza, Urb. 1ra. Etapa
	Caperuza, Urb. 2da. Etapa
	Capotillo, Ens.
	Carmen Añil Bono, Urb
	Carrejon (Loma)
	Carretera Duarte
	Carretera Madera
	Casa De Alto (Sec. Cuaba Abajo)
	Casa De Alto (Sec. Cuaba Abajo, Rural)
	Casa De Alto (Sec. La Joya)
	Casa De Alto (Sec. La Joya, Rural)
	Casa De Alto (Sec. Los Bejucos, Loma Rural)
	Casa De Alto (Sec. Los Bejucos, Loma)
	Casa Vieja (Llano)
	Casa Vieja (Llano) (Rural)
	Castaños (Llano)
	Castellar
	Castillo
	Castillo, Centro Del Pueblo
	Castillo, Centro Del Pueblo
	Castillo, Municipio (Centro)
	Catalina
	Catey
	Ceiba De Los Pajaros (Llano)
	Ceiba De Los Pajaros, Seccion
	Ceiba Gorda (Loma)
	Ceibita
	Cementerio
	Centro De La Ciudad (Cotui)
	Cerrejon (Llano)
	Cerrejon, Seccion
	Cevicos
	Cevicos Arriba
	Cien Tareas (Loma)
	Cien Tareas (Llano)
	Cienaga Vieja
	Cienagote
	Cigual (Loma)
	Cigual (Loma) (Rural)
	Ciudad Nueva
	Clavical O Chabical
	Clavical O Chabical (Rural)
	Cojobal
	Colon
	Colon (Rural)
	Colon, Seccion
	Colonia Juan Sanchez Ramirez
	Colorado
	Comedero Abajo
	Comedero Arriba
	Consumidero -Grayumbray
	Cooperativa
	Coto Abajo
	Coto Arriba
	Cotui (Centro De La Ciudad)
	Cristal (Loma)
	Cristal (Loma) (Rural)
	Cristal (Llano)
	Cristal (Llano) (Rural)
	Cristo Rey
	Cruce De Jagua
	Cruce De La Cabirma
	Cruce De La Malena
	Cruce De La Malena (Rural)
	Cruce De Los Betances
	Cruce De Los Lanos
	Cruce De Los Lanos (Rural)
	Cruce De Magua
	Cruce De Magua (Rural)
	Cruce De Mirabel
	Cruce De Mirabel (Rural)
	Cruce De San Rafael
	Cruce De San Rafael (Rural)
	Cruce Del Caimito
	Cruce Del Caimito (Rural)
	Cruce Maguaca
	Cruz De Cenovi, Seccion
	Cuaba
	Cuaba Abajo
	Cuaba Abajo (Rural)
	Cuaba Abajo, Seccion
	Cuaba Arriba
	Cuatro
	Cuba
	Cuesta Blanca
	Cuesta Blanca
	Cuesta Blanca
	Cuesta Boba
	Cuesta Boba (Rural)
	Cuevas
	Cumba
	Curazao (Loma)
	Chacuey Abajo
	Chacuey Maldonado (Seccion)
	Chinguelo
	Chiringo (Loma)
	Chiringo, Seccion
	Chucho Vasquez (Llano)
	Chucho Vasquez (Llano) (Rural)
	David (Hostos)
	David (Las Taranas)
	Demajagual Abajo
	Demajagual Abajo (Rural)
	Demajagual Arriba
	Demajagual Arriba (Rural)
	Demajagual, Seccion (Loma)
	Deposito
	Dichoso Abajo
	Dichoso Arriba
	Don Juan
	Don Mario, Urb.
	Don Miguel
	Don Ramon
	Doña Maria
	Dr Fernandez, Urb.
	Duarte Arriba
	Duarte, Ens.
	Duey Grande
	Duey Pequeño
	El Abanico (Llano)
	El Abanico (Llano) (Rural)
	El Aguacate (Hernando Alonzo)
	El Aguacate (Platanal)
	El Aguacate (Sec. El Aguacate)
	El Aguacate (Sec. Los Bejucos)
	El Aguacate Adentro
	El Aguacate Adentro (Rural)
	El Aguacate Afuera (Loma)
	El Aguacate Afuera (Loma) (Rural)
	El Aguacate, Seccion
	El Aguacatico
	El Algarrobal
	El Alto
	El Alto De Samo
	El Arado
	El Arroyaso
	El Barro
	El Bobo (Sec. Colon)
	El Bobo (Sec. Colon, Rural)
	El Bobo (Sec. Cruz De Cenovi)
	El Bobo (Sec. Cruz De Cenovi, Rural)
	El Bolsillo
	El Bombillo (Llano)
	El Bombillo (Llano) (Rural)
	El Broque
	El Burro
	El Cacao
	El Caimito
	El Calabozo
	El Campamento (Llano)
	El Can
	El Canal
	El Canal
	El Canal (Rural)
	El Caño
	El Caño
	El Caño (Rural)
	El Capacito
	El Caracol
	El Caserio
	El Caserio
	El Caserio (Rural)
	El Catey
	El Catey (Loma)
	El Cementerio
	El Cercado
	El Cercado
	El Cercado ( La Lila)
	El Cercado ( La Lila) (Rural)
	El Cercado (Rural)
	El Cigual
	El Cigual (Rural)
	El Ciguar-Rañe
	El Ciruelillo
	El Ciruelillo (Loma)
	El Ciruelillo, Proyecto Hab.
	El Ciruelillo, Respaldo
	El Coco
	El Concreto (Hidalgos) (Llano)
	El Concreto (Hidalgos) (Llano) (Rural)
	El Corocito
	El Corozo
	El Corozo (Chacuey)
	El Corozo (Rural)
	El Corozo (San Miguel)
	El Cotorro
	El Cruce (La Mata)
	El Cruce (San Miguel)
	El Cruce (Sierra Prieta)
	El Cruce De Angelina
	El Charco
	El Derrumbao
	El Diviso
	El Dorado
	El Dorado, Res.
	El Doral
	El Duey
	El Espino
	El Espino (Rural)
	El Firme (Sec. Gina Clara)
	El Firme (Sec. Juana Diaz)
	El Firme (Sec. Rincon Hondo)
	El Gajo
	El Gajo (Rural)
	El Gallinero
	El Grillo
	El Grillo (Rural)
	El Guanabano
	El Guao
	El Guayabo
	El Guineal
	El Hato
	El Hato (Las Guaranas)
	El Hato (Las Guaranas, Rural)
	El Hato (Sec. Colon)
	El Hato (Sec. Colon, Rural)
	El Higo
	El Higuero (Loma)
	El Hormiguero
	El Hospital
	El Hoyo (Caballero)
	El Hoyo (Hernando Alonzo)
	El Hoyo (Sierra Prieta)
	El Hundidero
	El Indio (Llano)
	El Indio (Llano) (Rural)
	El Ingenio
	El Jamito
	El Jamo
	El Jiguero
	El Jiguero (Rural)
	El Jobito
	El Jobo
	El Laurel, Urb.
	El Limon (Chacuey)
	El Limon (Los Cerros)
	El Limon (Sec. La Jaya)
	El Limon (Sec. La Mesa)
	El Limon (Sec. La Mesa, Rural)
	El Limoncito
	El Limpio (Sabana Grande)
	El Limpio (Zambrana Abajo)
	El Loro
	El Llano
	El Llano
	El Llano (Rural)
	El Mamey
	El Mamey (Rural)
	El Mango
	El Manguito (Sec. Chiringo)
	El Manguito (Villa Rivas)
	El Matadero
	El Mate
	El Mate (Rural)
	El Mercado
	El Mogote
	El Muro
	El Nispero
	El Nispero (Rural)
	El Ocho
	El Palmar
	El Pinito
	El Piojillo (Llano)
	El Piojillo (Llano) (Rural)
	El Platano
	El Play
	El Play (Castillo)
	El Play (Hostos)
	El Pomito
	El Pomo
	El Pozo
	El Pozo
	El Pozo (Rural)
	El Pozo De Coli
	El Pozo De La Ceiba
	El Puente
	El Puente De Camu
	El Quemado (Sec. Colon)
	El Quemao (La Peña)
	El Rancho
	El Rayo
	El Remolino
	El Rincon De San Francisco
	El Rucio Abajo (Llano)
	El Rucio De Los Cachones
	El Rucio De Los Lanos
	El Saladillo
	El Saladillo
	El Silencio, Urb. 1ra. Etapa
	El Silencio, Urb. 2da. Etapa
	El Silencio, Urb. 3ra. Etapa
	El Sitio
	El Tablon
	El Tamarindo
	El Taranal-Caimito
	El Tejar, Urb.
	El Tope
	El Tres
	El Valle
	El Yagal
	El Yojo
	Emer, Res.
	Ensueño, Res.
	Ercilia Pepin
	Eslabones (Loma)
	Espinal, Urb.
	Espinola
	Est Las Colinas, Urb.
	Estadio Julian Javier
	Estanzuela Abajo (Loma)
	Estanzuela Abajo (Loma) (Rural)
	Estanzuela Arriba
	Estanzuela Arriba (Rural)
	Factor
	Factor (Rural)
	Fantino (Alrededores)
	Fantino (Centro Del Pueblo)
	Fatima-La Bascua
	Felix Ii, Urb.
	Felix Taveras, Urb.
	Felix Taveras, Urb. (Atras)
	Felix, Urb
	Fernandez, Urb.
	Firme De Gina Clara (Loma)
	Firme De La Brisa
	Firme De Las Taranas (Loma)
	Firme De Los Ortega
	Francisco Rodriguez
	Frank Grullon, Urb. (Villa Verde)
	Gajo La Yuca
	Gajo Malo
	Garcia Nuñez, Urb.
	Genimillo
	Genimillo (Rural)
	Genimo
	Genimo (Rural)
	Getsemani
	Gina Clara (Interior)
	Gina Clara, Seccion
	Gisolis, Urb.
	Gregorio Luperon
	Guabina
	Guachupita
	Guanabano
	Guaraguao (Loma)
	Guaraguao (Llano)
	Guaraguao (Llano) (Rural)
	Guardarraya
	Guardiamon
	Guazarita
	Guiza
	Guiza (Rural)
	Guiza La Penda, Seccion (Llano)
	Gurabo
	Guzman
	Guzman (Rural)
	Haiti La Cueva
	Hamlet,Urb.
	Hatico
	Hatico (Rural)
	Hatillo (Rural)
	Hatillo (Rural)
	Hatillo (Sec. Colon)
	Hatillo (Sec. Demajagual)
	Hatillo (Seccion)
	Hato Grande
	Hato Grande (Rural)
	Hato Mayor
	Hato Mayor (Rural)
	Hato Viejo
	Herfa,Urb.
	Hermanas Mirabal
	Hernandez
	Hernando Alonzo (Seccion)
	Herrera De Cuaba
	Higo Gordo
	Higuerito-La Factoria
	Higuero
	Holguin Marte
	Hondo Valle
	Honduras (La Guaranas)
	Honduras (Rural, Guiza La Penda)
	Honduras (Rural, Las Guaranas)
	Honduras (Sec. Guiza La Penda)
	Hostos
	Hostos, Centro Del Pueblo
	Hostos, Dist. Municipal (Alrededores)
	Hoya Fresca
	Hoyo De Luis
	Hoyo De Oro
	Hoyo Grande
	Hoyo Grande (Rural)
	Hoyo Viejo
	Hoyo Viejo (Rural)
	Iglesias
	Indrhi,Bo.
	Inespre
	Invi, Bo.
	Jabo Claro
	Jaiqui
	Jaiqui (Rural)
	Jaragua
	Jaragua (Rural)
	Jardines De Las Praderas
	Jeniffer, Urb.
	Jibe
	Jimenez
	Jimenez (Rural)
	Jobo Bonito
	Jobo Claro
	Jobo Dulce (Loma)
	Joboban (Llano)
	Juan Sanchez Ramirez
	Juana Diaz (Llano)
	Juana Diaz Abajo (Llano)
	Juana Diaz Arriba (Loma)
	Juana Diaz, Seccion
	Juana Rodriguez Abajo
	Juana Rodriguez Abajo (Rural)
	Juana Rodriguez Arriba
	Junco Verde
	Jurungo
	La Altagracia
	La Altagracia
	La Amargura
	La Atravezada (Chacuey)
	La Atravezada (Zambrana Abajo)
	La Auyama
	La Bajada
	La Barca
	La Berma Del Canal
	La Berma Del Canal (Rural)
	La Berraza (Llano)
	La Bestia De Atabalero
	La Bestia De La Malena
	La Bija (Rural)
	La Bija (Seccion)
	La Boca
	La Boca (Rural)
	La Bomba (Hatillo)
	La Bomba (Sabana Grande)
	La Bomba De Cenovi
	La Bomba De Cenovi (Rural)
	La Brusca
	La Bucara
	La Cabirma
	La Cabuya
	La Cabuya (Rural)
	La Cana (Seccion)
	La Cantera
	La Caoba
	La Caoba (Llano)
	La Caoba (Llano) (Rural)
	La Castellana, Urb.
	La Ceiba
	La Ceiba
	La Ceiba Abajo
	La Ceiba Vieja
	La Ceibita
	La Ceibita
	La Ceniza
	La Ceniza (Sec. Laguna De Coto)
	La Ceniza (Sfm)
	La Cidra
	La Cidra
	La Cidra (Rural)
	La Cienaga
	La Cienaga (Rural)
	La Cigua
	La Cigua-El Limpio
	La Colecita
	La Colonia
	La Colonia (Rural)
	La Conce
	La Cruz De Cenovi
	La Cruz De Cenovi (Rural)
	La Cruz.Bo.
	La Cuba
	La Cueva (Centro Del Pueblo)
	La Cueva (Chacuey)
	La Cueva (Loma)
	La Cueva (Llano)
	La Cueva (Seccion)
	La Cueva (Zambrana Abajo)
	La Culata
	La Culata (Rural, Sec. Sabana Grande)
	La Culata (Sec. La Malena)
	La Culata (Sec. Sabana Grande)
	La Culebra
	La Chancleta (Rural, Sec. Demajagual)
	La Chancleta (Sec. Cuaba Abajo)
	La Chancleta (Sec. Demajagual)
	La Chancleta (Sec. La Peña)
	La Enea (Las Guaranas)
	La Enea (Rural, Las Guaranas)
	La Enea (Sec. Colon)
	La Ermita (Llano)
	La Ermita (Llano) (Rural)
	La Esperanza
	La Estancia
	La Estancia (Rural)
	La Excavacion
	La Fortaleza
	La Fortuna De Angelina, Bo. (Cotui)
	La Fortuna, Urb. (San Frco. De Macoris)
	La Galana
	La Gallera
	La Garata
	La Gaza
	La Gina (Rural)
	La Gina (Rural, Guiza La Penda)
	La Gina (Sec. Cuaba Abajo)
	La Gina (Sec. Guiza La Penda)
	La Gina O Mata Grande
	La Gina O Mata Grande (Rural)
	La Ginita
	La Guacara (La Cueva)
	La Guacara (Sierra Prieta)
	La Guama
	La Guama
	La Guama (Rural)
	La Guamita
	La Guazarita
	La Guazumita
	La Guazumita (Rural)
	La Higuereta
	La Hondonada
	La Isleta (Loma)
	La Isleta (Llano)
	La Jabilla
	La Jagua
	La Jagua
	La Jagua (Rural)
	La Jagua (Sec. Buena Vista)
	La Jagua (Sec. Rincon Hondo)
	La Jagua Mocha
	La Jagua, Seccion
	La Jaguita (Sec. La Jaya)
	La Jaguita (Sec. Los Lanos)
	La Jaiba (Loma)
	La Javilla
	La Jaya Seccion
	La Jaya-Hoyo De Jaya (Loma)
	La Jaya-Hoyo De Jaya (Loma) (Rural)
	La Jina (Hostos)
	La Jina (Sec. Colon)
	La Joya (Llano)
	La Joya (Llano) (Rural)
	La Joya (Sec. Jaiba Abajo)
	La Joya Arriba
	La Joya Arriba (Rural)
	La Joya, Seccion (Llano)
	La Laguna (Rural, La Guazuma)
	La Laguna (Rural, La Joya)
	La Laguna (Sec. La Guazuma)
	La Laguna (Sec. La Joya)
	La Laguneta
	La Laja (Los Corozos)
	La Laja (San Miguel)
	La Lechosa
	La Lima (Rural, Guiza La Penda)
	La Lima (Rural, La Joya)
	La Lima (Sec. Guiza La Penda)
	La Lima (Sec. La Joya)
	La Loma (Batero)
	La Loma (Caballero Abajo)
	La Loma (Hatillo)
	La Loma (Platanal)
	La Lomasa
	La Lometa (Loma)
	La Lomita (Loma)
	La Lomita (Loma) (Rural)
	La Lomita (Loma, Los Bejucos, Rural)
	La Lomita (Loma, Sec. Los Bejucos)
	La Lomita (Rural)
	La Lomita (Sec. La Joya)
	La Llamada (Chacuey)
	La Llamada (Los Cerros)
	La Madeja
	La Madeja (Rural)
	La Majagua
	La Malena
	La Malena De Jaya
	La Malena, Seccion
	La Malenita
	La Maleza
	La Manacla
	La Manicera
	La Manteca
	La Marga
	La Marga (Rural, Sec. Cruz De Cenovi)
	La Marga (Sec. Cruz De Cenovi)
	La Marga (Sec. Rincon Hondo)
	La Mata (Centro Del Pueblo)
	La Mata (Zonas Aledañas)
	La Matia
	La Matica
	La Mesa
	La Mesa (Rural)
	La Mesa, Seccion
	La Mina De Los Peynados
	La Mina De Los Peynados (Loma)
	La Mora
	La Mora
	La Mora (Rural)
	La Navisa
	La Naza
	La Naza (Rural)
	La Palma
	La Palma
	La Palma (Rural)
	La Palmita
	La Palmita
	La Palmita (Rural)
	La Paloma
	La Paloma (Batey Soto)
	La Pegajosa
	La Peña (Llano)
	La Peña (Llano) (Rural)
	La Peña, Seccion
	La Peña,Urb.
	La Piedra
	La Piedra (La Bija)
	La Piedra (La Cana)
	La Piedra (Rural)
	La Piedra (San Miguel)
	La Piña
	La Piña (Rural)
	La Piñita
	La Piñita
	La Piñita
	La Piragua
	La Piragua (Rural)
	La Pista
	La Placeta (Chacuey)
	La Placeta (Zambrana Abajo)
	La Pocilga
	La Pocilga
	La Punta (Loma)
	La Quebradita
	La Raya
	La Recta
	La Reforma
	La Reforma
	La Represa
	La Romana Abajo
	La Romana Arriba
	La Rosa
	La Rosa (Rural)
	La Rosa-La Colonia
	La Sabana (Caballero Abajo)
	La Sabana (Hernando Alonzo)
	La Sabana (Los Cerros)
	La Sabana (Rural)
	La Sabana (Rural, Los Bejucos)
	La Sabana (Rural, Yaiba Abajo)
	La Sabana (Sec. Los Bejucos)
	La Sabana (Sec. Yaiba Abajo)
	La Sabana (Sierra Prieta)
	La Sequia
	La Soledad
	La Soledad (Rural)
	La Teta
	La Travesia
	La Trinchera
	La Trocha
	La Tusa
	La Vereda
	La Vereda De Dichoso
	La Vereda Del Demajagual
	La Vereda Del Demajagual (Rural)
	La Vuelta
	La Yabacoa
	La Yaguita (Villa Rivas)
	La Yaguiza (Rural)
	La Yaguiza (Rural)
	La Yaguiza (Sec. Colon)
	La Yaguiza (Sec. Los Bejucos)
	La Yaguiza Abajo (Rural)
	La Yaguiza Abajo (Rural)
	La Yaguiza Abajo (Sec. Cruz De Cenovi)
	La Yaguiza Abajo (Sec. Los Bejucos)
	La Yaguiza Central
	La Yaguiza Central (Rural)
	La Yautia,(Rural)
	La Yaya
	La Yaya
	La Yuca
	La Yuca
	La Zarza
	La Zarza (Sec. La Peña)
	La Zarza Sec. Juana Diaz)
	La Zolapa
	La Zolapa (Rural)
	La Zumbadora (La Cueva)
	La Zumbadora (Sabana Grande)
	Laguna Abajo
	Laguna Al Medio
	Laguna Arriba
	Laguna De Coto
	Laguna De Coto, Seccion
	Laguna Grande
	Las Auyamas
	Las Berenjenas
	Las Caobas (Loma, Sec. Las Taranas)
	Las Caobas (Sec. Cruz De Cenovi)
	Las Caobas Abajo
	Las Caobas Abajo (Rural)
	Las Caobas Arriba
	Las Carreras
	Las Carreras (Rural)
	Las Carreras, Seccion
	Las Cejas
	Las Cejas (Rural)
	Las Coles
	Las Coles, Seccion
	Las Colinas I, Urb.
	Las Colinas Ii, Urb.
	Las Colinas, Ens.
	Las Cruces
	Las Dos Palmas
	Las Flores
	Las Garzas
	Las Guamitas
	Las Guaranas, Centro Del Pueblo
	Las Guaranas, Dist. Munic. (Alrededores)
	Las Guaranas, Seccion
	Las Guayigas
	Las Guazumas
	Las Guazumas (Rural)
	Las Guazumas, Seccion
	Las Hormigas
	Las Lagunas
	Las Lagunas (Seccion)
	Las Lajas (Chacuey)
	Las Lajas (Zambrana Abajo)
	Las Marias, Urb.
	Las Matas
	Las Pajas
	Las Pajas (Rural)
	Las Palmas, Urb.
	Las Palmillas
	Las Piedras (Llano)
	Las Piedritas
	Las Sabinas
	Las Taranas (Llano)
	Las Taranas (Llano) (Rural)
	Las Taranas, Seccion
	Las Tres Bocas (Las Lagunas)
	Las Tres Bocas (Zambrana Abajo)
	Las Tres Ceibas
	Las Yerbas
	Laurel
	Libertad
	Limon Dulce
	Limpio Del Hato
	Lindo, Bo.
	Loma Abajo (Loma)
	Loma Al Medio (Loma)
	Loma Al Medio (Loma) (Rural)
	Loma Arriba (Loma)
	Loma Bomba
	Loma Colorada (Loma)
	Loma De Agua
	Loma De Amacey
	Loma De Amacey (Rural)
	Loma De Caballero Abajo
	Loma De Comedero
	Loma De Jaya
	Loma De La Gallina
	Loma De La Joya
	Loma De La Joya (Rural)
	Loma De Los Bonilla (Loma)
	Loma De Los Bonilla (Loma) (Rural)
	Loma De Los Camacho
	Loma De Los Paulinos
	Loma De Los Paulinos (Rural)
	Loma De Perro
	Loma Del Burro
	Loma Del Gallo
	Loma Del Muerto
	Loma El Peñon
	Loma Vieja
	Lora, Urb.
	Los Algodones
	Los Algodones (Llano)
	Los Algodones (Llano) (Rural)
	Los Ancones
	Los Ancones (Rural)
	Los Arroyos (Rural)
	Los Arroyos (Sec. Cruz De Cenovi)
	Los Arroyos (Sec. Las Guazumas)
	Los Artiles
	Los Barros
	Los Basilios
	Los Bejucos
	Los Bejucos
	Los Bejucos (Rural)
	Los Bejucos, Seccion
	Los Botados
	Los Botaos
	Los Bracitos
	Los Brazos
	Los Cacaos
	Los Cacaos (Rural, Cruz De Cenovi)
	Los Cacaos (Rural, Los Bejucos)
	Los Cacaos (Sec. Cruz De Cenovi)
	Los Cacaos (Sec. Las Carreras)
	Los Cacaos (Sec. Los Bejucos)
	Los Cachones Abajo (Llano)
	Los Cachones Abajo (Llano) (Rural)
	Los Cachones Arriba (Loma)
	Los Cachones, Seccion
	Los Cadillos
	Los Cadillos (Rural)
	Los Café
	Los Cafes
	Los Caimiticos
	Los Cajuiles (Batero)
	Los Cajuiles (Cotui)
	Los Callejones
	Los Callejones
	Los Callejones (Loma)
	Los Caños
	Los Capaces (Los Cerros)
	Los Capaces (Sierra Prieta)
	Los Carbories
	Los Cascajales
	Los Castellanos (Rio Viejo)
	Los Catuanes
	Los Cayucos
	Los Cercadillos
	Los Cerros
	Los Cerros (Hernando Alonzo)
	Los Cerros (Rural)
	Los Cerros (Seccion)
	Los Cerros (Sierra Prieta)
	Los Cerros De Duey
	Los Cincos
	Los Ciruelos, Proyecto Hab.
	Los Ciruelos, Urb.
	Los Cocos
	Los Cocos (Sec. Ceiba De Los Pajaros)
	Los Cocos, Bo.
	Los Contreras (Loma)
	Los Contreras (Llano)
	Los Conucones
	Los Corocitos
	Los Corozos (Loma)
	Los Corozos (Seccion)
	Los Chiripos
	Los Desesperados
	Los Españoles
	Los Espinos (Rural, Demajagual))
	Los Espinos (Sec. Demajagual)
	Los Espinos (Sec. Yaiba)
	Los Estudiantes
	Los Farallones
	Los Franceses
	Los Ganchos De Jaya
	Los Genao
	Los Genao (Rural)
	Los Guandules
	Los Guaraguaos
	Los Guayuyos
	Los Guineos
	Los Haitises
	Los Higis
	Los Higueritos
	Los Higueros
	Los Hoyos (Abadesa)
	Los Hoyos (Sierra Prieta)
	Los Indios De Cenovi
	Los Indios De Cenovi
	Los Indios De Cenovi (Rural)
	Los Indios De Cenovi (Rural)
	Los Jardines, Bo.
	Los Jibaritos
	Los Jibaritos
	Los Jibaritos (Rural)
	Los Jobos
	Los Lanos (Loma)
	Los Lanos (Loma) (Rural)
	Los Lanos, Seccion
	Los Limones (Sec. Caobete)
	Los Limones (Sec. Laguna De Coto)
	Los Liones (Loma)
	Los Liones (Loma) (Rural)
	Los Lirios
	Los Maestros
	Los Maestros, Urb. 1-Etapa
	Los Maestros, Urb. 2-Etapa
	Los Maestros, Urb. 3-Etapa
	Los Maestros, Urb. 4-Etapa
	Los Mameyes
	Los Manaties
	Los Mapolos
	Los Mates
	Los Mayabos (Loma)
	Los Mineros (Rosario Dominicana)
	Los Naranjos
	Los Naranjos (Loma, Ceiba De Los P.)
	Los Naranjos (Llano, Sec. Ceiba De Los P.)
	Los Naranjos (Sec. La Peña)
	Los Naranjos (Sec. Los Lanos)
	Los Palitos
	Los Palmares, Urb.
	Los Palmaritos
	Los Palos
	Los Pamaritos
	Los Peladeros
	Los Peralejos (Batero)
	Los Peralejos (Sabana Grande)
	Los Peynados
	Los Pinos
	Los Pinos (Residencial).
	Los Placeres
	Los Planitos, Bo.
	Los Platanitos (Llano)
	Los Pomos
	Los Pomos
	Los Pontones
	Los Pontones (Rural)
	Los Pontones Abajo
	Los Pontones Arriba
	Los Puentecitos
	Los Puentes
	Los Ranchos
	Los Rieles
	Los Rieles Abajo
	Los Rieles Abajo (Rural)
	Los Rieles, Proyecto Hab.
	Los Rincones
	Los Rivera
	Los Rivera (Rural)
	Los Tamarindos
	Los Tocones (Cevicos)
	Los Tocones (Cotui)
	Los Tres Pasos
	Los Weber
	Los Yagrumos
	Lucas
	Lunes, Urb.
	Llanada
	Llave (Llano)
	Llave (Llano) (Rural)
	Madrigal
	Maguaca
	Maimoro
	Maimoro (Rural)
	Mainely
	Majagual
	Mal Hombre
	Maria Hernandez
	Maria Hernandez (Rural)
	Mariscao-El Mango
	Martel
	Mata De Conuco
	Mata Larga
	Mata Larga (Rural)
	Mata Vieja
	Matias
	Matuan Abajo
	Mendez,Urb.
	Mirabel
	Mirabel (Rural)
	Mirador Del Jaya, Urb.
	Mojin
	Mojin (Rural)
	Monte Abajo (La Cana)
	Monte Abajo (Los Corozos)
	Monte Adentro
	Monte Bonito
	Monte Claro
	Monte Negro
	Monte Negro
	Monte Negro (Rural)
	Monte Rio
	Nagua Arriba
	Naranjo Dulce Abajo
	Naranjo Dulce Arriba
	Naranjos
	Naza De Hatillo
	Naza De Hatillo (Rural)
	Neftaly I, Urb.
	Neftaly Ii, Urb.
	Neftaly Iii,Urb
	Nigua Abajo
	Nigua Abajo (Rural)
	Nona
	Nona (Rural)
	Nuestra Sra Del Carmen
	Nueva York
	Nuevo Castillo, Bo.
	Nuevo Castillo, Proyecto Hab.
	Nuevo San Francisco, Urb.
	Nuevo, Barrio O La 50
	Oasis,Urb.
	Olimpia, Res.
	Ortega, Urb.
	Padre Fantino (Melaza)
	Palma Herrada
	Palma Sola O Mono Sucio
	Palmar
	Palmares, Urb.
	Palmarito
	Palmarito
	Palmarito (Rural)
	Palmarito Abajo
	Palmarito El Limon
	Palo De Cuaba
	Palo Verde
	Pantigoso
	Paraguay (Loma)
	Paraguay (Loma) (Rural)
	Paraguay (Llano)
	Paraguay (Llano) (Rural)
	Paraguon, Urb.
	Paraje 41
	Paseo Del Rio, Urb
	Paso Hondo
	Patao
	Patao (Rural)
	Patria Nueva
	Payabo
	Peralta Brache, Urb. 4-Etapa
	Pescoson
	Pico De La Cotorra
	Pie De Plata (Rural, Demajagual)
	Pie De Plata (Sec. Demajagual)
	Pie De Plata (Sec. La Peña)
	Piedra
	Piedra Blanca
	Piedra Iman
	Pimentel, Centro Del Pueblo
	Pimentel, Municipio
	Pimentel, Zonas Aledañas
	Pinar Del Jaya, Urb.
	Piña Al Medio
	Piña Vieja
	Piña, Urb. 1ra. Etapa
	Piña, Urb. 2da. Etapa
	Piña, Urb. 3ra. Etapa
	Pisa Costura
	Pisaña
	Plan De Urbanización
	Platanal (Seccion)
	Ponton
	Ponton (Rural)
	Porquero Abajo
	Porquero Abajo (Rural)
	Porquero Arriba
	Porquero Arriba (Rural)
	Pozo Del Jobo (Loma, Sec. La Peña)
	Pozo Del Jobo (Rural)
	Pozo Del Jobo (Sec. Demajagual)
	Primaveral, Urb.
	Primera Boca (Batero)
	Primera Boca (Sabana Grande)
	Proyecto Industrial
	Proyecto Thermo Sanchez
	Pueblo Nuevo (Cotui)
	Pueblo Nuevo (La Bija)
	Pueblo Nuevo (Las Guaranas)
	Pueblo Nuevo (Rural)
	Pueblo Nuevo (Rural, Yaiba Abajo)
	Pueblo Nuevo (Sec. Yaiba Abajo)
	Pueblo Nuevo (Sfm)
	Pueblo Viejo
	Puerto Rico (Castillo)
	Puerto Rico (Las Guaranas)
	Puerto Rico (Rural)
	Puerto Rico (Sfm)
	Punta Larga
	Quebrada De Los Patos
	Quebrada De Pablo
	Quebrada De Pablo (Rural)
	Quebrada Honda
	Quemao
	Quita Sueño
	Rabo De Chivo
	Ramonal Abajo
	Ramonal Arriba
	Rancho Abajo
	Rancho Abajo
	Rancho Abajo (Sec. La Malena)
	Rancho Arriba (Corral Llano)
	Rancho Arriba (Corral Llano) (Rural)
	Rancho Arriba (Rural)
	Rancho Arriba (Sec. Colon)
	Rancho Arriba (Sec. La Jaya)
	Resbalon
	Reventacion
	Reventazon (Loma)
	Reventazon (Llano)
	Reynoso
	Rieles, Bo.
	Rincon Bebedero (Sec. La Jagua)
	Rincon Bebedero (Sec. Las Carreras)
	Rincon Bono
	Rincon Camu
	Rincon Camu (Rural)
	Rincon De Coto
	Rincon De Majagual (Llano)
	Rincon De Yaiba
	Rincon De Yaiba (Rural)
	Rincon Del Higuero
	Rincon Grande
	Rincon Hato
	Rincon Hondo
	Rincon Hondo (Rural)
	Rincon Hondo, Seccion
	Rincon Martin
	Rincon Moderno
	Rinconazo
	Rinconazo
	Rio Arriba
	Rio Frio
	Rio Frio (Rural)
	Rio Jagua (Llano)
	Rio Jagua (Llano) (Rural)
	Rio Yuna
	Rivera Del Jaya
	Rivera Del Jaya, Urb.
	Rodeo
	Rodeo
	Sabana Abajo (Batero)
	Sabana Abajo (Platanal)
	Sabana Al Medio
	Sabana Arriba (Batero)
	Sabana Arriba (Platanal)
	Sabana Chiquita
	Sabana De Armando
	Sabana De Armando,(Rural)
	Sabana De Duey
	Sabana De La Ceiba
	Sabana De La Ceiba (Rural)
	Sabana De Meladito
	Sabana Del Marisco
	Sabana Del Rey Arriba
	Sabana Del Rey Arriba (Rural)
	Sabana Del Rio
	Sabana Grande
	Sabana Grande
	Sabana Grande (Llano, Los Cachones, Rural)
	Sabana Grande (Llano, Sec. Los Cachones)
	Sabana Grande (Rural)
	Sabana Grande (Seccion)
	Sabana Grande Abajo (Seccion)
	Sabana Grande De Saballo
	Sabana Grande, Seccion (Llano)
	Sabana Larga (Los Cerros)
	Sabana Larga (San Miguel)
	Sabana Larga Arriba
	Sabana Los Castaños
	Sabana Postrera
	Sabana Rey
	Sabana San Diego
	Sabana Verde (Hatillo)
	Sabana Verde (Los Cerros)
	Sabaneta
	Sabaneta
	Salvador Then (El Sordo)
	San Antonio
	San Antonio Arriba
	San Diego
	San Diego (Rural)
	San Felipe Abajo (Llano)
	San Felipe Arriba
	San Felipe Arriba (Loma), Seccion
	San Francisco (Centro Urbano)
	San Francisco De Asis
	San Francisco De Macoris, Centro Urbano
	San Francisco, Urb.
	San Geronimo
	San Juan
	San Juan
	San Juan (Rural)
	San Martin
	San Martin,Bo.
	San Miguel (Seccion)
	San Miguel Abajo
	San Miguel Arriba
	San Pedro
	San Vicente, Bo.
	Santa Ana
	Santa Ana, Bo.
	Santa Ana, Urb.
	Santa Elena
	Santa Elena (Rural)
	Santa Fe (Lomas)
	Santa Fe (Llano)
	Santa Fe (Llano) (Rural)
	Santa Fe.
	Santa Lucia
	Santa Lucia (Rural)
	Santa Luisa
	Santa Martha
	Santa Pola
	Santa Rosa
	Santa Rosa. Bo.
	Sector Hospital
	Serrano
	Serrano (Rural)
	Sierra Prieta (Seccion)
	Sonador
	Sonador
	Sur, Barrio (La Cancha)
	Tabique O Tanique (Tanque)
	Tahina
	Tavique
	Terranova, Urb.
	Tocoa
	Tojin
	Toribio Camilo 2-Etapa
	Toribio Camilo Iii
	Toribio Camilo, Urb.
	Toribio Piantini 2-Etapa
	Toribio Piantini 3-Etapa
	Toribio Piantini, Urb. 1-Etapa
	Tres Pies
	Tripulacion
	Tubagua
	Tubagua (Rural)
	Tumba Burros (Llano)
	Tumba Burros (Llano) (Rural)
	Ugamba
	Union
	Valle Grande (Abadesa)
	Valle Grande (Sabana Grande)
	Valle Verde, Urb. (P. Piña, Urb)
	Ventura Crullon I
	Ventura Grullon Ii
	Venus
	Veras Del Jaya, Urb.
	Vereda De Yuna
	Via Ferrea
	Villa Duarte
	Villa Maria
	Villa Olimpica 1-Etapa
	Villa Olimpica 2-Etapa
	Villa Palma
	Villa Raza
	Villa Rivas, Centro Del Pueblo
	Villa Rivas, Municipio
	Villas Palmeras Res.
	Vista Bella, Urb.
	Vista De San Francisco
	Vista Del Valle
	Vista Del Valle
	Vista Del Valle, Res
	Vista Hermosa,Urb.
	Weber, Ens.
	William Mieses, Ens.
	Yabacoa
	Yabacoa (Loma)
	Yaiba Abajo (Llano)
	Yaiba Abajo (Llano) (Rural)
	Yaiba Abajo, Seccion
	Yaiba Arriba (Loma)
	Yaiba, Seccion
	Yanabo Abajo
	Yanabo Arriba
	Yunita
	Yuyo Abajo
	Zambrana Abajo (Seccion)
	Zambrana Arriba
	Zinc
	Zona Franca
	Zumba (Loma)
	Zumbadora

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

        $replace_regex = "\$this->execute(\"INSERT INTO neighborhoods (name,province_id) VALUES ('$1', 6)\"); <br/> \$this->execute(\"INSERT INTO neighborhoods_provinces (province_id,neighborhood_id) VALUES (6, \$i)\");";
        


        $strings = explode("\n", $replace_string);
        
        $i = 33;
        foreach ($strings as $string) {
            $i++;

                $replace = str_replace("\$i", $i, $replace_regex);
              
             echo utf8_decode(preg_replace($regex, $replace, $string)) ;
             echo '<br/>';
             
        }
        
        
        
    }

}

?>
