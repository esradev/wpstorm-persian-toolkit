# Wpstorm Persian Toolkit

**Wpstorm Persian Toolkit** is a comprehensive WordPress plugin designed to enhance Persian websites by adding support for the Jalali calendar, Persian fonts, Persian numbers, RTL adjustments, and more.

## Features

- ✅ **Jalali (Persian) Calendar** – Convert WordPress dates to the Persian calendar.
- ✅ **Persian Datepicker** – Adds a Jalali-compatible date picker for posts, forms, and custom fields.
- ✅ **Persian Fonts** – Easily integrate popular Persian fonts like Vazir, IranSans, and more.
- ✅ **Persian Numbers** – Automatically convert Western digits (123) to Persian digits (۱۲۳).
- ✅ **RTL Support** – Ensures proper right-to-left (RTL) formatting for Persian websites.
- ✅ **Persian Weekdays & Holidays** – Display Iranian weekdays and important holidays.
- ✅ **SEO-Friendly Persian URLs** – Optimize your website URLs for better SEO in Persian.
- ✅ **Translation-Ready** – Supports Persian translations and multi-language compatibility.

## Installation

### From WordPress Admin:

1. Go to **Plugins > Add New**.
2. Search for "**Wpstorm Persian Toolkit**".
3. Click **Install Now** and then **Activate**.

### Manual Installation:

1. Download the latest release from [GitHub](https://github.com/your-repo) or WordPress.org.
2. Upload the extracted folder to `wp-content/plugins/wpstorm-persian-toolkit/`.
3. Go to **Plugins** in the WordPress dashboard and activate it.

## Usage

### Settings Page

After activation, go to **Settings > Persian Toolkit** to configure:

- Enable/Disable **Jalali Date**
- Choose your preferred **Persian font**
- Toggle **Persian number conversion**
- Adjust **RTL settings**  
  ... and more!

## Shortcodes

You can use these shortcodes in posts, pages, or widgets:

| Shortcode                               | Description                                 |
| --------------------------------------- | ------------------------------------------- |
| `[jalali_date]`                         | Displays the current date in Jalali format. |
| `[persian_number]1234[/persian_number]` | Converts numbers into Persian digits.       |

## Hooks & Filters

Developers can extend and modify features using these hooks:

```php
// Modify the Jalali date output
add_filter('wpstorm_persian_jalali_date', function($date) {
    return $date . ' - ویرایش شده';
});
// Disable Persian numbers
add_filter('wpstorm_persian_number_enabled', '__return_false');
```
