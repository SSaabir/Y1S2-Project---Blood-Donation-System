CREATE TABLE
    donor (
        Donor_id INT AUTO_INCREMENT NOT NULL,
        Salutation VARCHAR(10) NOT NULL,
        F_name VARCHAR(50) NOT NULL,
        L_name VARCHAR(50) NOT NULL,
        NIC VARCHAR(20) UNIQUE NOT NULL,
        DOB VARCHAR(20) NOT NULL,
        Gender VARCHAR(20) NOT NULL,
        Phone_no INT (10) NOT NULL,
        Blood_Group VARCHAR(5) NOT NULL,
        Email VARCHAR(100) UNIQUE NOT NULL,
        Line1 VARCHAR(200) NOT NULL,
        City VARCHAR(100) NOT NULL,
        Postal_Code VARCHAR(15) NOT NULL,
        Country VARCHAR(30) NOT NULL,
        D_Password VARCHAR(20) NOT NULL,
        CONSTRAINT Doner_PK PRIMARY KEY (Donor_id)
    );

CREATE TABLE
    guest (
        Guest_id INT AUTO_INCREMENT NOT NULL,
        Salutation VARCHAR(10) NOT NULL,
        F_name VARCHAR(50) NOT NULL,
        L_name VARCHAR(50) NOT NULL,
        NIC VARCHAR(20) NOT NULL,
        DOB VARCHAR(20) NOT NULL,
        Gender VARCHAR(20) NOT NULL,
        Blood_Group VARCHAR(5) NOT NULL,
        Email VARCHAR(100) NOT NULL,
        CONSTRAINT Guest_PK PRIMARY KEY (Guest_id)
    );

CREATE TABLE
    admin (
        Admin_id INT AUTO_INCREMENT NOT NULL,
        Username VARCHAR(50) NOT NULL,
        NIC VARCHAR(20) UNIQUE NOT NULL,
        DOB VARCHAR(20) NOT NULL,
        Gender VARCHAR(20) NOT NULL,
        Phone_no INT (10) NOT NULL,
        Email VARCHAR(100) UNIQUE NOT NULL,
        Passkey VARCHAR(20) UNIQUE NOT NULL,
        A_Password VARCHAR(20) NOT NULL,
        CONSTRAINT Admin_PK PRIMARY KEY (Admin_id)
    );

CREATE TABLE
    hospital (
        Hospital_id INT AUTO_INCREMENT NOT NULL,
        H_Name VARCHAR(50) UNIQUE NOT NULL,
        Tel_no INT (10) NOT NULL,
        Email VARCHAR(100) UNIQUE NOT NULL,
        Line1 VARCHAR(200) NOT NULL,
        City VARCHAR(100) NOT NULL,
        Postal_Code VARCHAR(15) NOT NULL,
        Country VARCHAR(30) NOT NULL,
        H_Password VARCHAR(20) NOT NULL,
        Status BOOLEAN NULL,
        H_Admin_id INT NULL,
        CONSTRAINT Hospital_PK PRIMARY KEY (Hospital_id),
        CONSTRAINT H_Admin_id_FK1 FOREIGN KEY (H_Admin_id) REFERENCES Admin (Admin_id)
    );

CREATE TABLE
    appointment (
        Appointment_id INT AUTO_INCREMENT NOT NULL,
        A_Donor_id INT NULL,
        A_Guest_id INT NULL,
        A_Date VARCHAR(20) NOT NULL,
        A_Time VARCHAR(20) NOT NULL,
        A_Meridiem VARCHAR(2) NOT NULL,
        A_Hospital_id INT NOT NULL,
        Status BOOLEAN NULL,
        CONSTRAINT Appointment_PK PRIMARY KEY (Appointment_id),
        CONSTRAINT Appointment_A_Doner_id_FK1 FOREIGN KEY (A_Donor_id) REFERENCES Donor (Donor_id),
        CONSTRAINT Appointment_A_Guest_id_FK2 FOREIGN KEY (A_Guest_id) REFERENCES Guest (Guest_id),
        CONSTRAINT Appointment_A_Hospital_id_FK3 FOREIGN KEY (A_Hospital_id) REFERENCES Hospital (Hospital_id),
        CONSTRAINT Donor_or_Guest CHECK (
            (
                A_Donor_id IS NOT NULL
                AND A_Guest_id IS NULL
            )
            OR (
                A_Donor_id IS NULL
                AND A_Guest_id IS NOT NULL
            )
        )
    );

