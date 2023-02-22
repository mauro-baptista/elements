<?php

namespace MauroBaptista\Elements\Services\Notification;

class Notification
{
    private ?int $seconds = 5;

    private function __construct(
        private string $type,
        private string $message,
        private string $title,
    ) {}

    private static function build(string $type, string $message): self
    {
        return new Notification($type, $message, str($type)->headline()->toString());
    }

    public static function success(string $message): self
    {
        return self::build('success', $message);
    }

    public static function error(string $message): self
    {
        return self::build('error', $message);
    }

    public static function warning(string $message): self
    {
        return self::build('warning', $message);
    }

    public static function info(string $message): self
    {
        return self::build('info', $message);
    }

    public function withTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function closeIn(int $seconds): self
    {
        $this->seconds = $seconds;

        return $this;
    }

    public function disableAutoClose(): self
    {
        $this->seconds = null;

        return $this;
    }

    public function send(): void
    {
        session()->flash('notification', [
            'type' => $this->type,
            'message' => $this->message,
            'title' => $this->title,
            'seconds' => $this->seconds,
        ]);
    }
}
