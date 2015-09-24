<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	var $settings;
	var $elements;
    var $obj;
    var $layout;

    function __construct()
    {
        $this->obj =& get_instance();
        $this->layout = 'layout_main';
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }
 function buildPage($view, $data = null)
    {
        /* Theme settings */
        $data['settings'] = $this->settings;
        
        /* Layout commons */
        foreach ($this->settings['elements'] as $key => $item)
        {
            $data[$key] = $this->layout->layoutmodel->$key($item);
        }
        
        /* Load the view file */
        $this->layout->load->view('loader', array('view'=>$view, 'data'=>$data));
    }
    function view($view, $data=null, $return=false)
    {
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->obj->load->view($view,$data,true);

        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
}
?> 