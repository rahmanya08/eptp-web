namespace App\Channels;

use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;

class WhatsAppChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWhatsApp($notifiable);

        $accountSid = config('services.twilio.whatsapp.sid');
        $authToken = config('services.twilio.whatsapp.token');
        $apiUrl = config('services.twilio.whatsapp.api_url');
        $fromNumber = config('services.twilio.whatsapp.api_params.from');

        $client = new Client($accountSid, $authToken);
        $client->messages->create(
            $notifiable->routeNotificationFor('whatsapp'), // Get recipient's WhatsApp number
            [
                'from' => $fromNumber,
                'body' => $message,
            ]
        );
    }
}
