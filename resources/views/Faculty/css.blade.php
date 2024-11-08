<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header_section {
    position: fixed;
    top: -45px;
    width: 100%;
    z-index: 1000;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

        .header {
            background-color: #ffbd59;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #7ca9f0;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #9be8e4;
        }

        tr:nth-child(even) {
            background-color: #253439d2;
        }

        /* header start */

        .header .logo img {
            height: 70px;
        }

        .header ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        .header ul li {
            display: inline;
        }

        .header ul li a {
            color: black;
            text-decoration: none;
            padding: 10px;
            font-weight: bold;
        }

        .header ul li a:hover, 
        .header ul li a.active {
            color: red;

        }

          /* header end */

        /* sider start */
        
        .sidebar {
    width: 250px;
    background-color: #ffffff;
    color: #333;
    height: 100vh;
    position: fixed;
    top: 70px;
    left: 0;
    transition: width 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    z-index: 1;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    border-right: 1px solid #e0e0e0;
}

.sidebar h2 {
    text-align: center;
    padding: 20px;
    margin: 0;
    background-color: #ffbd59;
    color: #253439;
    font-size: 1.5em;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    text-align: center;
}

.sidebar ul li a {
    color: #333;
    text-decoration: none;
    display: block;
    padding: 15px;
    font-size: 1.1em;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, padding 0.3s ease-in-out;
    border-bottom: 1px solid #e0e0e0;
    border-radius: 5px;
    margin: 5px 10px;
}

.sidebar ul li a:hover {
    background-color: rgba(255, 189, 89, 0.6);
    color: #253439;
}

.sidebar ul li a.active {
    background-color: #253439;
    color: #ffbd59;
    border-radius: 5px;
}

.sidebar ul li a.active:hover {
    background-color: #253439;
    color: #fff;
}

.sidebar.collapsed {
    width: 80px;
}

.sidebar.collapsed ul li a {
    font-size: 0;
    padding: 15px 10px;
}

.sidebar.collapsed ul li a::before {
    font-size: 1.1em;
    margin-right: 0;
}

.sidebar.collapsed ul li a.active::before {
    color: #ffbd59;
}

/* Additional Transitions for Hover Effects */
.sidebar ul li a:hover {
    background-color: #ffbd59;
    color: #253439;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

.sidebar ul li a.active:hover {
    background-color: #253439;
    color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}


        /* sider end */

        /* body start */

        .main-content {
    margin-left: 250px;
    padding: 20px;
    padding-top: 100px;
    width: calc(100% - 250px);
    transition: margin-left 0.5s ease-in-out, width 0.5s ease-in-out;
}

.card {
    background-color: white;
    padding: 20px;
    margin-top:30px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.card h3 {
    margin-top: 0;
    font-size: 1.2em;
    color: #253439;
    transition: color 0.3s ease-in-out;
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

.statistics {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
}

.stat {
    background-color: #ffbd59;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    width: 22%;
    transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
    font-size: 0.9em;
    color: #253439;
}

.stat:hover {
    background-color: rgba(255, 189, 89, 0.8);
    transform: translateY(-2px);
}

.menu-toggle {
    display: none;
    position: absolute;
    top: 70px;
    left: 20px;
    background-color: #253439;
    color: #ffbd59;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    z-index: 3;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

.menu-toggle:hover {
    background-color: #ffbd59;
    color: #253439;
}


        /* body end */

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .menu-toggle {
                display: block;
            }
        }

        footer {
            background-color: #253439d2;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            z-index: 1;
        }

        
        #institute-details {
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
}

#institute-details h3 {
    margin-top: 0;
    font-size: 1.2em;
    color: #253439;
    transition: color 0.3s ease-in-out;
}

#details-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

#details-table th, #details-table td {
    border: 1px solid #e0e0e0;
    padding: 10px;
    text-align: left;
    transition: background-color 0.3s ease-in-out;
}

#details-table th {
    background-color: #ffbd59;
    color: #253439;
}

#details-table tbody tr:hover {
    background-color: rgba(255, 189, 89, 0.2);
}

.edit-btn, .delete-btn {
    padding: 8px 12px;
    margin: 2px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

.edit-btn {
    background-color: #4CAF50;
    color: white;
}

.edit-btn:hover {
    background-color: #45a049;
}

.delete-btn {
    background-color: #f44336;
    color: white;
}

.delete-btn:hover {
    background-color: #e53935;
}

/* meeting history starts  */


#history-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

#history-table th, #history-table td {
    border: 1px solid #ddd;
    padding: 8px;
}

#history-table th {
    background-color: #f2f2f2;
    text-align: left;
}

#history-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

#history-table tr:hover {
    background-color: #f1f1f1;
}  */

/* meeting history ends */

    </style>