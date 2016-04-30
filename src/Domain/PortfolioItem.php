<?php
declare(strict_types = 1);

namespace Agares\Info\Domain;

class PortfolioItem
{
    private $imageUrl;
    private $url;
    private $title;
    private $technologies;
    private $description;

    public function __construct()
    {
        $this->title = 'agares.info';
        $this->technologies = ['SASS', 'HTML', 'PHP', 'Silex'];
        $this->url = 'http://agares.info/';
        $this->imageUrl = 'http://placehold.it/320x240';
        $this->description = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ac orci at nisl gravida volutpat. Sed fermentum orci sit amet imperdiet cursus. Praesent vitae nulla vel orci interdum aliquet id in nunc. Vestibulum commodo tempor tellus. Quisque sapien nibh, molestie id vestibulum non, cursus nec magna. Curabitur eget ex vitae lorem rhoncus consectetur nec sit amet nisl. Nam accumsan, odio sed sagittis viverra, nulla magna luctus mi, sed consequat dui ligula vel massa. In ut gravida est. Nam vestibulum consectetur facilisis. Nulla elementum lectus in orci malesuada, rutrum rutrum metus lobortis. Aenean blandit nibh sit amet pretium lacinia. Nam eu scelerisque sapien. </p>';
    }

    public function getImageUrl() : string
    {
        return $this->imageUrl;
    }

    public function getUrl() : string
    {
        return $this->url;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return string[]
     */
    public function getTechnologies() : array
    {
        return $this->technologies;
    }

    public function getDescription() : string
    {
        return $this->description;
    }
}