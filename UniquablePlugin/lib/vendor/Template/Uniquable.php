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
 * Doctrine_Template_Uniquable
 * 
 * Adds a uuid column to your doctrine record on insert
 *
 * @author John Carter <john@therefromhere.org>
 */
class Doctrine_Template_Uniquable extends Doctrine_Template
{
    /**
     * 
     */
    protected $_options = array(
        'name'    => 'uuid',
        'type'    => 'char',
        'length'  => 36,
        'options' => array(
            'notnull' => false
        ),
    );

    protected $_listener;

    public function setTableDefinition()
    {
      $this->_listener = new Doctrine_Template_Listener_Uniquable($this->_options);
      $this->addListener($this->_listener);
    }
}
