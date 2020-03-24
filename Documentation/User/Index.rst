.. include:: ../Includes.txt


.. _user:

===========
User manual
===========

.. _user_introduction:

Introduction
============

Flux-elements can be added by the new content element wizard. The available elements can be found under the register
`Flux content`.

When changing a content element type the a flux-elements are available under `Flux elements`.

Following information regarding particularities from some flux-elements is given.

.. _user_columns:

Columns
=======

Columns flux-elements provide a register `Adjustment` allowing to control collapsing from rows and columns.
Collapsing might be of interest in conjunction with the `bootstrap_package` to control spacing between content
elements used in flux-elements. The settings add a related css-classes to the HTML code. Without any additional css
definitions these settings don't have any visual effects.

.. _user_tileUnit:

Tile unit
=========

.. figure:: ../Images/User/TileUnit.jpg
   :width: 500px
   :alt: Tile unit

   Tile unit showing tiles

Tile units are used to create a tile view typically showing images. The tiles shown might be content elements being
rendered with the desired tile side ratio. These content elements should be provided by an extension (e.g.
[distribution pizpalue](https://extensions.typo3.org/extension/pizpalue/) ).

Tile units might be combined together. In this case it can be convenient to collect them in a container. As well the
`Frame` might need to be set to `none` in the `Appearance` tab.

.. tip::

   A tile unit is basically a column with specific settings (see `Custom` and `Adjustment` tabs). You might use
   as well columns flux-elements (e.g. 3 Columns) and set the related parameters manually.
