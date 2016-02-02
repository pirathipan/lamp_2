<?php

require_once "banque.php";
session_start();

if(isset($_POST['reset'])) {
    unset($_SESSION['game']);
}

if(!isset($_SESSION['game'])){
    $game = new game();
    $_SESSION['deck'] = serialize($game);
}else{
    $game = unserialize($_SESSION['game']);
}

if(isset($_POST['choice'])){
    if($game->joueur->getHandValue() <= 21 && $game->status != 'end'){
        $game->joueur->take($game->deck->deal(1));
    }
}

if($game->player->getHandValue() > 21){
    echo "perdu".$game->joueur->getHandValue();
}else{
    echo "Vous avez =>".$game->joueur->getHandValue();
}

if(isset($_POST['pass'])) {
    $game->status = 'end';
    while($game->banque->getHandValue() <= $game->joueur->getHandValue()){
        $game->banque->take($game->deck->deal(1));
    }
}

$_SESSION['game'] = serialize($game);
