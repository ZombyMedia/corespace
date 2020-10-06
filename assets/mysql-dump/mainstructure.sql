-- ####################################################################
-- ## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
-- ## License as of: 10.05.2020 19:41 | #202005101941                ##
-- ## Niklas Vorberg (AsP3X)                                         ##
-- ####################################################################

## DROP DATABASE corespace;
CREATE DATABASE IF NOT EXISTS corespace;
USE corespace;

CREATE TABLE users (
	uuid VARCHAR(255) UNIQUE NOT NULL,
    username LONGTEXT NOT NULL,
    passwd LONGTEXT NOT NULL,
    email LONGTEXT NOT NULL UNIQUE,
    bankid VARCHAR(255) NOT NULL UNIQUE,

    PRIMARY KEY(uuid)
);

CREATE TABLE userdata (
	uuid VARCHAR(255) UNIQUE NOT NULL,
    profileimage VARCHAR(255),
    achivements LONGTEXT,
    games LONGTEXT,
    friends LONGTEXT,

    FOREIGN KEY(uuid)
       REFERENCES users(uuid)
);

CREATE TABLE bank (
	bid VARCHAR(255) UNIQUE NOT NULL,
    credits BIGINT,

    PRIMARY KEY(bid)
);

CREATE TABLE processors (
	pid VARCHAR(255) UNIQUE NOT NULL,
    startstamp VARCHAR(255) NOT NULL
);

CREATE TABLE transactions (
	tid VARCHAR(255) UNIQUE NOT NULL,
    credits BIGINT,
    sender VARCHAR(255) NOT NULL,
    receiver VARCHAR(255) NOT NULL,
    processor VARCHAR(255),
    killcode VARCHAR(255)
);
