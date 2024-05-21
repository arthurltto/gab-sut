use PHPUnit\Framework\TestCase;

class ChatControllerTest extends TestCase {
    public function testSendMessage() {
        $chatController = new ChatController();
        $message = 'Hello, this is a test message';
        $result = $chatController->sendMessage(1, 2, $message);
        $this->assertTrue($result);
    }

    public function testReceiveMessage() {
        $chatController = new ChatController();
        $result = $chatController->receiveMessage(1, 2);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetChatHistory() {
        $chatController = new ChatController();
        $result = $chatController->getChatHistory(1, 2);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testSendMessageToInvalidUser() {
        $chatController = new ChatController();
        $message = 'Hello, this is a test message';
        $result = $chatController->sendMessage(1, 9999, $message); // Assuming 9999 is an invalid user ID
        $this->assertFalse($result);
    }

    public function testReceiveMessageWithNoHistory() {
        $chatController = new ChatController();
        $result = $chatController->receiveMessage(1, 3); // Assuming user 1 and 3 have no message history
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }
}
