# silverstripe/orm PoC

This package is a PoC of what a split out silverstripe/orm might looks like.
It reles on the [silverstirpe/core PoC](http://github.com/sminnee/silverstripe-core-poc).

**It will be deleted at some point in the future and should not be used in projects.**

## Contents

It mostly contains the contents of framework/src/ORM, providing:

 * Database connection management
 * Database schema creation with automatic non-destructive migration
 * ORM with multi-table inheritance, polymorphic relations, and more

It's designed to work with the service registry, configuration system, and test-state management facilities
provided by silverstripe/core.