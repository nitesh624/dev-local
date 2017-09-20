<?php
namespace Drupal\Tests\Hello\Unit;

use Drupal\Core\Form\FormState;
use Drupal\Tests\UnitTestCase;
/**
 * Tests generation of hello form.
 *
 * @group hello
 */
class HelloFormTest extends UnitTestCase {

	/**
   * Tests the buildForm method.
   *
   * @covers ::testbuildForm
   */
    
    
    
    public static $modules = array('hello');
    
    // A simple user
    private $user;
    
    // Perform initial setup tasks that run before every test method.
    public function setUp() {
        parent::setUp();
        $this->user = $this->DrupalCreateUser(array(
            'access content',
        ));
    }
    
    /**
     * Tests that the form is created.
     * TODO: block test
     */
    public function testLoremIpsumPageExists() {
        // Login
        $this->drupalLogin($this->user);
        
        // Generator test:
        $this->drupalGet('loremipsum/generate/4/20');
        $this->assertResponse(200);
    }
/* public function testBuildForm() {
	$form = $this->formBuilder->getForm($this->form);
	$this->assertEquals('mockingdrupal_form', $form['#form_id']);
	$state = new FormState();
	$state->setValue('node_id', 1);
	// Fresh build of form with no form state for a value that exists.
	$form = $this->formBuilder->buildForm($this->form, $state);
	$this->assertEquals($this->node_title, $form['node']['#label']);
	// Build the form with a mocked form state that has value for node_id that
	// does not exist i.e. exception testing.
	$state = new FormState();
	$state->setValue('node_id', 500);
	$form = $this->formBuilder->buildForm($this->form, $state);
	$this->assertArrayNotHasKey('node', $form);
}


public function testFormValidation() {
	$form = $this->formBuilder->getForm($this->form);
	$input = [
	'op' => 'Display',
	'form_id' => $this->form->getFormId(),
	'form_build_id' => $form['#build_id'],
	'values' => ['node_id' => 500, 'op' => 'Display'],
	];
	$state = new FormState();
	$state
	->setUserInput($input)
	->setValues($input['values'])
	->setFormObject($this->form)
	->setSubmitted(TRUE)
	->setProgrammed(TRUE);
	
	$this->form->validateForm($form, $state);
	$errors = $state->getErrors();
	$this->assertArrayHasKey('node_id', $errors);
	$this->assertEquals('Node does not exist.',
	\PHPUnit_Framework_Assert::readAttribute($errors['node_id'], 'string'));
	$input['values']['node_id'] = 1;
	$state = new FormState();
	$state
	->setUserInput($input)
	->setValues($input['values'])
	->setFormObject($this->form)
	->setSubmitted(TRUE)
	->setProgrammed(TRUE);
	$this->form->validateForm($form, $state);
	$this->assertEmpty($state->getErrors());
}
 */
}