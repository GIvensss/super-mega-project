<?php

use App\Service\UserValidation;

class UserValidationCest
{
    private $userValidationService;
    public function _before(UnitTester $I)
    {
        $this->userValidationService = new UserValidation();
    }

    protected function usernameDataProvider(): array
    {
        return[
            ['username' => '1242412421424122', 'expected' => false],
            ['username' => 'BlessRNG', 'expected' => true],
            ['username' => 'Ble', 'expected' => false],
            ['username' => 'wefew', 'expected' => true],
            ['username' => '______', 'expected' => false],
            ['username' => '123123user', 'expected' => false],
            ['username' => 'user123123', 'expected' => true],
            ['username' => '&^%##@%^#@$%', 'expected' => false],
            ['username' => '           ', 'expected' => false]
        ];
    }

    // tests
    /**
     * @dataProvider usernameDataProvider
     * @param \Codeception\example $example
     * @param UnitTester $I
     */
    public function tryToTestIncorrectUserNameValidation(UnitTester $I, \Codeception\Example $example)
    {
        $actualResult = $this->userValidationService->validateUsername($example['username']);
        $expectedResult = $example['expected'];

        $I->assertEquals($expectedResult, $actualResult);
    }

    protected function emailDataProvider(): array
    {
        return[
            ['email' => '12424', 'expected' => false],
            ['email' => 'BlessRNG', 'expected' => false],
            ['email' => 'email.email', 'expected' => false],
            ['email' => 'e@.co', 'expected' => false],
            ['email' => 'egor.@mail', 'expected' => false],
            ['email' => 'egor@mail', 'expected' => false],
            ['email' => 'egor@mail.', 'expected' => false],
            ['email' => 'egor@m.com', 'expected' => true],
        ];
    }

    // tests
    /**
     * @dataProvider emailDataProvider
     * @param \Codeception\example $example
     * @param UnitTester $I
     */
    public function tryToTestIncorrectEmailValidation(UnitTester $I, \Codeception\Example $example)
    {
        $actualResult = $this->userValidationService->validateEmail($example['email']);
        $expectedResult = $example['expected'];

        $I->assertEquals($expectedResult, $actualResult);
    }
}
