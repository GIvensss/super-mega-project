<?php

use Framework\Exceptions\ValidationException;

class UserRegistrationCest
{
    private $registration;
    public function _before(UnitTester $I)
    {
    }

    // tests

    /**
     * @throws \Framework\Exceptions\ValidationException
     */
    public function tryToTestCorrectUserInput(UnitTester $I)
    {
        $this->registration = new \App\Service\Registration();
        $params =
            [
            'username' => 'Bukdatwili',
            'email' => 'email@email.email',
            'password' => '12341234',
            'confirm' => '12341234'
            ];
        $actual = $this->registration->register($params);
        $I->assertTrue($actual);
    }

    /**
     * @throws \Framework\Exceptions\ValidationException
     */
    public function tryToTestFailedRegistration(UnitTester $I)
    {
        $I->expectThrowable(ValidationException::class, function () {
            $this->registration = new \App\Service\Registration();
            $params = ['username' => '123124', 'email' => 'sfes', 'password' => '12341234', 'confirm' => '12341234'];
            $this->registration->register($params);
        });
    }
}
