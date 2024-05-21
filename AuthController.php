use PHPUnit\Framework\TestCase;

class AuthControllerTest extends TestCase {
    public function testLogin() {
        $authController = new AuthController();
        $result = $authController->login('user@example.com', 'password123');
        $this->assertTrue($result);
    }

    public function testRegister() {
        $authController = new AuthController();
        $result = $authController->register('newuser@example.com', 'newpassword123');
        $this->assertTrue($result);
    }

    public function testLogout() {
        $authController = new AuthController();
        $result = $authController->logout();
        $this->assertTrue($result);
    }

    public function testInvalidLogin() {
        $authController = new AuthController();
        $result = $authController->login('invalid@example.com', 'wrongpassword');
        $this->assertFalse($result);
    }

    public function testRegisterExistingUser() {
        $authController = new AuthController();
        $authController->register('existinguser@example.com', 'password123');
        $result = $authController->register('existinguser@example.com', 'password123');
        $this->assertFalse($result);
    }
}
