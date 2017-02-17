<?php

namespace Demo;

/**
 * Class Demo
 * @package Demo
 */
class Demo
{
    public $players = array();
    public $grid = array();
    public $ki = 0;
    public $turns = 0;
    public $obstart = null;

    public function resetGame()
    {
        $this->grid = array();
        $this->turns = 0;
    }
    public function setSettingsAndStart()
    {
        if($this->obstart === null) {
            ob_start();
            $this->obstart = true;
        }
        $this->clearScreen();
        $this->resetGame();
        echo "KI? (0 für keine, 1 für billig, 2 für unschlagbar):\n";
        ob_flush();
        $handle = fopen ("php://stdin","r");
        $input = (int)fgets($handle);
        ob_flush();
        $this->ki = $input;

        $this->createPlayer(1, 'x');
        if($this->ki === 0) {
            $this->createPlayer(2, 'o');
        }

        $this->generateGame();
    }
    public function generateGame()
    {
        $this->resetGame();
        $this->generateGrid();
        $this->startGame();
    }
    public function startGame()
    {
        while(1) {
            foreach($this->players as $player) {
                $this->clearScreen();
                $this->printGrid();
                ob_flush();
                $this->checkGame();
                ob_flush();
                while (1) {
                    echo "player (".$player->sign.") ".$player->number." am zug. Eingabe:\n";
                    ob_flush();
                    $handle = fopen ("php://stdin","r");
                    $input = (int)fgets($handle);
                    $input = $input-1;
                    if($this->grid[$input]->sign != '_') {
                        $this->clearScreen();
                        echo "\nwrong input. Try again\n";
                        $this->printGrid();
                    } else {
                        break;
                    }
                }

                $this->grid[$input]->setSign($player->sign);
                $this->turns++;
                if($this->ki) {
                    if($this->ki == '2') {
                        $this->hardKi();
                    } else {
                        $this->lowKi();
                    }
                }
            }
        }
    }
    public function hardKi()
    {
        //check if i can win
        foreach([0,1,2,3,4,5,6,7,8] as $key) {
            if($this->grid[$key]->sign == '_') {
                $this->grid[$key]->sign = 'o';
                $win = $this->checkGame(false);
                if(!$win) {
                    $this->grid[$key]->sign = '_';
                } else {
                    $this->turns++;
                    return;
                }
            }
        }
        //check if you can win
        foreach([0,1,2,3,4,5,6,7,8] as $key) {
            if($this->grid[$key]->sign == '_') {
                $this->grid[$key]->sign = 'x';
                $win = $this->checkGame(false);
                if(!$win) {
                    $this->grid[$key]->sign = '_';
                } else {
                    $this->grid[$key]->sign = 'o';
                    $this->turns++;
                    return;
                }
            }
        }
        $turn = $this->highKiTurn();
        if(!$turn) {
            if($this->grid[4]->sign == '_') {
                $this->grid[4]->sign = 'o';
            } elseif($this->grid[0]->sign == '_') {
                $this->grid[0]->sign = 'o';
            } elseif($this->grid[2]->sign == '_') {
                $this->grid[2]->sign = 'o';
            } elseif($this->grid[6]->sign == '_') {
                $this->grid[6]->sign = 'o';
            } elseif($this->grid[8]->sign == '_') {
                $this->grid[8]->sign = 'o';
            } else {
                $this->lowKiTurn();
            }
        }

        $this->turns++;

    }
    public function highKiTurn()
    {
        $turnDone = false;
        //check if i can win
        foreach([0,1,2,3,4,5,6,7,8] as $key) {
            if($this->grid[$key]->sign == '_') {
                $this->grid[$key]->sign = 'o';
                //check if i can win
                foreach([0,1,2,3,4,5,6,7,8] as $keyKey) {
                    if($this->grid[$keyKey]->sign == '_') {
                        $this->grid[$keyKey]->sign = 'o';
                        $win = $this->checkGame(false);
                        if(!$win) {
                            $this->grid[$keyKey]->sign = '_';
                        } else {
                            $this->grid[$keyKey]->sign = '_';
                            $turnDone = true;
                            break 2;
                        }
                    }
                }
                $this->grid[$key]->sign = '_';
            }
        }
        return $turnDone;
    }
    public function lowKi()
    {
        $this->lowKiTurn();
        $this->turns++;
    }
    public function lowKiTurn()
    {
        while(1 && $this->turns < 9) {
            $randNumber = rand(0,8);
            if($this->grid[$randNumber]->sign == '_') {
                $this->grid[$randNumber]->sign = 'o';
                break;
            }
        }
    }
    public function clearScreen()
    {
        echo "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
    }
    public function printGrid()
    {
        echo "\n_______\n";
        echo '|'.$this->grid[0]->sign.'|'.$this->grid[1]->sign.'|'.$this->grid[2]->sign."|\n";
        echo '|'.$this->grid[3]->sign.'|'.$this->grid[4]->sign.'|'.$this->grid[5]->sign."|\n";
        echo '|'.$this->grid[6]->sign.'|'.$this->grid[7]->sign.'|'.$this->grid[8]->sign."|\n";
        echo "_______\n";
    }
    public function generateGrid()
    {
        $this->grid[] = new State();
        $this->grid[] = new State();
        $this->grid[] = new State();
        $this->grid[] = new State();
        $this->grid[] = new State();
        $this->grid[] = new State();
        $this->grid[] = new State();
        $this->grid[] = new State();
        $this->grid[] = new State();
    }

