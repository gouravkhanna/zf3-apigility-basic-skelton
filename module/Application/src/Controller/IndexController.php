<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use ZfcDatagrid\Column\Action;
use ZfcDatagrid\Column\Action\Button;
use ZfcDatagrid\Column\Select;

class IndexController extends AbstractActionController
{
    protected  $serviceLocator = null;
    public function __construct($serviceLocator) {
        $this->serviceLocator=$serviceLocator;
    }

    function getServiceLocator() {
        return $this->serviceLocator;
    }

    function setServiceLocator($serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }

        public function indexAction()
    {
        return new ViewModel();
    }
    
      /**
     * Display the Grid of all the users
     * @return Grid
     */
    public function aAction()
    {

        $data = $this->getServiceLocator()->get('users.model.userModel')->searchGrid();
        $grid = $this->getServiceLocator()->get('ZfcDatagrid\Datagrid');

        $grid->setTitle('User Management');
        $grid->setDataSource($data);

        $col = new Select('id');
        $col->setIdentity();
        $col->setWidth(.5);
        $grid->addColumn($col);


        $col = new Select('email');
        $col->setLabel('Email');
        $grid->addColumn($col);

       

        $col = new Select('firstName');
        $col->setLabel('First Name');
        $grid->addColumn($col);

        $col = new Select('lastName');
        $col->setLabel('Last Name');
        $grid->addColumn($col);
        $col = new Select('roleName');
        $col->setLabel('Roles');
        $grid->addColumn($col);

        $col = new Select('status');
        $col->setLabel('Status');
        $col->setReplaceValues(array(
            0 => 'Inactive',
            1 => 'Active',
        ));

        $grid->addColumn($col);
        $colLoginStatus = new Select('loginStatus');
        $colLoginStatus->setLabel('Login Status');
        $colLoginStatus->setReplaceValues(array(
            0 => 'Locked',
            1 => 'Unlocked',
        ));

        $grid->addColumn($colLoginStatus);


        $viewAction = new Button();
        $viewAction->setLabel('Edit');
        $viewAction1 = new Button();
        $viewAction1->setLabel('Unlock');

        $rowId = $viewAction->getRowIdPlaceholder();
        $viewAction->setLink('/users/user/add/' . $rowId);

        $viewAction1->setLink('/users/user/unlock/' . $rowId);
        $viewAction1->addShowOnValue($colLoginStatus, 'Locked');

        $btn = new Action();
        $btn->setLabel('Action');
        $btn->addAction($viewAction);
        $btn->addAction($viewAction1);
        $btn->setWidth(1);
        $grid->addColumn($btn);



        $grid->setDefaultItemsPerPage(10);
        $grid->setToolbarTemplateVariables([
            'heading' => 'User Management',
        ]);

        $grid->render();

        return $grid->getResponse();
    }
}
