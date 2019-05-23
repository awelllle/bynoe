<?php
 
/**
 * hArpanet - 29-Sep-2013
 *
 * Extend Core Router.php Controller
 *
 * This extention allows URL's like: http://site.url/method
 * to be resolved to:                http://site.url/default_controller/method
 */
 
class MY_Router extends CI_Router {
 
    /**
     * Validates the supplied segments.  Attempts to determine the path to
     * the controller.
     *
     * @access  private
     * @param   array
     * @return  array
     */
    function _validate_request($segments)
    {
        if (count($segments) == 0)
        {
            return $segments;
        }
 
        // Does the requested controller exist in the root folder?
        if (file_exists(APPPATH.'controllers/'.$segments[0].'.php'))
        {
            return $segments;
        }
 
        // Is the controller in a sub-folder?
        if (is_dir(APPPATH.'controllers/'.$segments[0]))
        {
            // Set the directory and remove it from the segment array
            $this->set_directory($segments[0]);
            $segments = array_slice($segments, 1);
 
            if (count($segments) > 0)
            {
                // Does the requested controller exist in the sub-folder?
                if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].'.php'))
                {
                    if ( ! empty($this->routes['404_override']))
                    {
                        $x = explode('/', $this->routes['404_override']);
 
                        $this->set_directory('');
                        $this->set_class($x[0]);
                        $this->set_method(isset($x[1]) ? $x[1] : 'index');
 
                        return $x;
                    }
                    else
                    {
                        show_404($this->fetch_directory().$segments[0]);
                    }
                }
            }
            else
            {
                // Is the method being specified in the route?
                if (strpos($this->default_controller, '/') !== FALSE)
                {
                    $x = explode('/', $this->default_controller);
 
                    $this->set_class($x[0]);
                    $this->set_method($x[1]);
                }
                else
                {
                    $this->set_class($this->default_controller);
                    $this->set_method('index');
                }
 
                // Does the default controller exist in the sub-folder?
                if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.'.php'))
                {
                    $this->directory = '';
                    return array();
                }
 
            }
 
            return $segments;
        }
 
 
        // If we've gotten this far it means that the URI does not correlate to a valid
        // controller class.  We will now see if there is an override
        if ( ! empty($this->routes['404_override']))
        {
            $x = explode('/', $this->routes['404_override']);
 
            $this->set_class($x[0]);
            $this->set_method(isset($x[1]) ? $x[1] : 'index');
 
            return $x;
        }
 
        /**
         * hArpanet - 29-Sep-2013
         * Just before we 404, if a Method is specified then we will assume it exists
         * in the default controller or it's parents
         */
        if (isset($segments[0]))
        {
            $this->default_controller = $this->default_controller.'/'.$segments[0];
            return $this->_set_default_controller();
        }
 
        // Nothing else to do at this point but show a 404
        show_404($segments[0]);
    }
}
