<?php

namespace Visitor;

class ObjectStructure
{
    /**
     * 维护了一个集合
     */

    public $persons;

    public function attach(Person $person)
    {
        $this->persons[md5(serialize($person))] = $person;
    }

    public function detach(Person $person)
    {
        unset($this->persons[md5(serialize($person))]);
    }

    public function display(Action $action)
    {
        foreach ($this->persons as $person) {
            $person->accept($action);
        }
    }
}