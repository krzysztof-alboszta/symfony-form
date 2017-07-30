<?php

namespace AppBundle\Form\Model;

use AppBundle\Enum\DeclineType;
use Symfony\Component\Validator\Constraints as Assert;

class DeclineReason
{

    /**
     * @var  int
     * @Assert\NotBlank()
     */
    private $reason;

    /**
     * @var  string
     * @Assert\NotBlank(group="other")
     */
    private $other;

    /**
     * @return int
     */
    public function getReason(): int
    {
        return $this->reason;
    }

    /**
     * @param int $reason
     */
    public function setReason(int $reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getOther(): string
    {
        return $this->other;
    }

    /**
     * @param string $other
     */
    public function setOther(string $other)
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