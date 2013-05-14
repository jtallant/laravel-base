<?php

class BaseController extends Controller {

	/**
	 * The default layout
	 */
	protected $layout = 'layouts.application';

	/**
	 * Autoload views
	 *
	 * Controllers that extend this controller will attemp to auto load
	 * views using the name fo the controller action.
	 *
	 * For example: PagesController@login will attempt to load views/pages/login.blade.php
	 */
	protected $autoload_views = true;


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if (false === is_null($this->layout)) {
			$this->layout = View::make($this->layout);

			if ($this->autoload_views && View::exists(MyHelpers::viewPath())) {
				$this->layout->content = View::make(MyHelpers::viewPath());
				$this->layout->title = MyHelpers::pageTitle();
			}
		}
	}

}