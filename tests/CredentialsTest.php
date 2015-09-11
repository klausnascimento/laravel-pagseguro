<?php

use \laravel\pagseguro\Credentials\Credentials;

/**
 * Credentials Test
 * @author     Michael Douglas <michaeldouglas010790@gmail.com>
 */
class CredentialsTest extends PHPUnit_Framework_TestCase
{

    public function testExceptionCredentialParamInvalid()
    {
        $this->setExpectedException(
            '\InvalidArgumentException',
            Credentials::ERROR_INVALID_TOKEN
        );
        new Credentials(123456, 'michaeldouglas010790@gmail.com');
    }

    public function testExceptionCredentialParamEmailInvalid()
    {
        $this->setExpectedException(
            '\InvalidArgumentException',
            Credentials::ERROR_INVALID_EMAIL
        );
        new Credentials('651233CECD6304779B7570BA2D06', 'teste');
    }

    public function testExceptionCredentialParamNull()
    {
        $this->setExpectedException(
            '\InvalidArgumentException',
            Credentials::ERROR_INVALID_TOKEN
        );
        new Credentials(null, null);
    }

    public function testExceptionCredentialParamTokenNull()
    {
        $this->setExpectedException(
            '\InvalidArgumentException',
            Credentials::ERROR_INVALID_TOKEN
        );
        new Credentials(null, 'michaeldouglas010790@gmail.com');
    }

    public function testExceptionCredentialParamEmailNull()
    {
        $this->setExpectedException(
            '\InvalidArgumentException',
            Credentials::ERROR_INVALID_EMAIL
        );
        new Credentials('651233CECD6304779B7570BA2D06', null);
    }
    
    public function testShouldReturnAgivenToken()
    {
        $credentials = new Credentials(
                '651233CECD6304779B7570BA2D06', 
                'michaeldouglas010790@gmail.com'
        );
        $this->assertEquals('651233CECD6304779B7570BA2D06', $credentials->getToken());
    }
    
    public function testShouldReturnAgivenEmail()
    {
        $credentials = new Credentials(
                '651233CECD6304779B7570BA2D06', 
                'michaeldouglas010790@gmail.com'
        );
        $this->assertEquals('michaeldouglas010790@gmail.com', $credentials->getEmail());
    }
    
    public function testShouldValidateCredentials()
    {
        $credentials = new Credentials(
                '651233CECD6304779B7570BA2D06', 
                'michaeldouglas010790@gmail.com'
        );
        $this->assertTrue($credentials->isValid());
    }
    
    public function testShouldReturnAnArrayWithAgivenCredential()
    {
        $credentials = new Credentials(
                '651233CECD6304779B7570BA2D06', 
                'michaeldouglas010790@gmail.com'
        );
        
        $array = $credentials->__toArray();
        
        $this->assertEquals('651233CECD6304779B7570BA2D06', $array['token']);
        $this->assertEquals('michaeldouglas010790@gmail.com', $array['email']);
    }
}
