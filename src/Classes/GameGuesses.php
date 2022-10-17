<?php

namespace App\Classes;

use App\Entity\Types;


class GameGuesses
{
    /**
     * @var Types::class
     */
    private $type1;

    /**
     * @var ?Types::class
     */
    private $type2;

    /**
     * Get the value of type1
     *
     * @return  Types::class
     */ 
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * Set the value of type1
     *
     * @param  Types::class  $type1
     *
     * @return  self
     */ 
    public function setType1(Types $type1)
    {
        $this->type1 = $type1;

        return $this;
    }

    /**
     * Get the value of type2
     *
     * @return  ?Types::class
     */ 
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * Set the value of type2
     *
     * @param  ?Types::class  $type2
     *
     * @return  self
     */ 
    public function setType2(?Types $type2)
    {
        $this->type2 = $type2;

        return $this;
    }
}