CREATE TABLE
    camp (
        Camp_id INT AUTO_INCREMENT NOT NULL,
        C_Name VARCHAR(50) NOT NULL,
        C_Date VARCHAR(20) NOT NULL,
        C_Time VARCHAR(20) NOT NULL,
        C_Meridiem VARCHAR(2) NOT NULL,
        Led_By VARCHAR(50) NOT NULL,
        Line1 VARCHAR(200) NOT NULL,
        City VARCHAR(100) NOT NULL,
        Postal_Code VARCHAR(15) NOT NULL,
        Country VARCHAR(30) NOT NULL,
        C_Hospital_id INT NOT NULL,
        CONSTRAINT Camp_PK PRIMARY KEY (Camp_id),
        CONSTRAINT Camp_C_Hospital_id_FK1 FOREIGN KEY (C_Hospital_id) REFERENCES Hospital (Hospital_id)
    );

CREATE TABLE
    feedback (
        Feedback_id INT AUTO_INCREMENT NOT NULL,
        F_Donor_id INT NULL,
        F_Hospital_id INT NULL,
        Comment VARCHAR(250) NOT NULL,
        Status BOOLEAN NULL,
        F_Admin_id INT NULL,
        CONSTRAINT Feedback_id PRIMARY KEY (Feedback_id),
        CONSTRAINT Feedback_F_Doner_id_FK1 FOREIGN KEY (F_Donor_id) REFERENCES Donor (Donor_id),
        CONSTRAINT Feedback_F_Hospital_id_FK2 FOREIGN KEY (F_Hospital_id) REFERENCES Hospital (Hospital_id),
        CONSTRAINT Feedback_F_Admin_id_FK3 FOREIGN KEY (F_Admin_id) REFERENCES Admin (Admin_id),
        CONSTRAINT Donor_or_Hospital CHECK (
            (
                F_Donor_id IS NOT NULL
                AND F_Hospital_id IS NULL
            )
            OR (
                F_Donor_id IS NULL
                AND F_Hospital_id IS NOT NULL
            )
        )
    );

CREATE TABLE
    emergency_blood (
        EB_id INT AUTO_INCREMENT NOT NULL,
        Blood_Group VARCHAR(5) NOT NULL,
        EB_Hospital_id INT NOT NULL,
        CONSTRAINT EB_id PRIMARY KEY (EB_id),
        CONSTRAINT Emergency_Blood_EB_Hospital_id_FK1 FOREIGN KEY (EB_Hospital_id) REFERENCES Hospital (Hospital_id)
    );

INSERT INTO
    Donor
VALUES
    (
        NULL,
        'Mr.',
        'Siraaj',
        'Saabir',
        '200335610336',
        '2003-12-21',
        'MALE',
        773710347,
        'O+',
        'siraajsaabir@gmail.com',
        '480, havelock road',
        'Colombo',
        '00600',
        'Sri lanka',
        'DuneBust1'
    );

INSERT INTO
    Donor
VALUES
    (
        NULL,
        'Ms.',
        'Sara',
        'Althaf',
        '205050505V',
        '1999-12-25',
        'FEMALE',
        7733333337,
        'AB+',
        'althafsara@gmail.com',
        '45, Mathew Road',
        'Colombo',
        '00300',
        'Sri lanka',
        'GlassBre@3'
    );

INSERT INTO
    Donor
VALUES
    (
        NULL,
        'Mr.',
        'Mujeeb',
        'Ahdheer',
        '200327713000',
        '2003-10-03',
        'MALE',
        752597153,
        'O+',
        'mohamedahdheer1@gmail.com',
        '159, Mancholai road',
        'Kinniya',
        '03',
        'Sri lanka',
        'Duneus@1'
    );

INSERT INTO
    Donor
VALUES
    (
        NULL,
        'Mr.',
        'Asokan',
        'Srisabeshan',
        '200218302931',
        '2002-07-01',
        'MALE',
        701882537,
        'O+',
        'srisabeshan271@gmail.com',
        'bogwantalawa',
        'nuwaraeliya',
        '22060',
        'Sri lanka',
        'DuneBust'
    );

