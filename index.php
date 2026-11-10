<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employee Management</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fa;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
            color: #1565c0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full {
            grid-column: 1 / 3;
        }

        label {
            font-weight: bold;
            margin-bottom: 7px;
        }

        input,
        select,
        textarea {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #1976d2;
            outline: none;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button,
        .view-button {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
        }

        .save {
            background: #1976d2;
            color: white;
        }

        .reset {
            background: #ddd;
        }

        .view-button {
            background: #43a047;
            color: white;
        }

        @media(max-width: 650px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: 1;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Employee Details</h1>

        <form action="save_employee.php" method="POST">

            <div class="form-grid">

                <div class="form-group">

                    <label>Employee ID *</label>

                    <input
                        type="text"
                        name="employee_id"
                        placeholder="EMP001"
                        required>

                </div>


                <div class="form-group">

                    <label>Employee Name *</label>

                    <input
                        type="text"
                        name="employee_name"
                        placeholder="Enter employee name"
                        required>

                </div>


                <div class="form-group">

                    <label>Date of Birth</label>

                    <input
                        type="date"
                        name="date_of_birth">

                </div>


                <div class="form-group">

                    <label>Gender</label>

                    <select name="gender">

                        <option value="">Select Gender</option>

                        <option value="Male">
                            Male
                        </option>

                        <option value="Female">
                            Female
                        </option>

                        <option value="Other">
                            Other
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>Email *</label>

                    <input
                        type="email"
                        name="email"
                        placeholder="employee@example.com"
                        required>

                </div>


                <div class="form-group">

                    <label>Phone</label>

                    <input
                        type="text"
                        name="phone"
                        placeholder="Phone number">

                </div>


                <div class="form-group">

                    <label>Department *</label>

                    <select name="department" required>

                        <option value="">
                            Select Department
                        </option>

                        <option value="HR">
                            HR
                        </option>

                        <option value="IT">
                            IT
                        </option>

                        <option value="Finance">
                            Finance
                        </option>

                        <option value="Sales">
                            Sales
                        </option>

                        <option value="Marketing">
                            Marketing
                        </option>

                        <option value="Operations">
                            Operations
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>Designation</label>

                    <input
                        type="text"
                        name="designation"
                        placeholder="Software Engineer">

                </div>


                <div class="form-group">

                    <label>Date of Joining *</label>

                    <input
                        type="date"
                        name="date_of_joining"
                        required>

                </div>


                <div class="form-group">

                    <label>Salary</label>

                    <input
                        type="number"
                        name="salary"
                        min="0"
                        step="0.01"
                        placeholder="50000">

                </div>


                <div class="form-group full">

                    <label>Address</label>

                    <textarea
                        name="address"
                        placeholder="Enter employee address"></textarea>

                </div>

            </div>


            <div class="buttons">

                <button
                    type="reset"
                    class="reset">

                    Reset

                </button>


                <button
                    type="submit"
                    class="save">

                    Save Employee

                </button>


                <a
                    href="employees.php"
                    class="view-button">

                    View Employees

                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>