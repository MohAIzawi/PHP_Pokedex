<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <main class="d-flex flex-column justify-content-center align-items-center">
        <h1>Search ps</h1>
        <div class="pokemon_info">
        <?php
            require "./functions.php";

            $type = $_GET['type'];
            $pokemon = getPokemonByType($type);

            foreach ($pokemon as $p) {
                echo "<div class='col-lg-4 mb-4'>"; // Bootstrap grid class for 3 items per row
                echo "<div class='pokemon_info mx-2'>"; // Add horizontal margin
                echo "<div class='pokemon_info'>";
                echo "<h2>" . $p['Name'] . "</h2>";
                echo "<img src='" . getPokemonSprite($p['Name']) . "' alt='' style='width: 150px; height: 150px;'><br>";
                if (isset($p['Type_1'])) {
                    echo "<span class='type-" . strtolower($p['Type_1']) . "'>" . $p['Type_1'] . "</span> ";
                }
                if (isset($p['Type_2'])) {
                    echo "<span class='type-" . strtolower($p['Type_2']) . "'>" . $p['Type_2'] . "</span><br><br>";
                }
                if (isset($p['HP'])) {
                    echo "<span class='stat stat-HP'>" . $p['HP'] . "</span>: HP<br><br>";
                }
                if (isset($p['Attack'])) {
                    echo "<span class='stat stat-Attack'>" . $p['Attack'] . "</span>: Attack<br><br>";
                }
                if (isset($p['Defense'])) {
                    echo "<span class='stat stat-Defense'>" . $p['Defense'] . "</span>: Defense<br><br>";
                }
                if (isset($p['Sp_Atk'])) {
                    echo "<span class='stat stat-Sp_Atk'>" . $p['Sp_Atk'] . "</span>: Special Attack<br><br>";
                }
                if (isset($p['Sp_Def'])) {
                    echo "<span class='stat stat-Sp_Def'>" . $p['Sp_Def'] . "</span>: Special Defense<br><br>";
                }
                if (isset($p['Speed'])) {
                    echo "<span class='stat stat-Speed'>" . $p['Speed'] . "</span>: Speed<br><br>";
                }
                if (isset($p['Generation'])) {
                    echo "Generation: <span class='stat stat-Generation'>" . $p['Generation'] . "</span><br><br>";
                }
                if (isset($p['Legendary'])) {
                    $legendaryStatus = $p['Legendary'] === '1' ? 'Yes' : 'No';
                    echo "Legendary: <span class='stat stat-Legendary'>" . $legendaryStatus . "</span><br><br>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
        </div>
    </main>
</body>
</html>