<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Registered Patients</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Additional CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        #searchInput {
            flex: 1;
            height: 45px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-right: 10px;
        }

        .table {
            margin-bottom: 0;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table th {
            cursor: pointer;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .table th.sorted-asc::after {
            content: " ▲";
        }

        .table th.sorted-desc::after {
            content: " ▼";
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
        }

        .action-button {
            display: flex;
            align-items: center;
            padding: 5px;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .action-button.update {
            background-color: #007bff;
        }

        .action-button.report {
            background-color: #28a745;
        }

        .action-button.bill {
            background-color: #ffc107;
        }

        .action-button.print {
            background-color: #17a2b8;
        }

        .action-button i {
            margin-right: 5px;
        }

        @media screen and (max-width: 576px) {
            .container {
                padding: 10px;
            }

            #searchInput {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Table to display data -->
    <div class="container">
        <h2>Today's Registered Patients</h2>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search by Name or Reg No">
            <button class="btn btn-secondary" onclick="sortData()">Sort</button>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th onclick="sortData(0)">Reg No</th>
                        <th onclick="sortData(1)">Name</th>
                        <th onclick="sortData(2)">Gender</th>
                        <th onclick="sortData(3)">Age</th>
                        <th onclick="sortData(4)">Phone</th>
                        <th onclick="sortData(5)">Email</th>
                        <th onclick="sortData(6)">Address</th>
                        <th onclick="sortData(7)">Consulting Dr</th>
                        <th onclick="sortData(8)">Scanning</th>
                        <th onclick="sortData(9)">Aadhar No</th>
                        <th onclick="sortData(10)">Entry Date</th>
                        <th onclick="sortData(11)">Entry Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- The data will be dynamically added here -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Function to fetch data from the API endpoint
        function fetchData() {
            fetch("fetch_data.php")
                .then((response) => response.json())
                .then((data) => populateTable(data))
                .catch((error) => console.error("Error fetching data:", error));
        }

        // Function to populate the table with data
        function populateTable(patientsData) {
            const tableBody = document.getElementById("tableBody");
            tableBody.innerHTML = "";

            patientsData.forEach((patient) => {
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td>${patient.regNo}</td>
                    <td>${patient.name}</td>
                    <td>${patient.gender}</td>
                    <td>${patient.age}</td>
                    <td>${patient.phone}</td>
                    <td>${patient.email || "N/A"}</td>
                    <td>${patient.address}</td>
                    <td>${patient.consulting_dr}</td>
                    <td>${patient.scanning}</td>
                    <td>${patient.aadhar_no}</td>
                    <td>${patient.entry_date}</td>
                    <td>${patient.entry_time}</td>
                    <td class="action-buttons">
                        <div class="action-button update" onclick="handleAction('update', ${patient.regNo})">
                            <i class="fas fa-edit"></i> Update
                        </div>
                        <div class="action-button report" onclick="handleAction('report', ${patient.regNo}, '${patient.scanning}')">
                            <i class="fas fa-file-alt"></i> Report
                        </div>
                        <div class="action-button bill" onclick="handleAction('bill', ${patient.regNo})">
                            <i class="fas fa-file-invoice-dollar"></i> Bill
                        </div>
                        <div class="action-button print" onclick="handleAction('print', ${patient.regNo})">
                            <i class="fas fa-print"></i> Print
                        </div>
                    </td>
                `;
                tableBody.appendChild(newRow);
            });
        }

        // Function to handle action buttons
        function handleAction(action, regNo, scanning) {
            // Replace this with the actual functionality for each action
            switch (action) {
                case "update":
                    console.log(`Update action for Reg No ${regNo}`);
                    break;
                case "report":
                    console.log(`Report action for Reg No ${regNo}, Scanning: ${scanning}`);
                    break;
                case "bill":
                    console.log(`Bill action for Reg No ${regNo}`);
                    break;
                case "print":
                    console.log(`Print action for Reg No ${regNo}`);
                    break;
                default:
                    console.log(`Unknown action: ${action}`);
                    break;
            }
        }

        // Function to sort the table by column index
        function sortData(columnIndex) {
            // ... (existing sortData() function) ...
        }

        // Attach the fetchData function to initialize the table
        fetchData();

    </script>
</body>
</html>
