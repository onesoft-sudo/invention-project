<?php


namespace App\Events;


use App\EventHandlers\JobEventHandler;
use OSN\Framework\Events\Event;

class JobEvent extends Event
{
    public string $jobName;

    protected static array $handlers = [

    ];

    /**
     * JobEvent constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->jobName = $data["name"] ?? '';
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement finishFiring() method.
    }

    /**
     * @return mixed
     */
    public function prevent()
    {
        // TODO: Implement prevent() method.
    }

    /**
     * @return mixed
     */
    public function stop()
    {
        // TODO: Implement stop() method.
    }
}
