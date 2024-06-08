-- Active: 1714706041615@@127.0.0.1@3306@pixelplaza
CREATE TABLE IF NOT EXISTS `Products` (
    `ProductID` INT PRIMARY KEY AUTO_INCREMENT, -- Product ID
    `Name` VARCHAR(255) NOT NULL, -- Product Name
    `Description` TEXT, -- Product Description
    `Price` DECIMAL(10, 2) NOT NULL, -- Product Price
    `SalePrice` DECIMAL(10, 2) DEFAULT 0, -- Sale Price
    `Quantity` INT NOT NULL, -- Product Quantity
    `ImageURL` TEXT, -- Product Image URL
    `CategoryID` INT, -- Category ID
    `BrandID` INT, -- Brand 
    `ProductStatusID` INT, -- Product Status 

    INDEX (`CategoryID`),
    INDEX (`BrandID`),
    INDEX (`ProductStatusID`)
);

CREATE TABLE IF NOT EXISTS `ProductStatuses` (
    `ProductStatusID` INT PRIMARY KEY AUTO_INCREMENT, -- Product Status ID
    `StatusName` VARCHAR(50) NOT NULL -- Status Name e.g. available, out of stock
);

CREATE TABLE IF NOT EXISTS `Categories` (
    `CategoryID` INT PRIMARY KEY AUTO_INCREMENT, -- Category ID
    `Name` VARCHAR(100) NOT NULL, -- Category Name
    `Description` TEXT -- Category Description
);

CREATE TABLE IF NOT EXISTS `Brands` (
    `BrandID` INT PRIMARY KEY AUTO_INCREMENT, -- Brand ID
    `Name` VARCHAR(100) NOT NULL, -- Brand Name
    `Description` TEXT -- Brand Description
);

CREATE TABLE IF NOT EXISTS `Orders` (
    `OrderID` INT PRIMARY KEY AUTO_INCREMENT, -- Order ID
    `UserID` INT, -- User ID
    `TotalAmount` DECIMAL(10, 2) NOT NULL, -- Total Amount
    `Status` VARCHAR(50), -- Order Status
    `CreatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Created At
    `UpdatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Updated At

    INDEX (`UserID`)
);

CREATE TABLE IF NOT EXISTS `OrderItems` (
    `OrderItemID` INT PRIMARY KEY AUTO_INCREMENT, -- Order Item ID
    `OrderID` INT, -- Order ID
    `ProductID` INT, -- Product ID
    `Quantity` INT NOT NULL, -- Quantity
    `Price` DECIMAL(10, 2) NOT NULL, -- Price

    INDEX (`OrderID`),
    INDEX (`ProductID`)
);

CREATE TABLE IF NOT EXISTS `Reviews` (
    `ReviewID` INT PRIMARY KEY AUTO_INCREMENT, -- Review ID
    `ProductID` INT, -- Product ID
    `UserID` INT, -- User ID
    `Rating` INT NOT NULL, -- Rating
    `Comment` TEXT, -- Comment
    `CreatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Created At

    INDEX (`ProductID`),
    INDEX (`UserID`)
);

CREATE TABLE IF NOT EXISTS `Users` (
    `UserID` INT PRIMARY KEY AUTO_INCREMENT, -- User ID
    `Username` VARCHAR(100) NOT NULL UNIQUE, -- Username
    `Password` VARCHAR(255) NOT NULL, -- Password | hashed
    `Email` VARCHAR(255) NOT NULL UNIQUE, -- Email
    `FirstName` VARCHAR(100), -- First Name
    `LastName` VARCHAR(100), -- Last Name
    `AddressID` TEXT, -- Address
    `Phone` VARCHAR(20), -- Phone
    `UserTypeID` INT, -- User Type ID
    `attempts` INT NOT NULL DEFAULT 0, -- Login Attempts
    `UserStatusID` INT, -- Status ID

    INDEX (`AddressID`),
    INDEX (`UserTypeID`),
    INDEX (`UserStatusID`)
);

CREATE TABLE IF NOT EXISTS `Addresses` (
    `AddressID` INT PRIMARY KEY AUTO_INCREMENT, -- Address ID
    `Address` TEXT, -- Address
    `City` VARCHAR(100), -- City
    `State` VARCHAR(100), -- State
    `Country` VARCHAR(100), -- Country
    `ZipCode` VARCHAR(20) -- Zip Code
);

CREATE TABLE IF NOT EXISTS `UserStatus` (
    `UserStatusID` INT PRIMARY KEY AUTO_INCREMENT, -- Status ID
    `StatusName` VARCHAR(50) NOT NULL -- Status Name e.g. verified, pending, blocked
);

CREATE TABLE IF NOT EXISTS `UserTypes` (
    `UserTypeID` INT PRIMARY KEY AUTO_INCREMENT, -- User Type ID
    `TypeName` VARCHAR(50) NOT NULL -- Type Name e.g. Admin, Customer
);
