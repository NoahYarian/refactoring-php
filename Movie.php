<?php

class Movie
{
    // const CHILDRENS = 2;
    // const REGULAR = 0;
    // const NEW_RELEASE = 1;


    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     * @param Section $section
     */
    public function __construct($name, Section $section)
    {
        $this->name = $name;
        $this->section = $section;
    }

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
    public function section()
    {
        return $this->section;
    }

}
