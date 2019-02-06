Create table if not exists Country(
	
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name NVARCHAR(50) unique not null ,
	Code NVARCHAR(120) unique

);

Create table if not exists Role(
    
	Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Address1 NVARCHAR(50) not null 

);

create table if not exists EventCategory (

	Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     Name VARCHAR(120) unique not null


);

create table if not exists EventTopic (

	Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     Name NVARCHAR(120) unique not null


);


create table if not exists Event(
	
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name NVARCHAR(120) not null,
    Location NVARCHAR(120) not null,
    Starts DateTime,
    Ends DateTime,
   
	Image NVARCHAR(255) not null,
    Description  NVARCHAR(1024) not null,
    OrganiserName NVARCHAR(120) not null,
	OrganiserDescription NVARCHAR(120) not null,
	   
	EventCategoryId int not null, 
    EventTopicId int not null,
    
    
	  FOREIGN KEY FK_EventCategoryId (Id)
    REFERENCES EventCategory(Id),
      FOREIGN KEY  FK_EventTopicId (Id)
    REFERENCES EventTopic(Id)




);



