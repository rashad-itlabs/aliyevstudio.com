<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendWhatsappCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-whatsapp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'UltraMsg vasitəsilə WhatsApp mesajı göndərir';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $message = "Səni hər gün daha çox sevirəm,cünki sən məmin hərşeyimsən";
        
        $token = env('ULTRAMSG_TOKEN');
        $instanceId = env('ULTRAMSG_INSTANCE_ID');
        $to = env('ULTRAMSG_MY_NUMBER');

        $url = "https://api.ultramsg.com/{$instanceId}/messages/chat";

        // Guzzle/Http Facade istifadə edərək POST sorğusu
        $response = Http::asForm()->post($url, [
            'token' => $token,
            'to'    => '+994512150965',
            'body'  => $message,
        ]);

        if ($response->successful()) {
            $this->info("Mesaj uğurla göndərildi: " . $response->body());
        } else {
            $this->error("Xəta baş verdi: " . $response->status());
        }
    }
}
