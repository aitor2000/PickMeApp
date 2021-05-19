<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Usuario;
use Auth;

class MailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $userName = $notifiable->name;
        $userEmail = $notifiable->email;
        $apellidos = null;

        $usuarios = Usuario::where('id', Auth::user()->id)->get();

        foreach ($usuarios as $usuario) {
            $apellidos = $usuario['apellidos'];
            $correo = $usuario['mail'];
        }

        return (new MailMessage)
                    ->with('success','El mensaje se ha enviado correctamente')
                    ->success('El mensaje se ha enviado correctamente.')
                    ->subject('PickMeApp - Transporte')
                    ->greeting('Hola ' . $userName . '!')
                    ->line('El usuario ' . Auth::user()->name . ' ' . $apellidos . ' quiere contactar contigo.')
                    ->line('Aquí está su correo para que podáis cuadrar horarios! ' . $correo . '.')
                    ->action('Accede a la aplicación desde aquí', url('https://pickmeapp.es/'))
                    ->line('Gracias por usar nuestra aplicación!')
                    ->salutation('Saludos, PickMeApp');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
