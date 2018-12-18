<?php

abstract class Cell
{
    protected $posI, $posJ;
    protected $cellSize;
    protected $cellColor;

    public function setColor($c)
    {
        $this->cellColor = $c;
    }


    public function getColor()
    {
        return $this->cellColor;
    }
}

class Player extends Cell
{
    public function __construct($i, $j)
    {
        $this->posI = $i;
        $this->posJ = $j;
        $this->cellColor = '#B70A02'; //red
    }

    public function move($newI, $newJ)
    {
        $this->posI = $newI;
        $this->posJ = $newJ;
    }

    public function getPosI()
    {
        return $this->posI;
    }

    public function getPosJ()
    {
        return $this->posJ;
    }
}

class Wall extends Cell
{

    public function __construct($i, $j)
    {
        $this->posI = $i;
        $this->posJ = $j;
        $this->cellColor = '';//image
    }

}

class FreeCell extends Cell
{
    public function __construct($i, $j)
    {
        $this->posI = $i;
        $this->posJ = $j;
        $this->cellColor = '#999999'; //dark gray
    }

}

class MovableCell extends Cell
{
    public function __construct($i, $j)
    {
        $this->posI = $i;
        $this->posJ = $j;
        $this->cellColor = '#cccccc'; //bright gray
    }

}


class GameMap
{
    public $map = array();
    protected $mapSizeN, $mapSizeM;
    public function setMap($newMap)
    {
        $this->map = $newMap;
    }

    public function __construct($n, $m)
    {
        $this->mapSizeN = $n;
        $this->mapSizeM = $m;
    }

    public function generateMap()
    {
        for ($i = 0; $i < $this->mapSizeN; $i++) {
            $this->map[$i] = array();
            for ($j = 0; $j < $this->mapSizeM; $j++) {
                switch (mt_rand(0, 1)) { //0 - free cell, 1 - blocked cell
                    case 0:
                        $this->map[$i][$j] = 0;
                        break;
                    case 1:
                        $this->map[$i][$j] = 1;
                        break;
                }
            }
        }

    }

    public function drawMovableCells(Player $pl)
    {
        for ($i = $pl->getPosI() - 1; $i <= $pl->getPosI() + 1; $i++) {
            for ($j = $pl->getPosJ() - 1; $j <= $pl->getPosJ() + 1; $j++) {
                if (($this->map[$i][$j] === 1) ||
                    (($i === $pl->getPosI()) && ($j === $pl->getPosJ()))) {
                    continue;
                } else {
                    $this->map[$i][$j] = 3; //movable cell
                }
            }
        }
    }

    //TODO drawCells(from i to j)

    public function setPlayer(Player $pl)
    {
        $this->map[$pl->getPosI()][$pl->getPosJ()] = 2;
        $this->drawMovableCells($pl);
    }


    //TODO optimize
    public function movePlayer(Player $pl, $newI, $newJ)
    {
        for ($i = $pl->getPosI() - 1; $i <= $pl->getPosI() + 1; $i++) {
            for ($j = $pl->getPosJ() - 1; $j <= $pl->getPosJ() + 1; $j++) {
                if (get_class($this->map[$i][$j]) == "Wall") {
                    continue;
                } else {
                    $this->map[$i][$j] = new FreeCell($i, $j);
                }
            }
        }

        $pl->move($newI, $newJ);
        $this->drawMovableCells($pl);
    }

    public function getSizeN()
    {
        return $this->mapSizeN;
    }

