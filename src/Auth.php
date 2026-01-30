<?php

namespace Rbac;

use Rbac\interfaces\RbacApi;

class Auth implements RbacApi
{
    protected $obj;
    protected static $instance;

    function __construct($drive = '', $config = [])
    {
        if (empty($config)) {
            throw new \Exception('驱动配置不能为空！');
        }

        $class = "\\Rbac\\drive\\$drive\\Rbac";
        $path = __DIR__ . "/drive/$drive/Rbac.php";
        if (!file_exists($path)) {
            throw new \Exception('此驱动不存在!');
        };
        $this->obj = new $class($config);
    }

    public function getUserMenu($uid)
    {
        return $this->obj->getUserMenu($uid);
    }

    public function AllToMe($uid, $type = false)
    {
        return $this->obj->AllToMe($uid, $type);
    }

    public function getAllNodes($uid)
    {
        return $this->obj->getAllNodes($uid);
    }

    public function getRoleNode($uid)
    {
        return $this->obj->getRoleNode($uid);
    }

    public function getRoleNodes($role_id)
    {
        return $this->obj->getRoleNodes($role_id);
    }

    public function editRolesNode($role_id, $node_ids)
    {
        return $this->obj->editRolesNode($role_id, $node_ids);
    }

    public function AllToRoles($role_id)
    {
        return $this->obj->AllToRoles($role_id);
    }

    public function editUserRoles($uid, $role_ids)
    {
        return $this->obj->editUserRoles($uid, $role_ids);
    }

    public function getUserNode($uid)
    {
        return $this->obj->getUserNode($uid);
    }

    public function userAuth($uid, $uri)
    {
        return $this->obj->userAuth($uid, $uri);
    }

    public function editRolesUser($role_id, $uids)
    {
        return $this->obj->editRolesUser($role_id, $uids);
    }

    public function editNodes($uid, $node_ids)
    {
        return $this->obj->editNodes($uid, $node_ids);
    }

    public function RoleToUsers($role_id)
    {
        return $this->obj->RoleToUsers($role_id);
    }

    public function getRoles($all = false)
    {
        return $this->obj->getRoles($all);
    }

    public function getUserRoles($uid = '')
    {
        return $this->obj->getUserRoles($uid);
    }

    public function getAllMenu()
    {
        return $this->obj->getAllMenu();
    }

    public function addNode($params = [])
    {
        return $this->obj->addNode($params);
    }

    public function updateNode($params)
    {
        return $this->obj->updateNode($params);
    }

    public function addRole($params)
    {
        return $this->obj->addRole($params);
    }

    public function updateRole($params)
    {
        return $this->obj->updateRole($params);
    }

    public function OnlyToMe($uid)
    {
        return $this->obj->OnlyToMe($uid);
    }

    public function getNodeById($id)
    {
        return $this->obj->getNodeById($id);
    }

    public static function getInstance($drive = 'db', $config = '')
    {
        if (self::$instance == null) {
            self::$instance = new Auth($drive, $config);
        }
        return self::$instance;
    }
}
