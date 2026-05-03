# Aaron Forum — WordPress Theme

A complete, ready-to-install WordPress classic theme that replicates the Aaron Forum static site pixel-for-pixel, including all CSS custom properties, responsive breakpoints, accessibility attributes, and JavaScript behavior.

---

## Installation

### 1. Upload the theme

**Option A — WordPress Admin (recommended)**

1. Zip the entire `wordpress-theme/` folder (the folder itself, not its contents).
2. In WordPress admin go to **Appearance → Themes → Add New → Upload Theme**.
3. Choose the zip file and click **Install Now**, then **Activate**.

**Option B — FTP / file manager**

Copy the `wordpress-theme/` folder to `wp-content/themes/` on your server and rename it `aaron-forum` (or any slug you prefer). Then activate it at **Appearance → Themes**.

---

### 2. Set up the front page

1. Go to **Pages → Add New**, create a blank page titled **Home**, and publish it.
2. Go to **Settings → Reading**, choose **A static page**, set **Front page** to *Home*.

WordPress will now use `front-page.php` to render the home page with all sections.

---

### 3. Set the logo

1. Go to **Appearance → Customize → Site Identity → Logo**.
2. Upload `assets/logo.jpg` (found in the repository root `assets/` folder) or use the version already in the WordPress Media Library.
3. Click **Publish**.

---

### 4. Create the navigation menu

1. Go to **Appearance → Menus → Create a new menu** (name it *Primary*).
2. Add three **Custom Links**:
   | Label    | URL        |
   |----------|------------|
   | Services | `#services` |
   | About    | `#about`    |
   | Contact  | `#contact`  |
3. For the **Contact** item, expand it and add `btn btn-sm` to the **CSS Classes** field (enable CSS Classes under **Screen Options** if hidden).
4. Set **Display location** to *Primary Navigation* and save.

---

### 5. SEO meta description

Install **Yoast SEO** or **Rank Math**, then on the Home page:

- **SEO title:** `Aaron Forum | Firearms Consulting & Safety Expertise`
- **Meta description:** `Aaron Forum – Firearms Consulting & Safety Expertise. 20+ years of experience: Special Forces, firearms instruction, multi gun range/store founder and operator, Special Operations armorer, certified gunsmith.`

---

### 6. DNS / Netlify cutover

Once the WordPress site is staged and approved:

1. Update the DNS A/CNAME records for `aaronforum.com` to point to the WordPress host.
2. Remove or set up a redirect from the Netlify deployment.

---

## File structure

```
wordpress-theme/
├── style.css          ← Theme declaration + all site CSS
├── functions.php      ← Theme setup, asset enqueuing, nav menu registration
├── header.php         ← HTML <head>, wp_head(), fixed site header/nav
├── footer.php         ← Site footer, wp_footer(), closing </body></html>
├── front-page.php     ← Hero, Services, About, Contact sections
├── index.php          ← Required WordPress fallback template
├── js/
│   └── main.js        ← Sticky-header scroll-class script
└── README.md          ← This file
```

## Notes

- **Smooth scroll** is handled natively via `scroll-behavior: smooth` in the CSS; no JavaScript is needed.
- **Copyright year** is rendered server-side with `gmdate('Y')` in `footer.php`; no JavaScript required.
- The hero background image and the About profile photo are already hosted on `aaronforum.com` and are referenced by URL. No re-upload is needed unless the WordPress install moves to a different domain.
