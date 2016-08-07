CREATE TABLE users (
   id serial primary key,
   email citext UNIQUE NOT NULL,
   password text NOT NULL,
   admin boolean NOT NULL
);

CREATE TABLE person (
   pid serial primary key,
   vorname text UNIQUE NOT NULL,
   nachname text NOT NULL,
   nutzerkennzeichen text,
   matrikelnummer int
);

CREATE TABLE fachschaft (
   fid serial primary key,
   name text UNIQUE NOT NULL
);

CREATE TABLE gremium (
   gid serial primary key,
   name text UNIQUE NOT NULL,
   beschreibung text
);

CREATE TABLE wahlperiode (
   wid serial primary key,
   vorname text UNIQUE NOT NULL,
   nachname text NOT NULL,
   nutzerkennzeichen text,
   matrikelnummer int
);

CREATE TABLE gremiumsmitglied (
   gmid serial primary key,
   pid integer references person(pid) NOT NULL,
   wid integer references wahlperiode(wid) NOT NULL,
   gid integer references gremium(gid) NOT NULL,
   von text NOT NULL,
   bis text NOT NULL,
   nachruecker boolean,
   grund text
);

CREATE TABLE fachschaftsmitglied (
   fmid serial primary key,
   pid integer references person(pid) NOT NULL,
   wid integer references wahlperiode(wid) NOT NULL,
   fid integer references fachschaft(fid) NOT NULL,
   von text NOT NULL,
   bis text NOT NULL
);