# TYPO3 flux_elements

This [TYPO3](https://typo3.org/) extension provides elements to further structure the content area. It is powered
by the [flux extension](https://extensions.typo3.org/extension/flux/). Many thanks to the FluidTYPO3 Team!

Currently the following elements are available: container, columns, registers, accordion, tile unit and card.

The extension is intended to be used together with the [bootstrap framework](https://getbootstrap.com/).

## Example contents

### Columns, tabs and accordion

The following image shows the usage from a two columns flux element containing a tabs flux element in the left column
and an accordion flux element in the right column. Three and four columns flux elements are available too.

![Two columns with a tabs and accordion element](Documentation/Images/Introduction/ColumnsTabsAccordion.jpg)

### Container and cards

The container flux element adds freedom in designing the layout. It might be used to group elements as well as to
enhance the functionality. In the below shown image the `Container type` property from the flux container element has
been set to `Card deck` and accommodates two card flux elements.

![Card deck container with two cards](Documentation/Images/Introduction/ContainerCards.jpg)

### Tile unit

The tile unit flux elements can be used to create panels showing tiles.

Tiles aren't yet supported by the bootstrap framework hence on bare installations won't show up as expected. To get
started using tile units the [distribution pizpalue](https://extensions.typo3.org/extension/pizpalue) might be
checked out.

![Tile unit containing tile content elements](Documentation/Images/Introduction/TileUnit.jpg)

## Resources

- [Documentation from this extension](https://docs.typo3.org/p/buepro/typo3-flux-elements/master/en-us/)
- [Extension at the TYPO3 extension repository](https://extensions.typo3.org/extension/flux_elements/)
- [TYPO3 distribution `pizpalue`](https://extensions.typo3.org/extension/pizpalue/) supports tile units.
- [Fluid powered TYPO3](https://fluidtypo3.org/)
