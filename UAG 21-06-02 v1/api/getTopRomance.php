<?php
//include '../api/weatherapi.php'; 
// TEST API **********
$city_name = 'Uppsala';
$api_key = '5dc403fe89f08ea6c220a9af3faecf57';

$api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid='.$api_key;

//php-funktionen json_decode sparar datan i en array istället för att datan 
//returneras i json-format. Används för att kunna visa datan i webbläsaren.
$weather_data =json_decode( file_get_contents($api_url), true);

$temperature_current_weather = $weather_data['weather'][0]['main'];

$sunny = $weather_data['weather'][0]['main'] == "Clear";
$rainy = $weather_data['weather'][0]['main'] == "Rain";

//************ 

//TEST FÖR TOPRANKADE INLÄGG KATEGORI:ROMANCE 
                    if($sunny){
                    function getTopRomance(){                       
                  
                        $db = new SQLite3('../db/databas.db');     
                        $sql = "SELECT threads.tid,sum(ratings.rating) as antal FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Romance'
                        and enviroment = 'Outdoors' 
                        group by threads.tid
                        order by antal desc
                        LIMIT 1";  
                          
                        if(!$stmt=$db->prepare($sql)) {
                            echo "SQL statement failed";
                        } else {     
                            $result = $stmt->execute();      
                            while($row = $result->fetchArray(SQLITE3_TEXT)){
                                return $row['tid'];
                                              
                                }                                  
                            }  
                        }
                    }
                    elseif($rainy){
                       function getTopRomance(){                       
                  
                            $db = new SQLite3('../db/databas.db');     
                            $sql = "SELECT threads.tid, sum(ratings.rating) as antal FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Romance' 
                            and threads.enviroment = 'Indoors'
                            group by threads.tid
                            order by antal desc
                            LIMIT 1";  
                              
                            if(!$stmt=$db->prepare($sql)) {
                                echo "SQL statement failed";
                            } else {                  
                                $result = $stmt->execute();      
                                while($row = $result->fetchArray(SQLITE3_TEXT)){
                                    return $row['tid'];
                                                  
                                    }                                  
                                }  
                            }
                        }else{
                             function getTopRomance(){                                                                                         
                                $db = new SQLite3('../db/databas.db');     
                                $sql = "SELECT threads.tid, sum(ratings.rating) as antal FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Romance'
                                group by threads.tid
                                order by antal desc
                                LIMIT 1;";  
                                  
                                if(!$stmt=$db->prepare($sql)) {
                                    echo "SQL statement failed";
                                } else {    
                                    $result = $stmt->execute();      
                                    while($row = $result->fetchArray(SQLITE3_TEXT)){
                                        return $row['tid'];
                                                      
                                        }                                  
                                    }  
                                }
                            }

?>