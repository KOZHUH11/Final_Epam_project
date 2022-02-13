<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>project</title>
    <title>Пошук в базі данних уразливостей </title>
</head>
<body>
  
    <form method="post">
        <input type="search" name="search" placeholder="Search" size=70/>
        <input type="submit" name="submit"/></br>
    </form>
    </br>
<?php
if(isset($_POST['submit'])){
        $search = $_POST['search'];
        $connection = mysqli_connect('main-db.cfxrp2tzda6r.us-west-2.rds.amazonaws.com:3306','admin','final13.02','project');

        $query = "SELECT * FROM all_for_search WHERE Загроза LIKE '%$search%'";

        $result = mysqli_query($connection, $query) or die("Error".mysqli_error($connection)); 
        if($result)
        {
            $rows = mysqli_num_rows($result); 
             
            echo "<table><th>Тип загрози</th><th>Назва активу</th><th>Власник активу</th><th>Місце розташування</th>
            <th>Категорія активу</th><th>Загроза</th><th>Джерело загрози</th><th>Механізм реалізації нападу</th>";
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result);
                echo "<tr>";
                    for ($j = 0 ; $j < 8 ; ++$j) echo "<td> $row[$j]</td>";
                echo "</tr>";
            }
            echo "</table>";
             

            mysqli_free_result($result);
        }
    }
?>
</body>
<body>
    <div class="dropdown">
        <button class="mainmenubtn">Персональні дані клієнтів</button>
        <div class="dropdown-child">
            <div class="btn-group">
                <div class="secondarybtn1">
                    <button class="btn btn-secondary">Цілісність</button>
                    <div class="dropdown-child1">
                        <form action="select1.php" method="GET">
                            <input type="hidden" name="table" value="integrity1">
                            <button type="submit" name="submit" class="btn">Вивести список</button>
                        </form>
                    </div>
                </div>
                <div class="secondarybtn2">
                    <button class="btn btn-secondary">Доступність</button>
                    <div class="dropdown-child2">
                        <form action="select1.php" method="GET">
                            <input type="hidden" name="table" value="accessibility1">
                            <button type="submit" name="submit" class="btn">Вивести список</button>
                    </div>
                </div>
                <div class="secondarybtn3">
                    <button class="btn btn-secondary">Конфіденційність</button>
                    <div class="dropdown-child3">
                        <form action="select1.php" method="GET">
                            <input type="hidden" name="table" value="confidentiality1">
                            <button type="submit" name="submit" class="btn">Вивести список</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <button class="mainmenubtn">Сервер</button>
        <div class="dropdown-child">
            <div class="btn-group">
                <div class="secondarybtn1">
                    <button class="btn btn-secondary">Цілісність</button>
                    <div class="dropdown-child1">
                        <form action="select1.php" method="GET">
                            <input type="hidden" name="table" value="integrity2">
                            <button type="submit" name="submit" class="btn">Вивести список</button>
                        </form>
                        
                    </div>
                </div>
                <div class="secondarybtn2">
                    <button class="btn btn-secondary">Доступність</button>
                    <div class="dropdown-child2">
                        <form action="select1.php" method="GET">
                            <input type="hidden" name="table" value="accessibility2">
                            <button type="submit" name="submit" class="btn">Вивести список</button>
                        </form>
                        
                    </div>
                </div>
                <div class="secondarybtn3">
                    <button class="btn btn-secondary">Конфіденційність</button>
                    <div class="dropdown-child3">
                        <form action="select1.php" method="GET">
                            <input type="hidden" name="table" value="confidentiality2">
                            <button type="submit" name="submit" class="btn">Вивести список</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <button class="mainmenubtn">Договори компанії</button>
        <div class="dropdown-child">
            <div class="btn-group">
                <div class="secondarybtn1">
                    <button class="btn btn-secondary">Цілісність</button>
                    <div class="dropdown-child1">
                        <form action="select1.php" method="GET">
                            <input type="hidden" name="table" value="integrity3">
                            <button type="submit" name="submit" class="btn">Вивести список</button>
                        </form>
                        
                    </div>
                </div>
                <div class="secondarybtn2">
                    <button class="btn btn-secondary">Доступність</button>
                    <div class="dropdown-child2">
                        <form action="select1.php" method="GET">
                            <input type="hidden" name="table" value="accessibility3">
                            <button type="submit" name="submit" class="btn">Вивести список</button>
                        </form>
                        
                    </div>
                </div>
                <div class="secondarybtn3">
                    <button class="btn btn-secondary">Конфіденційність</button>
                    <div class="dropdown-child3">
                        <form action="select1.php" method="GET">
                            <input type="hidden" name="table" value="confidentiality3">
                            <button type="submit" name="submit" class="btn">Вивести список</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

  
</body>
</html>
