USE master
  GO

  -- Drop the database if it already exists
 IF  EXISTS (SELECT name FROM sys.databases WHERE name = N'Portlethen')
	DROP DATABASE Portlethen
 GO

 -- Now create the Portlethen database
 CREATE DATABASE Portlethen
 GO

 -- Ensure that Portlethen is the current database in use
 USE Portlethen
 GO

/* Create table USERLOGIN */
IF OBJECT_ID('USERLOGIN', 'U') IS NOT NULL
  DROP TABLE USERLOGIN
GO
/* Create table Userlogin */
CREATE TABLE USERLOGIN (
    userID			 int Identity(1,1)		NOT NULL,
	username				NVARCHAR(30)	NOT NULL,
	pass					NVARCHAR(30)	NOT NULL,
	accessLvl				int				NOT NULL,
	email					NVARCHAR(30)	NOT NULL,
	secQues					NVARCHAR(50)	NOT NULL,
	secAns		 			NVARCHAR(10)	NOT NULL,
	firstName				NVARCHAR(20)	NOT NULL,
	lastName				NVARCHAR(30)	NOT NULL
	CONSTRAINT pk_USERLOGIN PRIMARY KEY (userID))


/* Create table CLUBS */
IF OBJECT_ID('CLUBS', 'U') IS NOT NULL
DROP TABLE CLUBS
GO


CREATE TABLE CLUBS (
clubID			int Identity(1,1)	NOT NULL,
clubname        NVARCHAR(30)		NOT NULL,
creatorID		int	NOT NULL,
age_group		NVARCHAR(20)		NOT NULL,
contact			NVARCHAR(30)		NULL,
location		NVARCHAR(50)		NULL,
longDescr		NVARCHAR(300)		NOT NULL,
headerImg		NVARCHAR(100)		NULL,
backgroundImg	NVARCHAR(100)		NULL

CONSTRAINT pk_CLUBS PRIMARY KEY (clubID),
CONSTRAINT fk_CLUBS FOREIGN KEY (creatorID)
REFERENCES USERLOGIN(userID))


/* Create table SUBSCRIPTION */
IF OBJECT_ID('SUBSCRIPTION', 'U') IS NOT NULL
DROP TABLE SUBSCRIPTION
GO

CREATE TABLE SUBSCRIPTION (
subID				int Identity(1,1)	NOT NULL,
userID				int 	NOT NULL,
clubID				int 	NOT NULL

CONSTRAINT pk_SUBSCRIPTION PRIMARY KEY (userID,subID,clubID),
CONSTRAINT fk_userid FOREIGN KEY (userID)
REFERENCES USERLOGIN(userID),
CONSTRAINT fk_clubid FOREIGN KEY (clubID)
REFERENCES CLUBS(clubID)
)

/* Create table CLUB_EVENTS */
IF OBJECT_ID('CLUB_EVENTS', 'U') IS NOT NULL
DROP TABLE CLUB_EVENTS
GO

CREATE TABLE CLUB_EVENTS (
    eventID		int Identity(1,1)	NOT NULL,
clubID			int	NOT NULL,
eventDescr		NVARCHAR(100)		NOT NULL,
eventDay		NVARCHAR(20)		NOT NULL,
eventTime		NVARCHAR(20)		NOT NULL,

CONSTRAINT pk_CLUB_EVENTS PRIMARY KEY(eventID,clubID),
CONSTRAINT fk_CLUB_EVENTS FOREIGN KEY(clubID)
REFERENCES CLUBS(clubID))

/* Create table MAP */
IF OBJECT_ID('MAP', 'U') IS NOT NULL
DROP TABLE MAP
GO

CREATE TABLE MAP (
    markerID		int Identity(1,1)	NOT NULL,
markerName		NVARCHAR(40)		NOT NULL,
markerType		int					NOT NULL,
markerLAT		numeric(10,6)		NOT NULL,
markerLNG		numeric(10,6)		NOT NULL,
markerImg		NVARCHAR(100)		NULL,
markerDescript	NVARCHAR(100)		NULL,
adminApproved	bit					NOT NULL

CONSTRAINT pk_MAP PRIMARY KEY (markerID,markerName))
