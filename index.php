<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Code A11y Checker</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #5d5dff;
      --primary-hover-color: #4a4ac9;
      --background-color: #f0f4f8;
      --card-background: #ffffff;
      --text-color: #333333;
      --light-text-color: #6c757d;
      --border-color: #e2e8f0;
      --success-color: #28a745;
      --error-color: #dc3545;
    }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: var(--background-color);
      color: var(--text-color);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      box-sizing: border-box;
    }

    .container {
      width: 100%;
      max-width: 900px;
      margin: 40px 20px;
      padding: 30px;
      background: var(--card-background);
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      border: 1px solid var(--border-color);
    }

    header {
      text-align: center;
      margin-bottom: 40px;
      border-bottom: 2px solid var(--primary-color);
      padding-bottom: 20px;
    }

    h1 {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--primary-color);
      margin: 0;
    }

    p.subtitle {
      font-size: 1rem;
      color: var(--light-text-color);
      margin-top: 10px;
    }

    .form-section {
      margin-bottom: 30px;
    }

    .form-section p {
      font-size: 1rem;
      margin-bottom: 15px;
      color: var(--light-text-color);
    }

    form {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      align-items: center;
    }

    input[type="text"] {
      flex-grow: 1;
      padding: 12px 15px;
      font-size: 1rem;
      border: 2px solid var(--border-color);
      border-radius: 8px;
      transition: all 0.3s ease;
      background-color: #fafbfd;
      color: var(--text-color);
    }

    input[type="text"]:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 4px rgba(93, 93, 255, 0.2);
    }

    button {
      padding: 12px 25px;
      font-size: 1rem;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button[type="submit"] {
      background-color: var(--primary-color);
      color: white;
    }

    button[type="submit"]:hover {
      background-color: var(--primary-hover-color);
      transform: translateY(-2px);
    }

    button[type="reset"] {
      background-color: #e9ecef;
      color: var(--text-color);
    }

    button[type="reset"]:hover {
      background-color: #d1d8df;
      transform: translateY(-2px);
    }

    .results-container {
      margin-top: 30px;
    }

    .file-card {
      background-color: var(--background-color);
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 20px;
      border: 1px solid var(--border-color);
    }
    
    .file-card h3 {
      margin-top: 0;
      font-size: 1.25rem;
      color: var(--primary-color);
      display: flex;
      align-items: center;
      gap: 10px;
      border-bottom: 2px solid var(--border-color);
      padding-bottom: 10px;
    }

    .file-card h3::before {
      content: '📄';
      font-size: 1.2rem;
    }

    .status-message {
      display: flex;
      align-items: center;
      gap: 10px;
      font-weight: 600;
      padding: 10px;
      border-radius: 8px;
    }
    
    .status-message.success {
      color: var(--success-color);
      background-color: rgba(40, 167, 69, 0.1);
    }

    .status-message.error {
      color: var(--error-color);
      background-color: rgba(220, 53, 69, 0.1);
    }

    .status-message::before {
      font-size: 1.5rem;
    }

    .status-message.success::before {
      content: '✅';
    }
    
    .status-message.error::before {
      content: '❌';
    }

    pre {
      background: #fdfdfd;
      padding: 20px;
      border: 1px solid var(--border-color);
      border-radius: 10px;
      overflow-x: auto;
      max-height: 400px;
      white-space: pre-wrap;
      word-break: break-all;
      font-size: 0.9rem;
      line-height: 1.6;
    }

    .error-code {
      color: var(--error-color);
      font-weight: bold;
    }
    
    .no-files-message {
      text-align: center;
      color: var(--light-text-color);
      font-style: italic;
      margin-top: 20px;
    }

    @media (max-width: 768px) {
      form {
        flex-direction: column;
        align-items: stretch;
      }
      button {
        width: 100%;
      }
      .container {
        margin: 20px 10px;
        padding: 20px;
      }
      h1 {
        font-size: 2rem;
      }
    }
  </style>
  <script>
    function clearResults() {
      document.getElementById('results').innerHTML = '';
    }
  </script>
</head>
<body>

<div class="container">
  <header>
    <h1>Code A11y Checker</h1>
    <p class="subtitle">Enter a folder path to check for common accessibility issues in your Svelte, HTML, and PHP files.</p>
  </header>

  <div class="form-section">
    <p>Enter the full folder path containing `.svelte`, `.html`, `.tpl`, or `.php` files (server must have access):</p>
    <form method="POST" onreset="clearResults()">
      <input type="text" name="folderPath" placeholder="/var/www/html/my-app/src" required>
      <button type="submit">Check</button>
      <button type="reset">Clear</button>
    </form>
  </div>

  <div id="results" class="results-container">
    <?php
    function getSvelteFiles($dir) {
      // Check if the directory exists and is readable
      if (!is_dir($dir) || !is_readable($dir)) {
          return false;
      }
      $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
      $files = [];

      foreach ($rii as $file) {
        if ($file->isDir()) continue;
        // Check if the file is a .svelte, .html, .tpl, or .php file
        if (str_ends_with($file->getFilename(), '.svelte') || 
            str_ends_with($file->getFilename(), '.html') || 
            str_ends_with($file->getFilename(), '.tpl') || 
            str_ends_with($file->getFilename(), '.php')) {
          $files[] = $file->getPathname();
        }
      }
      return $files;
    }

    function checkA11yIssues($filepath) {
      $issues = [];
      $lines = file($filepath);
      if ($lines === false) {
          return ["Could not read file: " . basename($filepath)];
      }

      $previousHeadingLevel = 0;

      foreach ($lines as $index => $line) {
        $lineNumber = $index + 1;

        // Check for missing aria attributes and role on interactive elements
        if (preg_match('/<\s*(button|a|span)\b[^>]*>/i', $line)) {
            if (!preg_match('/aria-label|aria-labelledby|aria-describedby/i', $line) && !preg_match('/<a\b[^>]*href=/i', $line)) {
                $issues[] = "[Line $lineNumber] Consider adding an 'aria-label' or 'aria-labelledby' for screen reader context: " . trim($line);
            }
            if (!preg_match('/role=/i', $line)) {
                $issues[] = "[Line $lineNumber] Missing 'role' attribute: " . trim($line);
            }
            if (!preg_match('/tabindex=/i', $line)) {
                $issues[] = "[Line $lineNumber] Missing 'tabindex' attribute for keyboard focus: " . trim($line);
            }
        }

        // Check for use of non-semantic elements without roles
        if (preg_match('/<\s*(div|span)\b[^>]*>/i', $line)) {
            if (!preg_match('/role=/i', $line)) {
                $issues[] = "[Line $lineNumber] Non-semantic element ('div'/'span') missing a 'role': " . trim($line);
            }
        }

        // Check for missing alt attributes on <img> tags
        if (preg_match('/<img\b[^>]*>/i', $line)) {
            if (!preg_match('/alt=[\'"]([^\'"]*)[\'"]/i', $line)) {
                $issues[] = "[Line $lineNumber] Image missing an 'alt' attribute: " . trim($line);
            }
        }

        // Check for color contrast issues (simplified check)
        if (preg_match('/color:\s*(#\w{3,6}|rgb\(\d+,\s*\d+,\s*\d+\))|background-color:\s*(#\w{3,6}|rgb\(\d+,\s*\d+,\s*\d+\))/i', $line)) {
            $issues[] = "[Line $lineNumber] Potential color contrast issue. Please check manually: " . trim($line);
        }

        // Ensure headings are in hierarchical order
        if (preg_match('/<h(\d)\b[^>]*>/i', $line, $matches)) {
            $currentLevel = (int)$matches[1];
            if ($currentLevel > $previousHeadingLevel + 1 && $previousHeadingLevel > 0) {
                $issues[] = "[Line $lineNumber] Heading level 'h$currentLevel' should follow 'h" . ($currentLevel - 1) . "'. Skipping a level: " . trim($line);
            }
            $previousHeadingLevel = $currentLevel;
        }
      }
      return $issues;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['folderPath'])) {
        $folderPath = trim($_POST['folderPath']);
      
        if (!is_dir($folderPath) || !is_readable($folderPath)) {
          echo "<div class='file-card'><p class='status-message error'>Folder not found or not accessible: <code>$folderPath</code></p></div>";
        } else {
          $files = getSvelteFiles($folderPath);
      
          if (empty($files)) {
            echo "<p class='no-files-message'>No `.svelte`, `.html`, `.tpl`, or `.php` files found in the specified folder.</p>";
          } else {
            foreach ($files as $file) {
              // Get the full directory path of the file
              $dirPath = dirname($file);
              // Get the filename
              $fileName = basename($file);
              
              // Split the directory path into an array of folder names
              $pathParts = explode(DIRECTORY_SEPARATOR, $dirPath);
              
              // Get the last two elements of the array (the two parent folders)
              $parentFolders = array_slice($pathParts, -2);
              
              // Join the parent folder names with a separator
              $parentPath = implode(DIRECTORY_SEPARATOR, $parentFolders);
              
              // Construct the full path to display
              $displayPath = htmlspecialchars($parentPath . DIRECTORY_SEPARATOR . $fileName);
      
              echo "<div class='file-card'>";
              echo "<h3>" . $displayPath . "</h3>";
              $issues = checkA11yIssues($file);
              if (empty($issues)) {
                echo "<p class='status-message success'>No accessibility issues found. Well done! ✅</p>";
              } else {
                echo "<p class='status-message error'>Found " . count($issues) . " accessibility issues.</p>";
                echo "<pre class='error-code'>" . htmlspecialchars(implode("\n", $issues)) . "</pre>";
              }
              echo "</div>";
            }
          }
        }
      }
      ?>
</div>
</div>
</body>
</html>