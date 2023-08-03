<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Registered Patients</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                        <th>Reg No</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Consulting Dr</th>
                        <th>Scanning</th>
                        <th>Aadhar No</th>
                        <th>Entry Date</th>
                        <th>Entry Time</th>
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
                `;
                tableBody.appendChild(newRow);
            });
        }

        // Call the fetchData function to initialize the table
        fetchData();

        // ... (search and sort functions) ...

    </script>
</body>
</html>
