<?php

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Rental[]
     */
    private $rentals;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = [];
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function statement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = 'Rental Record for ' . $this->name() . PHP_EOL;

        foreach ($this->rentals as $rental) {  // It seems like it would be better to abstract this out or have a parameter that could be "html" to control how the result is constructed below.
            $thisAmount = 0;

            $initialPrice = $rental->movie()->section()->initialPrice();
            $initialPeriod = $rental->movie()->section()->initialPeriod();
            $pricePerDay = $rental->movie()->section()->pricePerDay();
            $pointsForRenting = $rental->movie()->section()->pointsForRenting();
            $addtlPoints = $rental->movie()->section()->addtlPoints();
            $addtlPointsAfter = $rental->movie()->section()->addtlPointsAfter();

            $thisAmount += $initialPrice;
            if ($rental->daysRented() > $initialPeriod) {
                $thisAmount += ($rental->daysRented() - $initialPeriod) * $pricePerDay;
            }

            $totalAmount += $thisAmount;

            $frequentRenterPoints += $pointsForRenting;
            if ($rental->daysRented() > $addtlPointsAfter) {
                $frequentRenterPoints += $addtlPoints;
            }

            $result .= "\t" . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $thisAmount . PHP_EOL;
        }

        $result .= 'Amount owed is ' . $totalAmount . PHP_EOL;
        $result .= 'You earned ' . $frequentRenterPoints . ' frequent renter points' . PHP_EOL;

        return $result;
    }

    /**
     * @return string
     */
    public function htmlStatement() // initial HTML output completed in 1 hour. Time includes reading project files and setting up environment
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = '<h1>Rental Record for <em>' . $this->name() . '</em></h1>' . PHP_EOL;
        $result .= '<ul>' . PHP_EOL;

        foreach ($this->rentals as $rental) {  // It seems like it would be better to abstract this out or have a parameter that could be "html" to control how the result is constructed below.
            $thisAmount = 0;

            $initialPrice = $rental->movie()->section()->initialPrice();
            $initialPeriod = $rental->movie()->section()->initialPeriod();
            $pricePerDay = $rental->movie()->section()->pricePerDay();
            $pointsForRenting = $rental->movie()->section()->pointsForRenting();
            $addtlPoints = $rental->movie()->section()->addtlPoints();
            $addtlPointsAfter = $rental->movie()->section()->addtlPointsAfter();

            $thisAmount += $initialPrice;
            if ($rental->daysRented() > $initialPeriod) {
                $thisAmount += ($rental->daysRented() - $initialPeriod) * $pricePerDay;
            }

            $totalAmount += $thisAmount;

            $frequentRenterPoints += $pointsForRenting;
            if ($rental->daysRented() > $addtlPointsAfter) {
                $frequentRenterPoints += $addtlPoints;
            }

            $result .= "\t" . '<li>' . $rental->movie()->name() . ' - ' . $thisAmount . '</li>' . PHP_EOL; // I used tabs here but I can't tell from the markdown file if that's what is being requested. They were there before so I figured I'd use them.
        }

        $result .= '</ul>' . PHP_EOL;
        $result .= '<p>Amount owed is <em>' . $totalAmount . '</em></p>' . PHP_EOL;
        $result .= '<p>You earned <em>' . $frequentRenterPoints . '</em> frequent renter points</p>' . PHP_EOL;

        return $result;
    }
}
