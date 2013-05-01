<?php
/*
|--------------------------------------------------------------------------
| Static Pages Controller
|--------------------------------------------------------------------------
|
| This controller is for static pages. Static pages aren't necessarily
| 100% static but they don't have their own database table. This controller
| should only be used for returning views of basic pages like home, about,
| contact. It shouldn't be used for create/update/delete actions.
|
|
*/
class PageController extends BaseController {

	public function home()
	{
		$this->layout->content = View::make('pages.home');
	}
}