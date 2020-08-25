# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]
### Added
- This changelog.

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

[Unreleased]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.4...HEAD
[v0.1.4]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.3...v0.1.4
[v0.1.3]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.2...v0.1.3
[v0.1.2]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.1...v0.1.2
[v0.1.1]: https://github.com/Anteris-Dev/autotask-client/compare/v0.1.0...v0.1.1
[v0.1.0]: https://github.com/Anteris-Dev/autotask-client/releases/tag/v0.1.0

