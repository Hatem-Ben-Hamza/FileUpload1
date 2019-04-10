<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UploadFileTest
 *
 * @ORM\Table(name="upload_file_test")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UploadFileTestRepository")
 */
class Test
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    /* @ORM\Column(type="string")
    /* @Assert\NotBlank(message="this fild cannot be empty")
    /* @Assert\File(mimeTypes={"application/pdf"})
    */

    protected $file1;

    /**
    /* @ORM\Column(type="string")
    /* @Assert\NotBlank(message="this fild cannot be empty")
    /* @Assert\File(mimeTypes={"application/pdf"})
    */

    protected $file2;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set file
     *
     * @param string $file
     *
     * @return UploadFileTest
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set file1
     *
     * @param string $file1
     *
     * @return Test
     */
    public function setFile1($file1)
    {
        $this->file1 = $file1;

        return $this;
    }

    /**
     * Get file1
     *
     * @return string
     */
    public function getFile1()
    {
        return $this->file1;
    }

    /**
     * Set file2
     *
     * @param string $file2
     *
     * @return Test
     */
    public function setFile2($file2)
    {
        $this->file2 = $file2;

        return $this;
    }

    /**
     * Get file2
     *
     * @return string
     */
    public function getFile2()
    {
        return $this->file2;
    }
}
