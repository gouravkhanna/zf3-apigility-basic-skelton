<?php

namespace Application\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="fk_users_department_role_id", columns={"department_role_id"}), @ORM\Index(name="fk_users_reporting_to", columns={"reporting_to"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="employee_code", type="string", length=10, nullable=true)
     */
    private $employeeCode;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=101, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45, nullable=false)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_attempts", type="integer", nullable=false)
     */
    private $loginAttempts = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="login_attempt_time", type="integer", nullable=false)
     */
    private $loginAttemptTime = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=false)
     */
    private $status = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_signed_in", type="datetime", nullable=true)
     */
    private $lastSignedIn;

    /**
     * @var integer
     *
     * @ORM\Column(name="primary_phone", type="integer", nullable=true)
     */
    private $primaryPhone;

    /**
     * @var integer
     *
     * @ORM\Column(name="secondary_phone", type="integer", nullable=true)
     */
    private $secondaryPhone;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_id", type="integer", nullable=true)
     */
    private $storeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="purchase_limit", type="integer", nullable=true)
     */
    private $purchaseLimit;

   

    /**
     * @var \Application\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Users" , inversedBy = "reportees")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="reporting_to", referencedColumnName="id")
     * })
     */
    private $reportingTo;
    
    /**
     * @var Collection
     *
     * 
     * @ORM\OneToMany(targetEntity="Application\Entity\Users", mappedBy="reportingTo")
     */
    private $reportees;


    /** @ManyToMany(targetEntity="Role")
     *   @JoinTable(name="user_role",
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="role_id", referencedColumnName="rid", unique=true)}
     *      )
     * */
    private $roles;

    public function __construct() {
        $this->roles = new ArrayCollection();
        $this->reportees = new ArrayCollection();
    }

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
     * Set employeeCode
     *
     * @param string $employeeCode
     *
     * @return Users
     */
    public function setEmployeeCode($employeeCode)
    {
        $this->employeeCode = $employeeCode;

        return $this;
    }

    /**
     * Get employeeCode
     *
     * @return string
     */
    public function getEmployeeCode()
    {
        return $this->employeeCode;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set loginAttempts
     *
     * @param integer $loginAttempts
     *
     * @return Users
     */
    public function setLoginAttempts($loginAttempts)
    {
        $this->loginAttempts = $loginAttempts;

        return $this;
    }

    /**
     * Get loginAttempts
     *
     * @return integer
     */
    public function getLoginAttempts()
    {
        return $this->loginAttempts;
    }

    /**
     * Increment loginAttempts
     *
     * @return integer
     */
    public function incrementLoginAttempts() {
        $this->loginAttempts++;
    }

    /**
     * Set loginAttemptTime
     *
     * @param integer $loginAttemptTime
     *
     * @return Users
     */
    public function setLoginAttemptTime($loginAttemptTime)
    {
        $this->loginAttemptTime = $loginAttemptTime;

        return $this;
    }

    /**
     * Get loginAttemptTime
     *
     * @return integer
     */
    public function getLoginAttemptTime()
    {
        return $this->loginAttemptTime;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Users
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Users
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Users
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set lastSignedIn
     *
     * @param \DateTime $lastSignedIn
     *
     * @return Users
     */
    public function setLastSignedIn($lastSignedIn)
    {
        $this->lastSignedIn = $lastSignedIn;

        return $this;
    }

    /**
     * Get lastSignedIn
     *
     * @return \DateTime
     */
    public function getLastSignedIn()
    {
        return $this->lastSignedIn;
    }

    /**
     * Set primaryPhone
     *
     * @param integer $primaryPhone
     *
     * @return Users
     */
    public function setPrimaryPhone($primaryPhone)
    {
        $this->primaryPhone = $primaryPhone;

        return $this;
    }

    /**
     * Get primaryPhone
     *
     * @return integer
     */
    public function getPrimaryPhone()
    {
        return $this->primaryPhone;
    }

    /**
     * Set secondaryPhone
     *
     * @param integer $secondaryPhone
     *
     * @return Users
     */
    public function setSecondaryPhone($secondaryPhone)
    {
        $this->secondaryPhone = $secondaryPhone;

        return $this;
    }

    /**
     * Get secondaryPhone
     *
     * @return integer
     */
    public function getSecondaryPhone()
    {
        return $this->secondaryPhone;
    }

    /**
     * Set storeId
     *
     * @param integer $storeId
     *
     * @return Users
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }

    /**
     * Get storeId
     *
     * @return integer
     */
    public function getStoreId()
    {
        return $this->storeId;
    }
    
    
    /**
     * Set  purchase Limit
     *
     * @param integer $purchaseLimit
     *
     * @return Users
     */
    public function setPurchaseLimit($purchaseLimit)
    {
        $this->purchaseLimit = $purchaseLimit;

        return $this;
    }

    /**
     * Get purchase Limit
     *
     * @return integer
     */
    public function getPurchaseLimit()
    {
        return $this->purchaseLimit;
    }

    
    
    /**
     * Set departmentRole
     *
     * @param \Users\Entity\UsersDepartmentRole $departmentRole
     *
     * @return Users
     */
    public function setDepartmentRole(\Users\Entity\UsersDepartmentRole $departmentRole = null)
    {
        $this->departmentRole = $departmentRole;

        return $this;
    }

    /**
     * Get departmentRole
     *
     * @return \Users\Entity\UsersDepartmentRole
     */
    public function getDepartmentRole()
    {
        return $this->departmentRole;
    }

    /**
     * Set reportingTo
     *
     * @param \Application\Entity\Users $reportingTo
     *
     * @return Users
     */
    public function setReportingTo(\Application\Entity\Users $reportingTo = null)
    {
        $this->reportingTo = $reportingTo;

        return $this;
    }

    /**
     * Get reportingTo
     *
     * @return \Application\Entity\Users
     */
    public function getReportingTo()
    {
        return $this->reportingTo;
    }
    
    /**
     * 
     * @return Role
     */
    public function getRoles() {
        return $this->roles;
    }

    /**
     * 
     * @param Role $roles
     */
    public function setRoles($roles) {
        $this->roles = $roles;
    }
    
    /**
     * Set $reportees
     * @param Users $reportee Description
     * @return Users
     */
    public function addReportees(Users $reportee) {
        $this->reportees[] = $reportee;
        return $this;
    }
    
    /**
     * Remove $reportees
     * @param Users $reportee Description
     *
     */
    public function removeReportees(Users $reportee) {
        $this->reportees->removeElement($reportee);
    }

    /**
     * 
     * @return Collection
     */
    public function getReportees() {
        return $this->reportees;
    }
     
}
