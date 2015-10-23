<?php

require_once('Movie.php');
require_once('Rental.php');
require_once('Customer.php');
require_once('Section.php');

$childrens = new Section('childrens', 1.5, 3, 1.5, 1, 0, 0);  // $1.50 for 3 days, $1.50/day thereafter, 1 point earned by renting, 0 extra earned after 0 more days
$regular = new Section('regular', 2, 2, 1.5, 1, 0, 0);        // $2.00 for 2 days, $1.50/day thereafter, 1 point earned by renting, 0 extra earned after 0 more days
$newRelease = new Section('newRelease', 0, 0, 3, 1, 1, 1);    // $3.00/day, 1 point earned by renting, 1 extra point earned after 1 more day

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        $childrens
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        $regular
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        $newRelease
    ), 5
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->htmlStatement();