    // 0,1,2
    // 3,4,5
    // 6,7,8
    public function checkGame($echo = true)
    {
        if($echo && $this->turns >= 9) {
            $this->responseWinOrNothing("both");
        }
        $return = $this->checkReponse($this->checkFieldsIfWin([0,3,6]), $echo);
        if($return) {
            return $return;
        }
        $return = $this->checkReponse($this->checkFieldsIfWin([1,4,7]), $echo);
        if($return) {
            return $return;
        }
        $return = $this->checkReponse($this->checkFieldsIfWin([2,5,8]), $echo);
        if($return) {
            return $return;
        }
        $return = $this->checkReponse($this->checkFieldsIfWin([0,1,2]), $echo);
        if($return) {
            return $return;
        }
        $return = $this->checkReponse($this->checkFieldsIfWin([3,4,5]), $echo);
        if($return) {
            return $return;
        }
        $return = $this->checkReponse($this->checkFieldsIfWin([6,7,8]), $echo);
        if($return) {
            return $return;
        }
        $return = $this->checkReponse($this->checkFieldsIfWin([0,4,8]), $echo);
        if($return) {
            return $return;
        }
        $return = $this->checkReponse($this->checkFieldsIfWin([2,4,6]), $echo);

        return $return;

    }
    public function checkReponse($sign, $echo)
    {
        if($sign && $echo) {
            $this->responseWinOrNothing($sign);
        } elseif($sign) {
            return true;
        }
        return $sign;
    }
    public function responseWinOrNothing($sign)
    {
        if($sign) {
            echo $sign." has won\n\n\n";
            echo "restart? (yes/y/1/Entertaste)\n";
            ob_flush();
            $handle = fopen ("php://stdin","r");
            $input = (string)fgets($handle);
            if($input == "yes\n" || $input == "y\n" || $input == "1\n" || $input == "\n") {
                $this->generateGame();
            } else {
                echo "exit game, tschööö\n\n";
                ob_flush();
                exit();
            }
        }
        return false;
    }
    public function checkFieldsIfWin($numbers)
    {
        $storage = array();
        foreach($numbers as $number) {
            if($this->grid[$number]->sign == null || $this->grid[$number]->sign == '_') {
                return false;
            } else {
                if(isset($storage[$this->grid[$number]->sign])) {
                    $storage[$this->grid[$number]->sign]++;
                    if($storage[$this->grid[$number]->sign] == 3) {
                        return $this->grid[$number]->sign;
                    }
                } else {
                    $storage[$this->grid[$number]->sign] = 1;
                }
            }
        }
        return false;
    }
    public function createPlayer($number, $sign)
    {
        $this->players[] = new Player($number, $sign);
    }

    public function demoMethod()
    {
        return "Return Value";
    }
}