<?php

class joueur{
    protected $hand;
    protected $pseudo;

    public function __construct(){
        $this->hand = [];
    }

    public function take($cards){
        foreach($cards as $card)
            $this->hand[] = $card;
    }

    public function getHandValue(){
        $total = 0;
        foreach ($this->hand as $card) {
            $total += $card->getValue();
        }
        return $total;
    }


    class Card{

        private $face,$color;

        public function __construct($color,$face){
            $this->face = $face;
            $this->color = $color;
        }

        public function getFace(){
            return $this->face;
        }
        public function getColor(){
            return $this->color;
        }

        public function getValue(){
            if(is_int($this->face)){
                return $this->face;
            }else{
                return 10;
            }
        }

        public function __toString(){
            return $this->face." de ".$this->color;
        }



class Banque extends Player{
    public function __construct(){
        parent::__construct("Banque");
    }

    class game{
        public $deck;
        public $joueur;
        public $banque;
        public $status;

        public function __construct(){
            $this->banque = new Banque();
            $this->deck = new Deck();
            $this->joueur = new joueur();
            $this->deck->shuffle();
            $this->banque->take($this->deck->deal(2));
            $this->joeur->take($this->deck->deal(2));
            $this->status = 'beginning';
        }
    }
}
