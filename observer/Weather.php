<?php


namespace Observer;


use SplObserver;

class Weather implements \SplSubject
{

    private $observers;

    private $email;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();

        var_export($this->observers);
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.
        $this->observers->attach($observer);
    }

    /**
     * @inheritDoc
     */
    public function detach(SplObserver $observer)
    {
        // TODO: Implement detach() method.
        $this->observers->detach($observer);
    }

    public function changeWeather(string $email)
    {
        $this->setEmail($email)->notify();
    }

    /**
     * @inheritDoc
     */
    public function notify()
    {
        // TODO: Implement notify() method.
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

