<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
        html {    
            background: url('Slike/BackgroundFinal.png') no-repeat left fixed;     
            background-size: cover;
        }
        .glavniSadrzaj{
                margin: 0 auto;
                width: 62%;
                height: auto;
                float: right;
                background-color: rgb(138, 21, 56);
                margin-top: 50px;
                margin-right: 50px;
                border-radius: 10px;
                box-shadow: 0px 5px 10px 5px rgba(0, 0, 0, 0.5);
                padding:10px;
                margin-bottom:50px;
        }
        .naslov{
                font-size: 44px;
                font-weight: bold;
                color: white;
                font-family:sans-serif;
                margin: 45px 0 20px 45px;
        }
        .filter{
                font-size: 20px;
                font-weight: bold;
                color: white;
                font-family:sans-serif;
                margin: 45px;
        }
        #filtracija{
            margin-left: 20px;
            border-radius: 8px;
            background-color: rgb(28 1 17);
            color:white;
            padding:6px 20px 6px 20px;
        }
        table{
            margin-top: 20px;
            color:white;
            text-align:center;
            font-size:17px;     
            font-weight:bold;
            border-spacing:3px;
            width:100%;
        }
        tr{
            margin:15px;
            background-color: rgb(28 1 17);
            height:30px;
        }
        td{
            width:auto;
        }
        th{
            padding:12px;
        }
        #utakmice{
            border-radius: 8px;
            background-color: rgb(28 1 17);
            color:white;
            padding:7px;
        }
        </style>
    </head>
    <body>
        <div class="glavniSadrzaj">
            <h1 class="naslov">POPIS SVIH UTAKMICA GRUPNE FAZE</h1>
            <form action="Qatar.php" method="GET">
                <label for="utakmice" class="filter">Filtriraj sadržaj koji se prikazuje:</label>
                <select name="utakmice" id="utakmice">
                    <option disabled selected>--Odaberi grupu--</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                </select>
                <input type="submit" id="filtracija" value="Filtriraj"/>
            </form>
            <table>
                <tr>
                    <th>Datum</th>
                    <th>1. Ekipa</th>
                    <th>Redni broj</th>
                    <th>2. Ekipa</th>
                    <th>Grupa</th>
                    <th>Vrijeme</th>
                    <th>Lokacija</th>
                </tr>
                <?php
                
                $xml = simplexml_load_file("PopisUtakmica.xml");
                foreach($xml->Utakmica as $utakmica){
                    $trazilica = false;
                    foreach($utakmica->Grupa as $grupa){
                        if(!(isset($_GET['utakmice'])) || $grupa ==$_GET['utakmice']) $trazilica=true;
                    }
                    if($trazilica){
                        echo '<tr>
                        <td>'.$utakmica->Datum.'</td>
                        <td>'.$utakmica->Ekipa1.'</td>
                        <td>'.$utakmica->UtakmicaRB.'</td>
                        <td>'.$utakmica->Ekipa2.'</td>
                        <td>'.$utakmica->Grupa.'</td>
                        <td>'.$utakmica->Vrijeme.'</td>
                        <td>'.$utakmica->Lokacija.'</td>
                        </tr>';
                    }
                }
                ?>
            </table>
        </div> 
    </body>
</html>

