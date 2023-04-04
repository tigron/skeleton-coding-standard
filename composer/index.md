# Composer packages

We maintain several packages around the `skeleton` framework
(e.g. `skeleton-database`), as well as some packages implementing general
utilities (e.g. `shipping-ups`).

## Naming

Packages names should always be consise.

  * good: `sepa-payments`
  * bad: `sepa-payment-file-creator-package`

Package names should be descriptive. Do not use fantasy names.

  * good: `codabox-gateway`
  * bad: `project-hawkeye`

## Skeleton packages

All packages surrounding the `skeleton` framework are part of the same
ecosystem. For this reason, it is necessary to maintain consistency.

### Naming

Packages for the `skeleton` framework should always be prepended with
`skeleton-`.

### Versioning

Version tags always start with `v`. Example:

  * `v9.1`
  * `v2.4.1`

A package under development with no clear target can be released with the major
version set to 0. Example:

  * `v0.1`

When a package breaks backwards compatibility, the major version should be
increased by at least 1.

The major version of a skeleton package depending on `skeleton-core` should
always match the lowest major version of `skeleton-core` it is compatible with,
even if that means the package will skip a major version. Example:

  * `skeleton-transaction` version `v4.1` is compatible with `skeleton-core`
    version `v4.x`, and possibly with newer major versions of `skeleton-core`

  * `skeleton-database` is currently at version `v2.1`, but a change about to be
    introduced would make it compatible only with `skeleton-core` version `v4.x`
    and up. The next `skeleton-database` version must therefore be `v4.0`.
