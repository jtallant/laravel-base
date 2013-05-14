<?php

class MyHelpers {


    /**
     * Converts current route action to string that can be used as CSS class
     *
     * @return string body class to be applied to body element
     */
    public static function bodyClass()
    {
        $class = str_replace('@', '', Route::currentRouteAction());
        return strtolower(str_replace('Controller', '-', $class));
    }


    /**
     * Dynamically generates a page title from current route action
     *
     * @return string page title
     */
    public static function pageTitle()
    {
        $title = explode('@', Route::currentRouteAction());
        $controller = str_replace('Controller', '', $title[0]);
        $action = ucfirst($title[1]);
        return $controller . ' - ' . $action;
    }


    /**
     * Attempts to detect the desired view for a controller action
     *
     * Example: PagesController@home will assume the view should be pages.home
     *
     * @return string {viewfolder}.{viewfile}
     */
    public static function viewPath()
    {
        $action = explode('@', Route::currentRouteAction());
        $dir = strtolower(str_replace('Controller', '', $action[0]));
        $file = strtolower($action[1]);
        return $dir.'.'.$file;
    }


    /**
     * Returns validator object if input is invalid
     *
     * @param array $input the input to check
     * @param array $rules the rules to check against
     *
     * @return mixed false if input is valid else Validator object
     */
    public static function inputIsInvalid($input, $rules)
    {
        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return $validation;
        }

        return false;
    }


    /**
     * Generates an alert box for every form error
     *
     * @param array $fields
     * @param mixed $errors
     * @param bool  $status optional
     *
     * @return string html for alertboxes with error messages inside
     */
    public static function formErrors($fields, $errors, $status = true)
    {
        $output = '';
        foreach ($fields as $field) {
            if ($errors->has($field)) {
                $output .=
                '<div class="alert alert-error form-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    ' . $errors->first($field) . '
                </div>';
            }
        }

        if ($status = Session::get('status')) {
            $output .=
            '<div class="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                ' . $status . '
            </div>';
        }

        return $output;
    }


    /**
     * Returns markup for an alertbox
     *
     * @param string $content the content/message that goes inside the alert box
     * @param string $context the css class to apply (error, success, info)
     *
     * @link http://twitter.github.io/bootstrap/components.html#alerts
     *
     * @return string html for alert box
     */
    public static function alertBox($content, $context = 'default')
    {
        return '<div class="alert alert-' . $context . '">
            <button type="button" class="close" data-dismiss="alert">×</button>
            ' . $content . '
        </div>';
    }

}