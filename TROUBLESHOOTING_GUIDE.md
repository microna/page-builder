# Theme Settings Troubleshooting Guide

## Quick Diagnosis Steps

### Step 1: Check if Redux Framework is Installed

1. Go to WordPress Admin → Plugins
2. Look for "Redux Framework" plugin
3. If not installed, install it from: https://wordpress.org/plugins/redux-framework/

### Step 2: Check Theme Options Menu

1. Go to WordPress Admin → Appearance
2. Look for "Theme Options" menu item
3. If you see it, Redux is working
4. If not, you'll see a simple fallback options page

### Step 3: View Debug Information

1. Visit your website's frontend
2. Scroll to the bottom of the page
3. Look for debug boxes showing:
   - Redux Debug Info (gray box)
   - Theme Settings Test (green box)

## Common Issues and Solutions

### Issue 1: "Redux Framework Required" Notice

**Problem**: You see an admin notice saying Redux Framework is required.

**Solution**:

1. Install Redux Framework plugin from WordPress.org
2. Activate the plugin
3. Refresh your admin page

### Issue 2: Theme Options Menu Not Appearing

**Problem**: No "Theme Options" menu in Appearance section.

**Solutions**:

1. Check if you have admin privileges (`manage_options` capability)
2. Check if Redux Framework plugin is active
3. Look for a simple "Theme Options" page instead

### Issue 3: Settings Not Saving

**Problem**: Changes in theme options don't save.

**Solutions**:

1. Check file permissions on your WordPress directory
2. Clear any caching plugins
3. Check browser console for JavaScript errors
4. Try disabling other plugins temporarily

### Issue 4: Colors Not Applying

**Problem**: Color changes don't appear on the frontend.

**Solutions**:

1. Clear browser cache
2. Check if CSS is being generated (view page source, look for `<style>` tags)
3. Check for CSS conflicts with other plugins
4. Verify the colors are being saved correctly

### Issue 5: Logo Not Displaying

**Problem**: Logo upload doesn't work or logo doesn't show.

**Solutions**:

1. Check file upload permissions
2. Verify the image file is not corrupted
3. Check if the logo URL is being generated correctly
4. Ensure the image is in a supported format (jpg, png, svg)

### Issue 6: Helper Functions Not Working

**Problem**: Functions like `get_theme_logo()` return empty values.

**Solutions**:

1. Check if the function is defined (look for PHP errors)
2. Verify the option name matches in Redux config
3. Check if options are being saved to the database

## Debug Information Explained

### Redux Debug Info (Gray Box)

- **Redux Class Exists**: Should be "YES" if Redux Framework is installed
- **Options Array**: Should show "EXISTS" with number of options
- **Primary Color**: Should show your selected color
- **Logo**: Should show the logo URL if uploaded

### Theme Settings Test (Green Box)

- **Logo URL**: Should show your logo URL or "NOT SET"
- **Site Title**: Should show your custom site title
- **Primary Color**: Should show your selected primary color
- **Container Class**: Should show container type (container, container-fluid, etc.)
- **Header Sticky**: Should show YES or NO

## Manual Testing Steps

### Test 1: Check Database

1. Go to phpMyAdmin or your database tool
2. Look in the `wp_options` table
3. Find option named `page_builder_simple_options`
4. Check if it contains your settings

### Test 2: Check File Permissions

```bash
# Make sure these files are readable
chmod 644 theme/functions.php
chmod 644 theme/assets/inc/redux-config.php
```

### Test 3: Check PHP Errors

1. Enable WordPress debug mode in `wp-config.php`:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

2. Check `/wp-content/debug.log` for errors

### Test 4: Test Individual Functions

Add this to your theme's `functions.php` temporarily:

```php
// Test function - remove after testing
function test_redux_connection() {
    if (current_user_can('manage_options')) {
        echo '<pre>';
        echo 'Redux class exists: ' . (class_exists('Redux') ? 'YES' : 'NO') . "\n";
        echo 'Options in DB: ';
        print_r(get_option('page_builder_simple_options'));
        echo '</pre>';
    }
}
add_action('wp_footer', 'test_redux_connection');
```

## Getting Help

If you're still having issues:

1. **Check the debug boxes** on your frontend first
2. **Share the debug information** you see
3. **Check browser console** for JavaScript errors
4. **Check WordPress debug log** for PHP errors
5. **List your active plugins** as they might conflict

## Quick Fixes

### Reset All Settings

If everything is broken, you can reset by:

1. Going to WordPress Admin → Tools → Database
2. Delete the `page_builder_simple_options` row from `wp_options` table
3. Refresh your theme options page

### Force Fallback Mode

If Redux keeps causing issues:

1. Deactivate Redux Framework plugin
2. Use the simple fallback options page that will appear
3. This provides basic functionality without Redux

### Reinstall Redux Framework

If Redux is corrupted:

1. Deactivate and delete Redux Framework plugin
2. Download fresh copy from WordPress.org
3. Install and activate again
