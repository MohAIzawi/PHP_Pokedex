<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <main class="d-flex flex-column justify-content-center align-items-center">
        <h1>Search Results</h1>
        <div class="container">
            <div class="row">
            <?php
            require "./functions.php";

            $type = isset($_GET['type']) ? $_GET['type'] : null;
            $query = isset($_GET['query']) ? $_GET['query'] : null;
            $results = getPokemonByTypeAndPartialName($type, $query);

            foreach ($results as $result) {
                echo "<div class='col-lg-4 mb-4'>"; // Bootstrap grid class for 3 items per row
                echo "<div class='pokemon_info mx-2'>"; // Add horizontal margin
                echo "# " . $result['id'] . "</h2>";
                echo "<h2>" . $result['Name'] . "</h2>";
                echo "<img src='" . getPokemonSprite($result['Name']) . "' alt='' style='width: 150px; height: 150px;'><br>";
                if (isset($result['Type_1'])) {
                    echo "<span class='type-" . strtolower($result['Type_1']) . "'>" . $result['Type_1'] . "</span> ";
                }
                if (isset($result['Type_2'])) {
                    echo "<span class='type-" . strtolower($result['Type_2']) . "'>" . $result['Type_2'] . "</span><br><br>";
                }
                if (isset($result['HP'])) {
                    echo "<span class='stat stat-HP'>" . $result['HP'] . "</span>: HP<br><br>";
                }
                if (isset($result['Attack'])) {
                    echo "<span class='stat stat-Attack'>" . $result['Attack'] . "</span>: Attack<br><br>";
                }
                if (isset($result['Defense'])) {
                    echo "<span class='stat stat-Defense'>" . $result['Defense'] . "</span>: Defense<br><br>";
                }
                if (isset($result['Sp_Atk'])) {
                    echo "<span class='stat stat-Sp_Atk'>" . $result['Sp_Atk'] . "</span>: Special Attack<br><br>";
                }
                if (isset($result['Sp_Def'])) {
                    echo "<span class='stat stat-Sp_Def'>" . $result['Sp_Def'] . "</span>: Special Defense<br><br>";
                }
                if (isset($result['Speed'])) {
                    echo "<span class='stat stat-Speed'>" . $result['Speed'] . "</span>: Speed<br><br>";
                }
                if (isset($result['Generation'])) {
                    echo "Generation: <span class='stat stat-Generation'>" . $result['Generation'] . "</span><br><br>";
                }
                if (isset($result['Legendary'])) {
                    echo "Legendary: <span class='stat stat-Legendary'>" . $result['Legendary'] . "</span><br><br>";
                }
                echo "</div>";
                echo "</div>";
            }
        ?>
            </div>
        </div>
    </main>
</body>
</html>