    public function getSizeM()
    {
        return $this->mapSizeM;
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test1</title>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
</head>
<body>
<canvas height='320' width='480' id='example'>Обновите браузер</canvas>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>


<?php $gameMap = new GameMap(20, 20);
$gameMap->generateMap();
$player = new Player(mt_rand(1, 18), mt_rand(1, 18));
$gameMap->setPlayer($player);
$cellSize = 32;
?>
<script>

    function deleteCells(elems, ctx, pl) {
        elems.forEach(function (element) {
            ctx.fillStyle = "#999999";
            ctx.fillRect(element.left, element.top, element.width, element.height);
        });
        ctx.fillRect(pl.left, pl.top, pl.width, pl.height);
    }

    function draw(elems, ctx, pl) {
        // ctx.fillStyle = "#cccccc";
        // // elems.forEach(function (element) {
        // //         ctx.fillRect(element.left, element.top, element.width, element.height);
        // // });
        // for (let i = pl.p_i - 1; i <= pl.p_i + 1; i++) {
        //     for (let j = pl.p_j - 1; j <= pl.p_j + 1; j++) {
        //         if ((map[i][j] === 1) ||
        //             ((i === pl) && (j === pl))) {
        //             continue;
        //         } else {
        //             map[i][j] = 3; //movable cell
        //         }
        //     }
        // }

        ctx.fillStyle = "#B70A02";
        ctx.fillRect(pl.left, pl.top, pl.width, pl.height);
    }

    $(document).ready(function () {
        let canv = document.getElementById("example");
        let canvLeft = canv.offsetLeft,
            canvTop = canv.offsetTop;
        let ctx = canv.getContext('2d');

        let clickableElems = [];
        let player;
        canv.width = 1000;
        canv.height = 1000;

        canv.addEventListener('click', function (event) {
            let x = event.pageX - canvLeft,
                y = event.pageY - canvTop;
// Collision detection between clicked offset and element.
            clickableElems.forEach(function (element) {
                if (y > element.top && y < element.top + element.height
                    && x > element.left && x < element.left + element.width) {
                    deleteCells(clickableElems, ctx, player);
//TODO player move

                    $.get(
                        "main.php",
                        {
                            pos_i: element.p_i,
                            pos_j: element.p_j
                        },
                        onAjaxSuccess,
                        "json"
                    );

                    function onAjaxSuccess(data) {

                        player.p_i = parseInt(data.pos_i);
                        player.p_j = parseInt(data.pos_j);
                        ctx.fillStyle = "#B70A02";
                        ctx.fillRect(20 + player.p_i * 32, 20 + player.p_j * 32, player.width, player.height);

                    }

                }
            });

        }, false);

        let img = new Image();
        img.src = 'img/block.PNG';
        ctx.fillStyle = "#999999";
        ctx.fillRect(20, 20, canv.width, canv.height);
        img.onload = function () {

            <?php
            for ($i = 0; $i < $gameMap->getSizeN(); $i++) {
            for ($j = 0; $j < $gameMap->getSizeM(); $j++) {
            switch ($gameMap->map[$i][$j] ) {
            case 1:
            ?>
            ctx.drawImage(img, 20 + <?=$i * $cellSize?>, 20 + <?= $j * $cellSize?>, <?= $cellSize?>, <?= $cellSize?>);
            <?php
            break;
            case 2:
            ?>
            ctx.fillStyle = '#B70A02';
            ctx.fillRect(20 + <?=$i * $cellSize?>, 20 + <?= $j * $cellSize?>, <?= $cellSize?>, <?= $cellSize?>);
            player = {
                left: 20 + <?=$i * $cellSize?>,
                top: 20 + <?= $j * $cellSize?>,
                width: <?= $cellSize?>,
                height: <?= $cellSize?>,
                type: "player",
                p_i: <?=$i?>,
                p_j: <?=$j?>
            };
            <?php
            break;
            case 3:
            ?>
            ctx.fillStyle = '#cccccc';
            ctx.fillRect(20 + <?=$i * $cellSize?>, 20 + <?= $j * $cellSize?>, <?= $cellSize?>, <?= $cellSize?>);
            clickableElems.push({
                left: 20 + <?=$i * $cellSize?>,
                top: 20 + <?= $j * $cellSize?>,
                width: <?= $cellSize?>,
                height: <?= $cellSize?>,
                type: "movable",
                p_i: <?=$i?>,
                p_j: <?=$j?>
            });
            <?php
            break;
            default:
                break;
            }
            }
            } ?>
        };
    });
</script>


</body>
</html>