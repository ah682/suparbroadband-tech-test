# SupaBroadband WordPress Theme

Custom WordPress theme for SupaBroadband internet service provider website.

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher
- Astra parent theme

## Installation

### 1. Install WordPress

Set up a fresh WordPress installation on your hosting environment.

### 2. Install Astra Parent Theme

Download and install the Astra theme from WordPress.org or via the WordPress admin dashboard:
- Go to Appearance > Themes > Add New
- Search for "Astra"
- Install and activate

### 3. Install Child Theme

Upload the `astra-child` folder to your `wp-content/themes/` directory.

Activate the Astra Child theme from Appearance > Themes.

### 4. Import Database

If migrating from an existing site:
- Export the database from your source environment
- Import into your target database using phpMyAdmin or similar tool
- Update site URLs in wp_options table if needed

### 5. Configure Site

- Set permalinks to "Post name" under Settings > Permalinks
- Configure theme settings as needed
- Create pages and assign templates

## Theme Structure

The child theme includes custom templates for:
- Home page
- Broadband plans comparison
- How to Get Started
- Contact Us
- Cookie Policy
- Terms and Conditions
- Blog archive

## Custom Features

- Speed test widget
- Broadband plan comparison tables
- Custom page templates
- Responsive design optimized for mobile
- Custom CSS organized in modular files

## Development

The theme uses a modular CSS structure:
- base/ - Layout and foundational styles
- components/ - Reusable UI components
- sections/ - Page section styles
- pages/ - Page-specific styles
- utilities/ - Helper classes and animations
- variables/ - CSS custom properties

## Support

For issues or questions, refer to the WordPress Codex or Astra theme documentation.
