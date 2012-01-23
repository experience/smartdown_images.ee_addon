<?php if ( ! defined('BASEPATH')) exit('Invalid file request');

/**
 * SmartDown Images extension tests.
 *
 * @author          Stephen Lewis (http://github.com/experience/)
 * @copyright       Experience Internet
 * @package         Smartdown_images
 */

require_once PATH_THIRD .'smartdown_images/ext.smartdown_images.php';
require_once PATH_THIRD .'smartdown_images/models/smartdown_images_extension_model.php';

class Test_smartdown_images_ext extends Testee_unit_test_case {

  private $_ext_model;
  private $_pkg_version;
  private $_subject;


  /* --------------------------------------------------------------
   * PUBLIC METHODS
   * ------------------------------------------------------------ */
  
  /**
   * Constructor.
   *
   * @access  public
   * @return  void
   */
  public function setUp()
  {
    parent::setUp();

    // Generate the mock model.
    Mock::generate('Smartdown_images_extension_model',
      get_class($this) .'_mock_ext_model');

    /**
     * The subject loads the models using $this->EE->load->model().
     * Because the Loader class is mocked, that does nothing, so we
     * can just assign the mock models here.
     */

    $this->EE->smartdown_images_extension_model = $this->_get_mock('ext_model');
    $this->_ext_model = $this->EE->smartdown_images_extension_model;

    // Called in the constructor.
    $this->_pkg_version = '2.3.4';
    $this->_ext_model->setReturnValue('get_package_version',
      $this->_pkg_version);

    $this->_subject = new Smartdown_images_ext();
  }


  public function test__activate_extension__calls_model_install_method_with_correct_arguments()
  {
    $hooks = array('smartdown_parse_start');

    $this->_ext_model->expectOnce('install',
      array(get_class($this->_subject), $this->_pkg_version, $hooks));
  
    $this->_subject->activate_extension();
  }


  public function test__disable_extension__calls_model_uninstall_method_with_correct_arguments()
  {
    $this->_ext_model->expectOnce('uninstall',
      array(get_class($this->_subject)));

    $this->_subject->disable_extension();
  }


  public function test__on_smartdown_parse_start__corrects_image_x_tags()
  {
    $settings = array('ee_tags:encode' => TRUE);

    $tagdata = 'This is some text.

      Here is some more text, with an &#123;image_10&#125;.

      And some final text.';

    $expected_result = 'This is some text.

      Here is some more text, with an {image_10}.

      And some final text.';
  
    $this->assertIdentical($expected_result,
      $this->_subject->on_smartdown_parse_start($tagdata, $settings));
  }


  public function test__on_smartdown_parse_start__does_no_processing_if_encode_ee_tags_is_not_true()
  {
    $settings = array('ee_tags:encode' => FALSE);
    $tagdata = 'Here is some text, with an &#123;image_10&#125;.';
  
    $this->assertIdentical($tagdata,
      $this->_subject->on_smartdown_parse_start($tagdata, $settings));
  }


  public function test__update_extension__calls_model_update_method_with_correct_arguments_and_honors_return_value()
  {
    $installed  = '1.2.3';
    $result     = 'Ciao a tutti!';    // Could be anything.

    $this->_ext_model->expectOnce('update',
      array(get_class($this->_subject), $installed, $this->_pkg_version));

    $this->_ext_model->setReturnValue('update', $result);
  
    $this->assertIdentical($result,
      $this->_subject->update_extension($installed));
  }


}


/* End of file      : test.ext_smartdown_images.php */
/* File location    : third_party/smartdown_images/tests/test.ext_smartdown_images.php */
