sfUniquablePlugin
=================

This Symfony 1.4 plugin adds a Uniquable behaviour, which adds a uuid column to your Doctrine records on insert.

Installation
------------

Copy the sfUniquablePlugin directory to your project's plugins, and enable the plugin as per usual.

Usage
-----

Add the following to a model in your doctrine schema.yml:

    actAs:
        Uniquable:

And rebuild:

    ./symfony doctrine:build --all-classes --sql

Options
-------

    name    Name of UUID column, default = 'uuid'
    type    Type of UUID column, default = 'string'
    length  Length of UUID column, default = 36
    options Array of options to pass though, default = notnull: true

Eg:

    actAs:
        Uniquable:
            name:   guid
            type:   char
            length: 36
            options:
                notnull:    true
