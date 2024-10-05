# Smart Recruiting Platform

Welcome to the Smart Recruiting Platform! This application is built using **Laravel** and utilizes **MySQL** for database management. The platform is designed to streamline the recruitment process, providing a user-friendly interface and robust functionality across various modules.

## Overview

The Smart Recruiting Platform consists of **8 modules** that represent the core functionalities of the application. Each module has been developed according to the specifications outlined in the project document.

### Modules

1. **User Management**
   - Manage user profiles and roles within the platform.
   - Features user registration, login, and profile editing.

2. **Job Creation and Publishing**
   - Create, edit, and publish job listings.
   - Manage job categories, including employment type and location.

3. **Application Tracking System**
   - Track job applications in real-time.
   - Manage applicant statuses and communication.

4. **Interview Scheduling System**
   - Schedule, reschedule, and cancel interviews.
   - Send notifications and reminders to both candidates and interviewers.

5. **Real-time Dashboard for Recruitment Metrics**
   - Visualize recruitment data with interactive charts and graphs.
   - Access summary statistics and detailed views of recruitment activities.

6. **Customizable Application Forms**
   - Create tailored application forms for different job postings.
   - Include various fields and questions to gather relevant candidate information.

7. **Reports Generation Module**
   - Generate and export customizable reports based on recruitment data.
   - Analyze performance metrics and improve hiring strategies.

8. **Search and Filter Functionality**
   - Implement advanced search and filtering options for job seekers.
   - Allow users to find jobs based on specific criteria.

## Technologies Used

- **Backend Framework**: Laravel
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript (Bootstrap)

## Installation

To run the Smart Recruiting Platform locally, follow these steps:

1. Clone the repository:

   ```bash
   git clone https://github.com/geekyumar/hexaware-devops.git
   ```

2. Navigate to the project directory:

   ```bash
   cd smart-recruiting-platform
   ```

3. Install the dependencies:

   ```bash
   composer install
   ```

4. Set up your `.env` file:

   ```bash
   cp .env.example .env
   ```

   Update the `.env` file with your database credentials.

5. Run migrations to set up the database:

   ```bash
   php artisan migrate
   ```

6. Start the local server:

   ```bash
   php artisan serve
   ```

7. Access the application in your browser at `http://localhost:8000`.
