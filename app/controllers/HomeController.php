<?php

/**
 * Home.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class HomeController extends BaseController
{
    /**
     * Display login form.
     *
     * @return View users.login
     */
    public function getIndex()
    {
        return View::make('users.login');
    }
}
