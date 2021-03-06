<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="`support_information`")
 */
class Support_Information
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\ManyToMany(targetEntity="Interaction" , inversedBy="support_informations")
	 * @ORM\JoinTable(name="interaction_support_information",
	 *      joinColumns={
	 *      		@ORM\JoinColumn(name="interaction_id", referencedColumnName="id")
	 *      	},
	 *      inverseJoinColumns={
	 *      		@ORM\JoinColumn(name="support_information_id", referencedColumnName="id")
	 *      	}
	 * 		)
	 */
	private $interactions;
	
	public function __construct() {
		$this->interactions = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $name;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $value;

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
     * Set name
     *
     * @param string $name
     * @return Support_Information
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Support_Information
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
     * Set value
     *
     * @param string $value
     * @return Support_Information
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Add interactions
     *
     * @param \AppBundle\Entity\Interaction $interactions
     * @return Support_Information
     */
    public function addInteraction(\AppBundle\Entity\Interaction $interactions)
    {
        $this->interactions[] = $interactions;

        return $this;
    }

    /**
     * Remove interactions
     *
     * @param \AppBundle\Entity\Interaction $interactions
     */
    public function removeInteraction(\AppBundle\Entity\Interaction $interactions)
    {
        $this->interactions->removeElement($interactions);
    }

    /**
     * Get interactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInteractions()
    {
        return $this->interactions;
    }
}
