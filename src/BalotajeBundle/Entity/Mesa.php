<?php

namespace BalotajeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mesa
 *
 * @ORM\Table(name="mesas")
 * @ORM\Entity* @ORM\Entity(repositoryClass="BalotajeBundle\Entity\MesaRepository")
 */
class Mesa {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="numero", type="string", length=255)
	 */
	private $numero;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="escuela_testigo", type="string", length=255)
	 */
	private $escuelaTestigo;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="resultado_cambiemos", type="integer")
	 */
	private $resultadoCambiemos;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="resultado_fpv", type="integer")
	 */
	private $resultadoFpv;

	/**
	 * @var $localidad
	 *
	 * @ORM\ManyToOne(targetEntity="UbicacionBundle\Entity\Localidad")
	 * @ORM\JoinColumn(name="localidad_id", referencedColumnName="id")
	 */
	private $localidad;

	/**
	 * @var datetime $creado
	 *
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(name="creado", type="datetime", nullable=true)
	 */
	private $creado;

	/**
	 * @var datetime $actualizado
	 *
	 * @Gedmo\Timestampable(on="update")
	 * @ORM\Column(name="actualizado",type="datetime", nullable=true)
	 */
	private $actualizado;

	/**
	 * @var integer $creadoPor
	 *
	 * @Gedmo\Blameable(on="create")
	 * @ORM\ManyToOne(targetEntity="UsuariosBundle\Entity\Usuario")
	 * @ORM\JoinColumn(name="creado_por", referencedColumnName="id", nullable=true)
	 */
	private $creadoPor;

	/**
	 * @var integer $actualizadoPor
	 *
	 * @Gedmo\Blameable(on="update")
	 * @ORM\ManyToOne(targetEntity="UsuariosBundle\Entity\Usuario")
	 * @ORM\JoinColumn(name="actualizado_por", referencedColumnName="id", nullable=true)
	 */
	private $actualizadoPor;



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
     * Set numero
     *
     * @param string $numero
     *
     * @return Mesa
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set escuelaTestigo
     *
     * @param string $escuelaTestigo
     *
     * @return Mesa
     */
    public function setEscuelaTestigo($escuelaTestigo)
    {
        $this->escuelaTestigo = $escuelaTestigo;

        return $this;
    }

    /**
     * Get escuelaTestigo
     *
     * @return string
     */
    public function getEscuelaTestigo()
    {
        return $this->escuelaTestigo;
    }

    /**
     * Set resultadoCambiemos
     *
     * @param integer $resultadoCambiemos
     *
     * @return Mesa
     */
    public function setResultadoCambiemos($resultadoCambiemos)
    {
        $this->resultadoCambiemos = $resultadoCambiemos;

        return $this;
    }

    /**
     * Get resultadoCambiemos
     *
     * @return integer
     */
    public function getResultadoCambiemos()
    {
        return $this->resultadoCambiemos;
    }

    /**
     * Set resultadoFpv
     *
     * @param integer $resultadoFpv
     *
     * @return Mesa
     */
    public function setResultadoFpv($resultadoFpv)
    {
        $this->resultadoFpv = $resultadoFpv;

        return $this;
    }

    /**
     * Get resultadoFpv
     *
     * @return integer
     */
    public function getResultadoFpv()
    {
        return $this->resultadoFpv;
    }

    /**
     * Set creado
     *
     * @param \DateTime $creado
     *
     * @return Mesa
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;

        return $this;
    }

    /**
     * Get creado
     *
     * @return \DateTime
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * Set actualizado
     *
     * @param \DateTime $actualizado
     *
     * @return Mesa
     */
    public function setActualizado($actualizado)
    {
        $this->actualizado = $actualizado;

        return $this;
    }

    /**
     * Get actualizado
     *
     * @return \DateTime
     */
    public function getActualizado()
    {
        return $this->actualizado;
    }

    /**
     * Set localidad
     *
     * @param \UbicacionBundle\Entity\Localidad $localidad
     *
     * @return Mesa
     */
    public function setLocalidad(\UbicacionBundle\Entity\Localidad $localidad = null)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return \UbicacionBundle\Entity\Localidad
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set creadoPor
     *
     * @param \UsuariosBundle\Entity\Usuario $creadoPor
     *
     * @return Mesa
     */
    public function setCreadoPor(\UsuariosBundle\Entity\Usuario $creadoPor = null)
    {
        $this->creadoPor = $creadoPor;

        return $this;
    }

    /**
     * Get creadoPor
     *
     * @return \UsuariosBundle\Entity\Usuario
     */
    public function getCreadoPor()
    {
        return $this->creadoPor;
    }

    /**
     * Set actualizadoPor
     *
     * @param \UsuariosBundle\Entity\Usuario $actualizadoPor
     *
     * @return Mesa
     */
    public function setActualizadoPor(\UsuariosBundle\Entity\Usuario $actualizadoPor = null)
    {
        $this->actualizadoPor = $actualizadoPor;

        return $this;
    }

    /**
     * Get actualizadoPor
     *
     * @return \UsuariosBundle\Entity\Usuario
     */
    public function getActualizadoPor()
    {
        return $this->actualizadoPor;
    }
}
