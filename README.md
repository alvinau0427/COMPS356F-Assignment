# COMPS356F-Assignment
> **OUHK 2019/20 Software Engineering and Project Management (COMPS356F) Assignment**
>
> A dynamic, full-stack e-commerce auction system developed with **PHP** and **MySQL**, designed specifically for the sneaker collector market. This project focuses on software engineering principles, including database normalization, user session management, and real-time bidding logic.

[![PHP](https://img.shields.io/badge/php-%23777BB4.svg?&logo=php&logoColor=white)](#) &nbsp;
[![HTML](https://img.shields.io/badge/HTML-%23E34F26.svg?logo=html5&logoColor=white)](#) &nbsp;
[![CSS](https://img.shields.io/badge/CSS-639?logo=css&logoColor=fff)](#) &nbsp;
[![JavaScript](https://img.shields.io/badge/Javacript-F9AB00?logo=javascript&logoColor=white)](#) &nbsp;
[![SQLite](https://img.shields.io/badge/SQLite-%2307405e.svg?logo=sqlite&logoColor=white)](#) &nbsp;
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE) &nbsp;

## Project Overview
**SoleBid** provides a streamlined marketplace where users can participate in competitive bidding for limited edition footwear. The application ensures data integrity and a seamless user experience through a robust backend architecture.

### Key Features:
* **Live Auction System:** Real-time bidding interface with automated price increments.
* **Product Catalog:** Comprehensive shoe database with high-quality imagery and detailed specifications.
* **User Accounts:** Secure registration and login system to track bid history and successful purchases.
* **Administrator Portal:** Dedicated CMS to manage listings, monitor active bids, and handle user database.
* **Responsive Design:** Optimized for both desktop and mobile viewing.

## Installation & Setup
### Prerequisites
* **XAMPP** / WAMP / MAMP (PHP 7.0+ recommended)
* **MySQL Server**

### Local Deployment
1. **File Placement:** Copy all files from the `/src` directory to your server's root folder (e.g., `C:/xampp/htdocs/solebid/`).
2. **Database Setup:** - Access **phpMyAdmin** (typically at `http://localhost/phpmyadmin`).
   - Create a new database.
   - Import the SQL schema: `/src/localhost_version/356f.sql`.
3. **Execution:** Open your browser and navigate to `http://localhost/solebid/index.php`.

## Screenshots
![Image](https://github.com/alvinau0427/COMPS356F-Assignment/blob/master/doc/demo.png)

## Video Demonstration
For a complete walkthrough of the system functionalities and UI/UX flow, please watch our demonstration video:
[![SoleBid Demo Video](https://img.youtube.com/vi/qmmG7FFkSAA/hqdefault.jpg)](https://youtu.be/qmmG7FFkSAA)

## License
- COMPS356F-Assignment is released under the [MIT License](https://opensource.org/licenses/MIT).
```
Copyright (c) 2020 alvinau0427

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```
