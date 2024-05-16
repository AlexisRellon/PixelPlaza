-- Active: 1714706041615@@127.0.0.1@3306@pixelplay

CREATE TABLE `Products` (
    `ProductID` INT PRIMARY KEY AUTO_INCREMENT, -- Product ID
    `Name` VARCHAR(255) NOT NULL, -- Product Name
    `Description` TEXT, -- Product Description
    `Price` DECIMAL(10, 2) NOT NULL, -- Product Price
    `Quantity` INT NOT NULL, -- Product Quantity
    `ImageURL` VARCHAR(255), -- Product Image URL
    `CategoryID` INT, -- Category ID
    `BrandID` INT, -- Brand ID

    FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`) ON DELETE RESTRICT ON UPDATE CASCADE  ,
    FOREIGN KEY (`BrandID`) REFERENCES `Brands` (`BrandID`) ON DELETE RESTRICT ON UPDATE CASCADE,
    INDEX (`CategoryID`),
    INDEX (`BrandID`)
);

CREATE TABLE `Categories` (
    `CategoryID` INT PRIMARY KEY AUTO_INCREMENT, -- Category ID
    `Name` VARCHAR(100) NOT NULL, -- Category Name
    `Description` TEXT -- Category Description
);

CREATE TABLE `Brands` (
    `BrandID` INT PRIMARY KEY AUTO_INCREMENT, -- Brand ID
    `Name` VARCHAR(100) NOT NULL, -- Brand Name
    `Description` TEXT -- Brand Description
);

CREATE TABLE `Orders` (
    `OrderID` INT PRIMARY KEY AUTO_INCREMENT, -- Order ID
    `UserID` INT, -- User ID
    `TotalAmount` DECIMAL(10, 2) NOT NULL, -- Total Amount
    `Status` VARCHAR(50), -- Order Status
    `CreatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Created At
    `UpdatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Updated At

    FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE `OrderItems` (
    `OrderItemID` INT PRIMARY KEY AUTO_INCREMENT, -- Order Item ID
    `OrderID` INT, -- Order ID
    `ProductID` INT, -- Product ID
    `Quantity` INT NOT NULL, -- Quantity
    `Price` DECIMAL(10, 2) NOT NULL, -- Price

    FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`OrderID`) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE `Reviews` (
    `ReviewID` INT PRIMARY KEY AUTO_INCREMENT, -- Review ID
    `ProductID` INT, -- Product ID
    `UserID` INT, -- User ID
    `Rating` INT NOT NULL, -- Rating
    `Comment` TEXT, -- Comment
    `CreatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Created At

    FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE `Users` (
    `UserID` INT PRIMARY KEY AUTO_INCREMENT, -- User ID
    `Username` VARCHAR(100) NOT NULL, -- Username
    `Password` VARCHAR(255) NOT NULL, -- Password
    `Email` VARCHAR(255) NOT NULL, -- Email
    `FirstName` VARCHAR(100), -- First Name
    `LastName` VARCHAR(100), -- Last Name
    `Address` TEXT, -- Address
    `Phone` VARCHAR(20) -- Phone
);

CREATE TABLE `UserTypes` (
    `UserTypeID` INT PRIMARY KEY AUTO_INCREMENT, -- User Type ID
    `TypeName` VARCHAR(50) NOT NULL -- Type Name e.g. Admin, Customer
);

CREATE TABLE `UserRoles` (
    `UserRoleID` INT PRIMARY KEY AUTO_INCREMENT, -- User Role ID
    `UserID` INT, -- User ID :FK to Users 
    `RoleID` INT, -- Role ID :FK to UserTypes

    FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (`RoleID`) REFERENCES `UserTypes` (`UserTypeID`) ON DELETE RESTRICT ON UPDATE CASCADE
);
