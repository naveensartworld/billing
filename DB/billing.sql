CREATE TABLE Customers ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, cus_code varchar(50), first_name varchar(100), last_name varchar(100), email varchar(100), password varchar(30), active int (1), phone varchar(30), city varchar(50), country varchar(50), create_date datetime, create_by varchar(50), last_modify_date datetime, last_modify_by varchar(50), deleted int (1)); 

CREATE TABLE CustomerProducts ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, cus_code varchar(50), prd_code varchar(50), sub_type varchar(100), price float, period varchar(30), start_date datetime, billing_date int, grace_period int, status varchar(30), demo_done int (1)); 

CREATE TABLE Invoices ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, inv_no varchar(50), inv_date datetime, cus_code varchar(50), currency varchar(10), amount float, discount float, tax float, net_amount float, amount_paid float, status varchar(30), create_date datetime, create_by varchar(50), last_modify_date datetime, last_modify_by varchar(50), cancelled int (1), deleted int (1)); 

CREATE TABLE InvoiceDetails ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, inv_no varchar(50), prd_code varchar(50), sub_type varchar(100), description varchar(200), price float, period varchar(30)); 

CREATE TABLE Payments ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, rect_no varchar(50), cus_code varchar(50), rect_date datetime, pay_mode varchar(30), amount float, create_date datetime, create_by varchar(50), last_modify_date datetime, last_modify_by varchar(50), deleted int (1)); 

CREATE TABLE PaymentDetails ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, rect_no varchar(50), inv_no varchar(50)); 

CREATE TABLE Products ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, prd_code varchar(50), prd_name varchar(100), start_date datetime, end_date datetime, active int (1), description varchar(200), prd_type varchar(50), subscription int (1), default_price float, default_period varchar(30), create_date datetime, create_by varchar(50), last_modify_date datetime, last_modify_by varchar(50), cancelled int (1), deleted int (1)); 

CREATE TABLE ProductDetails ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, prd_code varchar(50), sub_type varchar(100), price float, period varchar(30)); 

CREATE TABLE Hosting ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, host_code varchar(50), provider_name varchar(50), url varchar(100), details varchar(200), contract_number varchar(50), package_name varchar(50), database_count int, db_used int, db_available int, user varchar(30), password varchar(50), expiry datetime, create_date datetime, create_by varchar(50), last_modify_date datetime, last_modify_by varchar(50)); 

CREATE TABLE Inevtory ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, host_code varchar(50), prd_type varchar(50), sub_type varchar(50), status varchar(30), database_name varchar(30), dbo varchar(30), dbo_pass varchar(30), db_host varchar(50), cus_code varchar(50), create_date datetime, create_by varchar(50), last_modify_date datetime, last_modify_by varchar(50), deleted int (1)); 

CREATE TABLE Sequence ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, doc_type varchar(50), format varchar(100), next_num int, increaments int); 

CREATE TABLE admin_users ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, admin_user varchar(50), admin_first_name varchar(50), admin_last_name varchar(50), admin_email varchar(50), admin_pass varchar(50), status varchar(30), create_date datetime, create_by varchar(50), last_modify_date datetime, last_modify_by varchar(50)); 

CREATE TABLE Periods ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, period_name varchar(30), description varchar(200), days int, active int (1)); 

CREATE TABLE Currencies ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, currency_name varchar(50), currency_code varchar(10), country varchar(100), active int (1)); 

CREATE TABLE Countries ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, country_code varchar(10), country_name varchar(100), active int (1)); 

CREATE TABLE ProductTypes ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, Prd_type varchar(50), description varchar(200), active int (1)); 

CREATE TABLE PayModes ( id INT(6)  AUTO_INCREMENT PRIMARY KEY, PayMode varchar(30), Active int (1)); 

