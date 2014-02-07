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