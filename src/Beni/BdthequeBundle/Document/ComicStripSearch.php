<?php


namespace Beni\BdthequeBundle\Document;


/**
 * Class ComicStripSearch
 *
 * @package Beni\BdthequeBundle\Document
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class ComicStripSearch
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $designer;

    /**
     * @var string
     */
    protected $scenarist;

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param $title
     *
     * @internal param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get designer
     *
     * @return string $designer
     */
    public function getDesigner()
    {
        return $this->designer;
    }

    /**
     * Set designer
     *
     * @param string $designer
     *
     * @return self
     */
    public function setDesigner($designer)
    {
        $this->designer = $designer;

        return $this;
    }

    /**
     * Get scenarist
     *
     * @return string $scenarist
     */
    public function getScenarist()
    {
        return $this->scenarist;
    }

    /**
     * Set scenarist
     *
     * @param string $scenarist
     *
     * @return self
     */
    public function setScenarist($scenarist)
    {
        $this->scenarist = $scenarist;

        return $this;
    }
}
