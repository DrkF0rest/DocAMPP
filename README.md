# DocAMPP

**D**ocker, **A**pache, **M**ySQL, **P**HP - all in one container.

[![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)](https://github.com/DrkF0rest/docampp)
[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4.svg)](https://php.net)
[![Apache](https://img.shields.io/badge/Apache-2.4-D22128.svg)](https://httpd.apache.org)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-00758F.svg)](https://mysql.com)
[![Docker](https://img.shields.io/badge/Docker-20.10-2496ED.svg)](https://docker.com)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

---

## 📖 Table of Contents

- [What is DocAMPP?](#what-is-docampp)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Quick Start](#quick-start)
- [Access Your Application](#access-your-application)
- [Configuration](#configuration)
- [Useful Commands](#useful-commands)
- [Directory Structure](#directory-structure)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [License](#license)
- [Links](#links)

---

## What is DocAMPP?

**DocAMPP** is a lightweight, portable, and consistent local development environment that bundles **Docker**, **Apache**, **MySQL**, and **PHP** into a single containerized stack. It eliminates the classic "works on my machine" problem by providing an identical environment across all development machines.

Inspired by XAMPP, DocAMPP brings the same ease of use but with the power of Docker containers making it perfect for modern web development workflows.

> 🔗 **Official Website:** [docampp.drkforest.site](https://docampp.drkforest.site)

### Why DocAMPP?

| Problem | DocAMPP Solution |
|---------|------------------|
| "Works on my machine" | ✅ Identical environment everywhere |
| Manual PHP/MySQL installation | ✅ One command, everything runs |
| Conflicting dependencies | ✅ Isolated containers |
| Complex setup process | ✅ Simple docker-compose |
| Environment pollution | ✅ Clean, isolated containers |

---

## ✨ Features

- 🐳 **Docker-powered** - Run everything with a single command
- 🔄 **Consistent Environment** - Same setup on Linux, Windows, and macOS
- 📦 **Lightweight** - Minimal footprint, maximum performance
- 🗄️ **MySQL** - MariaDB database with phpMyAdmin
- ⚡  **PHP** - Latest PHP with essential extensions
- 🌐 **Apache** - Battle-tested web server
- 🎨 **Dark/Light Mode** - Built-in theme toggle
- 🔧 **Customizable** - Easy to modify PHP settings
- 📝 **Automatic Logging** - Access and error logs
- 🔒 **Secure** - Best practices out of the box
- 🚀 **Production Ready** - Easy to deploy

---

## 📋 Requirements

Before you begin, ensure you have the following installed:

| Tool | Minimum Version | Check Installation |
|------|----------------|-------------------|
| **Docker** | 20.10+ | `docker --version` |
| **Docker Compose** | 2.0+ | `docker-compose --version` |
| **Git** | 2.0+ (optional) | `git --version` |
| **Web Browser** | Modern | Chrome, Firefox, Edge |

### Verify Docker Installation

```bash
# Check Docker
docker --version
# Example output: Docker version 24.0.7

# Check Docker Compose
docker-compose --version
# Example output: Docker Compose version v2.23.0
```

---

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/DrkF0rest/docampp.git
cd docampp
```

Or download the ZIP from [GitHub](https://github.com/DrkF0rest/docampp/archive/refs/heads/main.zip).

### 2. Start the Containers

```bash
docker-compose up -d
```

This will:
- ✅ Pull the required Docker images
- ✅ Create and start all containers
- ✅ Set up the network
- ✅ Mount volumes for data persistence

### 3. Verify Installation

```bash
# Check if all containers are running
docker-compose ps

# You should see:
# docampp_web          Up
# docampp_db           Up
# docampp_phpmyadmin   Up
```

---

## 🔥 Quick Start

### One-Command Setup

```bash
docker-compose up -d
```

### First-Time Access

1. Open your browser
2. Visit: [http://localhost:8080](http://localhost:8080)
3. You'll see the DocAMPP welcome page
4. Access phpMyAdmin: [http://localhost:8081](http://localhost:8081)
5. Login with: `root` / `root`

### Create Your First Project

```bash
# Create a new PHP project
mkdir -p htdocs/myproject

# Create an index.php file
echo "<?php echo 'Hello, DocAMPP!'; ?>" > htdocs/myproject/index.php

# Access it at: http://localhost:8080/myproject/
```

---

## 🌐 Access Your Application

| Service | URL | Default Credentials |
|---------|-----|---------------------|
| **Website** | [http://localhost:8080](http://localhost:8080) | - |
| **phpMyAdmin** | [http://localhost:8081](http://localhost:8081) | `root` / `root` |
| **MySQL Database** | `localhost:3306` | `root` / `root` |

---

## ⚙️ Configuration

### PHP Settings

Modify `php-ini/custom.ini` to customize PHP:

```ini
; Memory limit
memory_limit = 256M

; Upload size
upload_max_filesize = 100M
post_max_size = 100M

; Timezone
date.timezone = Asia/Jakarta

; Error reporting (development)
error_reporting = E_ALL
display_errors = On
```

### Docker Configuration

Edit `docker-compose.yaml` to change ports or settings:

```yaml
services:
  web:
    ports:
      - "8080:80"        # Change first port (e.g., 9090:80)
  
  db:
    environment:
      MYSQL_ROOT_PASSWORD: root  # Change password
```

### Environment Variables

| Variable | Description | Default |
|----------|-------------|---------|
| `PHP_MEMORY_LIMIT` | PHP memory limit | `256M` |
| `PHP_UPLOAD_MAX_FILESIZE` | Max upload size | `100M` |
| `PHP_POST_MAX_SIZE` | Max POST size | `100M` |
| `PHP_MAX_EXECUTION_TIME` | Max execution time | `300` |
| `MYSQL_ROOT_PASSWORD` | MySQL root password | `root` |
| `MYSQL_DATABASE` | Default database | `docampp_db` |
| `MYSQL_USER` | Database user | `docampp_user` |
| `MYSQL_PASSWORD` | Database password | `docampp_pass` |

---

## 🛠️ Useful Commands

### Container Management

```bash
# Start containers
docker-compose up -d

# Stop containers
docker-compose down

# Restart containers
docker-compose restart

# View running containers
docker-compose ps

# View logs
docker-compose logs -f

# View logs for specific service
docker-compose logs -f web
docker-compose logs -f db
docker-compose logs -f phpmyadmin
```

### Access Containers

```bash
# Access web container
docker exec -it docampp_web bash

# Access database container
docker exec -it docampp_db bash

# Access MySQL directly
docker exec -it docampp_db mysql -uroot -p
```

### Maintenance

```bash
# Rebuild containers
docker-compose down
docker-compose build --no-cache
docker-compose up -d

# Clean up (remove containers, networks, volumes)
docker-compose down -v

# Update images
docker-compose pull
docker-compose up -d
```

### Database Operations

```bash
# Backup database
docker exec docampp_db mysqldump -uroot -proot docampp_db > backup.sql

# Restore database
cat backup.sql | docker exec -i docampp_db mysql -uroot -proot docampp_db

# Connect to MySQL
mysql -h localhost -P 3306 -u root -p
```

---

## 📁 Directory Structure

```
docampp/
├── docker-compose.yaml    # Main Docker configuration
├── README.md              # This file
├── LICENSE                # MIT License
│
├── htdocs/                # Your PHP files (web root)
│   └── index.php          # Welcome page
│
├── php-ini/               # PHP configuration overrides
│   └── custom.ini         # Custom PHP settings
│
├── apache-config/         # Apache virtual hosts
│   └── 000-default.conf   # Default virtual host
│
├── db-data/               # MySQL data (persistent)
│   └── (auto-generated)
│
├── db-init/               # MySQL initialization scripts
│   └── init.sql           # Run on first start
│
└── logs/                  # Application logs
    └── apache/            # Apache access & error logs
        ├── access.log
        └── error.log
```

---

## 🔧 Troubleshooting

### Common Issues & Solutions

#### ⚠️ Port Already in Use

**Error:** `Bind for 0.0.0.0:8080 failed: port is already allocated`

**Solution:** Change the port in `docker-compose.yaml`:
```yaml
web:
  ports:
    - "9090:80"  # Change 8080 to another port
```

#### ❌ Database Connection Error

**Error:** `Could not connect to database`

**Solution:**
1. Wait for MySQL to fully start (10-15 seconds)
2. Check logs: `docker-compose logs db`
3. Restart database: `docker-compose restart db`

#### 💡 Permission Denied

**Error:** `Permission denied` when accessing files

**Solution:**
```bash
# Linux/macOS
sudo chown -R $USER:$USER ./htdocs
sudo chmod -R 755 ./htdocs

# Or use Docker permissions
docker exec docampp_web chown -R www-data:www-data /var/www/html
```

#### ✅ Container Not Starting

**Solution:** Rebuild and restart:
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

#### 🐳 Docker Not Running

**Solution:** Start Docker:
- **Windows:** Start Docker Desktop
- **macOS:** Start Docker Desktop
- **Linux:** `sudo systemctl start docker`

### Still Having Issues?

1. Check logs: `docker-compose logs -f`
2. Visit the [GitHub Issues](https://github.com/DrkF0rest/docampp/issues)
3. Contact the maintainer

---

### Development Guidelines

- Follow the existing code style
- Write clear, descriptive commit messages
- Update the documentation
- Test your changes
- Be responsive to feedback

### Report Issues

- Use the [GitHub Issues](https://github.com/DrkF0rest/docampp/issues) tracker
- Provide clear steps to reproduce
- Include your environment details
- Add logs if possible

---

## 🔗 Links

| Link | Description |
|------|-------------|
| 🌐 **Website** | [docampp.drkforest.site](https://docampp.drkforest.site) |
| 📦 **GitHub** | [github.com/DrkF0rest/docampp](https://github.com/DrkF0rest/docampp) |
| 🐛 **Issues** | [github.com/DrkF0rest/docampp/issues](https://github.com/DrkF0rest/docampp/issues) |
| 👨‍💻 **Author** | [github.com/DrkF0rest](https://github.com/DrkF0rest) |

### Related Projects

- [Docker](https://docker.com) - Containerization platform
- [Apache](https://httpd.apache.org) - Web server
- [MySQL](https://mysql.com) - Database server
- [PHP](https://php.net) - Scripting language
- [phpMyAdmin](https://phpmyadmin.net) - Database management

---

## 📊 Tech Stack

| Component | Version | Badge |
|-----------|---------|-------|
| **Docker** | 20.10+ | ![Docker](https://img.shields.io/badge/Docker-20.10-2496ED.svg) |
| **Apache** | 2.4+ | ![Apache](https://img.shields.io/badge/Apache-2.4-D22128.svg) |
| **MySQL** | 8.0+ | ![MySQL](https://img.shields.io/badge/MySQL-8.0-00758F.svg) |
| **PHP** | 8.2+ | ![PHP](https://img.shields.io/badge/PHP-8.2-777BB4.svg) |
| **phpMyAdmin** | Latest | ![phpMyAdmin](https://img.shields.io/badge/phpMyAdmin-latest-2496ED.svg) |

---

## ⭐ Support

If you find DocAMPP useful, please consider:
- ⭐ **Starring** the repository on GitHub
- 🐦 **Sharing** with your developer friends
- 📝 **Contributing** to the project

---

## 👨‍💻 Author

**DrkF0rest**
- GitHub: [@DrkF0rest](https://github.com/DrkF0rest)
- Website: [drkforest.site](https://www.drkforest.site)

---

## 📅 Changelog

### v1.0.1 (2026-10-24)
- 🐛 Fixed docker-compose configuration to use custom Dockerfile
- 📁 Added missing directories (apache-config, php-ini, logs, db-init, db-data)
- ⚙️ Created default php-ini/custom.ini with essential PHP settings
- 🔧 Optimized Dockerfile with apt cache cleanup
- 🔒 Restored HTTPS port 443 mapping
- 📦 Fixed volume mount configuration and removed conflicting named volumes
- 🗑️ Removed deprecated docker-compose version declaration

### v1.0.0 (2024)
- 🎉 Initial release
- 🐳 Docker, Apache, MySQL, PHP stack
- 🌗 Dark/Light theme support
- 🗄️ phpMyAdmin integration
- 📝 Comprehensive documentation
- 🔒 Security best practices

---

<p align="center">
  <sub>Built with ❤️ by <a href="https://github.com/DrkF0rest">DrkF0rest</a></sub>
</p>

<p align="center">
  <a href="https://docampp.drkforest.site">
    <img src="https://img.shields.io/badge/🌐-Visit_Website-2496ED?style=for-the-badge" alt="Visit Website">
  </a>
  <a href="https://github.com/DrkF0rest/docampp">
    <img src="https://img.shields.io/badge/📦-View_on_GitHub-181717?style=for-the-badge" alt="View on GitHub">
  </a>
</p>