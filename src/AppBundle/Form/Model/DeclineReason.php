<?php

namespace AppBundle\Form\Model;

use AppBundle\Enum\DeclineType;
use Symfony\Component\Validator\Constraints as Assert;

class DeclineReason
{

    /**
     * @var  int|null
     * @Assert\NotBlank()
     */
    private $reason;

    /**
     * @var  string
     * @Assert\NotBlank(groups={"other"})
     */
    private $other = '';

    /**
     * @return int|null
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param int $reason
     */
    public function setReason(int $reason = null)
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * @param string $other
     */
    public function setOther(string $other = null)
    {
        $this->other = $other;
    }

    /**
     * @return bool
     */
    public function isOtherReason(): bool
    {
        return $this->getReason() === DeclineType::OTHER;
    }

}