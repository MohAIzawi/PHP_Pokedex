<?php require "./functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex by Moh</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: red; font-size: 20px;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php" style="color: white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pokedex.php" style="color: white;">Pokedex</a>
                </li>
            </ul>
            <form class="d-flex ml-auto" role="search" method="GET" action="search.php">
                <select name="type" class="form-control form-control-sm">
                <option value="">Select type</option>
                <option value="Fire">Fire</option>
                <option value="Water">Water</option>
                <option value="Grass">Grass</option>
                <option value="Electric">Electric</option>
                <option value="Psychic">Psychic</option>
                <option value="Ice">Ice</option>
                <option value="Dragon">Dragon</option>
                <option value="Fairy">Fairy</option>
                <option value="Dark">Dark</option>
                <option value="Normal">Normal</option>
                <option value="Fighting">Fighting</option>
                <option value="Flying">Flying</option>
                <option value="Poison">Poison</option>
                <option value="Ground">Ground</option>
                <option value="Rock">Rock</option>
                <option value="Bug">Bug</option>
                <option value="Ghost">Ghost</option>
                <option value="Steel">Steel</option>
                </select>
                <input class="form-control form-control-sm me-2" type="search" placeholder="Search" aria-label="Search" name="query" id="nameInput">
                <button type="submit" class="btn btn-light btn-bg btn-sm">Search</button>
            </form>
            </div>
        </div>
    </nav>
    </header>
    <main>
        <div class="container">
        <div class="row">
            <?php
                $pokemon = getAllPokemon();
                foreach ($pokemon as $poke) {
                    ?>
                        <div class="col-md-3 m-3">
                            <div class="pokemon_sprite text-center">
                                <?php $info = getPokemonInfo($poke['id']); ?>
                                <a href="search2.php?id=<?php echo $info[0]['id']; ?>">
                                    <img src="<?php echo getPokemonSprite($poke['Name']) ?>" alt="" style="width: 150px; height: 150px;">
                                </a>
                            </div>
                            <div class="pokemon_info">
                                <?php 
                                $info = getPokemonInfo($poke['id']);
                                echo "# " . $info[0]['id'] . "<br>";
                                echo $info[0]['Name'] . "<br>";
                                echo "<span class='type-" . strtolower($info[0]['Type_1']) . "'>" . $info[0]['Type_1'] . "</span> ";
                                echo "<span class='type-" . strtolower($info[0]['Type_2']) . "'>" . $info[0]['Type_2'] . "</span><br>";
                                ?>
                                <br>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
        <footer class="footer2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>© 2024 Moh</p>
                </div>
            </div>
        </div>
        </footer>
    </main>
        
</body>
</html>