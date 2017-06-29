<?php

namespace Application\Model;

use Doctrine\DBAL\Query\QueryBuilder;
use Zend\Di\ServiceLocator;

/**
 * User Model 
 * @author Gourav Khanna <mailgouravkhanna@gmail.com>
 * Provide Basic Crud Model operations
 */
Class UserModel extends CoreModel {

    private $allReportees;

    /**
     * 
     * @param ServiceLocator $serviceLocater
     */
    public function __construct($serviceLocater) {
        parent::__construct($serviceLocater);
    }

    /**
     * get the reposistory of User
     * @return type
     */
    protected function getUserRepository() {
        return $this->_entityManager->getRepository('Application\Entity\Users');
    }

    /**
     * Return data for populating Grid
     * @return QueryBuilder
     */
    public function search() {
        $queryBuilder = $this->_entityManager->createQueryBuilder();
        return $queryBuilder->select('u.email,u.firstName,u.lastName')
                        ->from('Application\Entity\Users', 'u');
    }

    /**
     * Return data for populating Grid
     * @return QueryBuilder
     */
    public function searchGrid() {
        $queryBuilder = $this->_entityManager->createQueryBuilder();
        $queryBuilder->select('u.email,u.firstName,u.lastName,u.status,r.roleName,u.id,u.loginAttempts')
                ->from('Application\Entity\Users', 'u')
                ->leftJoin('u.roles', 'r');
        $result = $queryBuilder->getQuery()->getArrayResult();
        $resultData = [];
        foreach ($result as $value) {

            if (!isset($resultData[$value['id']])) {
                $resultData[$value['id']] = $value;
                if (isset($value['loginAttempts']) && $value['loginAttempts'] >= 5) {
                    $resultData[$value['id']]['loginStatus'] = 0;
                } else {
                    $resultData[$value['id']]['loginStatus'] = 1;
                }
            } else {
                $resultData[$value['id']]['roleName'] .=", <br/> " . $value['roleName'];
            }
        }
        return($resultData);
    }

}
