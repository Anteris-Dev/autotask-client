# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Removed
- Docs directory. This belongs elsewhere.

## [v0.2.1] - 2020-08-31

### Added
- Description of requirements to the README.

### Changed
- Relaxed composer version requirements.

## [v0.2.0] - 2020-08-25
### Added
- This changelog.
- Support for retrieving entity metadata via `getEntityInformation()`, `getEntityFields()`, and `getEntityUserDefinedFields()`.
- Support for retrieving the query count via the `count()` method on the QueryBuilder.

### Changed
- User Defined Fields are now represented as Data Transfer Objects, though they still are organized as an array on each entity that supports them.

### Fixed
- User Defined Fields are not present on entities that do not support them.
- Guzzle Response object is not imported on service classes that do not require it.

## [v0.1.4] - 2020-08-21
### Fixed
- Services sending POST and PUT requests to root endpoints instead of child endpoints when interacting with a child resource.

## [v0.1.3] - 2020-08-18
### Fixed
- Version constraints in composer to only require by Major and Minor version so patches can be installed.
- QueryBuilder `getFilters()` returned `$this->filters` which did not exist.
- Entity constructors did not check to see if the array property was set before attempting to cast to Carbon.

## [v0.1.2] - 2020-08-18
### Added
- Carbon as explicit dependency in composer which was resulting in Carbon not getting added in some situations.

## [v0.1.1] - 2020-08-17
### Added
- Safety check for the Base URI passed to the client. This ensures requests are sent to the right version.

## [v0.1.0] - 2020-08-17
### Added
- Initial API client class files.

[v0.2.1]: https://github.com/Anteris-Dev/autotask-client/compare/v0.2.0...v0.2.1
[v0.2.0]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.4...v0.2.0
[v0.1.4]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.3...v0.1.4
[v0.1.3]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.2...v0.1.3
[v0.1.2]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.1...v0.1.2
[v0.1.1]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.0...v0.1.1
[v0.1.0]: https://github.com/Anteris-Dev/autotask-client/releases/tag/v0.1.0

