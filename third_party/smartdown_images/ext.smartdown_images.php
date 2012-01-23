<?php if ( ! defined('BASEPATH')) exit('Direct script access not allowed');

/**
 * SmartDown Images extension.
 *
 * @author          Stephen Lewis (http://github.com/experience/)
 * @copyright       Experience Internet
 * @package         Smartdown_images
 */

class Smartdown_images_ext {

  private $EE;
  private $_ext_model;

  public $description;
  public $docs_url;
  public $name;
  public $settings;
  public $settings_exist;
  public $version;


  /* --------------------------------------------------------------
  * PUBLIC METHODS
  * ------------------------------------------------------------ */

  /**
   * Constructor.
   *
   * @access  public
   * @param   mixed     $settings     Extension settings.
   * @return  void
   */
  public function __construct($settings = '')
  {
    $this->EE =& get_instance();

    $this->EE->load->add_package_path(
      PATH_THIRD .'smartdown_images/');

    // Still need to specify the package...
    $this->EE->lang->loadfile('smartdown_images_ext', 'smartdown_images');

    $this->EE->load->model('smartdown_images_extension_model');
    $this->_ext_model = $this->EE->smartdown_images_extension_model;

    // Set the public properties.
    $this->description = $this->EE->lang->line(
      'smartdown_images_extension_description');

    $this->docs_url = 'http://experienceinternet.co.uk/';
    $this->name     = $this->EE->lang->line('smartdown_images_extension_name');
    $this->settings = $settings;
    $this->settings_exist = 'n';
    $this->version  = $this->_ext_model->get_package_version();
  }


  /**
   * Activates the extension.
   *
   * @access  public
   * @return  void
   */
  public function activate_extension()
  {
    $hooks = array('smartdown_parse_start');
    $this->_ext_model->install(get_class($this), $this->version, $hooks);
  }


  /**
   * Disables the extension.
   *
   * @access  public
   * @return  void
   */
  public function disable_extension()
  {
    $this->_ext_model->uninstall(get_class($this));
  }

  
  /**
   * Handles the smartdown_parse_start extension hook.
   *
   * @access  public
   * @param   string    $tagdata      The tagdata to parse.
   * @param   array     $settings     The SmartDown settings.
   * @return  void
   */
  public function on_smartdown_parse_start($tagdata, Array $settings)
  {
    if (($last_call = $this->EE->extensions->last_call) !== FALSE)
    {
      $tagdata = $last_call;
    }

    // If SmartDown isn't encoding EE tags, we have no work to do.
    if ( ! $settings['ee_tags:encode'])
    {
      return $tagdata;
    }

    return preg_replace(
      '/&#123;image_(\d+)&#125;/', LD .'image_$1' .RD, $tagdata);
  }

  

  /**
   * Updates the extension.
   *
   * @access  public
   * @param   string    $installed_version    The installed version.
   * @return  mixed
   */
  public function update_extension($installed_version = '')
  {
    return $this->_ext_model->update(get_class($this), $installed_version,
      $this->_ext_model->get_package_version());
  }


}


/* End of file      : ext.smartdown_images.php */
/* File location    : third_party/smartdown_images/ext.smartdown_images.php */
