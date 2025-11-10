# Contributing to Steelbak Search

Thanks for your interest in helping build the Steelbak Search plugin! This document outlines the development workflow, coding standards, and expectations for contributions.

## Development Workflow

1. **Fork & clone** the repository under your GitHub account.
2. **Create a branch** for your feature or fix: `git checkout -b feature/my-contribution`.
3. **Install dependencies**:
   ```bash
   composer install
   ```
   (Additional tooling such as Node.js will be introduced when UI assets are implemented.)
4. **Write code & tests** following the guidelines below.
5. **Run quality checks** before submitting:
   ```bash
   composer test        # PHPUnit (to be wired up in future iterations)
   vendor/bin/phpcs     # After installing WordPressCS or preferred ruleset
   ```
6. **Open a pull request** against the `main` branch with a clear summary, testing notes, and the related issue (if applicable).

## Coding Standards

- PHP 8.2+, PSR-12 formatting, and modern language features where appropriate (strict typing, promoted properties, enums when ready).
- Namespaces follow the `Steelbak\Search` root with meaningful sub-namespaces (`Providers`, `Indexing`, `Http`, etc.).
- Avoid global functions; use service providers or helper classes.
- Keep WordPress hooks centralized per module to maintain clarity.
- Prefer dependency injection via the `Application` container for shared services.

## Commit Messages & PRs

- Scope commit messages narrowly and use the imperative mood (`Add provider registry`, `Fix activation hook`).
- Reference issues in the PR description rather than every commit when possible.
- Include screenshots or terminal output for UX-facing or CLI changes.

## Testing Expectations

- Future phases will introduce PHPUnit suites and integration tests. Begin stubbing tests where feasible (`tests/` directory provided).
- When adding features, include happy-path and edge-case coverage where possible.
- Manual verification steps should be documented in the PR until automated tests are in place.

## Documentation

- Update `README.md`, `docs/prd-seed.md`, or create additional docs when features introduce new workflows or configuration.
- Inline docblocks are encouraged for public methods and complex logic paths.

## Communication

- Discussion takes place in GitHub issues/PRs and the Steelbak Discord (when appropriate).
- Respect the Steelbak code of conduct (to be drafted) and maintain a collaborative tone. We build systems that help others build.

Thanks again for contributing to Steelbak Search!
