# Page Builder Theme Settings Guide

This guide shows you how to use all the theme settings functionality in your WordPress theme.

## Available Theme Settings Sections

Your theme now includes the following settings sections in the WordPress admin:

### 1. General Settings

- **Logo**: Upload your site logo
- **Site Title**: Custom site title (falls back to WordPress site name)

### 2. Colors

- **Primary Color**: Main brand color for buttons, links, etc.
- **Secondary Color**: Secondary color for accents

### 3. Typography

- **Body Typography**: Font family, size, weight, line-height, color for body text
- **Heading Typography**: Font family, weight, color for all headings (H1-H6)
- **Google Fonts API Key**: Optional API key for better performance
- **Additional Google Fonts**: Custom Google Font URLs

### 4. Layout

- **Container Width**: Choose from Bootstrap container sizes or full width
- **Sticky Header**: Enable/disable sticky navigation
- **Footer Style**: Choose from 5 different footer styles

### 5. Social Media

- **Social URLs**: Facebook, Twitter, Instagram, LinkedIn, YouTube
- **Social Icons Style**: Rounded, Square, Circle, or Minimal

### 6. Contact Information

- **Phone Number**: Contact phone with tel: link
- **Email Address**: Contact email with mailto: link
- **Address**: Business address
- **Business Hours**: Operating hours

### 7. SEO & Analytics

- **Google Analytics ID**: For website tracking
- **Google Tag Manager ID**: For advanced tracking
- **Facebook Pixel ID**: For Facebook advertising tracking
- **Default Meta Description**: Default description for pages

## How to Use Theme Settings in Templates

### Basic Helper Functions

```php
// Get logo URL
$logo_url = get_theme_logo('path/to/default/logo.png');

// Get site title
$site_title = get_theme_site_title();

// Get colors
$primary_color = get_theme_primary_color();
$secondary_color = get_theme_secondary_color();

// Get container class
$container_class = get_theme_container_class(); // Returns: container, container-fluid, etc.

// Check if header is sticky
$is_sticky = is_header_sticky(); // Returns: true/false

// Get footer style
$footer_style = get_footer_style(); // Returns: footer-1, footer-2, etc.
```

### Display Functions

```php
// Display logo with fallback
display_theme_logo('my-logo-class', 'My Alt Text');

// Display social media icons
display_social_icons('my-social-class');

// Display contact information
display_contact_info('list'); // or 'inline'

// Get social URLs array
$social_urls = get_theme_social_urls();

// Get contact info array
$contact_info = get_theme_contact_info();

// Get analytics settings array
$analytics = get_theme_analytics();
```

### Example Template Usage

#### Header Template Example:

```php
<?php
$container_class = get_theme_container_class();
$is_sticky = is_header_sticky();
$header_classes = 'pt-5';
if ($is_sticky) {
    $header_classes .= ' sticky-header';
}
?>

<header class="<?php echo esc_attr($header_classes); ?>">
    <nav class="navbar">
        <div class="<?php echo esc_attr($container_class); ?>">
            <div class="navbar-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php display_theme_logo('logo'); ?>
                </a>
            </div>
            <!-- Navigation menu here -->
        </div>
    </nav>
</header>
```

#### Footer Template Example:

```php
<footer class="<?php echo esc_attr(get_footer_style()); ?>">
    <div class="<?php echo esc_attr(get_theme_container_class()); ?>">
        <div class="footer-content">
            <div class="contact-info">
                <?php display_contact_info('list'); ?>
            </div>
            <div class="social-links">
                <?php display_social_icons('footer-social'); ?>
            </div>
        </div>
    </div>
</footer>
```

#### Social Media Links Example:

```php
<?php
$social_urls = get_theme_social_urls();
foreach ($social_urls as $platform => $url) {
    if (!empty($url)) {
        echo '<a href="' . esc_url($url) . '" target="_blank">' . ucfirst($platform) . '</a>';
    }
}
?>
```

#### Contact Information Example:

```php
<?php
$contact = get_theme_contact_info();
if (!empty($contact['phone'])) {
    echo '<a href="tel:' . esc_attr($contact['phone']) . '">' . esc_html($contact['phone']) . '</a>';
}
if (!empty($contact['email'])) {
    echo '<a href="mailto:' . esc_attr($contact['email']) . '">' . esc_html($contact['email']) . '</a>';
}
?>
```

## CSS Classes Available

The theme automatically generates CSS classes and variables:

### CSS Variables:

```css
:root {
  --primary-color: #007cba;
  --secondary-color: #28a745;
}
```

### Button Classes:

```css
.button-primary {
  background-color: var(--primary-color) !important;
  border-color: var(--primary-color) !important;
  color: #fff !important;
}

.button-secondary {
  color: var(--secondary-color) !important;
  border-color: var(--secondary-color) !important;
}
```

### Layout Classes:

- `.sticky-header` - Applied when sticky header is enabled
- `.container`, `.container-fluid`, `.container-sm`, etc. - Based on container width setting
- `.footer-1`, `.footer-2`, etc. - Based on footer style setting

### Social Icon Classes:

- `.social-icons` - Base class for social icons container
- `.rounded`, `.square`, `.circle`, `.minimal` - Icon style classes
- `.social-link` - Individual social link class
- `.social-facebook`, `.social-twitter`, etc. - Platform-specific classes

## Analytics Integration

Analytics tracking is automatically added to the site when IDs are provided in the theme settings:

- **Google Analytics**: Automatically loads gtag.js and initializes tracking
- **Google Tag Manager**: Adds GTM script to head and noscript to body
- **Facebook Pixel**: Loads Facebook Pixel tracking code

## Typography Integration

Typography settings are automatically applied via CSS generation:

- **Body text**: Applied to `body` element
- **Headings**: Applied to `h1, h2, h3, h4, h5, h6` elements
- **Google Fonts**: Automatically loaded when Google Fonts are selected

## Best Practices

1. **Always use the helper functions** instead of directly accessing Redux options
2. **Provide fallback values** when calling helper functions
3. **Escape output** using WordPress functions like `esc_url()`, `esc_attr()`, `esc_html()`
4. **Check if values exist** before displaying them
5. **Use semantic CSS classes** for styling different states

## Troubleshooting

### Settings Not Appearing

- Make sure Redux Framework plugin is installed and activated
- Check that the theme is properly installed and activated
- Clear any caching plugins

### Logo Not Displaying

- Verify the logo is uploaded in the Media Library
- Check file permissions
- Ensure the image file is not corrupted

### Colors Not Applying

- Check that CSS is being generated (view page source)
- Clear browser cache
- Check for CSS conflicts

### Analytics Not Working

- Verify the tracking IDs are correct
- Check browser console for JavaScript errors
- Use browser developer tools to verify scripts are loading
