# Data Storage Finder

## Overview

The Data Storage Finder is a tool developed by the Open Source Program Office at Syracuse University. It aims to help faculty and students find the most appropriate data storage option based on their specific needs using a simple survey method.

This tool is built on WordPress as the content management system, featuring a custom-written plugin that renders the user interface. This repository contains our custom plugin.

The inspiration for this tool was derived from the [CD-finder project](https://github.com/CU-CommunityApps/CD-finder) by Cornell University.

## Features

- User-friendly survey interface
- Customized WordPress plugin
- Tailored for Syracuse University's data storage options
- Open-source development

## Prerequisites

- A local development server (Apache, PHP, MySQL)
- Basic knowledge of WordPress
- Familiarity with PHP and web development concepts

## Setup Instructions

### 1. Install Local Development Server

WordPress requires Apache, PHP, and MySQL. Choose an open-source tool based on your operating system:

- For macOS: [MAMP](https://www.mamp.info/en/downloads/)
- For Windows: [XAMPP](https://www.apachefriends.org/download.html)
- For Ubuntu: Set up your own [LAMP stack](https://ubuntu.com/server/docs/get-started-with-lamp-applications)

#### Configuration:

a. Create a folder on your system to hold the WordPress site (e.g., `Users/username/Sites`)
b. Open MAMP application -> Preferences -> Server -> Choose Folder (Select the path to the Sites folder)

### 2. Download and Set Up WordPress

a. Download the latest WordPress version from [wordpress.org](https://wordpress.org/download/)
b. Extract the downloaded file and rename the folder to `data-storage-finder`
c. Move this folder inside the `Sites` folder created in step 1

### 3. Start the Server

a. Open the MAMP application and click the "Start Servers" button
b. In your web browser, navigate to `http://localhost:8888/data-storage-finder/`

If all steps are completed successfully, you should see the WordPress installation page.

### 4. Install and Activate the Custom Plugin

- Open the folder `data-storage-finder` in your local IDE. Example: Visual Studio Code
- Navigate to /wp-content/plugins
- Clone our custom plugin repo here 

```
git clone https://github.com/SyracuseUniversity/data-storage-finder.git
```

- Go to the WordPress admin dashboard → Plugins and find your custom plugin.
- Click Activate to enable the plugin.

## Development

Our plugin consists of three major folders

- css - Holds the finder-style.css
All custom styles including the media queries
- js - Folder holds all the custom javascript, on click, log scale and table filling options.
- templates - Has the php code for the components can are exported to create the shortcodes which can be used on the UI pages.
- data-storage-finder.php which is the Main Plugin File
    - Registers and enqueues necessary CSS and JavaScript files.
    - Defines multiple shortcodes ([modal], [questions_table], [copyright], etc.).
    - Loads external assets like Font Awesome and Syracuse University's CSS framework.
    - Handles activation and deactivation hooks for setup and cleanup.


## Support

Plugin developed and maintained by [Open Source Program Office](https://opensource.syracuse.edu/) at Syracuse University. Reach out for feedback and suggested improvements.

## Acknowledgements

- Cornell University's [CD-finder project](https://github.com/CU-CommunityApps/CD-finder)
- [WordPress](https://wordpress.org/) community

## References

- [Install WordPress on Mac](https://skillcrush.com/blog/install-wordpress-mac/)
- [WordPress Codex](https://codex.wordpress.org/)
- [Syracuse University](https://www.syracuse.edu/)
