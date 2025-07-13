# 🧪 Code A11y Checker — Accessibility Checker for HTML, PHP & Svelte

**Code A11y Checker** is a lightweight web-based tool built using HTML, CSS, and PHP to **analyze accessibility issues** in `.svelte`, `.html`, `.tpl`, and `.php` files. It checks for missing ARIA attributes, semantic structure, alt tags, color contrast hints, and heading hierarchy violations — helping developers build more accessible and inclusive web applications.

---

## 📸 Demo

<img width="1414" height="759" alt="image" src="https://github.com/user-attachments/assets/ee10aad5-87db-414b-8020-575d9f8be04b" />


Live Demo (if hosted): _Coming soon / Add your link here_

---

## 🚀 Features

- ✅ Detects missing `aria-label`, `role`, and `tabindex` on interactive elements
- 🖼️ Identifies images without `alt` attributes
- 🧩 Warns about non-semantic `div`/`span` missing accessibility roles
- 🔤 Checks heading hierarchy (e.g., H3 after H1)
- 🎨 Gives hints about possible color contrast issues
- 📁 Scans an entire folder recursively

---

## 🛠️ Built With

- **Frontend**: HTML5, CSS3 (Custom styles with responsive design)
- **Backend**: PHP
- **Logic**: Recursive directory traversal and regex-based content analysis

---

## ⚙️ How to Use

### 📌 Requirements
- A local web server with PHP (e.g., XAMPP, WAMP, MAMP, or PHP CLI)
- Files/folders to scan accessible from the server

### 🔧 Setup

1. Clone or download this repository.
2. Place the project in your PHP server's root directory (e.g., `htdocs/` in XAMPP).
3. Open the web browser and visit:

```
http://localhost/[your-folder-name]
```

4. Enter the full **server path** to the folder you want to scan (e.g., `/var/www/html/myapp/src`)
5. Click **Check** to view a list of accessibility issues.

---

## 📂 Supported File Types

- `.html`
- `.php`
- `.svelte`
- `.tpl`

---

## ✨ Future Enhancements (Suggestions)

- Export accessibility report as PDF or JSON
- GitHub repo/file input
- WCAG 2.2 compliance integration
- Real-time validation via textarea upload

---

## 🧑‍💻 Author

**Prashant Chaudhary**  
- 💼 [LinkedIn](https://linkedin.com/in/prashantchaudhary11)  
- 🧑‍💻 [GitHub](https://github.com/Prashant-Chaudhary-11)  
- 🌐 [Portfolio](https://prashantchaudhary.netlify.app)  
- 📧 prashantchaudhary1106@gmail.com

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).
