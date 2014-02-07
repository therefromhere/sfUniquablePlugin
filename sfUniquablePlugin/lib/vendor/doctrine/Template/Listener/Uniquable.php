<?php

/*
 * Copyright (C) 2014 John Carter
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */

/**
 * Listener for the Uniquable behaviour which automatically sets the 
 * GUID when a record is inserted
 *
 * @author John Carter <john@therefromhere.org>
 */
class Doctrine_Template_Listener_Uniquable extends Doctrine_Record_Listener
{
    /**
     * Array of Uniquable options
     *
     * @var string
     */
    protected $_options = array();

    /**
     * __construct
     *
     * @param string $options 
     * @return void
     */
    public function __construct(array $options)
    {
        $this->_options = $options;
    }

    /**
     * Set the uuid column when a record is inserted
     *
     * @param Doctrine_Event $event
     * @return void
     */
    public function preInsert(Doctrine_Event $event)
    {
        $name = $this->_options['name'];
        $invoker = $event->getInvoker();
        $uuid = $this->getUuid();
        
        $invoker->$name = $uuid;
    }

    /**
     * Generates a v4 UUID 
     * 
     * from http://stackoverflow.com/a/15875555/8331
     *
     * @param string $type 
     * @return void
     */
    public function getUuid()
    {
        $data = openssl_random_pseudo_bytes(16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0010
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