INSERT INTO
    Donor
VALUES
    (
        NULL,
        'Mr.',
        'Mohamed',
        'Sahlaan',
        '200300502698',
        '2003-01-05',
        'MALE',
        772479597,
        'B+',
        'sahlaanmansoor@gmail.com',
        '23,Meera Mosque Road',
        'kattankudy',
        '118',
        'Sri lanka',
        'Dunest1'
    );

INSERT INTO
    Guest
VALUES
    (
        NULL,
        'Mr.',
        'John',
        'Smith',
        '305080808V',
        '1990-05-20',
        'MALE',
        'O-',
        'john.smith@example.com'
    );

INSERT INTO
    Guest
VALUES
    (
        NULL,
        'Mrs.',
        'Emily',
        'Johnson',
        '405070707V',
        '1985-12-15',
        'FEMALE',
        'A+',
        'emily.johnson@example.com'
    );

INSERT INTO
    Guest
VALUES
    (
        NULL,
        'Dr.',
        'Michael',
        'Brown',
        '505090909V',
        '1978-08-25',
        'MALE',
        'AB-',
        'michael.brown@example.com'
    );

INSERT INTO
    Guest
VALUES
    (
        NULL,
        'Ms.',
        'Jessica',
        'Davis',
        '605060606V',
        '1995-03-10',
        'FEMALE',
        'B-',
        'jessica.davis@example.com'
    );

INSERT INTO
    Guest
VALUES
    (
        NULL,
        'Mr.',
        'Daniel',
        'Martinez',
        '705040404V',
        '1982-11-30',
        'MALE',
        'A-',
        'daniel.martinez@example.com'
    );

INSERT INTO
    Admin
VALUES
    (
        NULL,
        'admin1',
        '123456789V',
        '1990/05/20',
        'MALE',
        1234567890,
        'admin1@example.com',
        'pass123',
        'hashed_password1'
    );

INSERT INTO
    Admin
VALUES
    (
        NULL,
        'admin2',
        '987654321V',
        '1985/12/15',
        'FEMALE',
        9876543210,
        'admin2@example.com',
        'pass456',
        'hashed_password2'
    );

INSERT INTO
    Admin
VALUES
    (
        NULL,
        'admin3',
        '456789123V',
        '1978/08/25',
        'MALE',
        9876543210,
        'admin3@example.com',
        'pass789',
        'hashed_password3'
    );

INSERT INTO
    Admin
VALUES
    (
        NULL,
        'admin4',
        '789123456V',
        '1995/03/10',
        'FEMALE',
        1234567890,
        'admin4@example.com',
        'passabc',
        'hashed_password4'
    );

INSERT INTO
    Admin
VALUES
    (
        NULL,
        'admin5',
        '654321987V',
        '1982/11/30',
        'MALE',
        9876543210,
        'admin5@example.com',
        'passxyz',
        'hashed_password5'
    );

INSERT INTO
    Hospital
VALUES
    (
        NULL,
        'National Hospital of Sri Lanka',
        94112345678,
        'info@nationalhospital.lk',
        'Regent Street',
        'Colombo',
        '00700',
        'SriLanka',
        'pass123',
        TRUE,
        1
    );

INSERT INTO
    Hospital
VALUES
    (
        NULL,
        'Teaching Hospital Kandy',
        94812345678,
        'info@teachinghospitalkandy.lk',
        'Peradeniya Road',
        'Kandy',
        '20000',
        'SriLanka',
        'kandy456',
        TRUE,
        1
    );

INSERT INTO
    Hospital
VALUES
    (
        NULL,
        'Nawaloka Hospital',
        94115555555,
        'info@nawalokahospital.lk',
        'No. 23, Deshamanya H.K. Dharmadasa Mawatha',
        'Colombo',
        '00200',
        'SriLanka',
        'nawaloka789',
        TRUE,
        1
    );

INSERT INTO
    Hospital
VALUES
    (
        NULL,
        'Durdans Hospital',
        94112222222,
        'info@durdanshospital.lk',
        '3 Alfred Place',
        'Colombo',
        '00300',
        'Sri Lanka',
        'durdans789',
        TRUE,
        1
    );

