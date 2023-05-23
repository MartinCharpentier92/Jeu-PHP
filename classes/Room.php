<?php

class Room {
    private string $name;
    private string $description;
    private string $type;
    private int $donjon_id;
    private int $or;
    public string $picture;

    public function __construct($room)
    {
        $this->name = $room['name'];
        $this->description = $room['description'];
        $this->type = $room['type'];
        $this->donjon_id = $room['donjon_id'];
        $this->picture = $room['picture'] ? $room['picture'] : "";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getHTML(): string
    {
        $html = "";

        switch ($this->type) {
            case 'devanture':
                $html .= "<p><a href='donjons_play.php?id=". $this->donjon_id ."'>Continuer l'exploration</a></p>";
                break;
            
            case 'vide':
                $html .= "<p><a href='donjons_play.php?id=". $this->donjon_id ."'>Continuer l'exploration</a></p>";
                break;

            case 'treasure':
                $html .= "<p>Vous avez gagné " . $this->or . " pièce d'or</p>";
                $html .= "<p><a href='donjons_play.php?id=". $this->donjon_id ."'>Continuer l'exploration</a></p>";
                break;

            case 'combat':
                $html .= "<p><a href='donjons_fight.php?id=". $this->donjon_id ."'>Combattre</a>";
                $html .= "<a href='donjons_play.php?id=". $this->donjon_id ."'>Fuir et continuer l'exploration</a></p>";
                break;
            
            default:
                $html .= "<p>Aucune action possible !</p>";
                break;
        }

        return $html;
    }

    public function makeAction(): void
    {
        switch ($this->type) {
            case 'vide':
                break;

            case 'treasure':
                $this->or = rand(0, 20);
                $_SESSION['perso']['gold'] += $this->or;
                break;

            case 'combat':
                break;
            
            default:
                break;
        }
    }

}
