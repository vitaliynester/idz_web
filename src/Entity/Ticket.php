<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ticketPayable;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ticketCreateTime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ticketStatus;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="ticket1s")
     * @ORM\JoinColumn(nullable=false)
     */
    private $doctor;

    /**
     * @ORM\OneToOne(targetEntity=Invoice::class, cascade={"persist", "remove"})
     */
    private $invoice;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="ticket1s")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    public function __construct()
    {
        $this->ticketPayable = false;
        $this->ticketStatus = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTicketPayable(): ?bool
    {
        return $this->ticketPayable;
    }

    public function setTicketPayable(bool $ticketPayable): self
    {
        $this->ticketPayable = $ticketPayable;

        return $this;
    }

    public function getTicketCreateTime(): ?DateTimeInterface
    {
        return $this->ticketCreateTime;
    }

    public function setTicketCreateTime(DateTimeInterface $ticketCreateTime): self
    {
        $this->ticketCreateTime = $ticketCreateTime;

        return $this;
    }

    public function getTicketStatus(): ?bool
    {
        return $this->ticketStatus;
    }

    public function setTicketStatus(bool $ticketStatus): self
    {
        $this->ticketStatus = $ticketStatus;

        return $this;
    }

    public function getDoctor(): ?Doctor
    {
        return $this->doctor;
    }

    public function setDoctor(?Doctor $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function __toString()
    {
        return $this->patient . " ?? ?????????? " . $this->doctor . ' ???? ' . $this->ticketCreateTime->format('d/m/Y');
    }
}
