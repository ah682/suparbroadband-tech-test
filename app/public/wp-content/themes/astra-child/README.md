# Supabroadband Theme - Installation & Setup Guide

## 📦 Package Contents

This professional WordPress child theme includes:

### Core Theme Files:
- `functions.php` - Main theme functionality, Custom Post Type, Meta boxes
- `style.css` - Theme header and basic styles (should already exist)
- `header.php` - Site header template
- `footer.php` - Site footer template  
- `front-page.php` - Homepage template
- `page-broadband-plans.php` - Plans listing page template

### Assets:
- `assets/css/custom.css` - Professional styling for the entire site
- `assets/js/filter-sort.js` - JavaScript for filtering and sorting functionality

---

## 🚀 INSTALLATION INSTRUCTIONS

### Step 1: Locate Your Theme Folder

**Using Local by Flywheel:**
1. Open Local app
2. Right-click your site name (supabroadband)
3. Click "Reveal in Finder" (Mac) or "Show Folder" (Windows)
4. Navigate to: `app` → `public` → `wp-content` → `themes` → `supabroadband-theme`

**Direct Path:**
- Windows: `C:\Users\YourName\Local Sites\supabroadband\app\public\wp-content\themes\supabroadband-theme`
- Mac: `~/Local Sites/supabroadband/app/public/wp-content/themes/supabroadband-theme`

### Step 2: Create Folder Structure

Inside the `supabroadband-theme` folder, create this structure:

```
supabroadband-theme/
├── assets/
│   ├── css/
│   └── js/
```

### Step 3: Upload/Replace Files

1. **Replace** `functions.php` with the new version I provided
2. **Add** all new template files (header.php, footer.php, etc.)
3. **Add** `custom.css` to `assets/css/` folder
4. **Add** `filter-sort.js` to `assets/js/` folder

### Step 4: Create Required Pages in WordPress

1. Go to WordPress Dashboard → **Pages** → **Add New**

2. **Create Homepage:**
   - Title: `Home`
   - Content: Leave blank (template handles it)
   - Click **Publish**

3. **Create Plans Page:**
   - Title: `Broadband Plans`
   - On the right sidebar, find **Page Attributes**
   - Under **Template**, select: `Broadband Plans`
   - Click **Publish**

4. **Create Enquiry Page:**
   - Title: `Enquiry`
   - Content: Add your Contact Form 7 shortcode here (we'll set this up next)
   - Click **Publish**

### Step 5: Set Homepage

1. Go to **Settings** → **Reading**
2. Under "Your homepage displays", select: **A static page**
3. Homepage: Select **Home**
4. Click **Save Changes**

---

## 📝 CREATING SAMPLE BROADBAND PLANS

### Step 1: Add Your First Plan

1. In WordPress Dashboard, look for **Broadband Plans** in the left sidebar (it should have a network icon)
2. Click **Add New**

3. **Fill in the plan details:**
   - **Title:** "Fibre Essential"
   - **Provider Name:** "BT"
   - **Speed (Mbps):** 67
   - **Monthly Price (£):** 24.99
   - **Contract Length:** 24 months
   - **Setup Fee (£):** 9.99

4. (Optional) Add a provider logo:
   - Click **Set featured image**
   - Upload a BT logo image
   - Set as featured image

5. Click **Publish**

### Step 2: Add More Plans

Create at least 4-5 more plans for a good demonstration. Here are some examples:

**Plan 2: Sky Superfast**
- Provider: Sky
- Speed: 145 Mbps
- Price: £28.00
- Contract: 18 months
- Setup: £0.00

**Plan 3: Virgin Media M250**
- Provider: Virgin Media
- Speed: 264 Mbps
- Price: £30.00
- Contract: 18 months
- Setup: £35.00

**Plan 4: TalkTalk Fibre 65**
- Provider: TalkTalk
- Speed: 67 Mbps
- Price: £23.50
- Contract: 24 months
- Setup: £5.00

**Plan 5: Vodafone Gigafast**
- Provider: Vodafone
- Speed: 910 Mbps
- Price: £48.00
- Contract: 24 months
- Setup: £0.00

---

## 🎨 CUSTOMIZATION

### Changing Colors

Edit `assets/css/custom.css` and modify the CSS variables at the top:

```css
:root {
    --primary-color: #0066cc;     /* Change main blue color */
    --primary-hover: #0052a3;     /* Hover state */
    --secondary-color: #28a745;   /* Green accent */
}
```

### Adding Your Logo

1. Go to **Appearance** → **Customize**
2. Click **Site Identity**
3. Click **Select Logo**
4. Upload your logo image
5. Click **Publish**

---

## ✅ VERIFICATION CHECKLIST

After installation, verify everything works:

- [ ] Homepage loads with hero section and features
- [ ] Broadband Plans page displays all your plans
- [ ] Filtering by speed works
- [ ] Filtering by contract length works
- [ ] Sorting by price works (low to high, high to low)
- [ ] Sorting by speed works
- [ ] "Reset All" button clears all filters
- [ ] "Select Plan" buttons work
- [ ] Site is mobile-responsive
- [ ] No console errors (press F12 in browser)

---

## 🐛 TROUBLESHOOTING

### Plans don't appear on the page
- Make sure you published the plans (not just saved as draft)
- Ensure the page is using the "Broadband Plans" template

### Filtering doesn't work
- Check that `filter-sort.js` is in the correct location
- Open browser console (F12) and check for JavaScript errors
- Make sure jQuery is loaded (WordPress includes it by default)

### Styles look broken
- Verify `custom.css` is in `assets/css/` folder
- Check file permissions (should be readable)
- Clear browser cache (Ctrl+Shift+R or Cmd+Shift+R)

### "Template not found" error
- Make sure all PHP files are directly in `supabroadband-theme` folder
- File names must be exact (case-sensitive)

---

## 📧 NEXT STEPS

After completing this phase, we'll set up:

1. **Contact Form 7** for the enquiry form
2. **Sample data** to populate your site
3. **Final polish** and testing

---

## 📱 FEATURES INCLUDED

✅ Professional, clean design
✅ Mobile-responsive layout
✅ Custom Post Type for broadband plans
✅ Easy admin interface for managing plans
✅ Filter by speed and contract length
✅ Sort by price and speed
✅ Smooth animations
✅ SEO-friendly structure
✅ Security best practices (nonces, sanitization)
✅ WordPress coding standards compliant

---

**Need help?** Let me know which step you're on and I'll guide you through it!
