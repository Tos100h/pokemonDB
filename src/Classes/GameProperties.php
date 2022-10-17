<?php

namespace App\Classes;



class GameProperties
{
    /**
     * @var integer
     */
    private $nbTurn;

    /**
     * @var integer
     */
    private $thisTurn;

    /**
     * @var integer
     */
    private $points;

    /**
     * @var array
     */
    private $gen;

    /**
     * @var boolean
     */
    private $formes;

    /**
     * @var boolean
     */
    private $evol;

    public function __construct($nbTurn, $gen, $formes, $evol) {
        $this->nbTurn = $nbTurn;
        $this->gen = $gen;
        $this->formes = $formes;
        $this->evol = $evol;
    }


    /**
     * Get the value of thisTurn
     *
     * @return  integer
     */ 
    public function getThisTurn()
    {
        return $this->thisTurn;
    }

    /**
     * Set the value of thisTurn
     *
     * @param  integer  $thisTurn
     *
     * @return  self
     */ 
    public function setThisTurn($thisTurn)
    {
        $this->thisTurn = $thisTurn;

        return $this;
    }

    /**
     * Get the value of points
     *
     * @return  integer
     */ 
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set the value of points
     *
     * @param  integer  $points
     *
     * @return  self
     */ 
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get the value of gen
     *
     * @return  array
     */ 
    public function getGen()
    {
        return $this->gen;
    }

    /**
     * Set the value of gen
     *
     * @param  array  $gen
     *
     * @return  self
     */ 
    public function setGen(array $gen)
    {
        $this->gen = $gen;

        return $this;
    }



    /**
     * Get the value of nbTurn
     *
     * @return  integer
     */ 
    public function getNbTurn()
    {
        return $this->nbTurn;
    }
}