# Laravel Pincode Validation and Delivery Slot Selection

## Introduction
This project implements a feature for validating pincodes and allowing users to select delivery slots based on the validated pincode. The delivery options include predefined slots for **Today**, **Tomorrow**, or a custom-selected date, ensuring a seamless user experience. Selected delivery details are stored and processed via a cart system.

## Features
- **Pincode Validation**: Validate user-entered pincodes against a predefined list.
- **Dynamic Delivery Options**: Enable delivery options based on validated pincodes.
- **Slot Generation**: Generate time slots dynamically based on delivery date.
- **Custom Date Picker**: Allow users to choose a custom date for delivery.
- **Cart Integration**: Store delivery details and items in a cart.
- **Error Handling**: Ensure proper validation and feedback for users.

## Requirements
- PHP >= 8.0
- Composer
- MySQL or other supported database
- Node.js and npm

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/kavita993/Woofern_assignment.git
   cd Woofern_assignment
   ```

2. **Install Dependencies**
   - PHP dependencies:
     ```bash
     composer install
     ```
   

3. **Environment Setup**
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Configure the `.env` file with database credentials and other settings.

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed the Database** 
   ```bash
   php artisan db:seed
   ```



7. **Start the Development Server**
   ```bash
   php artisan serve
   ```
   The application will be available at `http://127.0.0.1:8000`.

## Usage

1. **Pincode Validation**
   - Enter a pincode in the designated input field.
   - The application validates the pincode and displays delivery options if valid.

2. **Delivery Slot Selection**
   - Choose a delivery type: **Today**, **Tomorrow**, or a custom date.
   - Select an available time slot for the chosen date.

3. **Add to Cart**
   - Add selected items along with delivery details to the cart.
   - Ensure all required fields are filled before submitting.

4. **Backend Processing**
   - Data is validated and processed by the backend for successful cart addition.

## Contributing
1. Fork the repository.
2. Create a feature branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add feature description"
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Open a Pull Request.

## License
This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact
For questions or suggestions, please reach out to kskavita993@gmail.com.
