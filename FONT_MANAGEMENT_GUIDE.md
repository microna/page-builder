# Font Management Guide

## 🎨 **How to Change Fonts**

### **Method 1: WordPress Admin (Easiest)**

1. **Go to**: WordPress Admin → Appearance → Theme Options
2. **Click**: Typography section
3. **Configure**:
   - **Body Typography**: Font for all body text
   - **Heading Typography**: Font for H1, H2, H3, H4, H5, H6
   - **Google Fonts API Key**: Optional for better performance
   - **Additional Google Fonts**: Custom font URLs

### **Method 2: Code Implementation**

#### **Using Helper Functions:**

```php
// Get current font family
$body_font = get_custom_font_family('body');
$heading_font = get_custom_font_family('heading');

// Apply font to element
$font_css = apply_custom_font('body', 'Arial');
echo '<div style="' . $font_css . '">Your text</div>';

// Display font preview
display_font_preview('Sample Text', 'body');
```

#### **Direct CSS Application:**

```php
// In your templates
<style>
body {
    font-family: '<?php echo esc_attr(get_custom_font_family('body')); ?>', sans-serif;
}

h1, h2, h3, h4, h5, h6 {
    font-family: '<?php echo esc_attr(get_custom_font_family('heading')); ?>', sans-serif;
}
</style>
```

### **Method 3: Custom Font URLs**

#### **Add Google Fonts:**

1. Go to [Google Fonts](https://fonts.google.com)
2. Select your fonts
3. Copy the CSS URL
4. Add to Theme Options → Typography → Additional Google Fonts

#### **Add Custom Fonts via Code:**

Edit the `add_custom_fonts_css()` function in `functions.php`:

```php
$custom_fonts = array(
    'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap',
    'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap',
    'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap',
);
```

## 📝 **Popular Font Combinations**

### **Modern & Clean**

- **Headings**: Montserrat, Poppins, or Roboto
- **Body**: Open Sans, Lato, or Source Sans Pro

### **Professional & Corporate**

- **Headings**: Roboto, Lato, or Source Sans Pro
- **Body**: Open Sans, Lato, or Helvetica Neue

### **Creative & Artistic**

- **Headings**: Playfair Display, Merriweather, or Crimson Text
- **Body**: Source Sans Pro, Lato, or Open Sans

### **Minimal & Simple**

- **Headings**: Inter, Roboto, or Helvetica Neue
- **Body**: Inter, Roboto, or System fonts

## 🔧 **Font Implementation Examples**

### **Example 1: Change All Fonts**

```php
// In your template
<style>
body {
    font-family: '<?php echo esc_attr(get_custom_font_family('body')); ?>', sans-serif;
    font-size: <?php
        $body_typography = get_theme_typography('body');
        echo esc_attr($body_typography['font-size'] ?? '16px');
    ?>;
    line-height: <?php
        echo esc_attr($body_typography['line-height'] ?? '1.6');
    ?>;
}

h1, h2, h3, h4, h5, h6 {
    font-family: '<?php echo esc_attr(get_custom_font_family('heading')); ?>', sans-serif;
    font-weight: <?php
        $heading_typography = get_theme_typography('heading');
        echo esc_attr($heading_typography['font-weight'] ?? '600');
    ?>;
}
</style>
```

### **Example 2: Specific Element Styling**

```php
// Style specific elements
<div class="custom-text" style="<?php echo apply_custom_font('body'); ?>">
    This text uses your custom body font
</div>

<h2 style="font-family: '<?php echo esc_attr(get_custom_font_family('heading')); ?>', sans-serif;">
    This heading uses your custom heading font
</h2>
```

### **Example 3: Font Preview Component**

```php
// Create a font preview section
<section class="font-preview">
    <h3>Font Preview</h3>

    <h4>Body Font:</h4>
    <?php display_font_preview('The quick brown fox jumps over the lazy dog', 'body'); ?>

    <h4>Heading Font:</h4>
    <?php display_font_preview('Sample Heading Text', 'heading'); ?>
</section>
```

## 🎯 **Quick Font Changes**

### **Change to Roboto:**

1. Go to Theme Options → Typography
2. Set Body Typography → Font Family → Roboto
3. Set Heading Typography → Font Family → Roboto
4. Save changes

### **Change to Custom Font:**

1. Add font URL to Additional Google Fonts
2. Set font family in Typography settings
3. Save changes

### **Change Font Weights:**

1. In Typography settings, adjust Font Weight
2. Available weights: 300, 400, 500, 600, 700, 800, 900
3. Save changes

## 🔍 **Font Debugging**

### **Check Current Fonts:**

```php
// Add this temporarily to see current settings
if (current_user_can('manage_options')) {
    echo '<div style="background: #f0f0f0; padding: 10px; margin: 10px 0;">';
    echo '<strong>Current Fonts:</strong><br>';
    echo 'Body Font: ' . get_custom_font_family('body') . '<br>';
    echo 'Heading Font: ' . get_custom_font_family('heading') . '<br>';
    echo '</div>';
}
```

### **Check Font Loading:**

1. Open browser Developer Tools (F12)
2. Go to Network tab
3. Reload page
4. Look for font requests (Google Fonts, etc.)

## ⚡ **Performance Tips**

### **Optimize Font Loading:**

1. Use Google Fonts API Key for better caching
2. Limit font weights (don't load all weights if not needed)
3. Use `font-display: swap` for better loading
4. Preload important fonts

### **Font Loading Optimization:**

```php
// Add to functions.php for font preloading
function preload_important_fonts() {
    $body_font = get_custom_font_family('body');
    $heading_font = get_custom_font_family('heading');

    if ($body_font && $body_font !== 'Inter') {
        echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=' . urlencode($body_font) . '&display=swap" as="style">';
    }

    if ($heading_font && $heading_font !== 'Inter' && $heading_font !== $body_font) {
        echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=' . urlencode($heading_font) . '&display=swap" as="style">';
    }
}
add_action('wp_head', 'preload_important_fonts', 1);
```

## 🎨 **Font Pairing Suggestions**

### **Sans-serif Combinations:**

- **Primary**: Roboto, **Secondary**: Open Sans
- **Primary**: Lato, **Secondary**: Source Sans Pro
- **Primary**: Inter, **Secondary**: Roboto

### **Serif + Sans-serif:**

- **Headings**: Playfair Display, **Body**: Open Sans
- **Headings**: Merriweather, **Body**: Lato
- **Headings**: Crimson Text, **Body**: Source Sans Pro

### **Monospace for Code:**

- **Code**: Fira Code, Source Code Pro, or JetBrains Mono
- **Body**: Inter or Roboto

Your font system is now fully functional and ready to use! 🚀

