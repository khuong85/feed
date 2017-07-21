<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="feed")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FeedRepository")
 * @ORM\HasLifecycleCallbacks()
 */

class Feed{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(
	 * 		message = "Please input title"
	 * )
	 */
	private $title;

	/**
	 * @ORM\Column(type="text")
	 * @Assert\NotBlank(
	 * 		message = "Please input description"
	 * )
	 */
	private $description;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(
	 * 		message = "Please input link"
	 * )
	 */
	private $link;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $category;

	/**
	 * @ORM\Column(type="text")
	 */
	private $comments;

	/**
	 * @ORM\Column(type="datetime")
	 * @Assert\NotBlank(
	 * 		message = "Please select pulic date"
	 * )
	 */
	private $pub_date;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Feed
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Feed
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Feed
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Feed
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Feed
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set pubData
     *
     * @param \DateTime $pubData
     *
     * @return Feed
     */
    public function setPubData($pubData)
    {
        $this->pub_data = $pubData;

        return $this;
    }

    /**
     * Get pubData
     *
     * @return \DateTime
     */
    public function getPubData()
    {
        return $this->pub_data;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Feed
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Feed
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     *
     * @return Feed
     */
    public function setPubDate($pubDate)
    {
        $this->pub_date = $pubDate;

        return $this;
    }

    /**
     * Get pubDate
     *
     * @return \DateTime
     */
    public function getPubDate()
    {
        return $this->pub_date;
    }
}
