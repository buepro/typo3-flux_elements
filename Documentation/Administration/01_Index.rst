.. include:: ../Includes.txt


.. _administration:

==============
Administration
==============

.. _installation:

Installation
============

In most cases the extension just needs to be installed (through the extension manager or composer) and no further
action is required.

In case the templates should be altered or enhanced the static from extension called 'Flux elements' can be included.
This will allow to define custom template paths through the constant editor.

In case the extension `pizpalue` is used the static `Flux elements - Pizpalue` can be included too. This will enable
automatic width calculations for image rendering.

.. attention::

   In case the site is using the extension `pizpalue` and the static `Flux elements - Pizpalue` is added the field
   `Image scaling` in the `Image` tab from the content elements should be reviewed. Since the image dimensions are
   now calculated automatically the default values might need to be restored.


.. note::

   Upon installing the extension for the first time the `flux` extension configuration will be altered. Please consult
   the :ref:`extension configuration <config_extension>` for more details.

Extend templates
----------------

In case the provided templates need to be adjusted additional template paths have to be configured. For this purpose
the static template `Flux elements` can be added to the template record (`Include static (from extensions)`).

Gridelements
------------

On installations using `gridelements` and `flux_elements` it might be needed to check the TCA entry from `itemsProcFunc`
for the `colPos` field from `tt_content` in the configuration module. It should be set to:

`Buepro\FluxElements\Integration\Overrides\BackendLayoutView->colPosListItemProcFunc`

.. figure:: ../Images/Administration/ConfigurationItemsProcFunc.jpg
   :width: 500px
   :alt: TCA setting for itemsProcFunc

   TCA setting for itemsProcFunc

Update
======

1.1.0
-----

When updating to version 1.1.0 the `Upgrade wizard` from the `Upgrade` module should be executed. This ensures the
card content element to be updated correctly.
