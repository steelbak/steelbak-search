# Steelbak Search

Steelbak Search is an open-source WordPress plugin that delivers a Steelbak-branded search experience with deep indexing, inline live results, and analytics designed for owner-operators. It is architected for reuse across Steelbak, Farrier Services, DiggnDeeper, and partner properties.

> **Status:** Early scaffolding. This repository currently contains the foundational structure, service container, and documentation to guide future development.

## Why another search plugin?

- **Own your tools** – No recurring SaaS fees, full control over the codebase, and aligned with Steelbak's systems-building philosophy.
- **Search the way we publish** – Supports long-form pages, ACF-driven content blocks, anchor-level linking, and upcoming document ingestion.
- **Inline experience** – Minimal, non-modal UI that matches Steelbak.com and future AppxHub properties.
- **Analytics feedback loop** – Built to capture queries, zero-result terms, and click-through destinations so content strategy stays user-driven.
- **Extensible core** – Service-provider architecture enables swappable indexing engines (MySQL, Meilisearch, Elasticsearch) and feature modules.

## Directory Layout

```
steelbak-search/
├── assets/                # Future JS/CSS bundles (placeholders today)
├── config/                # Configuration and stub exports
├── docs/                  # Product and technical documentation
├── src/                   # PHP source (Application + providers)
├── tests/                 # PHPUnit tests (scaffolded)
├── vendor/                # Composer dependencies (ignored)
├── composer.json          # PSR-4 autoload configuration
├── LICENSE                # GPL-2.0-or-later
├── README.md
├── CONTRIBUTING.md
├── steelbak-search.php    # Main plugin file
└── phpcs.xml.dist         # Coding standards configuration
```

## Requirements

- WordPress 6.4 or newer
- PHP 8.2+
- Composer (for autoloading and dev dependencies)
- Node.js (optional, future UI builds)

## Getting Started (Development)

```bash
# From the repository root
cd steelbak-search
composer install

# Run automated checks (to be implemented in future phases)
composer test
```

Activate the plugin in a local WordPress environment by symlinking or copying the directory into `wp-content/plugins/`.

## Roadmap Snapshot

1. **Indexing Engine (Phase 1)** – MySQL-backed index covering pages, posts, taxonomies, ACF fields.
2. **Live Search UI** – Inline search component with accessible autocomplete and anchor-aware results.
3. **Analytics Module** – Admin dashboards for query insights and zero-result monitoring.
4. **External Engine Adapters** – Optional connectors for Meilisearch/Elasticsearch deployments.
5. **Multi-Site & Aggregation** – Shared index support for WordPress multisite networks and cross-domain ingestion.

See `docs/prd-seed.md` for the working product spec seed.

## Contributing

Pull requests and issues are welcome once the GitHub repository is public. Please review [`CONTRIBUTING.md`](CONTRIBUTING.md) for development workflow, coding standards, and review expectations.

## License

Released under the [GNU General Public License v2 or later](LICENSE).