INSERT INTO
    Hospital
VALUES
    (
        NULL,
        'Asiri Surgical Hospital',
        94113333333,
        'info@asiri.lk',
        '21 Kirimandala Mawatha',
        'Colombo',
        '00500',
        'SriLanka',
        'asirisurgical321',
        TRUE,
        1
    );

INSERT INTO
    Appointment
VALUES
    (
        NULL,
        1,
        NULL,
        '2024/03/15',
        '10:00',
        'PM',
        1,
        NULL
    );

INSERT INTO
    Appointment
VALUES
    (
        NULL,
        NULL,
        1,
        '2024/03/20',
        '11:00',
        'PM',
        2,
        TRUE
    );

INSERT INTO
    Appointment
VALUES
    (
        NULL,
        2,
        NULL,
        '2024/03/25',
        '12:00',
        'PM',
        3,
        TRUE
    );

INSERT INTO
    Appointment
VALUES
    (
        NULL,
        NULL,
        2,
        '2024/03/30',
        '01:00',
        'PM',
        4,
        TRUE
    );

INSERT INTO
    Appointment
VALUES
    (
        NULL,
        3,
        NULL,
        '2024/04/05',
        '02:00',
        'PM',
        5,
        TRUE
    );

INSERT INTO
    Camp
VALUES
    (
        NULL,
        'BloodDonationCamp_Colombo',
        '2024/08/20',
        '10:00',
        'PM',
        'Dr.Jane Doe',
        '456 Charity Avenue',
        'Colombo',
        '12345',
        'SriLanka',
        1
    );

INSERT INTO
    Camp
VALUES
    (
        NULL,
        'BloodDonationCamp_Kandy',
        '2024/09/15',
        '11:30',
        'PM',
        'Dr.John Williams',
        '789 Hope Street',
        'Kandy',
        '54321',
        'SriLanka',
        2
    );

INSERT INTO
    Camp
VALUES
    (
        NULL,
        'BloodDonationCamp_Galle',
        '2024/10/10',
        '12:45',
        'PM',
        'Dr.Mary Smith',
        '101 Health Lane',
        'Galle',
        '67890',
        'SriLanka',
        3
    );

INSERT INTO
    Camp
VALUES
    (
        NULL,
        'BloodDonationCamp_Jaffna',
        '2024/11/05',
        '01:15',
        'PM',
        'Dr.Samantha Brown',
        '321 Lifeline Road',
        'Jaffna',
        '13579',
        'SriLanka',
        4
    );

INSERT INTO
    Camp
VALUES
    (
        NULL,
        'BloodDonationCamp_Matara',
        '2024/12/01',
        '02:30',
        'PM',
        'Dr.Alex Johnson',
        '567 Save Street',
        'Matara',
        '24680',
        'SriLanka',
        5
    );

INSERT INTO
    Feedback
VALUES
    (
        NULL,
        1,
        NULL,
        'The website was user-friendly and easy to navigate. Great job!',
        TRUE,
        1
    );

INSERT INTO
    Feedback
VALUES
    (
        NULL,
        2,
        NULL,
        'I found all the information I needed on the website. It was very helpful.',
        NULL,
        NULL
    );

INSERT INTO
    Feedback
VALUES
    (
        NULL,
        3,
        NULL,
        'The website design is modern and visually appealing. I enjoyed using it.',
        TRUE,
        2
    );

INSERT INTO
    Feedback
VALUES
    (
        NULL,
        4,
        NULL,
        'I had trouble finding the donation form on the website. Maybe it could be more prominent.',
        FALSE,
        1
    );

INSERT INTO
    Feedback
VALUES
    (
        NULL,
        5,
        NULL,
        'The website loading speed was slow at times, but otherwise, it was fine.',
        TRUE,
        3
    );

INSERT INTO
    Emergency_Blood
VALUES
    (NULL, 'A+', 1);

INSERT INTO
    Emergency_Blood
VALUES
    (NULL, 'O-', 2);

INSERT INTO
    Emergency_Blood
VALUES
    (NULL, 'B+', 3);

INSERT INTO
    Emergency_Blood
VALUES
    (NULL, 'AB-', 4);

INSERT INTO
    Emergency_Blood
VALUES
    (NULL, 'O+', 5);