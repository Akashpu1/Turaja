<?php
/**
 * Auth Helper
 *
 * @author       Firoz Ahmad Likhon <likh.deshi@gmail.com>
 * @purpose      Auth Helper
 */

if(! function_exists("isAdmin")) {

    /**
     * Check if current user is logged in.
     *
     * @return bool
     */
    function isAdmin($role) {
   		if ($role == ROLE_ADMIN) {
   			return true;
   		} else {
   			return false;
   		}
 	  }
}
if(! function_exists("isStudent")) {

    /**
     * Check if current user is logged in.
     *
     * @return bool
     */
    function isStudent($role) {
   		if ($role == ROLE_STUDENT) {
   			return true;
   		} else {
   			return false;
   		}
 	  }
}

if(! function_exists("pre")) {

    /**
     * Check if current user is logged in.
     *
     * @return bool
     */
    function pre($data) {
   		echo "<pre>";
      print_r($data);
      echo "</pre>";
 	  }
}

if(! function_exists("check")) {

    /**
     * Check if current user is logged in.
     *
     * @return bool
     */
    function check()
    {
        $auth = new Auth();
        return $auth->loginStatus();
    }
}

if(! function_exists("can")) {

    /**
     * Check if current user has a permission by its name.
     *
     * @param $permissions
     * @return bool
     */
    function can($permissions)
    {
        $auth = new Auth();
        return $auth->can($permissions);
    }
}

if(! function_exists("hasRole")) {

    /**
     * Checks if the current user has a role by its name.
     *
     * @param $roles
     * @return bool
     */
    function hasRole($roles)
    {
        $auth = new Auth();
        return $auth->hasRole($roles);
    }
}
