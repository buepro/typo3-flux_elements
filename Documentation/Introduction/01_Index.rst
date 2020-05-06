.. include:: ../Includes.txt


.. _introduction:

============
Introduction
============

What it does
============

This extension provides elements to further structure the content area. Currently the following elements are
available: container, columns, registers, accordion, tile unit and card. The extension is intended to be used together
with the `bootstrap framework <https://getbootstrap.com/>`__.

Since the elements are provided by `flux <https://extensions.typo3.org/extension/flux>`__ they are following referred
to as flux elements.

Flux elements can hold any kind of content elements hence as well other flux elements.

Example contents
================

Columns, tabs and accordion
---------------------------

The following image shows the usage from a two columns flux element containing a tabs flux element in the left column
and an accordion flux element in the right column. Three and four columns flux elements are available too.

.. figure:: ../Images/Introduction/ColumnsTabsAccordion.jpg
   :alt: Two columns with a tabs and accordion element

Container and cards
-------------------

The container flux element adds freedom in designing the layout. It might be used to group elements as well as to
enhance the functionality. In the below shown image the `Container type` property from the flux container element has
been set to `Card deck` and accommodates two card flux elements.

.. figure:: ../Images/Introduction/ContainerCards.jpg
   :alt: Card deck container with two cards

Tile unit
---------

The tile unit flux elements can be used to create panels showing tiles.

Tiles aren't yet supported by the bootstrap framework hence on bare installations won't show up as expected. To get
started using tile units the `extension pizpalue <https://extensions.typo3.org/extension/pizpalue>`__ might be
checked out.

.. figure:: ../Images/Introduction/TileUnit.jpg
   :alt: Tile unit containing tile content elements


