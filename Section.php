<?php

class Section
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $initialPrice;

    /**
     * @var int
     */
    private $initialPeriod;

    /**
     * @var int
     */
    private $pricePerDay;

    /**
     * @var int
     */
    private $pointsForRenting;

    /**
     * @var int
     */
    private $addtlPoints;

    /**
     * @var int
     */
    private $addtlPointsAfter;

    /**
     * @param string $name
     * @param int $initialPrice
     * @param int $initialPeriod
     * @param int $pricePerDay
     */
    public function __construct($name, $initialPrice, $initialPeriod, $pricePerDay, $pointsForRenting, $addtlPoints, $addtlPointsAfter)
    {
        $this->name = $name;
        $this->initialPrice = $initialPrice;
        $this->initialPeriod = $initialPeriod;
        $this->pricePerDay = $pricePerDay;
        $this->pointsForRenting = $pointsForRenting;
        $this->addtlPoints = $addtlPoints;
        $this->addtlPointsAfter = $addtlPointsAfter;
    }

    // public function __destruct() // useful? I'm not sure. Just saw this was possible.... looks like there's more to it than this... just an idea for now.
    // {
    //     print "Destroying " . $this->name . "\n";
    // }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function initialPrice()
    {
      return $this->initialPrice;
    }

    /**
     * @return int
     */
    public function initialPeriod()
    {
      return $this->initialPeriod;
    }

    /**
     * @return int
     */
    public function pricePerDay()
    {
      return $this->pricePerDay;
    }

    /**
     * @return int
     */
    public function pointsForRenting()
    {
      return $this->pointsForRenting;
    }

    /**
     * @return int
     */
    public function addtlPoints()
    {
      return $this->addtlPoints;
    }

    /**
     * @return int
     */
    public function addtlPointsAfter()
    {
      return $this->addtlPointsAfter;
    }
}
