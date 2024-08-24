
# Courier Management System (CMA)

### Author: Rehanullah Khan

## Project Overview
The Courier Management System (CMA) is a web-based application designed to manage courier services efficiently. The system allows two types of users: Admin and Staff, each with specific access levels.

## Login Information
There are two types of logins available in the system:

### Admin Login
- **Email:** `admin@gmail.com`
- **Password:** `admin123`

### Staff Login
- **Email:** `staff@gmail.com`
- **Password:** `staff123`

> **Note:** Staff members have limited access to the system's features.

## Database
The database file can be found in the root directory of the project by the name `courier.sql`. You can import this file into your MySQL database to set up the required tables and data.

## Installation Instructions
1. Clone the repository to your local machine:
   ```bash
   git clone https://github.com/rehan-mmk/cms.git
   ```
2. Import the database:
   - Open your MySQL database.
   - Import the `courier.sql` file located in the root directory.

3. Configure your environment:
   - Set up the `.env` file with your database credentials.
   - Run the project using your preferred server environment (e.g., XAMPP, WAMP, or Laravel's built-in server).

4. Access the system:
   - Navigate to the login page: The URL http://127.0.0.1:8000/login is the correct local address for
    accessing the login page when running a Laravel application on the default development server.
   - Use the provided credentials to log in as Admin or Staff.

## Testing
Feel free to test the project and explore its features.

## Contributing
If you wish to contribute to the project, please submit a pull request or open an issue on GitHub.

## License
This project is licensed under the MIT License.

## Contact
For any questions or support, please contact Rehanullah Khan at [reh1hat@gmail.com].
