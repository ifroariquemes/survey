<?php

namespace IfroLdapBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use FR3D\LdapBundle\Model\LdapUserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class FOSUser extends BaseUser implements LdapUserInterface {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $description;

    /**
     * @ORM\Column(type="string")
     */
    protected $dn;

    public function __construct() {
        parent::__construct();
        if (empty($this->roles)) {
            $this->roles[] = 'ROLE_USER';
        }
    }

    /**
     * {@inheritDoc}
     */
    public function setDn($dn) {
        $this->dn = $dn;
    }

    /**
     * {@inheritDoc}
     */
    public function getDn() {
        return $this->dn;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getName() {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($desc) {
        $this->description = $desc;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription() {
        return $this->description;
    }

}
