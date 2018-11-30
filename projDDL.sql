create table Warehouse (
	name		varchar(50),
	address		varchar(100),
	city		varchar(50) not null,
	province	char(2),
	country 	char(6),
	primary key (name)
);

create table Product (
	upc		int,
	title 		varchar(50) not null,
	category	varchar(50),
	price		DECIMAL(8,2) not null,
	imageLink	mediumblob not null,
	description	text,
	timesOrdered	int,
	primary key 	(upc)
);

create table User (
	username	varchar(50),
	profilePic	blob,
	password	varchar(40) not null,
	firstName	varchar(50) not null,
	lastName	varchar(50) not null,
	email 		varchar(100) not null,
	bio		text,
	primary key	(username)
);

create table Orders (
	orderId		int auto_increment,
	orderDate 	date,
	totalPrice 	decimal(8,2),	
	username	varchar(50) not null,
	primary key (orderId),
	foreign key (username) references User (username) 
		on delete cascade on update cascade
);
	
create table Contains(
	orderId	int,
	upc	int,
	amount	int,
	primary key (orderId, upc),
	foreign key (orderId) references Orders (orderId)
		on delete cascade on update cascade,
	foreign key (upc) references Product (upc)
		on delete cascade on update cascade
);

create table PaymentInfo (
	cardNum		int,
	username	varchar(50),
	nameOnCard 	varchar(100) not null,
	expDate		Date not null,
	CSV		smallint not null,
	billingAddress 	varchar(100),
	country		varchar(50),
	province	varchar(50),
	city		varchar(50),
	postalCode 	varchar(6),
	primary key (cardNum, username),
	foreign key (username) references User (username)
		on delete cascade on update cascade
);

create table Shipment (
	trackingNum	varchar(50),
	shipDate	Date,
	weight		float(6,2),
	shippingAddress varchar(100) not null,
	country		varchar(50),
	province	varchar(50),
	city		varchar(50),
	postalCode	varchar(50) not null,
	username	varchar(50) not null,
	warehouse	varchar(50), 
	orderId		int not null,
	primary key (trackingNum),
	foreign key (username) references User (username) 
		on delete no action on update cascade,
	foreign key (warehouse) references Warehouse (name) 
		on delete no action on update cascade,
	foreign key (orderId) references Orders (orderId) 
		on delete no action on update no action
);

create table StoredAt (
	upc		int,
	warehouse 	varchar(50),
	quantity	int not null,
	primary key (upc, warehouse),
	foreign key (upc) references Product(upc)
		on delete cascade on update cascade,
	foreign key (warehouse) references Warehouse(name)
		on delete cascade on update cascade
);

create table Admin (
	username	varchar(50),
	primary key (username),
	foreign key (username) references User (username)
		on delete cascade on update cascade
);

create table Moderator (
	username 	varchar(50),
	primary	key (username),
	foreign key (username) references User (username)
		on delete cascade on update cascade
);
		
	
create table Cart (
	cartId		int auto_increment,
	username	varchar(50) not null,
	cartTotal	decimal(8,2) default 0.00,
	primary key (cartId),
	foreign key (username) references User (username)
		on delete cascade on update cascade
);		


create table InCart (
	cartId 		int,
	upc		int,
	price		DECIMAL(8,2) not null,
	quantity	int,
	primary key (cartId, upc),
	foreign key (cartId) references Cart(cartId) on delete cascade on update cascade,
	foreign key (upc) references Product(upc) on delete cascade on update cascade
); 

alter table InCart add column totalPrice decimal(8,2) as (price*quantity);	

create table Review (
	username 	varchar(50),
	upc		int,
	details		text,
    postDate    DATETIME,
	primary key (username, upc),
	foreign key (username) references User (username) on delete cascade on update cascade,
	foreign key (upc) references Product (upc) on delete cascade on update cascade
);
