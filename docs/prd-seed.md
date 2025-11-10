# Steelbak Search Plugin — PRD Seed

## Vision Snapshot
- Deliver a Steelbak-branded, open-source WordPress search engine that reinforces the "systems building" ethos and can be reused across Steelbak, Farrier Services, DiggnDeeper, and partner sites.
- Provide a search experience that respects Steelbak's minimal UI preferences (inline search, no modals) while surfacing deep content within long-form pages.
- Establish a foundation that supports single-site deployments immediately and evolves toward multi-site/aggregated search.

## Problems We Are Solving
- Default WordPress search misses ACF blocks, section anchors, PDFs, and other structured content that Steelbak relies on for storytelling.
- Off-the-shelf plugins (SearchWP, Relevanssi, Jetpack Search, ElasticPress, Algolia wrappers) either require licenses, external SaaS, or do not expose the exact blend of analytics, deep-linking, and UI control we need.
- Steelbak wants to own the tooling—no recurring fees, adaptable to future brands, and publishable as open source to align with community-building goals.

## Core Requirements (Initial Release)
1. **Content Coverage**
   - Index WordPress pages, posts, custom post types, taxonomy terms, and key ACF/meta fields.
   - Capture heading hierarchy and anchor IDs to support jump links within long pages.
   - Provide an extension point for document ingestion (PDF, DOCX) even if not in the first build.
2. **Search Experience**
   - Inline search bar with live, accessible suggestions (keyboard friendly, ARIA compliant).
   - Result cards showing excerpts with highlighted terms and direct links to relevant anchors.
   - Optional inline facet strip (no modal) for toggling categories such as Software, Equipment, Community.
3. **Analytics & Feedback**
   - Log search queries, zero-hit results, and click-through destinations for content planning.
   - Surface summary metrics inside the WordPress admin (or exportable for external dashboards).
4. **Architecture & Maintainability**
   - Modern PHP (>=8.1), PSR-4 autoloading, service-container pattern to enable module growth (indexing, querying, analytics).
   - Clear separation between indexing, search APIs, UI integration, and admin settings.
   - Composer-managed dependencies; extendable to external engines (Meilisearch, Elasticsearch) later.
5. **Open Source Readiness**
   - GPL-compatible licensing, contribution guidelines, coding standards, and documentation from day one.
   - Revenue opportunities via premium extensions, managed hosting, and support packages (documented for future consideration).

## Technical Direction
- **Language & Standards**: PHP 8.2+, PSR-12 coding standards, Composer for dependency management, PHPUnit for testing scaffolding.
- **Plugin Bootstrap**: Service container (`Application`), provider registration, activation/deactivation hooks, namespaced function wrappers to avoid globals.
- **Storage**: Custom database tables (likely `wp_steelbak_search_index` and `wp_steelbak_search_metrics`) managed via migrations in activation routines.
- **Search Engine (Phase 1)**: Start with MySQL fulltext or custom relevance scoring within WordPress for simplicity; architect provider interface to swap in Meilisearch/Elasticsearch.
- **API Layer**: REST endpoints under `/wp-json/steelbak-search/v1/*` for AJAX/live search; filter hooks to override native search results.
- **Frontend**: Progressive enhancement via lightweight ES module (Vanilla JS or Preact) loaded only where needed; respect theme styles.

## Multi-Site & Aggregation Roadmap
- Phase 1 (MVP): Single-site support, but code structured to resolve site IDs and table prefixes.
- Phase 2: Shared index option for WordPress multisite networks, with configuration to include/exclude subsites and map content types.
- Phase 3: Cross-domain aggregation (Steelbak family sites) via REST ingestion or headless export pipelines.

## Open Source & Revenue Strategy (Draft)
- Core plugin released under GPLv2+.
- Paid offerings (to explore later): hosted search clusters, advanced analytics dashboards, premium connectors (e.g., FarrierHub, LearnDash), priority support retainers, training.
- Transparent documentation to attract community contributions and potential sponsors.

## Next Steps Toward Full PRD
1. Validate MVP scope with stakeholders (you, product marketing, ops).
2. Outline user stories and acceptance criteria per module (Indexing, Search UI, Analytics, Admin).
3. Define success metrics (search latency, coverage, engagement).
4. Produce technical risk assessment (DB size, relevance tuning, caching strategy).
5. Schedule build milestones and resource estimates once scaffolding is in place.

---
_Last updated: 2025-11-10 12:43 UTC_
