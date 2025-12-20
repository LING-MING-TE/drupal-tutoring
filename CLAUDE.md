# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Drupal 11 project for a tutoring center (全科補習班) managed with DDEV for local development. The project uses Composer for dependency management and includes a custom Bootstrap 5-based theme.

## Development Environment

### DDEV Configuration
- Project name: `tutoring`
- URL: http://tutoring.ddev.site
- PHP version: 8.3
- Webserver: nginx-fpm
- Database: MariaDB 10.11
- Node.js: 22
- Performance mode: Mutagen
- Document root: `web/`

### Essential DDEV Commands

Start/stop the environment:
```bash
ddev start          # Start containers
ddev stop           # Stop containers
ddev restart        # Restart containers
ddev describe       # Show project details and URLs
```

Access containers:
```bash
ddev ssh            # SSH into web container
ddev ssh -s db      # SSH into database container
```

Database operations:
```bash
ddev import-db --file=backup.sql.gz    # Import database
ddev export-db --file=backup.sql.gz    # Export database
ddev snapshot                           # Create database snapshot
ddev snapshot restore                   # Restore from snapshot
```

Drupal operations:
```bash
ddev drush <command>                    # Run any Drush command
ddev drush cr                           # Clear cache
ddev drush status                       # Check Drupal status
ddev drush updb                         # Run database updates
ddev drush cex                          # Export configuration
ddev drush cim                          # Import configuration
```

Tools and debugging:
```bash
ddev composer <command>                 # Run Composer commands
ddev xdebug                             # Enable Xdebug
ddev xdebug off                         # Disable Xdebug
ddev mailpit                            # Open Mailpit email catcher
ddev logs                               # View container logs
```

## Project Structure

### Composer-based Architecture

This project follows Drupal's recommended project structure with Composer:

```
/
├── composer.json           # Project dependencies and Composer configuration
├── composer.lock           # Locked dependency versions
├── vendor/                 # Composer dependencies (not committed)
├── web/                    # Document root (served by web server)
│   ├── core/              # Drupal core files (managed by Composer)
│   ├── modules/
│   │   ├── contrib/       # Contributed modules (installed via Composer)
│   │   └── custom/        # Custom modules (committed to repo)
│   ├── themes/
│   │   ├── contrib/       # Contributed themes (installed via Composer)
│   │   └── custom/        # Custom themes
│   │       └── tutoring_bootstrap/  # Custom Bootstrap 5 theme
│   ├── sites/
│   │   └── default/
│   │       └── settings.php  # Drupal configuration
│   └── libraries/         # Third-party libraries
├── recipes/               # Drupal recipes (config bundles)
└── .ddev/                 # DDEV configuration
```

### Dependency Management

**IMPORTANT**: Never manually download or place files in `web/core/`, `web/modules/contrib/`, or `web/themes/contrib/`. These directories are managed by Composer.

Installing modules/themes:
```bash
ddev composer require drupal/module_name
ddev composer require drupal/theme_name
```

Updating dependencies:
```bash
ddev composer update                    # Update all dependencies
ddev composer update drupal/core-recommended --with-all-dependencies
```

### Custom Theme: tutoring_bootstrap

Location: `web/themes/custom/tutoring_bootstrap/`

- Base theme: Bootstrap 5 (`drupal/bootstrap5`)
- Theme name: 全科補習班主題
- Core version: Drupal 11
- Custom CSS: `css/style.css`
- Libraries: Defined in `tutoring_bootstrap.libraries.yml`

When working on the theme:
1. Edit files in `web/themes/custom/tutoring_bootstrap/`
2. Clear cache after changes: `ddev drush cr`
3. Rebuild theme registry if needed: `ddev drush cr` (cache rebuild handles this)

## Common Development Tasks

### Adding a New Module

```bash
# Install via Composer
ddev composer require drupal/module_name

# Enable the module
ddev drush en module_name

# Export configuration
ddev drush cex
```

### Creating a Custom Module

1. Create directory: `web/modules/custom/your_module/`
2. Create `your_module.info.yml` with required metadata
3. Clear cache: `ddev drush cr`
4. Enable: `ddev drush en your_module`

### Working with Configuration

Drupal 11 uses configuration management:

```bash
# Export active config to files
ddev drush cex

# Import config from files
ddev drush cim

# Check for config differences
ddev drush config:status
```

Configuration files are typically stored in a config directory (check `settings.php` for the sync directory location).

### Clearing Cache

Always clear cache after:
- Installing/uninstalling modules
- Changing theme files
- Modifying routing or hooks
- Updating configuration

```bash
ddev drush cr
```

## Drupal-Specific Architecture

### Module System

- **Contributed modules**: Located in `web/modules/contrib/`, installed via Composer
- **Custom modules**: Located in `web/modules/custom/`, committed to repository
- Modules extend Drupal functionality through hooks and plugins

### Theme System

- Uses Twig templating engine
- Theme inheritance: `tutoring_bootstrap` extends `bootstrap5`
- Templates can be overridden in custom theme
- Libraries define CSS/JS assets

### Service Container

Drupal uses Symfony's dependency injection container. Services are defined in `*.services.yml` files.

### Plugin System

Many Drupal subsystems use plugins (Blocks, Fields, Filters, etc.). Plugins are discovered via annotations or YAML files.

### Hooks

Modules interact with Drupal core and other modules through hooks. Hook implementations follow the pattern `modulename_hookname()`.

## Database and Settings

- Database connection configured in `web/sites/default/settings.php`
- DDEV automatically creates `settings.ddev.php` with database credentials
- Database: `db`, User: `db`, Password: `db` (or root/root)
- Connection from host: Check `ddev describe` for port mapping

## Debugging

### Enable Xdebug

```bash
ddev xdebug on
# ... do your debugging ...
ddev xdebug off  # Disable when done (performance impact)
```

### View Logs

```bash
ddev logs                              # All container logs
ddev logs -f                           # Follow logs
ddev drush watchdog:show               # Drupal watchdog logs
ddev drush watchdog:show --extended    # Detailed watchdog logs
```

### Email Testing

All outgoing emails are caught by Mailpit:
```bash
ddev mailpit  # Opens Mailpit UI in browser
```

## Performance Considerations

- Mutagen is enabled for better filesystem performance
- Disable Xdebug when not debugging (significant performance impact)
- Use `ddev drush cr` instead of UI cache clear (faster)
- Consider using `ddev snapshot` before major changes for quick rollback
