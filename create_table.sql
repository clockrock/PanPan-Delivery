CREATE TABLE USERS(
    user_id INT not null Primary key AUTO_INCREMENT,
    user_firstname VARCHAR(20),
    user_lastname VARCHAR(20),
    username VARCHAR(20),
    password VARCHAR(20),
    email VARCHAR(20),
    user_phone VARCHAR(10),
    trn_date DATE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE parcels (
    parcel_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    parcel_name VARCHAR(20),
    parcel_desc VARCHAR(20),
    parcel_receiver VARCHAR(20),
    parcel_receiver_address VARCHAR(50),
    parcel_weight CHAR(10),
    parcel_size CHAR(10),
    parcel_coldhot CHAR(5),
    parcel_fragile CHAR(5),
    parcel_pickup_date_start DATE,
    parcel_pickup_date_end DATE,
    parcel_delivery_date_start DATE,
    parcel_delivery_date_end DATE,
    parcel_prio VARCHAR(10),
    parcel_price DOUBLE, 
    trn_date CHAR(20),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE parcels AUTO_INCREMENT = 1
/*$user_street = stripslashes($_REQUEST['user_street']);
		$user_street = mysqli_real_escape_string($con,$user_street);
		$user_housenumber = stripslashes($_REQUEST['user_housenumber']);
		$user_housenumber = mysqli_real_escape_string($con,$user_housenumber);
		$user_munic = stripslashes($_REQUEST['user_munic']);
		$user_munic = mysqli_real_escape_string($con,$user_munic);
		$user_city = stripslashes($_REQUEST['user_city']);
		$user_city = mysqli_real_escape_string($con,$user_city);*/