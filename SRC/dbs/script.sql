create table feedback
(
    ID             int auto_increment
        primary key,
    Contact_number int                                   null,
    Contact_name   varchar(100)                          null,
    Message        text                                  null,
    FeedBack_Date  datetime    default CURRENT_TIMESTAMP null,
    Subject        varchar(500)                          null,
    AdminRespond   text                                  null,
    CaseState      varchar(40) default 'opencase'        null comment 'opencase'
);

create table seller
(
    sellerID       int auto_increment
        primary key,
    sellerName     varchar(45)  null,
    sellerPhone    int          null,
    sellerEmail    varchar(45)  null,
    sellerAddress  varchar(100) null,
    sellerPassword varchar(45)  null,
    sellerImage    text         null
);

create table product
(
    productID          int auto_increment
        primary key,
    productName        varchar(45) null,
    productDescription text        null,
    productPrice       float       null,
    productImage       text        null,
    productCategory    varchar(45) null,
    productState       varchar(45) null,
    productDate        date        null,
    sellerID           int         null,
    constraint product_seller_id
        foreign key (sellerID) references seller (sellerID)
);

create index product_seller_id_idx
    on product (sellerID);

create table user
(
    userID       int auto_increment
        primary key,
    userName     varchar(45)  null,
    userPhone    int          null,
    userEmail    varchar(100) null,
    userAddress  varchar(45)  null,
    userPassword varchar(45)  null,
    userImage    varchar(100) null,
    userAnswer1  text         null,
    userAnswer2  text         null,
    parent       varchar(254) not null
);

create table `order`
(
    orderID         int auto_increment
        primary key,
    orderDate       date         null,
    userID          int          null,
    orderTotal      float        null,
    orderState      varchar(50)  null,
    customerName    varchar(100) null,
    customerAddress text         null,
    customerPhone   int          null,
    customerCity    varchar(50)  null,
    adminApproved   varchar(20)  null,
    constraint order_user_id
        foreign key (userID) references user (userID)
);

create index order_user_id_idx
    on `order` (userID);

create table order_content
(
    orderID   int   not null,
    productID int   not null,
    quantity  int   null,
    price     float null,
    primary key (orderID, productID),
    constraint order_content_product_id
        foreign key (productID) references product (productID),
    constraint oreder_content_order_id
        foreign key (orderID) references `order` (orderID)
);

create index order_content_product_id_idx
    on order_content (productID);


